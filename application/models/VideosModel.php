<?php
class VideosModel extends CI_Model{
    protected $dbtable;
    protected $logtable;
    protected $companytbl;
    protected $devicetable;
    protected $customertbl;

    protected $primaryKey  = 'video_id';
    protected $video_name  = 'video_name';
    protected $created_at  = 'video_upload_time';
    protected $updated_at  = 'video_update_time';

    public function __construct(){
        $this->load->database();
        $this->dbtable     = $this->db->dbprefix('videos');
        $this->logtable    = $this->db->dbprefix('video_log');
        $this->companytbl  = $this->db->dbprefix('companies');
        $this->devicetable = $this->db->dbprefix('devices');
        $this->customertbl = $this->db->dbprefix('customers');

        $this->load->model(array('TimeModel'));
        $this->load->helper('string_helper');
    }

    public function getPagination($offset, $pagesize, $where = null, $order_fld = null, $order_way = 'asc'){
        $result_arr = array();
        try {
            $this->db->select($this->dbtable.".*,company_id, company_name,company_picture as company_image, deviceid, customer_id, customer_name, customer_email, customer_company,customer_phone");
            $this->db->from($this->dbtable);
            $this->db->join($this->companytbl, 'company_id = video_company_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            if($where != null) $this->db->where($where);
            /*if($order_fld == null) $order_fld = 'video_is_show';*/
            
            //$this->db->order_by($order_fld, $order_way);
            if($order_fld == null){
                $this->db->order_by('(CASE video_is_show WHEN 0 THEN 1 WHEN 1 THEN 0 ELSE 2 END)','asc');
            }else{
                $this->db->order_by($order_fld, $order_way);
            }
            $this->db->order_by('video_created_time', 'desc');
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
            $this->db->select($this->dbtable.".*, company_name, deviceid, customer_name, customer_email, customer_company");
            $this->db->from($this->dbtable);
            $this->db->join($this->companytbl, 'company_id = video_company_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            if($where != null) $this->db->where($where);
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getCountsByid($company_id, $where = null){
        $result_val = 0;
        try {
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
            if($where != null) $this->db->where($where);
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getvideos($company_id){
        $result_val = array();
        try {
            $this->db->select($this->dbtable.".*, company_name, deviceid, customer_name, customer_email, customer_phone, customer_company");
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
            $this->db->join($this->companytbl, 'company_id = video_company_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
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
            $this->db->select($this->dbtable.".*, company_name, deviceid, customer_id, customer_name, customer_email, customer_phone, video_case_number");
            $this->db->from($this->dbtable);
            $this->db->join($this->companytbl, 'company_id = video_company_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            if($fld_name == null) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){

        }

        return $result;
    }

    public function getFindWhere($data = null, $order_fld = null, $order_way = 'asc'){
        $result_arr = array();
        try {
            $this->db->from($this->dbtable);
            if($order_fld == null) $order_fld = $this->created_at;
            $this->db->order_by($order_fld, $order_way);
            if($data)  $this->db->where($data);
            $query = $this->db->get();
            
            log_message('info', 'VideosModel->getFindWhere result:');
            $result = $query->result_array();
            if($result) {
                foreach ($result as $rows) {
                    log_message('info', json_encode($rows));
                    array_push($result_arr, $rows);
                }
            }
        }catch (Exception $ex){

        }
        return $result_arr;
    }

    public function exist($findname){
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->video_name => $findname));
            
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
            $this->db->where($this->primaryKey, $key_id);
            $this->db->update($this->dbtable, $data);

            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function delete( $fld_value = 0, $fld_name = null){
        try {
            if($fld_name == null) $fld_name = $this->primaryKey;
            if($fld_value) $this->db->where($fld_name, $fld_value);
            $this->db->delete($this->dbtable);

            return true;
        }catch (Exception $ex){
            return false;
        }
    }
}