<?php 
require_once('database.php');
require_once('format.php');

class user{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllUser(){
    $query ="SELECT * FROM user ";
    $result =$this->db->select($query);
      return $result;
  }
  public function count_user(){
    $query ="SELECT COUNT(`user`.`id_user`) AS `count_user` FROM `user`";
    $result =$this->db->select($query);
      return $result;
  }
  public function getUserID($id){
    $query ="SELECT * FROM user WHERE id_user = '$id'";
    $result =$this->db->select($query);
      return $result;
  }
  public function delete_user($userID){
    $query ="DELETE FROM `user` WHERE `user`.`id_user` = '$userID'";
    $this->db->detele($query);
  }
  public function update_user($name,$sdt,$vai_tro,$dia_chi,$email,$id){
    $query ="UPDATE `user` SET `name` = '$name', `sdt`='$sdt',`vai_tro`='$vai_tro',`dia_chi`='$dia_chi',`email`='$email' WHERE `id_user` = '$id';";
    $this->db->update($query);
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



