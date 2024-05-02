<?php
class ConfigModel extends CI_Model{
    protected $dbtable;
    protected $primaryKey = 'config_id';
    protected $cfg_key    = 'config_key';
    protected $cfg_value  = 'config_value';

    public function __construct(){
        $this->load->database();
        $this->dbtable = $this->db->dbprefix('config');
        $this->load->model(array('TimeModel'));
    }

    public function getFind($fld_value = null, $fld_name = null){
        $result = array();
        try {
            $this->db->from($this->dbtable);
            if($fld_name == null) $fld_name = $this->cfg_key;
            if($fld_value) $this->db->where($fld_name, $fld_value);
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

    public function update( $data){
        try {
            foreach ($data as $keys => $vals) {
                $updated_at = $this->TimeModel->getting_datetime();
                $this->db->where('config_key', $keys);
                $this->db->update($this->dbtable, array('config_value'=>$vals, 'updated_at'=>$updated_at));
            }
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function save( $data){
        try {
            $key_id = array_shift($data);
            $this->db->where($this->primaryKey, $key_id);
            $data["updated_at"] = $this->TimeModel->getting_datetime();
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function get_all_config_data(){
            
        $query = $this->db->get($this->dbtable);
        $settings = $query->result_array();
        $all_settings = array();
        if(!empty($settings)){
            foreach ($settings as $key => $setting) {
                $all_settings[$setting['config_key']] = $setting['config_value'];
            }
        }
        return $all_settings;
    }

    public function save_config_data($data){
        $config = $this->get_all_config_data();
        if(!empty($data['config'])){

            
            foreach ($data['config'] as $key => $value) {

                
                $add_data = array();
                $add_data['config_key'] = $key;
                $add_data['config_value'] = $value;
                
                if(!isset($config[$key])){
                    $add_data['created_at'] = date("Y-m-d H:i:s");
                    $this->db->insert('vis_config',$add_data);

                }else{

                    $add_data['updated_at'] = date("Y-m-d H:i:s");
                    $this->db->update('vis_config',$add_data,array('config_key' => $key));
                }

            }
            
        }
    }

}