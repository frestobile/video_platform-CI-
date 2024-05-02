<?php
class LoginModel extends CI_Model{
    protected  $dbcon;
    protected $globalModel;
    protected $companiesModel;
    protected $gradeModel;

    public function __construct(){
        parent::__construct();

        $this->load->model('GlobalModel');
        $this->load->model('TimeModel');
    }

    public function can_login($email, $password){
        $sqls = "select * from vis_companies where company_email = '".$email."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        
        if($row){
            if($row->company_password == $password){
                if ($row->company_active == 1){
                    return array(
                        'status' => 'success',
                        'company_id' => $row->company_id,
                        'company_lang' => $row->company_lang,
                        'company_login_num' => $row->company_login_num,
                        'company_name' => $row->company_name
                    );
                }else{
                    return array(
                        'status' => 'block',
                    );
                }
            }else{
                return array(
                    'status' => 'password',
                );
            }
        }else{
            return array(
                'status' => 'email',
            );
        }
    }

    public function device_login($id, $password){
        $sqls = "select * from vis_devices where deviceid = '".$id."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        if($row){
            if($row->device_password == $password){
                if ($row->device_is_allow == 1){
                    return array(
                        'status' => 'success',
                        'device_id' => $row->device_id,
                        'device_login_num' => $row->device_login_num,
                        'device_company_id' => $row->device_company_id,
                        'device_serial_number' => $row->device_serial_number
                    );
                }else{
                    return array(
                        'status' => 'block',
                    );
                }
            }else{
                return array(
                    'status' => 'password',
                );
            }
        }else{
            return array(
                'status' => 'id',
            );
        }
    }
}