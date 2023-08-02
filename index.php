<?php
session_start();
 include "view/header.php";
 include "model/model_tt.php";
 include "model/model_sign_log.php";
 include "model/model_user.php";
 if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
     $act = $_GET['act'];
     switch ($act) {
         case 'ct_tt':
            if(isset($_GET['id'])&&($_GET['id']!='')){
                $id=$_GET['id'];
                $tt = new tt;
                $ttID=$tt->getTTID($id); 
            }
             include "view/chitiettt.php";  
             break;
         case 'dn':
          include "view/view-control/formdk.php";
            // if(isset($_POST['log']) && $_POST['log']){
            //         $email = $_POST['log_email'];
            //         $pass = $_POST['log_pass'];

            //     $logsign= new log_sign;
            //     $log=$logsign->log($email);

            //     print_r("<script>
            //             alert(''.$log.'');
            //           </script>") ;
            //     if(isset($log) && $log){
            //         if($pass == $log['pass']){
            //           $_SESSION['user']= $log;
            //           include "view/home.php";
            //           echo "<script>
            //           alert('(Đăng nhập thành công');
            //           </script>";
            //         }else{
            //         echo "<script>
            //               alert('Email hoặc mật khẩu không đúng');
            //             </script>";
            //         }
            //       }else{
            //         print_r("<script>
            //             alert(''.$log.'');
            //           </script>") ;
            //   }
            // }
            
            break;
        case 'user':
          include "view/user-kh.php";
     }
 }  
 else {
     include "view/home.php";
 }

 include "view/footer.php";
 
