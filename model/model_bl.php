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
 public function insetcm($id_pk_dv,$nd,$ngay_bl,$danhgia,$name,$img)
 {
  $query = "INSERT INTO bl (id_pk_user, noi_dung, ngay_bl, danh_gia, name, img)
  SELECT user.name, user.img, bl.noi_dung, bl.danh_gia, bl.ngay_bl
  FROM bl
  JOIN user ON user.id_user = bl.id_pk_user
  WHERE bl.id_pk_dv = '$id_pk_dv' AND user.name = '$name' AND user.img = '$img' AND bl.ngay_bl = '$ngay_bl' AND bl.noi_dung = '$nd' AND bl.danh_gia = '$danhgia';";
  $result =$this->db->select($query);
  return $result;
 }
//   public function show_category(){
//     $query ="SELECT * FROM tbl_category order by cateID desc";
//     $result =$this->db->select($query);
//       return $result;
//   }
//   public function insert_category($cateName){
//     $cateName=$this->fm->validation($cateName);
//     $cateName =mysqli_real_escape_string($this->db->link, $cateName);
//     // kết nối cơ sở dữ liệu (cơ sở dữ liệu, dữ liệu)
//     if(empty($cateName)){
//       $alert="empty";
//       return $alert;
//     }else{
//       $query ="INSERT INTO tbl_category(cateName) VALUE ('$cateName')";
//       $result =$this->db->insert($query);
//       if($result){
//         $aleart="Successfully";
//         return $aleart;
//       }else{
//         $aleart=" Not Success";
//         return $aleart;
//       }
//     }
//   }
}



