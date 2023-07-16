<?php 
require_once('../lib/database.php');
require_once('../lib/format.php');

class tt{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllTT(){
    $query ="SELECT * FROM `tt`";
    $result =$this->db->select($query);
      return $result;
  }
  public function getTTID($id){
    $query ="SELECT * FROM `tt` WHERE `id_tt`='$id'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_TT($id_loai){
    $query ="DELETE FROM `loai` WHERE `loai`.`id_loai` = '$id_loai'";
    $this->db->detele($query);
  }
  public function update_TT($kieu_dv,$img,$id_loai){
    if($img==""){
    $query ="UPDATE `loai` SET `kieu_dv` = '$kieu_dv'WHERE `id_loai` = '$id_loai';";
    $this->db->update($query);
    }else{
      $query ="UPDATE `loai` SET `kieu_dv` = '$kieu_dv', `img`='$img' WHERE `id_loai` = '$id_loai';";
    $this->db->update($query);
    }
  }
  public function insert_TT($bai_viet,$name,$mo_ta,$dia_diem,$tac_gia,$img,$ngay_d){
    $name=$this->fm->validation($name);
    $dia_diem=$this->fm->validation($dia_diem);
    $tac_gia=$this->fm->validation($tac_gia);

    $name =mysqli_real_escape_string($this->db->link, $name);
    $dia_diem =mysqli_real_escape_string($this->db->link, $dia_diem);
    $tac_gia =mysqli_real_escape_string($this->db->link, $tac_gia);

    if(empty($name)||empty($dia_diem)||empty($tac_gia)){
      $alert="Lỗi";
      return $alert;
    }else{
      if($img=''){
        $query ="INSERT INTO `tt` (`id_tt`, `bai_viet`, `name`, `mo_ta`, `dia_diem`, `tac_gia`, `ngay_d`) VALUES (NULL, '$bai_viet', '$name', '$mo_ta', '$dia_diem', '$tac_gia', '$ngay_d');";
      $this->db->insert($query);
      }else{
        $query ="INSERT INTO `tt` (`id_tt`, `bai_viet`, `name`, `mo_ta`, `dia_diem`, `tac_gia`, `img`, `ngay_d`) VALUES (NULL, '$bai_viet', '$name', '$mo_ta', '$dia_diem', '$tac_gia', '$img', '$ngay_d');";
      $this->db->insert($query);
      }
      
    }   
  }
}



