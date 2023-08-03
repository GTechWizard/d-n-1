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
  public function insert_dv_user( $ngay_dkdv,$id_pk_dv,$nameuser,$email,$sdt,$price_young,$price_old,$id_pk_user,$id_pk_price_tour){
    $query1 = "INSERT INTO dv_user (dv_user.id_dv_user,dv_user.id_pk_dv,dv_user.id_pk_user,dv_user.trang_thai,dv_user.user_name,dv_user.user_sdt,dv_user.user_email,dv_user.ngay_dkdv) VALUES (NULL,'$id_pk_dv','$id_pk_user',0,'$nameuser','$sdt','$email','$ngay_dkdv')";
    $this->db->insert($query1);

    // Lấy id_pk_dv mới chèn vào bảng dv
    $id_pk_dv_user = mysqli_insert_id($this->db->link);

    // Chèn dữ liệu vào bảng price_tour
    $query2 = "INSERT INTO sl_ng_dk_user (sl_ng_dk_user.id_sl,sl_ng_dk_user.id_pk_dv_user,sl_ng_dk_user.id_pk_price_tour,sl_ng_dk_user.so_luong_old,sl_ng_dk_user.so_luong_young) VALUES (NULL,'$id_pk_dv_user','$id_pk_price_tour','$price_old','$price_young')";
    $this->db->insert($query2);
  }
}



