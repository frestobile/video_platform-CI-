<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    protected $url_videos       = './uploads/videos/';
    protected $url_videosimg    = './uploads/video_img/';
    protected $url_dbbackup     = './uploads/backup_db/';
    protected $url_companyimg   = './uploads/company_img/';

    protected $size_image       = 5242880;// 5MB;
    protected $size_video       = 524288000;// 500MB; 29988238
    protected $img_width        = 1024;
    protected $img_height       = 768;
    protected $img_size         = 1024 * 768;
    protected $pattern_image    = 'gif|jpg|png|bmp|ico';
    protected $pattern_video    = 'avi|mp4|3gp|ogv|webm';

    public function __construct(){
        parent::__construct();
        $this->load->model('TimeModel');
        $this->load->model('GlobalModel');
        $this->load->model('front/General');
        $this->load->helper('url');
        $this->load->helper('directory');
    }

    public function index(){
        $baseurl = $this->GlobalModel->get_baseurl();
        if ($this->getAdminInfo()){
            redirect($baseurl.'/admin/Main', 'refresh');
        } else {
            $this->load->view('admin/login');
        }
    }

    private function checkLogin() {
        $adminInfo = $this->getAdminInfo();
        $sess_flag = false;
        if (!isset($adminInfo['admin_id'])) {
            $sess_flag = false;
        }else{
            if($adminInfo['admin_id'] > 0) $sess_flag = true;
        }

        if($sess_flag == false){
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/admin", 'refresh');
        }else{
            return true;
        }
    }

    public function login(){
        $this->load->model('AdminModel');
        $ret = array(
            'status' => 'FAIL',
            'token'  => ''
        );
        $username = '';
        $password = '';
        foreach ($_POST as $field_name => $field_value) $$field_name = $field_value;

        if( !$this->AdminModel->exist($username,$password) ){
            echo json_encode($ret);
            return;
        }

        $user =  $this->AdminModel->getFind($username);

        if( $user['admin_active'] == 0 ) {
            $ret['status'] = 'BLOCKED';
            $ret['token'] = '';
            echo json_encode($ret);
            return;
        }
        
        $user['admin_login_num'] = $user['admin_login_num']    +   1;
        $user['admin_login_time'] = $this->TimeModel->getting_datetime();
        $this->setAdminInfo( $user );

        unset($user['admin_password']);
        $this->AdminModel->update($user,$user['admin_id']);

        $ret['status'] = 'ADMIN_SUCCESS';
        $ret['token'] = 'AAA';
        echo json_encode($ret);
    }

    public function logout(){
        $this->load->library('session');
        $this->load->helper('url');

        $this->session->unset_userdata('admin');
        
        //$sessInfo = $this->getAdminInfo();
        //echo "<pre>"; print_r($sessInfo); exit; 
        /*foreach ($sessInfo as $keys) {
            $this->session->unset_userdata($keys);
            $this->session->unset_tempdata($keys);
        }*/
        //$this->session->sess_destroy();

        $this->load->model('GlobalModel');
        $baseurl = $this->GlobalModel->get_baseurl();
        redirect($baseurl."/admin", 'refresh');
    }

    public function AddCompany(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');

        if(isset($_FILES['favicon'])) {
            $tempPath1 = $_FILES['favicon']['tmp_name'];
            $fileName = $_FILES['favicon']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg', 'ico'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $this->url_companyimg;
                $dest_path1 = $uploadFileDir . $_POST['company_name'].'_favicon.'.$fileExtension;
    
                if(move_uploaded_file($tempPath1, $dest_path1)) {
                    $cond['favicon'] = $_POST['company_name'].'_favicon.'.$fileExtension;
                } else {
                    $cond['favicon'] = null;
                }
            } else {
                $cond['favicon'] = null;
            }
        } 

        if(isset($_FILES['preview'])) {
            $tempPath2 = $_FILES['preview']['tmp_name'];
            $fileName = $_FILES['preview']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $this->url_companyimg;
                $dest_path2 = $uploadFileDir . $_POST['company_name'].'_preview.'.$fileExtension;
    
                if(move_uploaded_file($tempPath2, $dest_path2)) {
                    $cond['preview_image'] = $fileName;
                } else {
                    $cond['preview_image'] = null;
                }
            } else {
                $cond['preview_image'] = null;
            }
        }

        if(isset($_FILES['image'])) {
            $tempPath3 = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $this->url_companyimg;
                $dest_path3 = $uploadFileDir . $_POST['company_name'].'_logo.'.$fileExtension;
    
                if(move_uploaded_file($tempPath3, $dest_path3)) {
                    $cond['company_picture'] = $fileName;
                } else {
                    $cond['company_picture'] = null;
                }
            } else {
                $cond['company_picture'] = null;
            }
        }

        $cond['company_name'] = $_POST['company_name'];
        $cond['company_email'] = $_POST['company_email'];
        if (isset($_POST['company_password']) && !empty($_POST['company_password'])) {
            $cond['company_password'] = $_POST['company_password'];
        }
        $cond['company_phone'] = $_POST['company_phone'];
        $cond['company_address']  = $_POST['company_address'];
        $cond['company_lang'] = $_POST['company_language'];
        $cond['email_sender'] = $_POST['email_sender'];
        $cond['sms_sender']  = $_POST['sms_sender'];
        $cond['offer_active'] = $_POST['offer_active'];

        $company_email = $_POST['company_email'];
        $state = $this->CompaniesModel->exist($company_email);
        if ($state){
            $ret['response'] = "EXIST";
        }else{
            if($this->CompaniesModel->insert($cond))
                $ret['response'] = "SUCCESS";
            else
                $ret['response'] = "FAIL";
        }
        echo json_encode($ret);
    }

    public function AddAdmin(){
        $this->checkLogin();
        $this->load->model('AdminModel');
        $user = $_POST;
        $this->AdminModel->update($user, 1);

        $ret['status'] = 'SUCCESS';
        
        echo json_encode($ret);
    }

    public function companyEnable(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');

        $data = $_POST;
        if($this->CompaniesModel->update($data))
            $ret['response'] = "SUCCESS";
        else
            $ret['response'] = "FAIL";
        echo json_encode($ret);
    }

    public function languageUpdate(){
        $this->checkLogin();
        $data['status'] = $_POST['status'];
        $cond['id'] = $_POST['id'];
        if($this->General->update("vis_language",$data, $cond))
            $ret['response'] = "SUCCESS";
        else
            $ret['response'] = "FAIL";
        echo json_encode($ret);
    }

    public function companyUpdate(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');

        $cond['company_id']       = $_POST['company_id'];
        $cond['company_name']     = $_POST['company_name'];
        if ($_POST['company_password'] != '') {
            $cond['company_password'] = $_POST['company_password'];
        }
        
        $cond['company_phone']    = $_POST['company_phone'];
        $cond['company_address']  = $_POST['company_address'];
        $cond['company_lang']  = $_POST['company_language'];
        $cond['sms_sender']  = $_POST['sms_sender'];
        $cond['email_sender']  = $_POST['email_sender'];
        $cond['offer_active'] = $_POST['offer_active'];

        $data['status'] = "";
        $data['image_url'] = "";

        if(isset($_FILES['favicon'])) {
            $tempPath1 = $_FILES['favicon']['tmp_name'];
            $fileName = $_FILES['favicon']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg', 'ico'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $this->url_companyimg;
                $dest_path1 = $uploadFileDir . $fileName;
    
                if(move_uploaded_file($tempPath1, $dest_path1)) {
                    $cond['favicon'] = $fileName;
                } else {
                    $cond['favicon'] = null;
                }
            } else {
                $cond['favicon'] = null;
            }
        } 

        if(isset($_FILES['preview'])) {
            $tempPath2 = $_FILES['preview']['tmp_name'];
            $fileName = $_FILES['preview']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $this->url_companyimg;
                $dest_path2 = $uploadFileDir . $fileName;
    
                if(move_uploaded_file($tempPath2, $dest_path2)) {
                    $cond['preview_image'] = $fileName;
                } else {
                    $cond['preview_image'] = null;
                }
            } else {
                $cond['preview_image'] = null;
            }
        }

        if(isset($_FILES['image'])) {
            $tempPath3 = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $this->url_companyimg;
                $dest_path3 = $uploadFileDir . $fileName;
    
                if(move_uploaded_file($tempPath3, $dest_path3)) {
                    $cond['company_picture'] = $fileName;
                } else {
                    $cond['company_picture'] = null;
                }
            } else {
                $cond['company_picture'] = null;
            }
        }
        

        if (isset($_POST['company_email'])) {
            $company_email = $_POST['company_email'];
            $cond['company_email']    = $company_email;
            $state = $this->CompaniesModel->exist($company_email);
            if ($state){
                $ret['response'] = "EXIST";
            }else{
                if($this->CompaniesModel->update($cond)) {
                    $ret['response'] = "SUCCESS";
                }
                else
                    $ret['response'] = "FAIL";
            }
        } else {
            if($this->CompaniesModel->update($cond)) {
                $ret['response'] = "SUCCESS";
            }
            else
                $ret['response'] = "FAIL";
        }

        echo json_encode($ret);
    }

    public function companyDelete(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');
        $this->load->model('VideosModel');
        $this->load->model('DevicesModel');
        $rows = $this->CompaniesModel->getFind($_POST['company_id']);
        $company_img = $rows['company_picture'];
        if(file_exists($this->url_companyimg. $company_img)) unlink($this->url_companyimg.$company_img);

        $result1 = $this->CompaniesModel->delete($_POST['company_id']);
        $result2 = $this->VideosModel->delete($_POST['company_id'], 'video_company_id');
        $result3 = $this->DevicesModel->delete($_POST['company_id'], 'device_company_id');
        if($result1 && $result2 && $result3){
            $this->RETURN_SUCCESS();
        } else {
            $this->RETURN_FAIL();
        }
    }

    public function videoUpdate(){
        $this->checkLogin();
        $this->load->model('VideosModel');
        $this->load->model('front/CustomerModel');

        $video_conf['video_id'] = $_POST['video_id'];
        $video_conf['video_customer_company'] = $_POST['video_customer_company'];
        $video_conf['video_company_id'] = $_POST['video_company_id'];
        $video_conf['video_case_number'] = $_POST['video_case_number'];

        $customer_conf['customer_id'] = $_POST['customer_id'];
        $customer_conf['customer_name'] = $_POST['customer_name'];
        $customer_conf['customer_email'] = $_POST['customer_email'];
        $customer_conf['customer_phone'] = $_POST['customer_phone'];

        if(isset($video_conf['video_id'])) $video_conf['video_update_time'] = $this->TimeModel->getting_datetime();
        if(isset($customer_conf['customer_id'])) $customer_conf['customer_update_at'] = $this->TimeModel->getting_datetime();

        if($this->VideosModel->update($video_conf) && $this->CustomerModel->update($customer_conf))
            $this->RETURN_SUCCESS();
        else
            $this->RETURN_FAIL();
    }

    public function videoDelete(){
        $this->checkLogin();
        $this->load->model('VideosModel');
        $data = $_POST;
        $rows = $this->VideosModel->getFind($data['video_id']);
        $video_url = $rows['video_url'];
        $video_img = $rows['video_image'];
        if(file_exists($this->url_videos. $video_url)) unlink($this->url_videos.$video_url);
        if(file_exists($this->url_videosimg. $video_img)) unlink($this->url_videosimg.$video_img);
        if($this->VideosModel->delete($_POST['video_id']))
            $this->RETURN_SUCCESS();
        else
            $this->RETURN_FAIL();
    }

    public function deviceAdd(){
        $this->checkLogin();
        $this->load->model('DevicesModel');

        $data = $_POST;
        $deviceID = $this->input->post('deviceID');

        $state = $this->DevicesModel->exist($deviceID);
        if ( $state ){
            $this->RETURN_FAIL();
        }else{
            if($this->DevicesModel->insert($data))
                $this->RETURN_SUCCESS();
            else
                $this->RETURN_FAIL();
        }
    }

    public function deviceUpdate(){
        $this->checkLogin();
        $this->load->model('DevicesModel');

        $data = $_POST;
        if (isset($_POST['deviceID'])){
            $deviceID = $this->input->post('deviceID');
            $state = $this->DevicesModel->exist($deviceID);
            if ($state){
                $this->RETURN_FAIL();
            }else{
                if($this->DevicesModel->update($data))
                    $this->RETURN_SUCCESS();
                else
                    $this->RETURN_FAIL();
            }
        } else{
            if($this->DevicesModel->update($data))
                $this->RETURN_SUCCESS();
            else
                $this->RETURN_FAIL();
        }
    }

    public function deviceDelete(){
        $this->checkLogin();
        $this->load->model('DevicesModel');
        if($this->DevicesModel->delete($_POST['device_id']))
            $this->RETURN_SUCCESS();
        else
            $this->RETURN_FAIL();
    }

    public function getDatabymonth(){
        $this->load->model('CompaniesModel');
        $company_id = $this->input->post('company_id');
        $month = $this->input->post('month');

        $company_data = $this->CompaniesModel->getFind($company_id);

        $sql = "SELECT YEAR(video_created_time) as year , MONTH(video_created_time) as month , DAY(video_created_time) as day , COUNT(*) as counts
                FROM db_vis.vis_videos
                WHERE YEAR(video_created_time) = YEAR(CURDATE())  
                AND MONTH(video_created_time) = '".$month."'
                AND video_company_id = '".$company_id."' AND video_is_show > 1
                GROUP BY YEAR(video_created_time), MONTH(video_created_time), DAY(video_created_time)
                ORDER BY 1";
        $month_details = $this->GlobalModel->excute_query_result($sql);
        if ($month_details){
            $data['status'] = "OK";
            $data['month_data'] = $month_details;
            $data['company_name'] = $company_data['company_name'];
        } else {
            $data['status'] = "FAIL";
        }

        echo json_encode($data);
    }

    public function fileRemove(){
        if(file_exists($_POST['image_url'])) unlink($_POST['image_url']);
    }

    public function backup_db() {
        try {
            $this->load->dbutil();
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->helper('download');
            $this->load->library('zip');

            $prefs = array(
                'format'        => 'zip',                       // gzip, zip, txt
                'filename'      => 'viservice_db_backup.sql',      // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
                'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
                'newline'       => "\n"                         // Newline character used in backup file
            );

            $backup = $this->dbutil->backup($prefs);
            $times = $this->TimeModel->getting_datetime();
            $times = str_replace(" ", "-", $times);
            $times = str_replace(":", "-", $times);
            $db_name = 'backup-on-' . $times . '.zip';
            $save = $this->url_dbbackup . $db_name;

            $this->load->helper('file');
            write_file($save, $backup);

            $files = get_file_info($save);
            $data['name'] = $files['name'];
            $data['src'] = $files['server_path'];
            $data['date'] = $this->TimeModel->getting_datetime($files['date']);
            $data['size'] = round($files['size']/1024, 2)."KB";
            echo json_encode($data);
        }catch (Exception $ex){
            $this->RETURN_FAIL();
        }
    }

    public function backup_db_delete(){
        $url = trim($_POST['url']);
        if(file_exists("".$this->url_dbbackup.$url)) {
            unlink("".$this->url_dbbackup . $url);
        }
    }

    public function getCountLog() {
        $this->load->model('front/General');   
        $this->load->model('front/VideoModel'); 
        
        $res['vl_video_id'] = $_POST['video_id'];
        $res1['video_id'] = $_POST['video_id'];

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['video_table'] = $this->lang->line('video_table');

        $data['log_data'] = $this->General->get_rows('vis_video_log', $res);

        $data['link_log_data'] = $this->General->get_rows('vis_video_link', $res1);

        $data['active_status'] = $this->VideoModel->getFind($_POST['video_id']);

        $resp['counts'] = $this->General->get_counts('vis_video_log', $res);

        $resp['content'] = $this->load->view('admin/video/log_table', $data, true);

        $resp['log_content'] = $this->load->view('admin/video/link_log_table', $data, true);

        echo json_encode($resp);

    }

    public function RETURN_FAIL(){
        return false;
    }

    public function RETURN_SUCCESS(){
        return true;
    }
}