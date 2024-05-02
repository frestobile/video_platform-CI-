<?php
class CompaniesModel extends CI_Model{
    protected $dbtable;
    protected $logtable;

    protected $primaryKey   = 'company_id';
    protected $company_name  = 'company_name';
    protected $company_email = 'company_email';
    protected $company_pwd   = 'company_password';
    protected $created_at   = 'company_registered_at';
    protected $updated_at   = 'company_update_at';
    protected $login_time   = 'company_login_time';
    protected $permit_company = 'company_active';

    public function __construct(){
        $this->load->database();
        $this->dbtable    = $this->db->dbprefix('companies');
        $this->logtable   = $this->db->dbprefix('company_log');
        $this->load->model('TimeModel');
        $this->load->helper('string_helper');
    }

    public function getPagination($offset, $pagesize, $where = null, $order_fld = null, $order_way = 'desc'){
        $result_arr = array();
        try {
            $this->db->from($this->dbtable);
            if($where != null) $this->db->where($where);
            if($order_fld == null) $order_fld = $this->created_at;
            $this->db->order_by($order_fld, $order_way);
            $this->db->limit($pagesize, $offset);
            $query = $this->db->get();

            $result = $query->result_array();
            if($result) {
                foreach ($result as $rows) {
                    array_push($result_arr, $rows);
                }
            }
        }catch (Exception $ex){}
        return $result_arr;
    }

    public function getCounts($where = null, $order_fld = null, $order_way = 'asc'){
        $result_val = 0;
        try {
            $this->db->from($this->dbtable);
            if($where != null) $this->db->where($where);
            if($order_fld == null) $order_fld = $this->created_at;
            $this->db->order_by($order_fld, $order_way);
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getCompanyName($where = null, $order_fld = null, $order_way = 'asc'){
        $result_val = array();
        try {
            $this->db->from($this->dbtable);
            if($where != null) $this->db->where($where);
            if($order_fld == null) $order_fld = $this->created_at;
            $this->db->order_by($order_fld, $order_way);
            $query = $this->db->get();
            $result = $query->result_array();
            if($result) {
                foreach ($result as $rows) {
                    array_push($result_val, $rows);
                }
            }
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getFind($fld_value = null, $fld_name = null){
        $result = array();
        try {
            $this->db->from($this->dbtable);
            if(!$fld_name) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){}
        return $result;
    }

    public function exist($findemail){
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->company_email => $findemail));
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
            if($data[$this->company_pwd]) $data[$this->company_pwd] = md5($data[$this->company_pwd]);
            if(!isset($data[$this->created_at])) $data[$this->created_at] = $this->TimeModel->getting_datetime();
            $this->db->insert($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function update($data){
        try {
            $key_id = array_shift($data);
            if(!isset($data[$this->updated_at])) $data[$this->updated_at] = $this->TimeModel->getting_datetime();
            if(isset($data[$this->company_pwd])) $data[$this->company_pwd] = md5($data[$this->company_pwd]);
            $this->db->where($this->primaryKey, $key_id);
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
}