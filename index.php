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
        case 'alldv':
            include "view/alldv.php";
            break;
        case 'alltt':
            include "view/alltt.php";
            break;

        case 'chitiettour':
            if (isset($_GET['idsp']) && is_numeric($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id_dv = $_GET['idsp'];
                $getid = new dv;
                $getid->update_lx_dv($id_dv);
                $getiddv = $getid->getDVID($id_dv);
                $getPriceDay = $getid->getContentPrice($id_dv);
                include "view/chitietproduct.php";
            } else {

                include "view/home.php";
            }
            break;
        case 'dmsp':
            if (isset($_GET['iddm']) && is_numeric($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $getdm = new dv;
                $getname = new loai;
                $sart = new comment;
                $getnameid = $getname->getiddm($iddm);
                $getloai = $getdm->loat_sanpham($iddm);
                include "view/view-control/chitiet.php";
            } else {

                include "view/home.php";
            }
            break;

        case 'dattuor':
            $getid = new dv;
            $getPriceDay = $getid->getContentPrice($_GET['id_dv']);
            include 'view/card.php';
            break;
        // tt
        case 'tt':
            include 'view/view-control/tintuc.php';
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
            // thực thi đăng nhập
            if (isset($_POST['log']) && $_POST['log']) {
                $email = $_POST['log_email'];
                $pass = $_POST['log_pass'];

                $logsign = new user;
                $log = $logsign->get_user_email_pass($pass,$email);
                if (isset($log) && $log) {
                    // important!! fetch_assoc quét object
                    $result = $log->fetch_assoc();
                    if ($result) {
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
                            echo "<script>
                                alert('Mật khẩu không đúng');
                              </script>";

                        }
                    }

                } else {
                    echo "<script>
                            alert('Tài khoản không tồn tại');
                        </script>";
                }
            }

            // đk

            if (isset($_POST['sign']) && $_POST['sign']) {
                $name = $_POST['user_sign'];
                $email = $_POST['email_sign'];
                $pass = $_POST['pass_sign'];
                $re_pass = $_POST['re_pass_sign'];
                $locate = $_POST['locate_sign'];
                $num = $_POST['num_phone_sign'];

                $user = new user;
                $sign = $user->get_user_email($email);
                if (isset($sign) && $sign) {
                    echo "<script>alert('Email đã tồn tại');</script>";
                } else {
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
                    if ($pass != $re_pass)
                        $ok = 0;

                    // Kiểm tra xem có xảy ra lỗi khi tải lên tệp hay không
                    if ($uploadOk == 0) {
                        $alert = "Đăng ảnh không thành công";
                    } elseif ($ok == 0) {
                        $alert = "Mật Khẩu xác nhận không trùng khớp";
                    } else {
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        $user->sign_up($name, $target_file, $email, $pass, $locate, $num);
                        $alert = "Đăng ký thành công";
                    }
                    header('location:?act=dn');
                    echo "<script>alert('$alert');</script>";
                }
            }
            break;

        // đăng xuất
        case 'logout':
            unset($_SESSION["id"], $_SESSION['id'], $_SESSION['name'], $_SESSION['pass'], $_SESSION['dia_chi'], $_SESSION['email'], $_SESSION['vai_tro'], $_SESSION['sdt'], $_SESSION['img']);
            header('location:?act=home');
            break;

        // bill
        case 'bill':
            if (isset($_POST['get']) && ($_POST['get'])) {
                $ngay_dkdv = date('Y-m-d');
                $id_pk_dv = $_POST['id_pk_dv'];
                $nameuser = $_POST['nameuser'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $price_young = $_POST['price_young'];
                $price_old = $_POST['price_old'];
                $id_pk_user = $_SESSION['id'];
                $id_pk_price_tour = $_POST['id_pk_price_tour'];
                $dv_user = new dvUser;
                $dv_user->insert_dv_user($ngay_dkdv, $id_pk_dv, $nameuser, $email, $sdt, $price_young, $price_old, $id_pk_user, $id_pk_price_tour);
                include "view/bill.php";
            }
            break;
        case 'chitietbill':
            if (isset($_GET['id']) && isset($_GET['iddvu'])) {
                $id_user = $_GET['id'];
                $id_dv_user = $_GET['iddvu'];
                header('location:view/user/billafter.php?act=chitiet&idu='.$id_user.'&idvu='.$id_dv_user.'');
            }
            break;


        case 'user':
            include('view/user-kh.php');
            //ảnh mới
            if (isset($_POST['save_img']) && $_POST['save_img']) {
                $id = $_SESSION['id'];
                extract($_POST);
                $target_dir = "uploads/";
                $target_name = basename($_FILES["img"]["name"]);
                $target_file = $target_dir . date('HisadmY') . basename($_FILES["img"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Kiểm tra xem tệp có phải là ảnh hay không
                if ($target_name != "") {
                    $check = getimagesize($_FILES["img"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $alert = "không phải file ảnh, vui lòng chọn lại";
                        $uploadOk = 0;
                    }
                }
                // Cho phép chỉ tải lên các định dạng ảnh nhất định
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $alert = "chỉ cho phép ảnh có đuôi JPG, JPEG, PNG & GIF";
                    $uploadOk = 0;
                }
                // Kiểm tra xem có xảy ra lỗi khi tải lên tệp hay không
                if ($uploadOk == 0) {
                    $alert = "đăng ảnh không thành công";
                } else {
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                }
                $conn = new user;
                $user = $conn->update_img($id, $target_file);
                $_SESSION['img'] = $target_file;
                if (isset($alert) && $alert != "")
                    echo "<script>alert('$alert');</script>";
                include('view/user-kh.php');
                header('location:?act=user&cn=hsct');
            }

            //pass mới
            if (isset($_POST['update_pass']) && $_POST['update_pass']) {
                //kiểm tra mật khẩu cũ
                $user_pass = $_SESSION['pass'];
                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $re_new_pass = $_POST['re_new_pass'];
                if ($user_pass != $old_pass) {
                    echo "<script>
                    alert('Mật khẩu không đúng');
                  </script>";
                    header('Location: ?act=user&cn=change_mk');
                    exit;
                } else {
                    if ($new_pass != $re_new_pass) {
                        echo "<script>
                              alert('Xác nhận mật khẩu mới không đúng');
                          </script>";
                        header('Location: ?act=user&cn=change_mk');
                        exit;
                    } else {
                        $id = $_SESSION['id'];
                        $conn = new user;
                        $conn->update_pass($id, $new_pass);
                        $_SESSION['pass'] = $new_pass;
                        header('Location: ?act=user&cn=hsct');
                        exit;
                    }
                }
            }
            //update infor
            if (isset($_POST['up_infor']) && $_POST['up_infor']) {
                //kiểm tra mật khẩu cũ
                $user_pass = $_SESSION['pass'];
                $name = $_POST['up_name'];
                $check_pass = $_POST['up_pass'];
                $sdt = $_POST['up_num'];
                $dia_chi = $_POST['up_locate'];
                $email = $_POST['up_email'];
                if ($check_pass != $user_pass) {
                    echo "<script>
                            alert('Mật khẩu không đúng');
                        </script>";
                } else {
                    $conn = new user;
                    $id = $_SESSION['id'];
                    // Kiểm tra và xử lý biến name
                    $nameok = $name != '' ? $name : $_SESSION['username'];

                    // Kiểm tra và xử lý biến sdt
                    $sdtok = $sdt != '' ? $sdt : $_SESSION['sdt'];

                    // Kiểm tra và xử lý biến dia_chi
                    $dia_chiok = $dia_chi != '' ? $dia_chi : $_SESSION['dia_chi'];

                    // Kiểm tra và xử lý biến email
                    $emailok = $email != '' ? $email : $_SESSION['email'];
                    $conn->update_user_nd($nameok, $sdtok, $dia_chiok, $emailok, $id);

                }
                $up = $conn->get_one_User($id);
                $back_result = $up->fetch_assoc();
                $_SESSION['name'] = $back_result['name'];
                $_SESSION['pass'] = $back_result['pass'];
                $_SESSION['dia_chi'] = $back_result['dia_chi'];
                $_SESSION['email'] = $back_result['email'];
                $_SESSION['sdt'] = $back_result['sdt'];
                header('location:?act=user&cn=hsct');
            }

            if (isset($_POST['pass']) && $_POST['pass']) {
                $user_pass = $_SESSION['pass'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                if ($email != $_SESSION['email'] && $sdt != $_SESSION['sdt']) {
                    header('location:?act=user&cn=qmk&k098hsjuannkiy');
                } else {
                    header('location:?act=user&cn=qmk&mzxcnmjhdajsiwdnn');
                }
            }
            break;
        case 'unlike':
            if (isset($_GET['id']) && $_GET['id']) {
                $iddv = $_GET['id'];
                $iduser = $_SESSION['id'];
                $user = new user;
                $user->deletelike($iduser, $iddv);
            }
            header('location:?act=user&cn=dvl');
            break;

        // form tìm nahnh
        case 'findfast':
            if (isset($_POST['find']) && $_POST['find']) {
                $day_start = $_POST['day_start'];
                $day_end = $_POST['day_end'];
                $price = $_POST['price'];
                $noi_di = $_POST['noi_di'];
                $diem_den = $_POST['diem_den'];
                $dv = new dv;
                $list = $dv->findfast($day_start, $day_end, $price, $noi_di, $diem_den);
                include('view/findfast.php');
            }

            break;
        case 'bl':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $td = $_POST['title'];
                $id_pk_dv = $_POST['id_dv'];
                $id_pk_user = $_SESSION['id'];
                $nd = $_POST['description'];
                $ngay_bl = date('d-m-Y');
                $danhgia = $_POST['rating'];
                $bl = new comment;
                $bl->insetcm($id_pk_dv, $id_pk_user, $td, $nd, $ngay_bl, $danhgia);
                header("location:?act=chitiettour&idsp=$id_pk_dv");
            }


            break;
        case 'like':
            if (isset($_GET['iduser']) && isset($_GET['iddv']) && $_GET['iddv'] != '' && $_GET['iduser'] != '') {
                $iduser = $_GET['iduser'];
                $iddv = $_GET['iddv'];
                $like = new dv;
                $like->like($iduser, $iddv);
                header("location:?act=chitiettour&idsp=$iddv");
            } else {
                include "view/view-control/formdk.php";
                echo "<script>
                            alert('Vui lòng đăng nhập');
                        </script>";
            }
            break;


        // thiếu là sai
        default:
            include "view/home.php";
            if (isset($_SESSION['id']) && $_SESSION['id'] != '')
                echo "<script>
                            alert('chào mừng " . $_SESSION['name'] . "');
                            </script>";
            $date = $date = date('d-m-Y');
            $home = new home;
            $home->luotxem($date);
            break;
    }
} else {
    include "view/home.php";
    $date = $date = date('Y-m-d');
    $home = new home;
    $home->luotxem($date);
}
include "view/footer.php";