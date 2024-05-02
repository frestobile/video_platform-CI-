<?php
class DevicesModel extends CI_Model{
    protected $dbtable;
    protected $cmytable;

    protected $primaryKey   = 'device_id';
    protected $deviceID = 'deviceid';
    protected $device_name  = 'device_name';
    protected $device_pwd   = 'device_password';
    protected $created_at   = 'device_registered_at';
    protected $permit_device = 'device_is_allow';

    public function __construct(){
        $this->load->database();
        $this->dbtable    = $this->db->dbprefix('devices');
        $this->cmytable   = $this->db->dbprefix('companies');
        $this->load->model(array('TimeModel'));
        $this->load->helper('string_helper');
    }

    public function getPagination($offset, $pagesize, $where = null, $order_fld = null, $order_way = 'desc'){
        $result_arr = array();
        try {
            $this->db->select($this->dbtable.".*, company_name");
            $this->db->from($this->dbtable);
            $this->db->join($this->cmytable, 'company_id = device_company_id', 'left');
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

    public function getCounts($where = null){
        $result_val = 0;
        try {
            $this->db->select($this->dbtable.".*, company_name");
            $this->db->from($this->dbtable);
            $this->db->join($this->cmytable, 'company_id = device_company_id', 'left');
            if($where != null) $this->db->where($where);
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getFind($fld_value = null, $fld_name = null){
        $result = array();
        try {
            $this->db->select($this->dbtable.".*, company_name");
            $this->db->from($this->dbtable);
            $this->db->join($this->cmytable, 'company_id = device_company_id', 'left');

            if($fld_name == null) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){}

        return $result;
    }

    public function insert($data){
        try {
            if(!isset($data[$this->created_at]))   $data[$this->created_at] = $this->TimeModel->getting_datetime();
            $this->db->insert($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function update($data){
        try {
            $key_id = array_shift($data);
            $this->db->where($this->primaryKey, $key_id);
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function exist($deviceid){
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->deviceID => $deviceid));
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