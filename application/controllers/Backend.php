<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Backend extends CI_Controller{
    private $_version = '1.6.3';
    private $_url = 'https://api.jwplatform.com/v1';
    private $_library;

    private $_key, $_secret;

    public function __construct(){
        parent::__construct();
        $this->load->model('front/LoginModel');
        $this->load->model('front/DeviceModel');
        $this->load->model('front/General');
        $this->load->model('GlobalModel');
        $this->load->model('TimeModel');
        $this->load->helper('url');

        $this->_key = 'g6XTybmR';
        $this->_secret = '2gU3E3vT6AKm9bClOxm483h5';

        // Determine which HTTP library to use:
        // check for cURL, else fall back to file_get_contents
        if (function_exists('curl_init')) {
            $this->_library = 'curl';
        } else {
            $this->_library = 'fopen';
        }
    }

    public function device_login(){
        $deviceID = $this->input->get('id');
        $password = $this->input->get('password');

        $result = $this->LoginModel->device_login($deviceID, $password);
        $update_data = array();
        if($result['status'] == 'success'){
            $data['error'] = false;
            $data['state'] = 200;
            $data['msg'] = "Logged In successfully!";
            $update_data['device_login_num'] = $result['device_login_num'] + 1;
            $this->DeviceModel->loginUpdate($update_data,$result['device_id']);
        }else if($result['status'] == 'block'){
            $data['error'] = true;
            $data['state'] =  100;
            $data['msg'] = "This Device was Blocked!";
        }else if($result['status'] == 'password'){
            $data['error'] = true;
            $data['state'] =  300;
            $data['msg'] = "Password is Incorrect!";
        }else{
            $data['error'] = true;
            $data['state'] = 500;
            $data['msg'] = "This Device doesn't exist!";
        }

        echo json_encode($data);
    }

    public function video_check(){
        $deviceID = $this->input->get('deviceID');
        $device_cond['deviceid'] = $deviceID;
        $device_data = $this->General->get_row('vis_devices', $device_cond);

        $videoID = $this->input->get('car_number');
        $video_cond['video_case_number'] = $videoID;
        $video_cond['video_company_id'] = $device_data->device_company_id;
        $video_cond['video_is_show'] = 0;
//        $video_cond['video_uploaded'] = 0;

        $video_data = $this->General->get_row('vis_videos', $video_cond);

        if (!$video_data) {
            $response["error"] = true;
            $response['state'] = 404;
            $response["msg"] = "The Car Number doesn't exist!";
        } elseif (!$device_data) {
            $response["error"] = true;
            $response['state'] = 400;
            $response["msg"] = "The Device doesn't exist!";
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
        log_message('info', 'video_check() $response');
        log_message('info', json_encode($response));
        echo json_encode($response);
    }

    public function video_create(){
        $response = array();
        $car_number = isset($_GET["car_number"]) ? $_GET["car_number"] : "";
        $tech_name = isset($_GET["tech_name"]) ? $_GET["tech_name"] : "";
        $deviceID = isset($_GET["deviceID"]) ? $_GET["deviceID"] : "";

        log_message('info', "[Backend] video_create() _GET car_number $car_number tech_name $tech_name deviceID $deviceID");

        $video_cond['video_case_number'] = $car_number;
        $video_cond['video_is_show'] = 0;
        $device_cond['deviceid'] = $deviceID;

        $video_data = $this->General->get_row('vis_videos', $video_cond);
        $device_data = $this->General->get_row('vis_devices', $device_cond);

        log_message('info', '[Backend] video_create() General->get_row vis_videos:');
        log_message('info', json_encode($video_data));
        log_message('info', '[Backend] video_create() General->get_row vis_devices:');
        log_message('info', json_encode($device_data));

        $data = array();

        $cond['video_id'] = $video_data->video_id;

        try {
            $params = array();
            $params['title'] = $car_number;
            $params['description'] = $car_number."_VIService";
            $create_response = $this->call('/videos/create', $params);

            log_message('info', '[Backend] video_create() $create_response:');
            log_message('info', json_encode($create_response));

            $decoded = json_decode(trim($create_response), TRUE);
            if ($decoded['status'] == "ok") {
                $upload_link = $decoded['link'];
                $res['video_uploaded'] = 1; //start video uploading..
                $res['video_url'] =  $upload_link['query']['key'];
                $res['video_upload_time'] = $this->TimeModel->getting_datetime();
                $res['video_device_id'] = $device_data->device_id;
                $res['video_tech_name'] = $tech_name;
                $this->General->update('vis_videos', $res, $cond);

                $response["error"] = false;
                $response['message'] = "Success";
                $response["token"] = $upload_link['query']['token'];
                $response["key"] = $upload_link['query']['key'];
            } else {
                $response["error"] = true;
                $response["message"] = "Something Went Wrong. Try again later.";
                $response["token"] = "";
                $response["key"] = "";
            }
        } catch (Exception $e) {
            $response["error"] = true;
            $response["message"] = $e->getMessage();
        }
        log_message('info', '[Backend] video_create() final $response:');
        log_message('info', json_encode($response));
        echo json_encode($response);
    }

    public function video_upload_success() {
        $response = array();

        $car_number = isset($_GET["car_number"]) ? $_GET["car_number"] : "";
        $deviceID = isset($_GET["deviceID"]) ? $_GET["deviceID"] : "";

        $video_cond['video_case_number'] = $car_number;
        $video_cond['video_is_show'] = 0;
        $device_cond['deviceid'] = $deviceID;
        $video_data = $this->General->get_row('vis_videos', $video_cond);
        $data = array();
        $cond['video_id'] = $video_data->video_id;

        $data['video_uploaded'] = 2;
        $data['video_upload_time'] = $this->TimeModel->getting_datetime();
        if ($this->General->update('vis_videos', $data, $cond)) {
            $response['error'] = false;
        }
        log_message('info', '[Backend] video_upload_success() $response:');
        log_message('info', json_encode($response));
        echo json_encode($response);
    }

    public function video_delete(){

        $video_key = isset($_POST["video_key"]) ? $_POST["video_key"] : "";
        $response = array();
        if ($video_key != ""){
            $res = $this->call("/videos/delete",array('video_key'=>$video_key));
            $response = json_decode(trim($res), TRUE);
        } else {
            $response['status'] = '';
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

    public function version() {
        return $this->_version;
    }

    private function _urlencode($input) {
        if (is_array($input)) {
            return array_map(array('_urlencode'), $input);
        } else if (is_scalar($input)) {
            return str_replace('+', ' ', str_replace('%7E', '~', rawurlencode($input)));
        } else {
            return '';
        }
    }

    // Sign API call arguments
    private function _sign($args) {
        ksort($args);
        $sbs = "";
        foreach ($args as $key => $value) {
            if ($sbs != "") {
                $sbs .= "&";
            }
            // Construct Signature Base String
            $sbs .= $this->_urlencode($key) . "=" . $this->_urlencode($value);
        }

        // Add shared secret to the Signature Base String and generate the signature
        $signature = sha1($sbs . $this->_secret);

        return $signature;
    }

    // Add required api_* arguments
    private function _args($args) {
        $args['api_nonce'] = str_pad(mt_rand(0, 99999999), 8, STR_PAD_LEFT);
        $args['api_timestamp'] = time();

        $args['api_key'] = $this->_key;

        if (!array_key_exists('api_format', $args)) {
            // Use the serialised PHP format,
            // otherwise use format specified in the call() args.
            $args['api_format'] = 'json';
        }

        // Add API kit version
        $args['api_kit'] = 'json-' . $this->_version;

        // Sign the array of arguments
        $args['api_signature'] = $this->_sign($args);

        return $args;
    }

    // Construct call URL
    public function call_url($call, $args=array()) {
        $url = $this->_url . $call . '?' . http_build_query($this->_args($args), "", "&");
        return $url;
    }

    // Make an API call
    public function call($call, $args=array()) {
        $url = $this->call_url($call, $args);

        $response = null;
        switch($this->_library) {
            case 'curl':
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_URL, $url);
                $response = curl_exec($curl);
                curl_close($curl);
                break;
            default:
                $response = file_get_contents($url);
        }
//        $unserialized_response = @unserialize($response);
//
//        return $unserialized_response ? $unserialized_response : $response;
        return $response;
    }
}
