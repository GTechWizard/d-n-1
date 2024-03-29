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
 public function insetcm($id_pk_dv,$id_pk_user,$td,$nd,$ngay_bl,$danhgia)
 {
  $query = "INSERT INTO bl (bl.id_pk_dv,bl.id_pk_user,bl.td,bl.noi_dung,bl.ngay_bl,bl.danh_gia) VALUES('$id_pk_dv','$id_pk_user','$td','$nd','$ngay_bl','$danhgia')";
  $result =$this->db->insert($query);
  return $result;
 }
 public function avg_sart($id_dv)
 {
  $query = "SELECT AVG(bl.danh_gia) AS avg FROM bl WHERE bl.id_pk_dv='$id_dv'";
  $result =$this->db->select($query);
  return $result;
 }
 public function userOfBl($id_dv)
 {
  $query = "SELECT bl.noi_dung,bl.td,bl.ngay_bl,bl.danh_gia, user.name, dv.id_dv, user.img FROM user JOIN bl ON bl.id_pk_user = user.id_user JOIN dv ON dv.id_dv = bl.id_pk_dv WHERE dv.id_dv='$id_dv'";
  $result =$this->db->select($query);
  return $result;
 }
 public function getBlIdUser($id_user,$id_dv)
 {
  $query = "SELECT COUNT(bl.id_bl) AS count FROM bl WHERE bl.id_pk_user='$id_user' AND bl.id_pk_dv='$id_dv'";
  $result =$this->db->select($query);
  return $result;
 }
 public function getBlWeak()
 {
   $query = "SELECT COUNT(*) AS count
   FROM bl
   WHERE STR_TO_DATE(bl.ngay_bl, '%d-%m-%Y') BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()";
   $result = $this->db->select($query);
   return $result;
 }
 public function getdgcountbl($id_dv)
 {
   $query = "SELECT COUNT(bl.id_bl) AS count, AVG(bl.danh_gia) AS dg FROM `bl` WHERE bl.id_pk_dv= '$id_dv'";
   $result = $this->db->select($query);
   return $result;
 }
}



