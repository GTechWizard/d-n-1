<?php
session_start();
include "view/header.php";
include "model/model_tt.php";
include "model/model_user.php";
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'ct_tt':
            if (isset($_GET['id']) && ($_GET['id'] != '')) {
                $id = $_GET['id'];
                $tt = new tt;
                $ttID = $tt->getTTID($id);
            }
            include "view/chitiettt.php";
            break;

        // nhấn vào đăng nhập
        case 'dn':
            include "view/view-control/formdk.php";
            break;

        // thực thi đăng nhập
        case 'login':
            if (isset($_POST['log']) && $_POST['log']) {
                $email = $_POST['log_email'];
                $pass = $_POST['log_pass'];

                $logsign = new user;
                $log = $logsign->get_user_email($email);
                if (isset($log) && $log) {
                    // important!! fetch_assoc quét object
                    while ($result = $log->fetch_assoc()) {
                        if ($pass == $result['pass']) {
                            // xét session
                            $_SESSION['id'] = $result['id_user'];
                            $_SESSION['name'] = $result['name'];
                            $_SESSION['pass'] = $result['pass'];
                            $_SESSION['dia_chi'] = $result['dia_chi'];
                            $_SESSION['email'] = $result['email'];
                            $_SESSION['vai_tro'] = $result['vai_tro'];
                            header('location:?act=home');
                        } else {
                              header('location:?act=dn');
                            echo "<script>
                                alert('Email hoặc mật khẩu không đúng');
                              </script>";
                        }
                    }

                }
            }
            break;
            case 'signup':
                if(isset($_POST['sign']) && $_POST['sign']){
                    $name = $_POST['user_sign'];
                    $email = $_POST['emal_sign'];
                    $pass = $_POST['pass_sign'];
                    $re_pass = $_POST['re_pass_sign'];
                    $locate = $_POST['locate_sign'];
                    $num = $_POST['num_phone_sign'];
    
    
                    $logsign= new log_sign;
                    $sign = $logsign->sign_log($email);
                      if(isset($log) && $log == false){
                        if($pass != $re_pass){
                          echo "<script>
                                  alert('Mật Khẩu xác nhận không trung khớp');
                                </script>";
                        }else{
                          $sql ="INSERT INTO `user`( `name`, `pass`, `sdt`, `dia_chi`, `email`, `img`, `vai_tro`) VALUES ('$name','$pass','$num','$locate','$email','./img/user.png','0'";
                          $logsign->set_one_User($sql);
                        }
                      }else{
                        echo "<script>
                                alert('ko lấy đc db');
                              </script>";
                      }
    
                  }else{               
                    echo "<script>
                          alert('ko có post sign');
                      </script>";
                  }
                  // print_r("<script>
                    //     alert(''.$log.'');
                    //   </script>") ;
                    // }
                break;
        case 'user':
            include "view/user-kh.php";
            break;

            // thiếu là sai
            default: 
            include "view/home.php"; 
            if(isset($_SESSION['id'])&&$_SESSION['id']!='')
                echo "<script>
                            alert('chào mừng " . $_SESSION['name']."');
                            </script>";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";