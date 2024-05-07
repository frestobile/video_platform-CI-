<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Backend1 extends CI_Controller{
    // private $_version = '1.6.3';
    // private $_url = 'https://api.jwplatform.com/v1';
    // private $_library;

    // private $_key, $_secret;

    public function __construct(){
        parent::__construct();
        $this->load->model('front/LoginModel');
        $this->load->model('front/DeviceModel');
        $this->load->model('front/General');
        $this->load->model('GlobalModel');
        $this->load->model('TimeModel');
        $this->load->helper(array('form', 'url'));

        // $this->_key = 'g6XTybmR';
        // $this->_secret = '2gU3E3vT6AKm9bClOxm483h5';
        // if (function_exists('curl_init')) {
        //     $this->_library = 'curl';
        // } else {
        //     $this->_library = 'fopen';
        // }
    }

    public function index() {
        $this->load->view('video_upload', array('error' => ' ' ));
    }

    public function upload_video() {
        $config['upload_path'] = './uploads/videos/';
        $config['allowed_types'] = 'mp4|avi|mov';
        $config['max_size'] = 500000; // size in kilobytes

        $response = array();
        $car_number = isset($_POST["car_number"]) ? $_POST["car_number"] : "";
        $tech_name = isset($_POST["tech_name"]) ? $_POST["tech_name"] : "";
        $deviceID = isset($_POST["deviceID"]) ? $_POST["deviceID"] : "";

        // Ensure upload path is valid
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $video_cond['video_case_number'] = $car_number;
        $video_cond['video_is_show'] = 0;
        
        $video_data = $this->General->get_row('vis_videos', $video_cond);
        $device_cond['deviceid'] = $deviceID;
        $device_data = $this->General->get_row('vis_devices', $device_cond);

        if (!$video_data || !$device_data) {
            $response["error"] = true;
            $response["msg"] = "Please confirm the car number again.";
            echo json_encode($response);
        } else {
            if (isset($_FILES['videoFile'])) {
                $tempFile = $_FILES['videoFile']['tmp_name'];
                $targetFile = $config['upload_path'] . $_FILES['videoFile']['name'];
                $fileName = $_FILES['videoFile']['name'];
    
                // Validate the file type
                $fileParts = pathinfo($_FILES['videoFile']['name']);
                if (in_array(strtolower($fileParts['extension']), explode('|', $config['allowed_types']))) {
                    if (move_uploaded_file($tempFile, $targetFile)) {
                        
                        $data = array();
                        $cond['video_id'] = $video_data->video_id;
                
                        $data['video_uploaded'] = 2;
                        $data['video_url'] = $fileName;
                        $data['video_upload_time'] = $this->TimeModel->getting_datetime();
                        $data['video_device_id'] = $device_data->device_id;
                        $data['video_tech_name'] = $tech_name;
                        $data['video_is_show'] = 1;
    
                        $this->General->update('vis_videos', $data, $cond);
                        $response['error'] = false;
                        $response['msg'] = 'File uploaded successfully.';

                        $this->get_thumbnail($targetFile, $video_data->video_serial, $response);
    
                       
    
                    } else {
                        $response['error'] = true;
                        $response['msg'] = 'Failed to move uploaded file.';
                        echo json_encode($response);
                    }
                } else {
                    $response['error'] = true;
                    $response['msg'] = 'Invalid file type.';
                    echo json_encode($response);
                }
            } else {
                $response['error'] = true;
                $response['msg'] = 'No Video File.';
                echo json_encode($response);
    
            }
        }
    }

    public function device_login(){
        $deviceID = $this->input->get('id');
        $password = $this->input->get('password');

        $result = $this->LoginModel->device_login($deviceID, $password);
        $update_data = array();
        if($result['status'] == 'success'){
            $company_data = $this->General->get_row("vis_companies", array("company_id" => $result["device_company_id"]));
            $data['error'] = false;
            $data['state'] = 200;
            $data['msg'] = "Logged In successfully!";
            $data["url"] = $company_data->company_picture;
            $update_data['device_login_num'] = $result['device_login_num'] + 1;
            $this->DeviceModel->loginUpdate($update_data,$result['device_id']);
        }else if($result['status'] == 'block'){
            $data['error'] = true;
            $data['state'] =  100;
            $data['msg'] = "This Device was Blocked!";
            $data['url'] = null;
        }else if($result['status'] == 'password'){
            $data['error'] = true;
            $data['state'] =  300;
            $data['msg'] = "Password is Incorrect!";
            $data['url'] = null;
        }else{
            $data['error'] = true;
            $data['state'] = 500;
            $data['msg'] = "This Device doesn't exist!";
            $data['url'] = null;
        }

        echo json_encode($data);
    }

    public function device_status() {
        $response = array();
        $deviceID = $this->input->get('deviceID');
        $device_data = $this->General->get_row('vis_devices', array('deviceid' => $deviceID));
        if(empty($device_data)) {
            $response["error"] = true;
            $response['state'] = 400;
            $response["msg"] = "Device ID doesn't exist anymore!";
            $response['url'] = null;
        } else {
            $response["error"] = false;
            $response['state'] = 200;
            $response["msg"] = "OK";
            $response['url'] = "";
        }
        echo json_encode($response);
    }

    public function video_check(){
        $deviceID = $this->input->get('deviceID');
        $device_cond['deviceid'] = $deviceID;
        $device_data = $this->General->get_row('vis_devices', $device_cond);

        $videoID = $this->input->get('car_number');
        $video_cond['video_case_number'] = $videoID;
        $video_cond['video_company_id'] = $device_data->device_company_id;
        $video_cond['video_is_show'] = 0;
        // $video_cond['video_uploaded'] = 0;

        $video_data = $this->General->get_row('vis_videos', $video_cond);

        if (!$video_data) {
            $response["error"] = true;
            $response['state'] = 404;
            $response["msg"] = "The case number doesn't exist or video has been uploaded already.";
        } else {
            if ($video_data->video_company_id == $device_data->device_company_id) {
                if ($video_data->video_is_show == 0) {
                    if ($video_data->video_uploaded > 1) {
                        $response["error"] = true;
                        $response['state'] = 300;
                        $response["msg"] = "The video already uploaded. It's under processing in Server";
                    } else {
                        $response["error"] = false;
                        $response['state'] = 200;
                        $response["msg"] = "OK";
                    }
                } else {
                    $response["error"] = true;
                    $response['state'] = 100;
                    $response["msg"] = "The video already exist";
                }
            } else {
                $response["error"] = true;
                $response['state'] = 500;
                $response["msg"] = "No video number available. The Car Number doesn't exist!";
            }
        }

        echo json_encode($response);
    }

    public function check_status(){
        $this->load->model('front/VideoModel');
        $param['video_is_show'] = 0; // done the video uploading..
        $param['video_company_id'] = $this->input->post('company_id');
        $result = $this->VideoModel->getFindWhere($param);
        log_message('info', 'check_status() VideoModel->getFindWhere:');
        log_message('info', json_encode($result));
        $res = array();
        if($result) {
            foreach ($result as $key=>$rows) {
                if ($rows['video_uploaded'] == 1) {
                    $res[$key]['status'] = 1;
                    $res[$key]['video_id'] = $rows['video_id'];
                } elseif ($rows['video_uploaded'] == 2) {
                    $jw_result = $this->call('/videos/conversions/list', array('video_key' => $rows['video_url']));
                    $response = json_decode(trim($jw_result), TRUE);

                    log_message('info', '[Backend] check_status() /videos/conversions/list $jw_result:');
                    log_message('info', json_encode($jw_result));

                    if ($response['conversions'][3]['status'] == "Ready" &&
                        $response['conversions'][3]['height'] >= 720 &&
                        $response['conversions'][3]['width'] >= 1280 &&
                        $response['conversions'][3]['filesize'] > 0) {
                        $data['video_is_show'] = 1;
                        $data['video_uploaded'] = 3;  // video ready in the jwplayer server
                        $cond['video_id'] = $rows['video_id'];
                        if ($this->General->update('vis_videos', $data, $cond)) {
                            $res[$key]['status'] = 2;
                            $res[$key]['video_id'] = $rows['video_id'];
                        } else {
                            $res[$key]['status'] = 0;
                            $res[$key]['video_id'] = null;
                        }
                    }  else {
                        $res[$key]['status'] = 2;
                        $res[$key]['video_id'] = $rows['video_id'];
                    }
                } else {
                    $res[$key]['status'] = 0;
                    $res[$key]['video_id'] = null;
                }

            }
        } else {
            $res[0]['status'] = 0;
            $res[0]['video_id'] = null;
        }
        echo json_encode($res);
    }

    public function remove_data() {
        $response = array();
        $video_id = $this->input->post('video_id');
        $cond['video_id'] = $video_id;
        $data['user_removed'] = 1;
        $data['video_update_time'] = $this->TimeModel->getting_datetime();

        if ($this->General->update('vis_videos', $data, $cond)) {
            $response['status'] = "success";
        } else {
            $response['status'] = "fail";
        }

        echo json_encode($response);

    }

    public function get_thumbnail($video_path, $thumb_name, $resp) {
        $width = 320;
        $height = 180;
        $videoFilePath = realpath($video_path);
        $thumbnail_path = realpath("./uploads/videos/");
        $full_path = $thumbnail_path.'/'.$thumb_name.'.jpg';
        $cmd = "ffmpeg -i $videoFilePath -ss 00:00:02.000 -vframes 1 -vf scale=$width:$height $full_path &";
        $resp['command'] = $cmd;
        shell_exec($cmd);
        // if(shell_exec($cmd) == null) {
        //     echo json_encode($resp);
        // } else {
        //     $resp['msg'] = 'File Upload done,but failed to get thumbnail';
            echo json_encode($resp);
        // }

        
    }

}
