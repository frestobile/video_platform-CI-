<?php
class CustomerModel extends CI_Model{
    protected $dbtable;
    protected $devicetable;
    protected $companytbl;
    protected $videotable;

    protected $primaryKey  = 'customer_id';
    protected $video_name  = 'customer_name';
    protected $case_number = 'customer_case_number';
    protected $created_at  = 'customer_registered_at';

    public function __construct(){
        $this->load->database();
        $this->dbtable     = $this->db->dbprefix('customers');
        $this->devicetable = $this->db->dbprefix('devices');
        $this->companytbl  = $this->db->dbprefix('companies');
        $this->videotable  = $this->db->dbprefix('videos');
        $this->load->model(array('TimeModel'));
        $this->load->helper('string_helper');
    }

    public function getcustomers($company_id){
        $result_val = array();
        try {
            $this->db->select($this->dbtable.".*");
            $this->db->from($this->dbtable);
            $this->db->where('customer_company_id = '.$company_id);
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
            $this->db->where('customer_company_id = '.$company_id);
            $result_val = $this->db->count_all_results();
        }catch (Exception $ex){}
        return $result_val;
    }

    public function get_by_id($customer_id) {
        $sqls = "select * from vis_customers where customer_id = '".$customer_id."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        if($row) {
            return array(
                'customer_name' => $row->customer_name,
            );
        }
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
            $key_id = $data['customer_id'];
            $this->db->where($this->primaryKey, $key_id);
            $this->db->update($this->dbtable, $data);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function exist($case){
        try{
            $this->db->from($this->dbtable);
            $this->db->where(array($this->case_number => $case));
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
}