<?php 
require_once('database.php');
require_once('format.php');

class comment{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllComment(){
    $query ="SELECT * FROM `bl` LEFT JOIN `dv` ON `bl`.`id_pk_dv` = `dv`.`id_dv`";
    $result =$this->db->select($query);
      return $result;
  }
  public function count_bl(){
    $query ="SELECT COUNT(`bl`.`id_bl`) AS `count_bl` FROM `bl`";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_comment($blID){
    $query ="DELETE FROM `bl` WHERE `bl`.`id_bl` = '$blID'";
    $this->db->detele($query);
  }
  public function avg_sart($id_dv){
    $query ="SELECT AVG(bl.danh_gia) AS avg FROM bl WHERE bl.id_pk_dv='$id_dv';";
    $result = $this->db->select($query);
    return $result;
  }

}



