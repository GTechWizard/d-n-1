<?php 
//thử nếu có seesion user
//$_SESSION['user'] = Array ( ["id_user"] => 1 ["name"] => "John" ["pass"] => "john123" ["dia_chi"] => "Hanoi VN" ["email"] => "johnexample.com" ["img"] => "./img/user.png" ["vai_tro"] => 0);
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
  public function update_img($id, $new_img){
    $sql ="UPDATE `user` SET `img`='$new_img' WHERE 'id_user'= '$id'";
  }
  public function update_pass($id, $new_pass){
    $sql ="UPDATE `user` SET `pass`='$new_pass' WHERE 'id_user'= '$id'";
  }

  public function list_service_user($id){
    $sql ="SELECT * FROM `dv_user` WHERE 'id_user'= '$id'";
    $result =$this->db->select($sql);
    return $result;
  }
  public function service_user($id){
    $sql ="SELECT * FROM `dv` WHERE 'id_dv'= '$id'";
    $result =$this->db->select($sql);
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

// function user_infor(){
//   $user = $_SESSION['user'];
//   echo '<label for="">
//           <p>Tên đăng nhập</p>
//           <em>'.$user['name'].'</em>
//         </label>
//         <label for="">
//           <p>Email</p>
//           <em>'.$user['email'].'</em>
//         </label>
//         <label for="">
//           <p>Số điện thoại</p>
//           <em>'.$user['sdt'].'</em>
//         </label>
//         <label for="">
//           <p>Địa chỉ</p>
//           <em>'.$user['dia_chi'].'</em>
//         </label>';
// }
// function user_img(){
//   $user=$_SESSION['user'];
//   if(isset($user['img']) && $user['img']){
//     echo $user['img'];
//   }else{
//     echo'./img/user.png';
//   }
// }
// function save_img(){
//   if(isset($_POST['save']) && $_POST['save']=='lưu'){
//     $new_img = $_POST['user_img'];
//     $id = $_SESSION['user']['id_user'];
//     $conn = new user();
//     $sql = "UPDATE `user` SET `img`='$new_img' WHERE 'id_user' = '$id'";
//     $up = $conn->get_one_User($sql);
//     $_SESSION['user']['img'] = $new_img;
//   }
// }
// function up_pass(){
//   $check = $_POST['up_pass'];
//   $old = $_POST['old_pass'];
//   $new = $_POST['new_pass'];
//   $re_new = $_POST['re_new_pass'];
//   $id = $_SESSION['user']['id_user'];

//   if(isset($check) && $check =='lưu'){
//     $pass = $_SESSION['user']['pass'];
//     if($old != $pass){
//       echo "<script>
//                 alert('Sai mật khẩu');
//               </script>";
//     }elseif($new != $re_new){
//       echo "<script>
//                 alert('mật khẩu mới không trùng khớp');
//               </script>";
//     }else{
//       $conn = new user();
//       $sql = "UPDATE `user` SET `pass`='$new' WHERE 'id_user' = '$id'";
//       $up = $conn->get_one_User($sql);
//       $_SESSION['user']['pass'] = $new;
//     }
//   }
// }

// function up_infor(){
//   $email = $_SESSION['user']['email'];
//   $pass = $_SESSION['user']['pass'];
//   $id = $_SESSION['user']['id_user'];
//   echo '$email';
//   if(isset($_POST['up']) && $_POST['up'] == 'lưu'){
//     if($_POST['up_pass'] != $pass){
//       echo "<script>
//                 alert('Sai mật khẩu');
//               </script>";
//     }else{
//     $new_name = $_POST['up_name'];
//     $new_num = $_POST['up_num'];
//     $new_locate = $_POST['up_locate'];
//     $conn = new user();
//     $sql = "UPDATE `user` SET `name`='$new_name', `sdt`='$new_num', 'dia_diem`='$new_locate' WHERE 'id_user' = '$id'";
//     $up = $conn->get_one_User($sql);
//     $_SESSION['user']['name'] = $new_name;
//     $_SESSION['user']['sdt'] = $new_num;
//     $_SESSION['user']['dia_diem'] = $new_locate;
//     }
//   }
// }

// function service_sup(){
//   $id = $_SESSION['user']['id_user'];
//   $conn = new user();
//   $sql = "SELECT * FROM `dv_user` WHERE 'id_pk_user'='$id'";
//   $result = $conn->get_one_User($sql);
//   foreach($result as $index => $service){
//     $id_ser = $service['id_pk_dv'];
//     $sql = "SELECT * FROM `dv` WHERE 'id_dv'='$id_ser'";
//     $result_part2 = $conn->get_one_User($sql);
//     echo '<ul class="uldvtd">
//           <li>'.($index+1).'</li>
//           <li>'.$result_part2['name'].'</li>
//           <li><img src="'.$result_part2['img_dv'].'" alt="" /></li>
//           <li>12/02/1212</li>
//           <li>12</li>
//           <li>chưa đi</li>
//           <li><a href="#">chi tiết</a></li>
//       </ul>';
//   }
// }
?>



