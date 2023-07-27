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
    $query ="SELECT * FROM `dv` JOIN `loai` ON `dv`.`id_pk_loai` = `loai`.`id_loai` JOIN price_tour ON `price_tour`.`id_pk_dv` = `dv`.`id_dv`;";
    $result =$this->db->select($query);
      return $result;
  }
  public function count_dv(){
    $query ="SELECT COUNT(`dv`.`id_dv`) AS `count_dv` FROM `dv`";
    $result =$this->db->select($query);
      return $result;
  }
  public function getDVID($id_dv){
    $query ="SELECT * FROM `dv` LEFT JOIN `loai` ON `dv`.`id_pk_loai` = `loai`.`id_loai` JOIN price_tour ON price_tour.id_pk_dv = dv.id_dv WHERE id_dv = '$id_dv';";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_DV($id_dv){
    $query ="DELETE FROM `dv` WHERE `dv`.`id_dv` = '$id_dv'";
    $this->db->detele($query);
  }
  public function update_DV($name, $noi_bd, $diem_den, $price_old, $price_young, $day_start, $day_end, $id_pk_loai, $tong_ng,$img_dv, $bv, $id_dv){
    if($img_dv=''){
        $query ="UPDATE dv JOIN price_tour ON dv.id_dv = price_tour.id_pk_dv SET dv.name='$name',dv.noi_bd='$noi_bd',dv.diem_den='$diem_den',price_tour.price_old='$price_old',price_tour.price_young='$price_young',price_tour.day_start='$day_start',price_tour.day_end='$day_end',dv.id_pk_loai='$id_pk_loai',dv.tong_ng='$tong_ng',dv.bai_viet='$bv' WHERE `id_dv` = '$id_dv';";
    $this->db->update($query);
    }else{
      $query ="UPDATE dv JOIN price_tour ON dv.id_dv = price_tour.id_pk_dv SET dv.name='$name',dv.noi_bd='$noi_bd',dv.diem_den='$diem_den',price_tour.price_old='$price_old',price_tour.price_young='$price_young',price_tour.day_start='$day_start',price_tour.day_end='$day_end',dv.id_pk_loai='$id_pk_loai',dv.tong_ng='$tong_ng',dv.img_dv='$img_dv',dv.bai_viet='$bv' WHERE `id_dv` = '$id_dv';";
    $this->db->update($query);
    }
  }

  public function insert_DV($name, $noi_bd, $diem_den, $price_old, $price_young, $day_start, $day_end, $id_pk_loai, $tong_ng, $target_file, $bv) {
    $name = $this->fm->validation($name);
    $noi_bd = $this->fm->validation($noi_bd);
    $diem_den = $this->fm->validation($diem_den);
    $name = mysqli_real_escape_string($this->db->link, $name);
    $noi_bd = mysqli_real_escape_string($this->db->link, $noi_bd);
    $diem_den = mysqli_real_escape_string($this->db->link, $diem_den);
    if (empty($name) || empty($diem_den) || empty($noi_bd)) {
        $alert = "Lỗi";
        return $alert;
    } else {
        // Chèn dữ liệu vào bảng dv
        $query1 = "INSERT INTO dv (id_pk_loai, name, diem_den, bai_viet, luot_xem, img_dv, noi_bd, tong_ng) VALUES ('$id_pk_loai', '$name', '$diem_den', '$bv', 0, '$target_file', '$noi_bd', '$tong_ng')";
        $this->db->insert($query1);

        // Lấy id_pk_dv mới chèn vào bảng dv
        $id_pk_dv = mysqli_insert_id($this->db->link);

        // Chèn dữ liệu vào bảng price_tour
        $query2 = "INSERT INTO price_tour (id_pk_dv, day_end, day_start, price_young, price_old) VALUES ('$id_pk_dv', '$day_end', '$day_start', '$price_young', '$price_old')";
        $this->db->insert($query2);
    }   
}
}



