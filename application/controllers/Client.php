<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index($param = null){
        $this->load->model('front/VideoModel');
        $this->load->model('front/CompanyModel');
        $this->load->model('front/CustomerModel');
        $this->load->model('GlobalModel');
        $this->load->model('TimeModel');
        
        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;

        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['preview'] = $this->lang->line('preview');
        $data['warning'] = $this->lang->line('warning');
        $data['success'] = $this->lang->line('success');
        $data['failed'] = $this->lang->line('failed');
        $data['determine'] = $this->lang->line('determine');
        $data['alert_content'] = $this->lang->line('alert_content');

        if (!empty($param)){
            $row = $this->VideoModel->is_video_exist($param);

            if (!empty($row)){
                if($row['user_removed'] == 0) {
                    $log_data['vl_video_id'] = $row['video_id'];
                    $log_data['vl_company_id'] = $row['video_company_id'];
                    $log_data['vl_device_id'] = $row['video_device_id'];
                    $log_data['vl_created_at'] = $this->TimeModel->getting_datetime();
                    $log_data['ip_address'] = $this->input->ip_address();

                    if($this->GlobalModel->excute_insert('vis_video_log', $log_data))
                    {
                        $company_data = $this->CompanyModel->get_by_id($row['video_company_id']);
                        $customer_data = $this->CustomerModel->get_by_id($row['video_customer_id']);

                        $data['video_data'] = $row;
                        $data['company_data'] = $company_data;
                        $data['customer_data'] = $customer_data;
                        $this->load->view('front/videoView', $data);
                    }

                } else {
                    $data['status'] = 'fail';
                    $data['video_data'] = $param;
                    $this->load->view('errors/pagenotfound', $data);
                }

            }else{
                $data['status'] = 'fail';
                $data['video_data'] = $param;
                $this->load->view('errors/pagenotfound', $data);
            }
        }else{
            $baseurl = $this->GlobalModel->get_baseurl();
            redirect($baseurl."/", 'refresh');
        }

    }
}