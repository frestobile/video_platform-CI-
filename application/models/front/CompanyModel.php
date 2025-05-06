<?php
class CompanyModel extends CI_Model{
    protected $dbtable;
    protected $primaryKey   = 'company_id';
    protected $company_name  = 'company_name';
    protected $company_email = 'company_email';
    protected $company_pwd   = 'company_password';
    protected $created_at   = 'company_registered_at';
    protected $updated_at   = 'company_update_at';
    protected $permit_company = 'company_active';

    public function __construct(){
        $this->load->database();
        $this->dbtable = $this->db->dbprefix('companies');
        $this->load->model('TimeModel');
        $this->load->model('GlobalModel');
    }

    public function get_by_id($company_id) {
        $sqls = "select * from vis_companies where company_id='".$company_id."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        if($row) {
            return array(
                'company_name' => $row->company_name,
                'company_image' => $row->company_picture,
                'preview_image' => $row->preview_image,
                'favicon'       => $row->favicon,
                'company_email' => $row->company_email,
                'company_phone' => $row->company_phone,
                'company_address' => $row->company_address,
                'company_lang' => $row->company_lang,
                'sms_sender' => $row->sms_sender,
                'email_sender' => $row->email_sender
            );
        }
    }

    public function exist($company_email){
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->company_email => $company_email));
            $query = $this->db->get();
            $result = $query->row_array();
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function insert($data){
        try {
            if(!isset($data[$this->primaryKey]))   $data[$this->primaryKey] = random_string('numeric', 6);
            if($data[$this->member_pwd])           $data[$this->member_pwd] = md5($data[$this->member_pwd]);
            if(!isset($data[$this->created_at]))   $data[$this->created_at] = $this->TimeModel->getting_datetime();
            $this->db->insert($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function update( $data, $fld_value = 0, $fld_name = null){
        try {
            if(!$fld_name) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            if(!isset($data[$this->updated_at]))   $data[$this->updated_at]   = $this->TimeModel->getting_datetime();
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function loginUpdate( $data, $fld_value = 0, $fld_name = null){
        try {
            if(!$fld_name) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }


    public function delete( $fld_value = 0, $fld_name = null){
        try {
            if(!$fld_name) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            $this->db->delete($this->dbtable);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    function change_pass($company_id,$new_pass){
        $update_pass=$this->db->query("UPDATE vis_companies set company_password='$new_pass'  where company_id='$company_id'");
        if($update_pass){
            return true;
        }else{
            return false;
        }
    }

    public function ForgotPassword($email){
        $this->db->select('company_email');
        $this->db->from($this->dbtable);
        $this->db->where($this->company_email, $email);
        $query = $this->db->get();
        return $query->row_array();
    }
}