<?php
class GlobalModel extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_baseurl(){
        $https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        $origin_ip = ($https ? 'https://' : 'http://').
            (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
            (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
                ($https && $_SERVER['SERVER_PORT'] === 443 ||
                $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
            substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
        return $origin_ip;
    }

    public function get_DBPrefix(){
        return $this->db->dbprefix;
    }

    public function excute_query_result($query_str){
        $result_arr = array();
        try {
            $query = $this->db->query($query_str);
            $result = $query->result_array();
            if($result) {
                foreach ($result as $rows) {
                    array_push($result_arr, $rows);
                }
            }
        }catch (Exception $ex){}
        return $result_arr;
    }

    public function excute_query_array($query_str){
        $result_arr = array();
        try {
            $query = $this->db->query($query_str);
            $result = $query->result_array();
            if($result) {
                foreach ($result as $rows) {
                    array_push($result_arr, $rows);
                }
            }
        }catch (Exception $ex){}
        return $result_arr;
    }

    public function excute_query_row($query_str){
        try {
            $query = $this->db->query($query_str);
            $result = $query->row();
            if($result) return $result;
        }catch (Exception $ex){}
    }

    public function excute_query($query_str){
        try{
            $result = $this->db->query($query_str);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function excute_insert($tablename, $sets){
        try{
            $result = $this->db->insert($tablename, $sets);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function excute_update($tablename, $updates, $wheres){
        try{
            $result = $this->db->update($tablename, $updates, $wheres);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function excute_delete($tablename, $wheres){
        try{
            $result = $this->db->delete($tablename, $wheres);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }
}