<?php
class OfferModel extends CI_Model{
    protected $dbtable;
    protected $companytbl;
    protected $customertbl;
    protected $primaryKey  = 'id';
    protected $created_at  = 'created_at';
    protected $updated_at  = 'updated_at';

    public function __construct(){
        $this->load->database();
        $this->dbtable = $this->db->dbprefix('offer');
        $this->companytbl = $this->db->dbprefix('companies');
        $this->customertbl = $this->db->dbprefix('customers');

        $this->load->model('TimeModel');
        $this->load->model('GlobalModel');
    }

    public function getOfferByVideoId($id, $status = null){
        $result = array();
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array('video_id' => $id));
            if ($status != null) {
                $this->db->where('status', $status);
            }
            $query = $this->db->get();
            $result = $query->result_array();
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
        try {
            $key_id = $data['id'];
            if(!isset($data[$this->updated_at]))   $data[$this->updated_at] = $this->TimeModel->getting_datetime();
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