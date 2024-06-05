<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller{

    protected $url_videos = './uploads/videos/';
    public $config_data = array();

    public function __construct(){
        parent::__construct();
        $this->load->model('GlobalModel');
        $this->load->model('ConfigModel');
        $this->load->model('front/General');
        $this->load->model('front/LoginModel');
        $this->load->model('front/CustomerModel');
        $this->load->model('front/VideoModel');
        $this->load->model('front/CompanyModel');
        $this->load->model('front/DeviceModel');
        $this->load->model('TimeModel');
        $this->load->helper('directory');
        $this->load->helper('url');

        $company = json_decode($this->session->company!=null ? $this->session->company: '', true);
        
        if( !empty($this->input->get('id')) &&  $company['company_id'] != $this->input->get('id') ) {
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/", 'refresh');
        }
        $this->config_data  =  $this->ConfigModel->get_all_config_data();
    }

    public function index() {
        $this->load->view('index');
    }

    public function excute_query_value($query_str){
        $result = 0;
        try {
            $query = $this->db->query($query_str);
            $result = $query->num_rows();
            /*echo "<pre>"; print_r($result);*/
        }catch (Exception $ex){}
        return $result;
    }

    private function checkLogin() {
        $companyInfo = $this->getCompanyInfo();
        $sess_flag = false;
        
        if (!isset($companyInfo['company_id'])) {
            $sess_flag = false;
        }else{
            if($companyInfo['company_id'] > 0) $sess_flag = true;
        }

        if($sess_flag == false){
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/", 'refresh');
        }else{
            return true;
        }
    }

    public function can_login(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        // $password  = $this->input->post('password');

        $data = array(
            'pass' => $password,
            'state' => 'fail',
            'company_id' => '',
            'lang' => 0
        );

        $result = $this->LoginModel->can_login($email, $password);
        $update_data = array();
        if($result['status'] == 'success'){
            $data['state'] = "success";
            $data['company_id'] = $result['company_id'];
            $data['lang'] = $result['company_lang'];
            $update_data['company_login_num'] = $result['company_login_num'] + 1;
            $update_data['company_login_time'] = $this->TimeModel->getting_datetime();
            $this->setCompanyInfo($result);
            $this->CompanyModel->loginUpdate($update_data,$result['company_id']);
            
        }else if($result['status'] == 'block'){
            $data['state'] = 'block';
        }else if($result['status'] == 'password'){
            $data['state'] = 'password';
        }else{
            $data['state'] = 'username';
        }

        echo json_encode($data);
    }

    public function go_logout(){
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->unset_userdata('company');
        //$sessInfo = $this->getCompanyInfo();
        //echo "<pre>"; print_r($this->session); exit; 
        //echo "<pre>"; print_r($sessInfo); exit; 
        /*foreach ($sessInfo as $keys) {
            $this->session->unset_userdata($keys);
            $this->session->unset_tempdata($keys);
        }
        $this->session->sess_destroy();*/

        $baseurl = $this->GlobalModel->get_baseurl();
        redirect($baseurl."/manager", 'refresh');
    }

    public function go_dashboard(){
        $this->checkLogin();
        $company_id = $this->input->get('id');

        $results = $this->CompanyModel->get_by_id($company_id);

        $wherestr = null;
        $where_arr = array();

        array_push($where_arr, "video_is_show > 1");

        if(sizeof($where_arr)) $wherestr = join(' AND ', $where_arr);

        $video_counts = $this->VideoModel->getCounts($company_id,$wherestr);
        $device_counts = $this->DeviceModel->getCountsByid($company_id);
        $customer_counts = $this->CustomerModel->getCountsByid($company_id);

        $new_whrerstr = "video_is_show <= 1 AND company_removed = 0";
        $waiting_video_counts = $this->VideoModel->getCounts($company_id,$new_whrerstr);
        $recent_videos = $this->VideoModel->getRecentVideos($company_id, $wherestr);

        // $sql = "SELECT YEAR(video_created_time)  as 'year' , MONTH(video_created_time) as 'month', COUNT(video_id) as 'counts'
        //         FROM db_vis.vis_videos
        //         WHERE YEAR(video_created_time) = YEAR(CURDATE()) AND video_is_show > 1
        //         AND video_company_id = '".$company_id."'
        //         GROUP BY YEAR(video_created_time), MONTH(video_created_time)
        //         ORDER BY 1";

        // $details = $this->GlobalModel->excute_query_result($sql);
        $sql = "SELECT YEAR(video_created_time)  as 'year' , MONTH(video_created_time) as 'month', COUNT(video_id) as 'counts'
            FROM db_vis.vis_videos
            WHERE video_is_show > 1
            AND video_company_id = '".$company_id."'
            GROUP BY YEAR(video_created_time), MONTH(video_created_time)
            ORDER BY YEAR(video_created_time)";

        $sql2 = "SELECT YEAR(video_created_time) as 'year'
            FROM db_vis.vis_videos
            WHERE video_is_show > 1
            AND video_company_id = '".$company_id."'
            GROUP BY YEAR(video_created_time)";

        $details = $this->GlobalModel->excute_query_result($sql);
        $details_Y_ct = $this->GlobalModel->excute_query_result($sql2);

        // var_dump($details);

        $data['details'] = $details;
        $data['details_Y_ct'] = $details_Y_ct;
        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['head_name'] = $this->lang->line('dashboard_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['recent_title'] = $this->lang->line('recent_title');
        $data['recent_uploads'] = $this->lang->line('recent_uploads');
        $data['video_table'] = $this->lang->line('video_table');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['no_data'] = $this->lang->line('no_data');
        $data['months'] = $this->lang->line('months');

        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['ok'] = $this->lang->line('ok');

        $data['company_id'] = $company_id;
        $data['result'] = $results;
        $data['video_counts'] = $video_counts;
        $data['device_counts'] = $device_counts;
        $data['customer_counts'] = $customer_counts;
        $data['waiting_video_counts'] = $waiting_video_counts;
        $data['recent_videos'] = $recent_videos;

        $data['page_name'] = 'go_dashboard';
        $data['email'] = $this->config_data['from_mail'];
        $data['company'] = $this->getCompanyInfo();

        $this->load->view('front/header',$data);
        $this->load->view('front/dashboard', $data);
        $this->load->view('front/footer');
    }

    public function go_videos(){
        $this->checkLogin();
        $company_id = $this->input->get('id');

        $result = $this->CompanyModel->get_by_id($company_id);


        
        $video_search_key = isset($_GET['search_key'])? $_GET['search_key']: "";

        $start_date = isset($_GET['start'])? $_GET['start']: "";
        $end_date = isset($_GET['end'])? $_GET['end']: "";

        $wherestr = null;
        $where_arr = array();

        if($video_search_key){ 
        	array_push($where_arr, "(video_id = '".$video_search_key."' OR video_case_number like '%".$video_search_key."%' OR customer_name like '%".$video_search_key."%' OR customer_company like '%".$video_search_key."%' OR customer_email like '%".$video_search_key."%' OR customer_phone = '".$video_search_key."')");
        }

        if(!empty($start_date) && !empty($end_date)){
            array_push($where_arr, "DATE(video_created_time) >= '".$start_date."' AND DATE(video_created_time) <= '".$end_date."'");
        }

        array_push($where_arr, "company_removed = 0");
        if(sizeof($where_arr)) $wherestr = join(' AND ', $where_arr);

        $curpage  = isset($_GET['curpage'])? $_GET['curpage']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;
        $offset = ($curpage - 1) * $pagesize;
       
        $results = $this->VideoModel->getvideos($company_id, $offset, $pagesize, $wherestr);
        $totals = $this->VideoModel->getCounts($company_id, $wherestr);
        $result = $this->CompanyModel->get_by_id($company_id);
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        $data['search_key'] = $video_search_key;
        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;

        if($result["company_lang"] == 0) {
            $lang = 'ee';
        } else {
            $lang = 'en';
        }

        if (isset($_GET['lang'])){
           $lang = $_GET['lang'];
        }else{
           $lang = 'en';
        }
        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['head_name'] = $this->lang->line('video_title');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['video_num'] = $this->lang->line('video_num');
        $data['date_range'] = $this->lang->line('date_range');
        $data['search_keyword'] = $this->lang->line('search_key');
        $data['video_table'] = $this->lang->line('video_table');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['refresh'] = $this->lang->line('refresh');

        $data['company_id'] = $company_id;
        $data['result'] = $result;
        $data['video_list'] = $results;

        $data['page_name'] = 'go_videos';
        $data['email'] = $this->config_data['from_mail'];
        $data['company'] = $this->getCompanyInfo();

        $this->load->view('front/header',$data);
        $this->load->view('front/video/videos',$data);
        $this->load->view('front/footer');
    }

    public function go_devices(){
        $this->checkLogin();
        $company_id = $this->input->get('id');
        $curpage  = isset($_GET['curpage'])? $_GET['curpage']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;
        $offset = ($curpage - 1) * $pagesize;

        $results = $this->DeviceModel->getdevices($company_id, $offset, $pagesize);
        $result = $this->CompanyModel->get_by_id($company_id);

        $totals = $this->DeviceModel->getCountsByid($company_id);
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['head_name'] = $this->lang->line('device_title');
        $data['device_table'] = $this->lang->line('device_table');
        $data['device_num'] = $this->lang->line('device_count');

        $data['company_id'] = $company_id;
        $data['result'] = $result;
        $data['device_list'] = $results;

        $data['page_name'] = 'go_devices';
        $data['email'] = $this->config_data['from_mail'];
        $data['company'] = $this->getCompanyInfo();

        $this->load->view('front/header', $data);
        $this->load->view('front/device/devices', $data);
        $this->load->view('front/footer');
    }

    public function go_profile(){
        $this->checkLogin();
        $company_id = $this->input->get('id');
        $result = $this->CompanyModel->get_by_id($company_id);

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['head_name'] = $this->lang->line('profile_title');
        $data['content'] = $this->lang->line('profile_content');
        $data['language'] = $this->lang->line('language');

        $data['company_id'] = $company_id;
        $data['result'] = $result;

        $data['page_name'] = 'go_profile';
        $data['email'] = $this->config_data['from_mail'];
        $data['company'] = $this->getCompanyInfo();

        $this->load->view('front/header', $data);
        $this->load->view('front/profile',$data);
        $this->load->view('front/footer');
    }

    public function caseCheck(){
        $case = $this->input->post('car');
        $company_id = $this->input->post('company_id');
        $state = $this->VideoModel->exist($case, $company_id);

        if (!$state){
            $data['status'] = "success";
        } else if($state['video_is_show'] == 2 ){
            $data['status'] = "success";
        }else{
            $data['status'] = "fail";
        }
        echo json_encode($data);
    }

    public function customerAdd(){

        $this->checkLogin();

        $case = isset($_POST['car'])? $_POST['car']: "";

        $cond['customer_name'] = isset($_POST['name'])? $_POST['name']: "";
        $cond['customer_email'] = isset($_POST['email'])? $_POST['email']: "";
        $cond['customer_phone'] = isset($_POST['phone'])? $_POST['phone']: "";
		$cond['customer_company'] = isset($_POST['company'])? $_POST['company']: "";
        $cond['customer_case_number'] = $case;

        $company = $this->getCompanyInfo();

        $cond['customer_registered_at'] = $this->TimeModel->getting_datetime();
        $cond['customer_company_id'] = $company['company_id'];
        $result1 = $this->General->insert_new('vis_customers', $cond);

        $param['video_company_id'] = $company['company_id'];
        $param['video_case_number'] = $case;
        $param['video_customer_company'] = $cond['customer_company'];
        $param['video_created_time'] = $this->TimeModel->getting_datetime();
        $param['video_is_show'] = 0;
        $param['video_serial'] = $this->VideoModel->update_video_unique_id($result1);
        $param['video_customer_id'] = $result1;

        $result2 = $this->VideoModel->insert($param);

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        if($result1 && $result2){
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/manager/go_videos?id=".$company['company_id']."&lang=".$lang, 'refresh');
        }
    }

    public function addNewVideo() {
        $this->checkLogin();
        
        $cond['customer_name'] = $this->input->post('name');
        $cond['customer_email'] = $this->input->post('email');
        $cond['customer_phone'] = $this->input->post('phone');
        $cond['customer_case_number'] = $this->input->post('car');
        $cond['customer_company'] = $this->input->post('company');
        
        $company = $this->getCompanyInfo();

        $cond['customer_registered_at'] = $this->TimeModel->getting_datetime();
        $cond['customer_company_id'] = $company['company_id'];
        $result1 = $this->General->insert_new('vis_customers', $cond);

        $param['video_company_id'] = $company['company_id'];
        $param['video_case_number'] = $this->input->post('car');
        $param['video_customer_company'] = $cond['customer_company'];
        $param['video_created_time'] = $this->TimeModel->getting_datetime();
        $param['video_serial'] = $this->VideoModel->update_video_unique_id($result1);
	    $param['video_is_show'] = 0;
        $param['video_customer_id'] = $result1;

        $result2 = $this->VideoModel->insert($param);

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        if($result1 && $result2){
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/manager/go_videos?id=".$company['company_id']."&lang=".$lang, 'refresh');
        }
    }

    public function edit_video_active(){
        $this->checkLogin();

        $data['video_id'] = $_POST['video_id'];
        $data['video_customer_company'] = $_POST['company'];
        $data['video_case_number'] = $_POST['car_number'];
        $data['video_tech_name'] = $_POST['video_tech_name'];

        $video_data = $this->VideoModel->getFind($_POST['video_id']);
        if(!empty($video_data)){
            $result1 = $this->VideoModel->update($data);
          
            $param['customer_name'] = $_POST['name'];
            $param['customer_email'] = $_POST['email'];
            $param['customer_phone'] = $_POST['phone_number'];
            $param['customer_id'] = $video_data['video_customer_id'];

            $result2 = $this->CustomerModel->update($param);
        }else{
            $result1 = false;
            $result2 = false;
        } 

        if($result1 && $result2)
            $data['status'] = "success";
        else
            $data['status'] = "fail";
        echo json_encode($data);
    }

    public function delete_video(){
        $this->checkLogin();

        $res = $_POST;
        $rows = $this->VideoModel->getFind($res['video_id']);
        $video_url = $rows['video_url'];
        
        if($rows['video_is_show'] == 0){
	        if ($rows['video_uploaded'] > 0) {
                $data['video_id'] = $_POST['video_id'];
                $data['video_is_show'] = 0;
		        $data['video_uploaded'] = 0;
                $data['video_upload_time'] = null;
                $data['video_url'] = null;
             	if($this->VideoModel->update($data))
                	$data['status'] = "success";
             	else
                	$data['status'] = "fail";		
            } else {
            	if($this->VideoModel->delete($_POST['video_id']))
                	$data['status'] = "success";
            	else
                	$data['status'] = "fail";
	        }	

        } else if ($rows['video_is_show'] == 1){
            if(file_exists($this->url_videos. $video_url)) unlink($this->url_videos.$video_url);
                $data['video_id'] = $_POST['video_id'];
                $data['video_is_show'] = 0;
		        $data['video_uploaded'] = 0;
                $data['video_upload_time'] = null;
                $data['video_url'] = null;
                if($this->VideoModel->update($data))
                    $data['status'] = "success";
                else
                    $data['status'] = "fail";
        }else{

            $data['video_id'] = $_POST['video_id'];
            $data['user_removed'] = 1;
             if($this->VideoModel->update($data))
                $data['status'] = "success";
            else
                $data['status'] = "fail";
        }

        echo json_encode($data);
    }

    public function deleteVideo_from_user() {
      
        $rows = $this->VideoModel->getFind($_POST['video_id']);

        $data['video_id'] = $_POST['video_id'];
        $data['user_removed'] = 1;
        if($this->VideoModel->update($data))
        $data['status'] = "success";
        else
            $data['status'] = "fail";
        echo json_encode($data);
    }

    public function activate() {
        $this->checkLogin();

        $data['video_id'] = $_POST['video_id'];
        $data['video_is_show'] = 2;
        $data['video_update_time'] = $this->TimeModel->getting_datetime();
        $data['status'] = 1;
        if($this->VideoModel->update($data))
            $res['status'] = "success";
        else
            $res['status'] = "fail";

        echo json_encode($res);
    }

    public function send_email($config_data, $video_data, $post_data)
    {
        $mesg = nl2br($config_data['mail_body']);
        $mesg = str_replace("{{company}}", $video_data['company_name'],$mesg);
        $mesg = str_replace("{{client}}", $video_data['customer_name'],$mesg);
        $mesg = str_replace("{{car_number}}", $video_data['video_case_number'],$mesg);       
        $mesg = str_replace("{{url}}",$config_data['video_url'], $mesg);

        $subject = $config_data['mail_subject'];
        $subject = str_replace("{{company}}", $video_data['company_name'], $subject);
        $subject = str_replace("{{client}}", $video_data['customer_name'], $subject);
        $subject = str_replace("{{car_number}}", $video_data['video_case_number'], $subject);
        
        $config = array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html',
            );
        
        $this->email->initialize($config);

        $this->email->from($config_data['from_mail'], $video_data['email_sender']);
        $this->email->to($post_data['email']);
        $this->email->reply_to($video_data['company_email']);
        $this->email->subject($subject);
        $this->email->message($mesg);
        $this->email->send();
    }

    public function send_video(){
        $this->checkLogin();

        $this->load->library('email');

        $rows = $this->VideoModel->getFind($_POST['video_id']);

        $config_data               =  $this->ConfigModel->get_all_config_data();
        $config_data['video_url']  =  base_url().'client/'.$rows['video_serial'].'?lang=ee';
        
        $data['video_id']          =  $_POST['video_id'];
        $data['video_is_show']     =  2;
        $data['video_update_time'] = $this->TimeModel->getting_datetime();

        if(empty($rows['video_sent_time'])) {
            $data['video_sent_time'] = date('Y-m-d H:i:s');
        } else {
            $data['video_sent_second_time'] = date('Y-m-d H:i:s');
        }
        $cond['created_at'] = date('Y-m-d H:i:s');
        $cond['video_id'] = $_POST['video_id'];

        $status = false;

        if($_POST['phone_state'] == 1) {
            if ($rows['sms_time'] == 0 ){
                $data['sms_time'] = 0;
            } else {
                $cond['sms'] = $_POST['phone'];

                $sms_text = $config_data['sms_body'];
                $sms_text = str_replace("{{company}}", $rows['company_name'],$sms_text);
                $sms_text = str_replace("{{client}}", $rows['customer_name'],$sms_text);
                $sms_text = str_replace("{{car_number}}", $rows['video_case_number'],$sms_text); 
                $sms_text = str_replace("{{url}}", $config_data['video_url'],$sms_text);
                $country_code = "+372";
                $mobile =    $_POST['phone'];
                $mobile = ltrim($mobile,$country_code);
                $sms_data['message'] = $sms_text;
                $sms_data['to'] = $country_code.$mobile;
                $sms_data['from'] = $rows['sms_sender'];
                $sms_status = $this->send_sms($sms_data);
                // var_dump($sms_status->{"success"});
                // exit();
                if ($sms_status->{"success"} && $sms_status->{"error"} == null) {
                    $status = true;
                    $data['sms_time'] = $rows['sms_time'] - 1;
                } else {
                    $data['sms_time'] = $rows['sms_time'];
                }
            }
        } else {
            $status = true;
        }

        // var_dump($sms_status['success']);
        // exit();

        if($_POST['email_state'] == 1) {
            $cond['email'] = $_POST['email'];
            $this->send_email($config_data, $rows, $_POST);
        } 
        $this->General->insert_new('vis_video_link', $cond);
        if($status && $this->VideoModel->update($data))
            $res['status'] = "success";
        else
            $res['status'] = "fail";
        
        echo json_encode($res);
    }

    public function companyUpdate(){
        
        $this->checkLogin();
        
        $ch['company_id'] = $this->input->post('company_id');
        $cond['company_update_at'] = $this->TimeModel->getting_datetime();
        $cond['company_lang'] = $this->input->post('lang');

        $result = $this->General->update('vis_companies', $cond, $ch);

        if($result){
            $data['status'] = "success";
        } else {
            $data['status'] = "fail";
        }
        
        echo json_encode($data);
    }

    public function getDatabymonth(){
        $company_id = $this->input->post('company_id');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $sql = "SELECT YEAR(video_created_time) as year , MONTH(video_created_time) as month , DAY(video_created_time) as day , COUNT(*) as counts
                FROM db_vis.vis_videos
                WHERE YEAR(video_created_time) = '".$year."' AND video_is_show > 1 
                AND MONTH(video_created_time) = '".$month."'
                AND video_company_id = '".$company_id."'
                GROUP BY YEAR(video_created_time), MONTH(video_created_time), DAY(video_created_time)
                ORDER BY 1";
        $month_details = $this->GlobalModel->excute_query_result($sql);
        if ($month_details){
            $data['status'] = "OK";
            $data['month_data'] = $month_details;
        } else {
            $data['status'] = "FAIL";
        }

        echo json_encode($data);
    }

    public function getCountLog() {

        $video_id = $this->input->post('video_id');
        $res['vl_video_id'] = $video_id;
        $res1['video_id'] = $video_id;

        if (isset($_POST['lang'])){
            $lang = $_POST['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['video_table'] = $this->lang->line('video_table');

        $data['log_data'] = $this->General->get_rows('vis_video_log', $res);

        $data['link_log_data'] = $this->General->get_rows('vis_video_link', $res1);
        $data['video_data'] = $this->VideoModel->getFind($video_id);

        $resp['counts'] = $this->General->get_counts('vis_video_log', $res);

        $resp['content'] = $this->load->view('front/video/log_table', $data, true);

        $resp['log_content'] = $this->load->view('front/video/link_log_table', $data, true);

        echo json_encode($resp);

    }

    public function change_pass(){
        $old_pass = md5($this->input->post('oldpass'));
        $new_pass = md5($this->input->post('newpass'));

        $company = $this->getCompanyInfo();
        $company_id = $company['company_id'];

        $que=$this->db->query("select * from vis_companies where company_id='$company_id'");
        $row=$que->row();
        if((!strcmp($old_pass, $row->company_password))){
            if ($this->CompanyModel->change_pass($company_id,$new_pass)){
                $data['state'] = 'OK';
            }else{
                $data['state'] = 'FAIL';
            }
        }else{
            $data['state'] = 'NO';
        }
        echo json_encode($data);
    }

    public function forgotPassword(){
        $this->load->config('email');
        $email = $this->input->post('email');
        $findemail = $this->CompanyModel->ForgotPassword($email);
        if($findemail){
            $result =  $this->CompanyModel->sendpassword($findemail);
            if ($result['status'] == 'success'){
                $password = $result['password'];
                $mail_message='Thanks for contacting regarding to forgot password,<br> Your new <b>Password</b> is <b>'.$password.'</b>'."\r\n";
                $mail_message.='<br>Please Update your password.';
                $mail_message.='<br>Thanks & Regards';
                $mail_message.='<br>VIService System Support';
                date_default_timezone_set('Etc/UTC');

                $this->mymailer->isSMTP();
                $this->mymailer->SMTPDebug = $this->config->item('SMTPDebug');
                // $this->mymailer->SMTPSecure = $this->config->item('SMTPSecure');
                $this->mymailer->Debugoutput = 'html';
                $this->mymailer->Host = "tls://smtp.gmail.com:587";

                // $this->mymailer->Port = $this->config->item('Port');

                $this->mymailer->SMTPOption =  array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $this->mymailer->SMTPAuth = $this->config->item('SMTPAuth');
                $this->mymailer->Username = $this->config->item('Username');
                $this->mymailer->Password = $this->config->item('Password');

                $this->mymailer->setFrom($this->config->item('Username'), 'VIService Support');
                $this->mymailer->addReplyTo($this->config->item('Username'), 'VIService Support');
                $this->mymailer->IsHTML(true);
                $this->mymailer->addAddress($email,'Admin support');
                $this->mymailer->Subject = 'Find your New Password';
                $this->mymailer->msgHTML($mail_message);
                $this->mymailer->AltBody = $mail_message;
                $this->mymailer->getSMTPInstance()->quit();
                if (!$this->mymailer->send()) {
                    // $data['state'] = 'FAIL';
                    // echo 'Mailer error'.$this->mymailer->ErrorInfo;
                    $data['state'] = $this->mymailer->ErrorInfo;
                }else{
                    $data['state'] = 'SUCCESS';
                }
            }else{
                $data['state'] = 'NO';
            }
        }else{
            $data['state'] = 'NO';
        }
        echo json_encode($data);
    }

    public function check_videoStatus() {
        $company_id = $this->input->get('company_id');

        $curpage  = isset($_GET['curpage'])? $_GET['curpage']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;
        $offset = ($curpage - 1) * $pagesize;

        $results = $this->VideoModel->getvideos($company_id, null, null, null);
        $result = $this->CompanyModel->get_by_id($company_id);
        $totals = $this->VideoModel->getCounts($company_id, null);
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['head_name'] = $this->lang->line('video_title');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['video_num'] = $this->lang->line('video_num');
        $data['date_range'] = $this->lang->line('date_range');
        $data['search_keyword'] = $this->lang->line('search_key');
        $data['video_table'] = $this->lang->line('video_table');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['refresh'] = $this->lang->line('refresh');
        $data['result'] = $result;
        $data['video_list'] = $results;
        $resp['content'] = $this->load->view('front/video_list_ajax', $data,true);

        echo json_encode($resp);
    }

    public function get_video_by_date(){
        $company_id = $this->input->get('company_id');
        $date = $this->input->get('date');
        $wherestr = null;
        $where_arr = array();
        array_push($where_arr, "video_is_show > 1");
         
        array_push($where_arr, "DATE(video_created_time) = '".$date."'");

        if(sizeof($where_arr)) $wherestr = join(' AND ', $where_arr);
        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $results = $this->VideoModel->getvideos($company_id,null, null, $wherestr);
        $result = $this->CompanyModel->get_by_id($company_id);
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['head_name'] = $this->lang->line('video_title');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['video_num'] = $this->lang->line('video_num');
        $data['date_range'] = $this->lang->line('date_range');
        $data['search_keyword'] = $this->lang->line('search_key');
        $data['video_table'] = $this->lang->line('video_table');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['refresh'] = $this->lang->line('refresh');
        $data['result'] = $result;
        $data['video_list'] = $results;
        $resp['content'] = $this->load->view('front/video_list_ajax', $data,true);

        echo json_encode($resp);
    }

    public function get_video_by_month(){

        $company_id = $this->input->get('company_id');
        $month = $this->input->get('month');
        $wherestr = null;
        $where_arr = array();
        array_push($where_arr, "video_is_show > 1");
         
        array_push($where_arr, "MONTH(video_created_time) = '".$month."'");

        if(sizeof($where_arr)) $wherestr = join(' AND ', $where_arr);
         if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $results = $this->VideoModel->getvideos($company_id,null, null, $wherestr);
        $result = $this->CompanyModel->get_by_id($company_id);
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['change_pass'] = $this->lang->line('change_pass');
        $data['head'] = $this->lang->line('front_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['head_name'] = $this->lang->line('video_title');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['video_num'] = $this->lang->line('video_num');
        $data['date_range'] = $this->lang->line('date_range');
        $data['search_keyword'] = $this->lang->line('search_key');
        $data['video_table'] = $this->lang->line('video_table');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['refresh'] = $this->lang->line('refresh');
        $data['result'] = $result;
        $data['video_list'] = $results;
        $resp['total_count'] = count($results);  
        $resp['content'] = $this->load->view('front/video_list_ajax', $data,true);
       
        echo json_encode($resp);
    }

    public function send_sms($data){

        $config_data = $this->ConfigModel->get_all_config_data();

        $curl = curl_init();

        $post_data['to'] = $data['to'];
        $post_data['message'] = $data['message'];
        $post_data['sender_id'] = $data['from'];

        $api_key = $config_data['sms_key'];   

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.sms.to/sms/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($post_data),
        CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "Accept: application/json",
              "Authorization: Bearer ".$api_key.""
            ),
        ));

        $response = curl_exec($curl);
        // // $pieces = explode(" ", $response);
        // var_dump(json_encode($response));
        // exit();

        curl_close($curl);
        return json_decode($response);
    }

    public function sms_reset()
    {
        $this->checkLogin();

        $data['video_id'] = $_POST['video_id'];
        $data['sms_time'] = 2;

        if($this->VideoModel->update($data))
            $res['status'] = "success";
        else
            $res['status'] = "fail";

        echo json_encode($res);
    }

    public function get_video_data() {
        $this->checkLogin();
       
        $video_id = $this->input->post('video_id');
        // $res['vl_video_id'] = $video_id;
        // $res1['video_id'] = $video_id;

        if (isset($_POST['lang'])){
            $lang = $_POST['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['video_table'] = $this->lang->line('video_table');
        // $data['log_data'] = $this->General->get_rows('vis_video_log', $res);
        // $data['link_log_data'] = $this->General->get_rows('vis_video_link', $res1);

        $data['video_data'] = $this->VideoModel->getFind($video_id);

        // $resp['counts'] = $this->General->get_counts('vis_video_log', $res);

        // $resp['content'] = $this->load->view('front/video/log_table', $data, true);
        $resp['v_content'] = $this->load->view('front/video_modal_1', $data, true);
        $resp['admin_content'] = $this->load->view('admin/video/video_modal', $data, true);
        // $resp['log_content'] = $this->load->view('front/video/link_log_table', $data, true);

        echo json_encode($resp);
    }

}