<?php 
require_once('../lib/database.php');
require_once('../lib/format.php');

class dv{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllDV(){
    $query ="SELECT * FROM `dv` LEFT JOIN `loai` ON `dv`.`id_pk_loai` = `loai`.`id_loai`";
    $result =$this->db->select($query);
      return $result;
  }
  public function getDVID($id_dv){
    $query ="SELECT * FROM `dv` LEFT JOIN `loai` ON `dv`.`id_pk_loai` = `loai`.`id_loai` WHERE id_dv = '$id_dv'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_DV($id_dv){
    $query ="DELETE FROM `dv` WHERE `dv`.`id_dv` = '$id_dv'";
    $this->db->detele($query);
  }
  public function update_DV($name,$diem_den,$gia,$tong_ng,$img_dv,$ngay_bd,$ngay_kt,$id_pk_loai,$noi_bd,$bv,$id_dv){
    if($img_dv=''){
        $query ="UPDATE `dv` SET `name` = '$name',`diem_den`='$diem_den',`gia`='$gia',`tong_ng`='$tong_ng',`ngay_bd`='$ngay_bd',`ngay_kt`='$ngay_kt',`id_pk_loai`='$id_pk_loai',`noi_bd`='$noi_bd',`bai_viet`='$bv' WHERE `id_dv` = '$id_dv';";
    $this->db->update($query);
    }else{
    $query ="UPDATE `dv` SET `name` = '$name',`diem_den`='$diem_den',`gia`='$gia',`tong_ng`='$tong_ng',`img_dv`='$img_dv',`ngay_bd`='$ngay_bd',`ngay_kt`='$ngay_kt',`id_pk_loai`='$id_pk_loai',`noi_bd`='$noi_bd',`bai_viet`='$bv' WHERE `id_dv` = '$id_dv';";
    $this->db->update($query);
    }
  }
  public function insert_DV($name,$diem_den,$gia,$tong_ng,$img_dv,$ngay_bd,$ngay_kt,$id_pk_loai,$noi_bd,$bv){
    $name=$this->fm->validation($name);
    $diem_den=$this->fm->validation($diem_den);
    $noi_bd=$this->fm->validation($noi_bd);
    $name =mysqli_real_escape_string($this->db->link, $name);
    $diem_den =mysqli_real_escape_string($this->db->link, $diem_den);
    $noi_bd =mysqli_real_escape_string($this->db->link, $noi_bd);
    if(empty($name)||empty($diem_den)||empty($noi_bd)){
      $alert="Lỗi";
      return $alert;
    }else{
      $query ="INSERT INTO `dv` (`id_dv`, `id_pk_loai`, `name`, `gia`, `diem_den`, `bai_viet`, `ngay_bd`, `ngay_kt`, `luot_xem`, `img_dv`, `noi_bd`, `tong_ng`) VALUES (NULL, '$id_pk_loai', '$name', '$gia', '$diem_den', '$bv', '$ngay_bd', '$ngay_kt','0', '$img_dv', '$noi_bd', '$tong_ng');";
      $this->db->insert($query);
    }    
  }
}



