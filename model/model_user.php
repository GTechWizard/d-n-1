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
  public function getAllUser(){ 
     $query ="SELECT * FROM user ";
    $result =$this->db->select($query);
    return $result;
  }
  public function get_one_User($id){
    $query ="SELECT * FROM `user` WHERE `id_user` = '$id'";
    $result =$this->db->select($query);
    return $result;
  }
  public function set_one_User($query){
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
  public function update_user($name, $sdt, $vai_tro, $dia_chi, $email, $id) {
    // Sử dụng câu lệnh truy vấn tham số hóa (prepared statement) để tăng tính bảo mật và hiệu suất
    $query = "UPDATE `user` SET `name` = '$name', `sdt` = '$sdt',`vai_tro`='$vai_tro', `dia_chi` = '$dia_chi', `email` = ' $email' WHERE `id_user` = '$id'";
    $this->db->update($query);
  }
  public function update_user_nd($name,$sdt,$dia_chi,$email,$id){
    $query ="UPDATE `user` SET `name` = '$name', `sdt`='$sdt',`dia_chi`='$dia_chi',`email`='$email' WHERE `id_user` = '$id';";
    $this->db->update($query);
  }
  // ai viết sao ko cho thực thi
  public function update_img($id,$new_img){
    $query="UPDATE `user` SET `img`='$new_img' WHERE `id_user`= '$id'";
    $this->db->update($query);
  }
  //  ai viết sao ko cho thực thi
  public function update_pass($id, $new_pass){
    $query="UPDATE `user` SET `pass`='$new_pass' WHERE `id_user` = '$id'";
    $this->db->update($query);
  }


  public function deletelike($iduser,$iddv){ 
    $query ="DELETE FROM like_dv WHERE like_dv.id_pk_user='$iduser' AND like_dv.id_pk_dv='$iddv'";
    $this->db->detele($query);
 }


  public function list_service_user($id){
    $query="SELECT * FROM `dv_user` WHERE `id_pk_user` = '$id'";
    // thực thi
    $result =$this->db->select($query);
    return $result;
  }
  public function name_service_user($id_pk_dv){
    $query="SELECT   dv.id_dv,dv.name,
    price_tour.day_end,
    price_tour.day_start,
    sl_ng_dk_user.so_luong_old,
    sl_ng_dk_user.so_luong_young,
    price_tour.price_old,
    price_tour.price_young,
    dv_user.trang_thai,dv_user.id_pk_user,dv_user.id_dv_user FROM
    dv JOIN price_tour ON price_tour.id_pk_dv = dv.id_dv JOIN
    sl_ng_dk_user ON sl_ng_dk_user.id_pk_price_tour = price_tour.id_price JOIN dv_user ON dv_user.id_pk_dv = dv.id_dv WHERE dv_user.id_dv_user= '$id_pk_dv'";
    $result =$this->db->select($query);
    return $result;
  }
  
  public function get_user_email($email){
    // = sai bằng là so sánh cả kiều và các dạng ký tự
    $query="SELECT * FROM `user` WHERE `user`.`email` LIKE '$email'";
    $result =$this->db->select($query);
    return $result;
  }
  public function get_user_email_pass($pass,$email){
    // = sai bằng là so sánh cả kiều và các dạng ký tự
    $query="SELECT * FROM `user` WHERE user.pass= $pass AND `user`.`email` LIKE '$email'";
    $result =$this->db->select($query);
    return $result;
  }
  public function sign_up($name, $img, $email, $pass, $locate, $num){
    $query="INSERT INTO `user` (.id_user,user.name,user.pass,user.sdt,user.dia_chi,user.email,user.img,user.vai_tro) VALUES (NULL,'$name','$pass','$num','$locate','$email','$img','')";
    $this->db->insert($query);
  }

}
?>



