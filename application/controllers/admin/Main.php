<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    protected $url_videos = './uploads/videos/';   
    public $config_data = array();

    public function __construct(){
        parent::__construct();
        $this->load->model('VideosModel');
        $this->load->model('CompaniesModel');
        $this->load->model('DevicesModel');
        $this->load->model('ConfigModel');
        $this->load->model('GlobalModel');
        $this->load->model('front/CustomerModel');
        $this->load->model('front/VideoModel');
        $this->load->model('front/General');
        $this->load->model('TimeModel');

        $this->config_data  =  $this->ConfigModel->get_all_config_data();
    }

    private function checkLogin() {
        $adminInfo = $this->getAdminInfo();
        $sess_flag = true;
        if (!isset($adminInfo['admin_id'])) {
            $sess_flag = false;
        }else{
            if($adminInfo['admin_id'] > 0) $sess_flag = true;
        }

        if($sess_flag == false){
            $this->load->helper('url');
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/admin", 'refresh');
        }else{
            return true;
        }
    }

    public function index(){
        $this->checkLogin();

        $rows = $this->ConfigModel->getFind('site_timezone');

        if($rows)
            $_SESSION['TIMEZONE'] = $rows['config_value'];
        else
            $_SESSION['TIMEZONE'] = "UM15";
       
        $wherestr = null;
        $where_arr = array();

        array_push($where_arr, "video_is_show > 1");

        if(sizeof($where_arr)) $wherestr = join(' AND ', $where_arr);

        $company_counts = $this->CompaniesModel->getCounts(null);
        $data['registered_companies'] = $company_counts;

        $video_counts = $this->VideosModel->getCounts($wherestr);
        $data['video_counts'] = $video_counts;

        $device_counts = $this->DevicesModel->getCounts();
        $data['device_counts'] = $device_counts;

        $new_whrerstr = "video_is_show <= 1";
        $waiting_video_counts = $this->VideosModel->getCounts($new_whrerstr);
        $data['waiting_video_counts'] = $waiting_video_counts;

        $rows = $this->CompaniesModel->getCompanyName();
        foreach ($rows as &$row) {
            $total_counts = $this->VideosModel->getCountsByid($row['company_id'], $wherestr);
            $sql = 
            "SELECT YEAR(video_created_time)  as 'year' , MONTH(video_created_time) as 'month', COUNT(*) as 'counts'
                    FROM db_vis.vis_videos
                    WHERE YEAR(video_created_time) = YEAR(CURDATE()) AND video_is_show > 1
                    AND video_company_id = '".$row['company_id']."'
                    GROUP BY YEAR(video_created_time), MONTH(video_created_time)
                    ORDER BY 1";
            $details = $this->GlobalModel->excute_query_result($sql);
            $row['children'] = $details;
            $row['total_counts'] = $total_counts;
        }

        $sql2 = "SELECT YEAR(video_created_time)  AS 'year' , MONTH(video_created_time) AS 'month', COUNT(*) AS 'counts'
                    FROM db_vis.vis_videos
                    WHERE YEAR(video_created_time) = YEAR(CURDATE()) AND video_is_show > 1
                    GROUP BY YEAR(video_created_time), MONTH(video_created_time)
                    ORDER BY 2";

        $video_statis = $this->GlobalModel->excute_query_result($sql2);

        $video_total = $this->VideosModel->getCountsByid(null, $wherestr);

        $data['results'] = $rows;
        $data['statis'] = $video_statis;
        $data['total'] = $video_total;
        
        $data['email'] = $this->config_data['from_mail'];

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('dashboard_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['counts'] = $this->lang->line('video_num');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['months'] = $this->lang->line('months');
        $data['no_data'] = $this->lang->line('no_data');

        $data['page_name'] = 'index';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer', $data);
    }

    public function adminList(){
        
        $this->load->model('AdminModel');
        
        $data['user_data'] = json_decode($this->session->userdata('admin'),true);
        
        $this->checkLogin();

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['admin'] = $this->lang->line('signin');
        
        $data['email'] = $this->config_data['from_mail'];
        
        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('company_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['error_admin'] = $this->lang->line('error_admin');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['footer'] = $this->lang->line('footer');
        $data['page_name'] = 'adminList';
        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/admin',$data);
        $this->load->view('admin/footer', $data);
    }

    public function companyList(){
        $this->load->model('CompaniesModel');
        $this->load->model('VideosModel');

        $this->checkLogin();

        $company_active  = isset($_GET['status'])? $_GET['status']: 2;
        $search_key = isset($_GET['search_key'])? $_GET['search_key']: "";

        $wherestr = null;
        $where_arr = array();

        if($company_active < 2) array_push($where_arr, "company_active=".$company_active);
        if($search_key) array_push($where_arr, "company_name like '%".$search_key."%'");

        if(sizeof($where_arr)) $wherestr = join(' and ', $where_arr);

        $curpage  = isset($_GET['pageNum'])? $_GET['pageNum']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;
        $offset = ($curpage - 1) * $pagesize;
        $result = $this->CompaniesModel->getPagination($offset, $pagesize, $wherestr);
        $totals = $this->CompaniesModel->getCounts($wherestr);
        $video_counts = array();
        foreach ($result as $row){
            $company_id = $row['company_id'];
            $video_cnt = $this->VideosModel->getCountsByid($company_id);
            array_push($video_counts, $video_cnt);
        }
        
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('company_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['footer'] = $this->lang->line('footer');

        $data['add_btn'] = $this->lang->line('add_btn');
        $data['search'] = $this->lang->line('search');
        $data['status'] = $this->lang->line('status');
        $data['company_count'] = $this->lang->line('company_count');
        $data['company_table'] = $this->lang->line('company_table');

        $data['company_list'] = $result;
        $data['company_active'] = $company_active;
        $data['video_counts'] = $video_counts;
        $data['search_key'] = $search_key;
        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'companyList';
        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/companies/company_list',$data);
        $this->load->view('admin/footer', $data);
    }

    public function companyUpdate(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');
        $result = $this->CompaniesModel->getFind($_GET['id']);

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['title'] = $this->lang->line('edit_company');
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('company_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['company_content'] = $this->lang->line('company_content');
        $data['error_company'] = $this->lang->line('error_company');
        $data['language'] = $this->lang->line('language');

        $data['company_data'] = $result;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'companyUpdate';
        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/companies/add_company',$data);
        $this->load->view('admin/footer', $data);
    }

    public function addCompany(){
        $this->checkLogin();

        if (isset($_GET['lang'])) {
            $lang = $_GET['lang'];
        } else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('company_title');
        $data['title'] = $this->lang->line('add_company');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['company_content'] = $this->lang->line('company_content');
        $data['error_company'] = $this->lang->line('error_company');
        $data['language'] = $this->lang->line('language');
        $data['email'] = $this->config_data['from_mail'];
        $data['company_data'] = "";
        $data['page_name'] = 'addCompany';
        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/companies/add_company',$data);
        $this->load->view('admin/footer', $data);
    }

    public function videoList(){
        $this->load->model('VideosModel');
        $this->load->model('CompaniesModel');
        $this->checkLogin();

        $video_is_show  = isset($_GET['status'])? $_GET['status']: 3;
        $search_key = isset($_GET['search_key'])? $_GET['search_key']: "";
        $company_id = isset($_GET['id'])? $_GET['id']:"";
        $start_date = isset($_GET['start'])? $_GET['start']: "";
        $end_date = isset($_GET['end'])? $_GET['end']: "";

        $wherestr = null;
        $where_arr = array();
        $company_data = array();

        if($video_is_show < 3) array_push($where_arr, "video_is_show=" . $video_is_show);
        //if($search_key) array_push($where_arr, "video_customer_company like '%".$search_key."%'");

        if($search_key){ 
            array_push($where_arr, "(video_id = '".$search_key."' OR video_case_number like '%".$search_key."%' OR customer_name like '%".$search_key."%' OR customer_company like '%".$search_key."%' OR customer_email like '%".$search_key."%' OR customer_phone = '".$search_key."')");
        }

        if(!empty($start_date) && !empty($end_date)){
            array_push($where_arr, "DATE(video_created_time) >= '".$start_date."' AND DATE(video_created_time) <= '".$end_date."'");
        }

        if ( $company_id ) {
            array_push($where_arr, "video_company_id=".$company_id);
            $company_data = $this->CompaniesModel->getFind($company_id);
        }else{
            array_push($where_arr, "(video_is_show=1 OR video_is_show=0 OR video_is_show = 2)");
        }

        if(sizeof($where_arr)) $wherestr = join(' and ', $where_arr);

        $curpage  = isset($_GET['pageNum'])? $_GET['pageNum']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;

        $offset = ($curpage - 1) * $pagesize;

        $company_results = $this->CompaniesModel->getCompanyName();
        $result = $this->VideosModel->getPagination($offset, $pagesize, $wherestr);
        $totals = $this->VideosModel->getCounts($wherestr);
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('video_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['video_table'] = $this->lang->line('video_table');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['backvideo_table'] = $this->lang->line('backvideo_table');
        $data['search'] = $this->lang->line('search');
        $data['status'] = $this->lang->line('status');
        $data['video_count'] = $this->lang->line('video_num');

        $data['video_list'] = $result;
        $data['company_data'] = $company_data;
        $data['company_list'] = $company_results;
        $data['video_is_show'] = $video_is_show;
        $data['search_key'] = $search_key;
        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'videoList';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/video/video_list',$data);
        $this->load->view('admin/footer', $data);
    }

    public function lockedVideos(){
        $this->load->model('VideosModel');
        $this->load->model('CompaniesModel');
        $this->checkLogin();

        $video_is_show  = isset($_GET['status'])? $_GET['status']: 3;
        $search_key = isset($_GET['search_key'])? $_GET['search_key']: "";
        $company_id = isset($_GET['id'])? $_GET['id']:"";
        $start_date = isset($_GET['start'])? $_GET['start']: "";
        $end_date = isset($_GET['end'])? $_GET['end']: "";
        $remove_status = 1;

        $wherestr = null;
        $where_arr = array();
        $company_data = array();

        array_push($where_arr, "user_removed=".$remove_status);
        if($video_is_show < 3) array_push($where_arr, "video_is_show=" . $video_is_show);
        //if($search_key) array_push($where_arr, "video_customer_company like '%".$search_key."%'");

        if($search_key){
            array_push($where_arr, "(video_id = '".$search_key."' OR video_case_number like '%".$search_key."%' OR customer_name like '%".$search_key."%' OR customer_company like '%".$search_key."%' OR customer_email like '%".$search_key."%' OR customer_phone = '".$search_key."')");
        }

        if(!empty($start_date) && !empty($end_date)){
            array_push($where_arr, "DATE(video_created_time) >= '".$start_date."' AND DATE(video_created_time) <= '".$end_date."'");
        }

        if ( $company_id ) {
            array_push($where_arr, "video_company_id=".$company_id);
            $company_data = $this->CompaniesModel->getFind($company_id);
        }else{
            array_push($where_arr, "(video_is_show=1 OR video_is_show=0 OR video_is_show = 2)");
        }

        if(sizeof($where_arr)) $wherestr = join(' and ', $where_arr);

        $curpage  = isset($_GET['pageNum'])? $_GET['pageNum']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;

        $offset = ($curpage - 1) * $pagesize;

        $company_results = $this->CompaniesModel->getCompanyName();
        $result = $this->VideosModel->getPagination($offset, $pagesize, $wherestr);
        $totals = $this->VideosModel->getCounts($wherestr);
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('video_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['video_table'] = $this->lang->line('video_table');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['backvideo_table'] = $this->lang->line('backvideo_table');
        $data['search'] = $this->lang->line('search');
        $data['status'] = $this->lang->line('status');
        $data['video_count'] = $this->lang->line('video_num');

        $data['video_list'] = $result;
        $data['company_data'] = $company_data;
        $data['company_list'] = $company_results;
        $data['video_is_show'] = $video_is_show;
        $data['search_key'] = $search_key;
        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'videoList';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/video/locked_videos',$data);
        $this->load->view('admin/footer', $data);
    }

    public function videoUpdate(){
        $this->checkLogin();

        $this->load->model('VideosModel');

        $result = $this->VideosModel->getFind($_GET['VD']);
        $company_results = $this->CompaniesModel->getCompanyName();
        $company_data = $this->CompaniesModel->getFind($result['video_company_id']);

        if (isset($_GET['lang'])) {
            $lang = $_GET['lang'];
        } else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('video_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['search'] = $this->lang->line('search');

        $data['modal_head'] = $this->lang->line('modal_head');
        $data['video_preview'] = $this->lang->line('video_preview');

        $data['video_data'] = $result;
        $data['company_list'] = $company_results;
        $data['company_data'] = $company_data;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'videoUpdate';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/video/video_preview',$data);
        $this->load->view('admin/footer', $data);
    }

    public function deviceList() {
        $this->load->model('DevicesModel');
        $this->load->model('CompaniesModel');
        $this->checkLogin();

        $device_is_allow = isset($_GET['status'])? $_GET['status']: 2;
        $search_key = isset($_GET['search_key'])? $_GET['search_key']: "";
        $company_id = isset($_GET['id'])? $_GET['id']:"";

        $wherestr = null;
        $where_arr = array();
        $company_data = array();

        if($device_is_allow < 2) array_push($where_arr, "device_is_allow=".$device_is_allow);
        if($search_key) array_push($where_arr, "device_name like '%".$search_key."%'");
        if ($company_id) {
            array_push($where_arr, "device_company_id=".$company_id);
            $company_data = $this->CompaniesModel->getFind($company_id);
        }

        if(sizeof($where_arr)) $wherestr = join(' and ', $where_arr);

        $curpage  = isset($_GET['pageNum'])? $_GET['pageNum']: 1;
        $pagesize = isset($_GET['pagesize'])? $_GET['pagesize']: 10;

        $offset = ($curpage - 1) * $pagesize;
        $company_results = $this->CompaniesModel->getCompanyName();
        $result = $this->DevicesModel->getPagination($offset, $pagesize, $wherestr);
        $totals = $this->DevicesModel->getCounts($wherestr);
        $total_pages = floor($totals / $pagesize);
        if($totals % $pagesize) $total_pages ++;

        if (isset($_GET['lang'])) {
            $lang = $_GET['lang'];
        } else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('device_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['back_device_table'] = $this->lang->line('back_device_table');
        $data['device_add'] = $this->lang->line('device_add');
        $data['device_count'] = $this->lang->line('device_count');
        $data['search'] = $this->lang->line('search');
        $data['status'] = $this->lang->line('status');

        $data['device_list'] = $result;
        $data['company_data'] = $company_data;
        $data['company_list'] = $company_results;
        $data['device_is_allow'] = $device_is_allow;
        $data['search_key'] = $search_key;
        $data['totals'] = $totals;
        $data['total_pages'] = $total_pages;
        $data['pagesize'] = $pagesize;
        $data['curpage'] = $curpage;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'deviceList';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/device/device_list',$data);
        $this->load->view('admin/footer', $data);
    }

    public function deviceUpdate(){
        $this->checkLogin();

        $this->load->model('DevicesModel');
        $this->load->model('CompaniesModel');

        $result = $this->DevicesModel->getFind($_GET['id']);
        $company_result = $this->CompaniesModel->getCompanyName();

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['menu'] = $this->lang->line('menu');
        $data['footer'] = $this->lang->line('footer');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('device_title');

        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['devices'] = $this->lang->line('devices');
        $data['device_title'] = $this->lang->line('edit_device');
        $data['search'] = $this->lang->line('search');
        $data['error_device'] = $this->lang->line('error_device');

        $data['device_data'] = $result;
        $data['company_list'] = $company_result;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'deviceUpdate';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/device/add_device',$data);
        $this->load->view('admin/footer', $data);
    }

    public function addDevice(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');

        $company_result = $this->CompaniesModel->getCompanyName();

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('device_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['devices'] = $this->lang->line('devices');
        $data['device_title'] = $this->lang->line('add_device');
        $data['search'] = $this->lang->line('search');
        $data['error_device'] = $this->lang->line('error_device');

        $data['device_data'] = "";
        $data['company_list'] = $company_result;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'addDevice';

        $data['user'] = $this->getAdminInfo();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/device/add_device',$data);
        $this->load->view('admin/footer', $data);
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

    public function restore() {
        $this->checkLogin();

        $data['video_id'] = $_POST['video_id'];
        $data['video_is_show'] = 2;
        $data['user_removed'] = 0;
        $data['video_update_time'] = $this->TimeModel->getting_datetime();

        if($this->VideoModel->update($data))
            $res['status'] = "success";
        else
            $res['status'] = "fail";

        echo json_encode($res);
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

        if($_POST['phone_state'] == 1) {
            if ($rows['sms_time'] == 0 ){
                $data['sms_time'] = 0;
            } else {
                $data['sms_time'] = $rows['sms_time'] - 1;
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
                $this->send_sms($sms_data);
            }
        } 

        if($_POST['email_state'] == 1) {
            $cond['email'] = $_POST['email'];
            $this->send_email($config_data, $rows, $_POST);
        } 
        $this->General->insert_new('vis_video_link', $cond);
        if($this->VideoModel->update($data))
            $res['status'] = "success";
        else
            $res['status'] = "fail";
        
        echo json_encode($res);
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

        }else if($rows['video_is_show'] == 1){

            if(file_exists($this->url_videos. $video_url)) unlink($this->url_videos.$video_url);
                $data['video_id'] = $_POST['video_id'];
                $data['video_is_show'] = 0;
                $data['video_upload_time'] = null;
                $data['video_url'] = null;

             if($this->VideoModel->update($data))
                $data['status'] = "success";
            else
                $data['status'] = "fail";

        }else{

            if(file_exists($this->url_videos. $video_url)) unlink($this->url_videos.$video_url);

            if($this->VideoModel->delete($_POST['video_id']))
                $data['status'] = "success";
            else
                $data['status'] = "fail";
        }

        //if($this->VideoModel->delete($_POST['video_id']))
        echo json_encode($data);
    }

    public function caseCheck(){

        $case = $this->input->post('car');
        $state = $this->VideoModel->exist($case);

        /* echo "<pre>"; print_r($state);exit;*/
        if (!$state){
            $data['status'] = "success";
        } else if($state['video_is_show'] == 2 ){
            $data['status'] = "success";
        }else{
            $data['status'] = "fail";
        }
        echo json_encode($data);
    }

     public function addNewVideo() {
        $this->checkLogin();

        $company_id = $this->input->post('company_id');

        $cond['customer_name'] = $this->input->post('name');
        $cond['customer_email'] = $this->input->post('email');
        $cond['customer_phone'] = $this->input->post('phone');
        $cond['customer_case_number'] = $this->input->post('car');
        $cond['customer_company'] = $this->input->post('company');
        $cond['customer_registered_at'] = $this->TimeModel->getting_datetime();
        $cond['customer_company_id'] = $company_id;
        $result1 = $this->General->insert_new('vis_customers', $cond);

        $param['video_company_id'] = $company_id;
        $param['video_case_number'] = $this->input->post('car');
        $param['video_customer_company'] = $cond['customer_company'];
        $param['video_created_time'] = $this->TimeModel->getting_datetime();
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
            redirect($baseurl."/admin/main/videoList?lang=".$lang, 'refresh');
        }
    }

    public function customerAdd(){

        $this->checkLogin();

        $case = isset($_POST['car'])? $_POST['car']: "";
        $company_id = $this->input->post('customer_company_id');    
        $cond['customer_name'] = isset($_POST['name'])? $_POST['name']: "";
        $cond['customer_email'] = isset($_POST['email'])? $_POST['email']: "";
        $cond['customer_phone'] = isset($_POST['phone'])? $_POST['phone']: "";
		$cond['company'] = isset($_POST['company'])? $_POST['company']: "";
        $cond['customer_case_number'] = $case;

        $cond['customer_registered_at'] = $this->TimeModel->getting_datetime();
        $cond['customer_company_id'] = $company_id;
        $result1 = $this->General->insert_new('vis_customers', $cond);

        $param['video_company_id'] = $company_id;
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
            redirect($baseurl."/admin/main/videoList?lang=".$lang, 'refresh');
        }
    }

    public function get_video_by_date(){
        $company_id = $this->input->get('company_id');
        $date = $this->input->get('date');
        $wherestr = null;
        $where_arr = array();
        array_push($where_arr, "video_is_show > 1");
         
        array_push($where_arr, "DATE(video_created_time) = '".$date."'");
        if ( $company_id ) {
            array_push($where_arr, "video_company_id=".$company_id);
        }
        
        if(sizeof($where_arr)) $wherestr = join(' AND ', $where_arr);

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);

        $result = $this->VideosModel->getPagination(null, null, $wherestr);
        
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['video_table'] = $this->lang->line('video_table');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['backvideo_table'] = $this->lang->line('backvideo_table');
        $data['search'] = $this->lang->line('search');
        $data['status'] = $this->lang->line('status');
        $data['video_count'] = $this->lang->line('video_num');

        $data['video_list'] = $result;
   
        $resp['content'] = $this->load->view('admin/video/video_list_ajax', $data,true);

        echo json_encode($resp);
    }

    public function get_video_by_month(){

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

        $result = $this->VideosModel->getPagination(null, null, $wherestr);
        
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');
        $data['modal_head'] = $this->lang->line('modal_head');
        $data['video_table'] = $this->lang->line('video_table');
        $data['message'] = $this->lang->line('message');
        $data['error_case'] = $this->lang->line('error_case');
        $data['new_btn'] = $this->lang->line('new_btn');
        $data['backvideo_table'] = $this->lang->line('backvideo_table');
        $data['search'] = $this->lang->line('search');
        $data['status'] = $this->lang->line('status');
        $data['video_count'] = $this->lang->line('video_num');

        $data['video_list'] = $result;
        $resp['total_count'] = count($result);
        $resp['content'] = $this->load->view('admin/video/video_list_ajax', $data,true);
       
        echo json_encode($resp);
    }

    public function sms_mail_settings(){
        $this->checkLogin();
        $this->load->model('CompaniesModel');
        $this->load->helper('language');
        $company_result = $this->CompaniesModel->getCompanyName();

        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }

        $data['head_lang'] = $lang;
        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['menu'] = $this->lang->line('menu');
        $data['sub_menu'] = $this->lang->line('sub_menu');
        $data['head'] = $this->lang->line('back_title');
        $data['head_name'] = $this->lang->line('device_title');
        $data['statistics'] = $this->lang->line('statistic_title');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        $data['config_data'] = $this->ConfigModel->get_all_config_data();
        $data['sms_mail_settings'] = $this->lang->line('sms_mail_settings');
       
        $data['error_device'] = $this->lang->line('error_device');
        $data['company_list'] = $company_result;
        $data['email'] = $this->config_data['from_mail'];
        $data['page_name'] = 'sms_mail_settings';

        $data['user'] = $this->getAdminInfo();

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $this->ConfigModel->save_config_data($_POST);

            redirect(base_url().'admin/main/sms_mail_settings?lang='.$lang);
        }



        $this->load->view('admin/header', $data);
        $this->load->view('admin/sms_mail_settings',$data);
        $this->load->view('admin/footer', $data);
    }

    public function send_sms($data){
        $curl = curl_init();

        $post_data['to'] = $data['to'];
        $post_data['message'] = $data['message'];
        $post_data['sender_id'] = $data['from'];

        $api_key = "kxx3FIVYR8i";   

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

        curl_close($curl);
        return $response;
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


}
