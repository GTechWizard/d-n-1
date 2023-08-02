<?php
require_once('model/database.php');
require_once('model/format.php');

class log_sign{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }

  // it me hishiyamma
  public function get_one_User($sql){
    $query = $sql;
    //gửi câu lệnh sql để trả về mảng gồm id name email .... của user
    $result =$this->db->select($query);
    return $result;
  }

  public function set_one_User($sql){
    $query = $sql;
    $result =$this->db->select($query);
  }

  public function sign_log($email){
 
        //lấy mảng gồm id name email .... của user
        $sql = "SELECT * FROM `user` WHERE 'email'='$email'";
        $result = $this->db->select($sql);
        return $result;
  }
  // public function log2(){
  //   echo "<script>
  //           alert('(Đăng nhập thành công');
  //         </script>";
  // }
  // public $get_sign;
  // public function sign(){
  //   if(isset($_POST['sign']) && $_POST['sign'] == 'post'){
  //       $name = $_POST['user_sign'];
  //       $email = $_POST['email_sign'];
  //       $pass = $_POST['pass_sign'];
  //       $re_pass = $_POST['re_pass_sign'];
  //       $locate = $_POST['locate_sign'];
  //       $num_phone_sign = $_POST['pass_sign'];

  //       $sql = "SELECT * FROM `user` WHERE 'email'='$email'";
  //       $result = $this->db->select($sql);

  //       if(isset($result) && $result){
  //           echo "<script>
  //           alert('(Email đã tồn tại');
  //           </script>";
  //       }else if(($pass == $re_pass) &&  !$result){
  //           $this->get_sign->get_sign($name, $email, $pass, $locate, $num_phone_sign);
  //       }
  //   }
  // }

  // public function get_sign($name, $email, $pass, $locate, $num_phone_sign){
  //     $sql = "INSERT INTO `user`( `name`, `pass`, `sdt`, `dia_chi`, `email`, `vai_tro`) VALUES ('$name','$pass','$num_phone_sign','$locate','$email',0)";
  //     $this->get_one_User($sql);
  // }
}
// ---------------------------------------


// function re_sign(){
//   $sign = new log_sign();
//   $sign->sign();
// }

?>