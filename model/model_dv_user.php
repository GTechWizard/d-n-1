<?php 
require_once('database.php');
require_once('format.php');

class dvUser{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllDVUser(){
    $query ="SELECT dv.noi_bd, dv.diem_den,dv_user.id_pk_dv,dv_user.id_dv_user, dv_user.user_name, price_tour.day_start, price_tour.day_end, dv.tong_ng, sl_ng_dk_user.so_luong_old,sl_ng_dk_user.so_luong_young, dv_user.trang_thai FROM dv_user JOIN sl_ng_dk_user ON dv_user.id_dv_user = sl_ng_dk_user.id_pk_dv_user JOIN price_tour ON price_tour.id_price = sl_ng_dk_user.id_pk_price_tour JOIN dv ON dv.id_dv = dv_user.id_pk_dv GROUP BY dv.tong_ng;";
    $result =$this->db->select($query);
      return $result;
  }
  public function getDVUserID($id_dv){
    $query ="SELECT dv.noi_bd, dv.diem_den,dv_user.id_pk_dv,dv_user.user_sdt, dv_user.user_email, dv_user.user_name,dv_user.ngay_dkdv, price_tour.day_start, price_tour.day_end, dv.tong_ng, sl_ng_dk_user.so_luong_old,sl_ng_dk_user.so_luong_young, dv_user.trang_thai FROM dv_user JOIN sl_ng_dk_user ON dv_user.id_dv_user = sl_ng_dk_user.id_pk_dv_user JOIN price_tour ON price_tour.id_price = sl_ng_dk_user.id_pk_price_tour JOIN dv ON dv.id_dv = dv_user.id_pk_dv WHERE dv.id_dv='$id_dv'";
    $result =$this->db->select($query);
      return $result;
  }
  public function gettrang_thai($id){
    $query ="SELECT * FROM dv_user WHERE dv_user.id_dv_user ='$id'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_DVUser($id_dv_act){
    $query ="DELETE FROM dv_user WHERE dv_user.id_pk_dv='$id_dv_act';";
    $this->db->detele($query);
  }
  public function updateDVUser($trang_thai,$id_dv_user){
    $query ="UPDATE `dv_user` SET `trang_thai` = '$trang_thai' WHERE `dv_user`.`id_dv_user` = '$id_dv_user';";
    $this->db->update($query);
  }

}



