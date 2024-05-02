<?php
class AdminModel extends CI_Model{
    protected $dbtable;
    protected $primaryKey = 'admin_id';
    protected $admin_name = 'admin_username';
    protected $admin_pwd  = 'admin_password';
    protected $updated_at  = 'admin_update_at';

    public function __construct(){
        $this->load->database();
        $this->dbtable = $this->db->dbprefix('admin');
        $this->load->model(array('TimeModel'));
        $this->load->helper('string');
    }

    public function getFind($fld_value, $fld_name = null){
        $result = array();
        try {
            $this->db->from($this->dbtable);
            if(!$fld_name) $fld_name = $this->admin_name;
            $this->db->where($fld_name, $fld_value);
            $query = $this->db->get();
            $result = $query->row_array();
        }catch (Exception $ex){}
        return $result;
    }

    public function getFindWhere($data = null, $order_fld = null, $order_way = 'asc'){
        $result_arr = array();
        try {
            $this->db->from($this->dbtable);
            if($order_fld) $this->db->order_by($order_fld, $order_way);
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

    public function exist($username, $userpwd){
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->admin_name => $username, $this->admin_pwd => md5($userpwd)));
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
            if(!isset($data[$this->primaryKey]))    $data[$this->primaryKey]    = random_string('numeric', 6);
            if(isset($data[$this->admin_pwd]))      $data[$this->admin_pwd]     = md5($data[$this->admin_pwd]);
            if(!isset($data['admin_login_time']))   $data['admin_login_time']   = $this->TimeModel->getting_datetime();
            $this->db->insert($this->dbtable, $data);
            return $data[$this->primaryKey];
        }catch (Exception $ex){
            return false;
        }
    }

    public function update( $data, $fld_value = 0, $fld_name = null){
        /*echo "<pre>"; print_r($data);exit;*/
        try {
            if($fld_name == null) $fld_name = $this->primaryKey;

            if(isset($data[$this->admin_pwd]))  $data[$this->admin_pwd] = md5($data[$this->admin_pwd]);
            
            if(!isset($data[$this->updated_at]))   $data[$this->updated_at] = $this->TimeModel->getting_datetime();
            
            $this->db->where($fld_name, $fld_value);
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function getCounts(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}