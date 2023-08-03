<?php
session_start();
ob_start();
include "view/header.php";
require_once('model/model_user.php');
require_once('model/model_home.php');
require_once('model/model_dv_user.php');
require_once('model/model_tt.php');
require_once('model/model_dv.php');
require_once('model/model_loai.php');
require_once('model/model_bl.php');

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            // bình
        case 'chitiettour':
            if (isset($_GET['idsp']) && is_numeric($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id_dv = $_GET['idsp'];
                $getid = new dv;
                $getiddv = $getid->getDVID($id_dv);
                $getPriceDay = $getid->getContentPrice($id_dv);
                include "view/chitietproduct.php";
            } else {

                include "view/home.php";
            }
            break;
        case'dmsp':
            if (isset($_GET['iddm']) && is_numeric($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $getdm= new dv;
                $getall = new dv;
                $getname = new loai;
                $getnameid = $getname ->getiddm($iddm);
                $getallsp = $getall->getAllDV();
                $getloai = $getdm->loat_sanpham($iddm);
                


                include "view/view-control/chitiet.php";
            } else {

                include "view/home.php";
            }
            break;

        case'dattuor':
            $getid = new dv;
                $getPriceDay = $getid->getContentPrice($_GET['id_dv']);
                include 'view/card.php';
            break;
            
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

            // bill
            case 'bill':
                if(isset($_POST['get'])&&($_POST['get'])){
                    $ngay_dkdv = date('Y-m-d');
                    $id_pk_dv= $_POST['id_pk_dv'];
                    $nameuser= $_POST['nameuser'];
                    $diemden= $_POST['diemden'];
                    $email= $_POST['email'];
                    $sdt= $_POST['sdt'];
                    $price_young= $_POST['price_young'];
                    $price_old= $_POST['price_old'];
                    $id_pk_user= $_SESSION['id'];
                    $id_pk_price_tour= $_POST['id_pk_price_tour'];
                    $dv_user= new dvUser;
                    $dv_user-> insert_dv_user( $ngay_dkdv,$id_pk_dv,$nameuser,$email,$sdt,$price_young,$price_old,$id_pk_user,$id_pk_price_tour);
                include "view/bill.php";
                }
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
                            $_SESSION['sdt'] = $result['sdt'];
                            $_SESSION['img'] = $result['img'];
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
        // đăng xuất
        case 'logout':
            unset($_SESSION["id"], $_SESSION['id'], $_SESSION['name'], $_SESSION['pass'], $_SESSION['dia_chi'], $_SESSION['email'], $_SESSION['vai_tro'], $_SESSION['sdt'], $_SESSION['img']);
            header('location:?act=home');
            break;

            // đk
        case 'signup':
            if (isset($_POST['sign']) && $_POST['sign']) {
                $name = $_POST['user_sign'];
                $email = $_POST['email_sign'];
                $pass = $_POST['pass_sign'];
                $re_pass = $_POST['re_pass_sign'];
                $locate = $_POST['locate_sign'];
                $num = $_POST['num_phone_sign'];
                $user = new user;

                $target_dir = "uploads/";
                $target_file = $target_dir . date('HisadmY') . basename($_FILES["img"]["name"]);
                $uploadOk = 1;
                $ok = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Kiểm tra xem tệp có phải là ảnh hay không
                $check = getimagesize($_FILES["img"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $alert = "Không phải file ảnh, vui lòng chọn lại";
                    $uploadOk = 0;
                }
                if ($pass != $re_pass) $ok=0;

                // Kiểm tra xem có xảy ra lỗi khi tải lên tệp hay không
                if ($uploadOk == 0) {
                    $alert = "Đăng ảnh không thành công";
                }elseif($ok==0){
                    $alert = "Mật Khẩu xác nhận không trùng khớp";
                }else {
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    $user->sign_up($name, $target_file, $email, $pass, $locate, $num);
                    $alert = "Đăng ký thành công";
                }
                header('location:?act=dn');
                echo "<script>alert('$alert');</script>";
            }
            break;

        case 'user':
            include "view/user-kh.php";
            break;

        // thiếu là sai
        default:
            include "view/home.php";
            if (isset($_SESSION['id']) && $_SESSION['id'] != '')
                echo "<script>
                            alert('chào mừng " . $_SESSION['name'] . "');
                            </script>";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";