<?php 
require_once('../lib/database.php');
require_once('../lib/format.php');

class dvUser{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllDVUser(){
    $query ="SELECT `id_dv_user`, `id_dv`, `ngay_bd`, `ngay_kt`, `dv`.`tong_ng` AS `so_luong`, SUM(`dv_user`.`tong_ng`) AS `ng_dk`, `trang_thai` FROM `dv` LEFT JOIN `dv_user` ON `dv`.`id_dv` = `dv_user`.`id_pk_dv` GROUP BY `id_dv` ";
    $result =$this->db->select($query);
      return $result;
  }
  public function getDVUserID($id_dv){
    $query ="SELECT `ngay_bd`, `ngay_kt`, `dv`.`tong_ng` AS `so_luong`, `dv_user`.`tong_ng` AS `ng_dk`, `trang_thai`, `id_user`, `user`.`name` AS `ten_user`, `sdt`, `dia_chi`, `email`, `vai_tro`,`ngay_dkdv` FROM `dv` LEFT JOIN `dv_user` ON `dv`.`id_dv` = `dv_user`.`id_pk_dv` LEFT JOIN `user` ON `dv_user`.`id_pk_user` = `user`.`id_user` WHERE `id_dv`= '$id_dv'";
    $result =$this->db->select($query);
      return $result;
  }
  public function getDVUserID_user($id_user){
    $query ="SELECT `id_pk_user`, `id_dv`,`dv_user`.`tong_ng` AS `ng_dk`,`trang_thai`, `id_user`, `sdt`, `dia_chi`, `email`, `vai_tro`,`ngay_dkdv` FROM `dv` LEFT JOIN `dv_user` ON `dv`.`id_dv` = `dv_user`.`id_pk_dv` LEFT JOIN `user` ON `dv_user`.`id_pk_user` = `user`.`id_user` WHERE `id_pk_user`= '$id_user'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_DVUser($id_dv_act){
    $query ="DELETE FROM `dv_user` WHERE `id_dv_user` = '$id_dv_act'";
    $this->db->detele($query);
  }
  public function updateDVUser($ng_dk,$trang_thai,$id_pk_user){
    $query ="UPDATE `dv_user` SET `tong_ng` = '$ng_dk',`trang_thai`='$trang_thai'WHERE `id_pk_user` = '$id_pk_user';";
    $this->db->update($query);
  }
//   public function insert_DV($name,$diem_den,$gia,$tong_ng,$img_dv,$ngay_bd,$ngay_kt,$id_pk_loai,$noi_bd,$bv){
//     $name=$this->fm->validation($name);
//     $diem_den=$this->fm->validation($diem_den);
//     $noi_bd=$this->fm->validation($noi_bd);
//     $name =mysqli_real_escape_string($this->db->link, $name);
//     $diem_den =mysqli_real_escape_string($this->db->link, $diem_den);
//     $noi_bd =mysqli_real_escape_string($this->db->link, $noi_bd);
//     if(empty($name)||empty($diem_den)||empty($noi_bd)){
//       $alert="Lỗi";
//       return $alert;
//     }else{
//       $query ="INSERT INTO `dv` (`id_dv`, `id_pk_loai`, `name`, `gia`, `diem_den`, `bai_viet`, `ngay_bd`, `ngay_kt`, `luot_xem`, `img_dv`, `noi_bd`, `tong_ng`) VALUES (NULL, '$id_pk_loai', '$name', '$gia', '$diem_den', '$bv', '$ngay_bd', '$ngay_kt','0', '$img_dv', '$noi_bd', '$tong_ng');";
//       $this->db->insert($query);
//     }    
//   }
}



