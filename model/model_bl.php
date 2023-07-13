<?php 
require_once('../lib/database.php');
require_once('../lib/format.php');

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
  public function delete_comment($blID){
    $query ="DELETE FROM `bl` WHERE `bl`.`id_bl` = '$blID'";
    $this->db->detele($query);
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



