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
    $query ="SELECT price_tour.id_price,dv.noi_bd, dv.diem_den,dv_user.id_pk_dv, dv_user.user_name, price_tour.day_start, price_tour.day_end, dv.tong_ng, SUM(sl_ng_dk_user.so_luong) AS so_luong, price_tour.trang_thai, price_tour.type_ng, dv.tag FROM dv_user JOIN sl_ng_dk_user ON dv_user.id_dv_user = sl_ng_dk_user.id_pk_dv_user JOIN price_tour ON price_tour.id_price = sl_ng_dk_user.id_pk_price_tour JOIN dv ON dv.id_dv = dv_user.id_pk_dv GROUP BY dv.tong_ng";
    $result =$this->db->select($query);
      return $result;
  }
  public function getDVUserID($id_dv){
    $query ="SELECT sl_ng_dk_user.so_luong,price_tour.type_ng, user.id_user, user.name, user.sdt, user.dia_chi, user.email,dv_user.ngay_dkdv, price_tour.trang_thai, user.vai_tro FROM dv_user JOIN sl_ng_dk_user ON dv_user.id_dv_user = sl_ng_dk_user.id_pk_dv_user JOIN price_tour ON price_tour.id_price = sl_ng_dk_user.id_pk_price_tour JOIN dv ON dv.id_dv = dv_user.id_pk_dv JOIN user ON user.id_user = dv_user.id_pk_user WHERE dv.id_dv='$id_dv'";
    $result =$this->db->select($query);
      return $result;
  }
  public function gettrang_thai($id){
    $query ="SELECT * FROM price_tour WHERE price_tour.id_price ='$id'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_DVUser($id_dv_act){
    $query ="DELETE FROM dv_user WHERE dv_user.id_pk_dv='$id_dv_act';";
    $this->db->detele($query);
  }
  public function updateDVUser($trang_thai,$id_price){
    $query ="UPDATE `price_tour` SET `trang_thai` = '$trang_thai' WHERE `price_tour`.`id_price` = '$id_price';";
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



