<?php 
// model_sign_log bỏ đi
require_once('database.php');
require_once('format.php');

class user{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function getAllUser($query){
    $result =$this->db->select($query);
    return $result;
  }
  // $query ="SELECT * FROM user ";
    
  //it me hishiyamma
  public function get_one_User($id){
    $query ="SELECT * FROM user WHERE id_user = '$id'";
    $result =$this->db->select($query);
    return $result;
  }
  public function set_one_User($sql){
    $query = $sql;
    $result =$this->db->select($query);
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
  // ai viết sao ko cho thực thi
  public function update_img($id, $new_img){
    $sql ="UPDATE `user` SET `img`='$new_img' WHERE 'id_user'= '$id'";
  }
   // ai viết sao ko cho thực thi
  public function update_pass($id, $new_pass){
    $sql ="UPDATE `user` SET `pass`='$new_pass' WHERE 'id_user'= '$id'";
  }

  public function list_service_user($id){
    $sql ="SELECT * FROM `dv_user` WHERE 'id_user'= '$id'";
    // thực thi
    $result =$this->db->select($sql);
    return $result;
  }
  public function service_user($id){
    $sql ="SELECT * FROM `dv` WHERE 'id_dv'= '$id'";
    $result =$this->db->select($sql);
    return $result;
  }
  public function get_user_email($email){
    // = sai bằng là so sánh cả kiều và các dạng ký tự
    $sql ="SELECT * FROM `user` WHERE `user`.`email` LIKE '$email'";
    $result =$this->db->select($sql);
    return $result;
  }

}
?>



