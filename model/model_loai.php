<?php 
require_once('../lib/database.php');
require_once('../lib/format.php');

class loai{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllLoai(){
    $query ="SELECT * FROM `loai`";
    $result =$this->db->select($query);
      return $result;
  }
  public function getLoaiID($id_loai){
    $query ="SELECT * FROM `loai` WHERE `id_loai`='$id_loai'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_loai($id_loai){
    $query ="DELETE FROM `loai` WHERE `loai`.`id_loai` = '$id_loai'";
    $this->db->detele($query);
  }
  public function update_loai($kieu_dv,$img,$id_loai){
    if($img==""){
    $query ="UPDATE `loai` SET `kieu_dv` = '$kieu_dv'WHERE `id_loai` = '$id_loai';";
    $this->db->update($query);
    }else{
      $query ="UPDATE `loai` SET `kieu_dv` = '$kieu_dv', `img`='$img' WHERE `id_loai` = '$id_loai';";
    $this->db->update($query);
    }
  }
  public function insert_loai($kieu_dv,$img){
    $kieu_dv=$this->fm->validation($kieu_dv);
    // xử lý ký tự đặc biệt
    $kieu_dv =mysqli_real_escape_string($this->db->link, $kieu_dv);
      $query ="INSERT INTO `loai` (`id_loai`, `kieu_dv`, `img`) VALUES (NULL, '$kieu_dv', '$img');";
      $this->db->insert($query);
  }
}



