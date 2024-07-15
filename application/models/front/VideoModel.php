<?php
class VideoModel extends CI_Model{
    protected $dbtable;
    protected $companytbl;
    protected $customertbl;
    protected $devicetable;
    protected $offertable;
    protected $primaryKey  = 'video_id';
    protected $video_name  = 'video_name';
    protected $video_url   = 'video_url';
    protected $video_serial = 'video_case_number';
    protected $created_at  = 'video_created_time';
    protected $updated_at  = 'video_update_time';
    protected $upload_at   = 'video_upload_time';

    public function __construct(){
        $this->load->database();
        $this->dbtable = $this->db->dbprefix('videos');
        $this->companytbl = $this->db->dbprefix('companies');
        $this->customertbl = $this->db->dbprefix('customers');
        $this->devicetable = $this->db->dbprefix('devices');
        $this->offertable = $this->db->dbprefix('offer');
        $this->load->model('TimeModel');
        $this->load->model('GlobalModel');
    }

    public function getCompanyVideo($company_id, $order_fld = null,  $order_way = 'asc')
    {
        $result_val = array();
        try {
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
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

    public function getvideos($company_id, $offset, $pagesize, $wherestr = null, $order_fld = null, $order_way = 'asc'){
        $result_val = array();
        try {
            $this->db->select($this->dbtable.".*, device_name, deviceid, customer_name, customer_phone, customer_email, customer_company");
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
            
            if($wherestr != null) $this->db->where($wherestr);
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
            if($order_fld == null){
                 $this->db->order_by('(CASE video_is_show WHEN 0 THEN 1 WHEN 1 THEN 0 ELSE 2 END)','asc');
            }else{
                $this->db->order_by($order_fld,$order_way);
            }
            $this->db->order_by('video_created_time', 'desc');
            $this->db->limit($pagesize, $offset);
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

    public function getCounts($company_id, $where = null){
        $result_val = 0;
        try {
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
        
            if($where != null) $this->db->where($where);
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getRecentVideos($company_id, $where, $order_fld = null, $order_way = 'desc'){
        $result_val = array();
        try {
            $this->db->select($this->dbtable.".*, device_name, deviceid, customer_name, customer_phone, customer_email, customer_company");
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
            if($where != null) $this->db->where($where);
            if($order_fld == null) $order_fld = $this->created_at;
            $this->db->order_by($order_fld, $order_way);
            $this->db->limit(10);
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
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

    public function getCountsByid($company_id){
        $result_val = 0;
        try {
            $this->db->from($this->dbtable);
            $this->db->where('video_company_id = '.$company_id);
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function getFind($fld_value){
        $result = array();
        try {
            $this->db->select($this->dbtable.".*, company_name, company_picture, company_email, sms_sender, email_sender, deviceid, customer_id, customer_name, customer_email, customer_phone");
            $this->db->from($this->dbtable);
            $this->db->join($this->companytbl, 'company_id = video_company_id', 'left');
            $this->db->join($this->devicetable, 'device_id = video_device_id', 'left');
            $this->db->join($this->customertbl, 'customer_id = video_customer_id', 'left');
            $this->db->where(array($this->primaryKey => $fld_value));
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){}

        return $result;
    }

    public function getFindWhere($data = null, $order_fld = null, $order_way = 'asc'){
        $result_arr = array();
        try {
            $this->db->from($this->dbtable);
            if($order_fld) $this->db->orderBy($order_fld, $order_way);
            if($data)  $this->db->where($data);
            $query = $this->db->get();

            $result = $query->result_array();
            if($result) {
                foreach ($result as $rows) {
                    array_push($result_arr, $rows);
                }
            }
        }catch (Exception $ex){
        }
        return $result_arr;
    }

    public function exist($find){
        $result = array();
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->video_serial => $find));
            $this->db->where('(video_is_show = 0 OR video_is_show = 1)');
            $this->db->where('company_removed',0);
            if(isset($_POST['company_id']) && !empty($_POST['company_id'])){
                $this->db->where('video_company_id',$_POST['company_id']);
            }
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){
        }
        return $result;
    }

    public function is_video_exist($find){
        $result = array();
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array('video_serial' => $find));
//            $this->db->where(array('video_url' => $find));
           
            $this->db->where('company_removed',0);
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){
        }
        return $result;
    }

    public function insert($data){
        try {
            if(!isset($data[$this->created_at]))   $data[$this->created_at] = $this->TimeModel->getting_datetime();
            $this->db->insert($this->dbtable, $data);
            return $this->db->insert_id();
        }catch (Exception $ex){
            return false;
        }
    }

    public function update($data){
        //echo "<pre>";print_r($data);exit;
        try {
            $key_id = $data['video_id'];
            $this->db->where($this->primaryKey, $key_id);
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function delete($fld_value){
        try {
            $this->db->where(array($this->primaryKey => $fld_value));
            $this->db->delete($this->dbtable);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function update_video_unique_id($video_id){
        $n = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $unique_id = $video_id.'v';
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $unique_id .= $characters[$index]; 
        }
        $unique_id = substr($unique_id,0,$n);
	
	    return $unique_id;

    }
}