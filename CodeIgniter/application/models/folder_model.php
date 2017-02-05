<?php

class Folder_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    
    
    public function get_record($parent_id,$nodeNumber) {/*get single*/
        $limit = ($nodeNumber-1).','.$nodeNumber;//get specific folder details

        $sql = "SELECT * 
                FROM  tbl_folder WHERE parent_id = :parent_id LIMIT ".$limit;

        $stmt = $this->db->conn_id->prepare($sql);
        $stmt->bindParam(':parent_id', $parent_id, PDO::PARAM_STR);

        e($stmt);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
    
    
    
    public function all_parent0_dir() {

        $sql = "SELECT * FROM tbl_folder 
                WHERE parent_id = 0";

        $stmt = $this->db->conn_id->prepare($sql);

        e($stmt);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
