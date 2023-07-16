<?php
ob_start();
require_once('../model/model_user.php');
require_once('../model/model_dv_user.php');
require_once('../model/model_tt.php');
require_once('../model/model_dv.php');
require_once('../model/model_loai.php');
require_once('../model/model_bl.php');
require_once('view/header.php');
require_once('view/menu.php');

if (isset($_GET['act']) && $_GET['act']) {
	$act = $_GET['act'];
	switch ($act) {
		case 'user':
			include('user/user.php');
			break;
		case 'delete_user':
			$id = $_GET['id'];
			$user = new user;
			$user->delete_user($id);
			header('location:?act=user');
			break;
		case 'edit_user':
			if (isset($_GET['id']) && $_GET['id']) {
				$id = $_GET['id'];
				$user = new user;
				$userID = $user->getUserID($id);
				include('user/change_user.php');
			} else {
				die();
			}
			break;
		case 'update_user':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$user = new user;
				$user->update_user($name, $sdt, $vai_tro, $dia_chi, $email, $id);
			}
			header('location:?act=user');
			break;
		case 'comment':
			include('bl/comments.php');
			break;
		case 'delete_comment':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_bl = $_GET['id'];
				$bl = new comment;
				$bl->delete_comment($id_bl);
			} else {
				die();
			}
			header('location:?act=comment');
			break;
		case 'loai':
			include('dv_ldv/ldv/ldv.php');
			break;
		case 'add_loai':
			include('dv_ldv/ldv/add_ldv.php');
			break;
		case 'delete_loai':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_loai = $_GET['id'];
				$loai = new loai;
				$loai->delete_loai($id_loai);
			}
			header('location:?act=loai');
			break;
		case 'edit_loai':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_loai = $_GET['id'];
				$loai = new loai;
				$loaiID = $loai->getLoaiID($id_loai);
				include('dv_ldv/ldv/change_ldv.php');
			}
			break;
		case 'update_loai':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$target_dir = "../uploads/";
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
					$alert = "ảnh up không thành công";
				} else {
					move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
				}

				$loai = new loai;
				if ($target_name == "") {
					$loai->update_loai($kieu_dv, "", $id_loai);
					if (isset($alert) && $alert != "")
						echo "<script>alert('$alert');</script>";
					header('location:?act=loai');
				} else {
					$loai->update_loai($kieu_dv, $target_file, $id_loai);
					if (isset($alert) && $alert != "")
						echo "<script>alert('$alert');</script>";
					header('location:?act=loai');
				}
			}
			break;
		case 'loai_new':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$target_dir = "../uploads/";
				$target_file = $target_dir . date('HisadmY') . basename($_FILES["img"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				// Kiểm tra xem tệp có phải là ảnh hay không
				$check = getimagesize($_FILES["img"]["tmp_name"]);
				if ($check !== false) {
					$uploadOk = 1;
				} else {
					$alert = "không phải file ảnh, vui lòng chọn lại";
					$uploadOk = 0;
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
					$alert = "ảnh up không thành công";
				} else {
					move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
				}

				$loai = new loai;
				$loai->insert_loai($kieu_dv, $target_file);
				if (isset($alert) && $alert != "")
					echo "<script>alert('$alert');</script>";
				header('location:?act=loai');
			}
			break;
		case 'dv':
			include('dv_ldv/dv/dv.php');
			break;

		case 'add_dv':
			$loai = new loai;
			$dsl = $loai->getAllLoai();
			include('dv_ldv/dv/add_dv.php');
			break;

		case 'dv_new':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$target_dir = "../uploads/";
				$target_name = basename($_FILES["img_dv"]["name"]);
				$target_file = $target_dir . date('HisadmY') . basename($_FILES["img_dv"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				// Kiểm tra xem tệp có phải là ảnh hay không
				if ($target_name != "") {
					$check = getimagesize($_FILES["img_dv"]["tmp_name"]);
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
					move_uploaded_file($_FILES["img_dv"]["tmp_name"], $target_file);
				}
				$dv = new dv;
				$dv->insert_DV($name, $diem_den, $gia, $tong_ng, $target_file, $ngay_bd, $ngay_kt, $id_pk_loai, $noi_bd, $bai_viet);
				if (isset($alert) && $alert != "")
					echo "<script>alert('$alert');</script>";
				header('location:?act=dv');
			}
			break;

		case 'delete_dv':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_dv = $_GET['id'];
				$dv = new dv;
				$dv->delete_DV($id_dv);
				header("Location:?act=dv");
			}
			break;
		case 'ctbv_dv':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_dv = $_GET['id'];
				$dv = new dv;
				$data = $dv->getDVID($id_dv);
				include('dv_ldv/dv/ctbv_dv.php');
			}
			break;
		case 'edit_dv':
			if (isset($_GET['id']) && $_GET['id']) {
				$id = $_GET['id'];
				$dv = new dv;
				$dvID = $dv->getDVID($id);
				$loai = new loai;
				$dsl = $loai->getAllLoai();
				include('dv_ldv/dv/change_dv.php');
			}
			break;
		case 'update_dv':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$target_dir = "../uploads/";
				$target_name = basename($_FILES["img_dv"]["name"]);
				$target_file = $target_dir . date('HisadmY') . basename($_FILES["img_dv"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				// Kiểm tra xem tệp có phải là ảnh hay không
				if ($target_name != "") {
					$check = getimagesize($_FILES["img_dv"]["tmp_name"]);
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
					move_uploaded_file($_FILES["img_dv"]["tmp_name"], $target_file);
				}

				$dv = new dv;
				if ($target_name == "") {
					$dv->update_DV($name, $diem_den, $gia, $tong_ng, "", $ngay_bd, $ngay_kt, $id_pk_loai, $noi_bd, $bv, $id_dv);
					if (isset($alert) && $alert != "")
						echo "<script>alert('$alert');</script>";
					header('location:?act=dv');
				} else {
					$dv->update_DV($name, $diem_den, $gia, $tong_ng, $target_file, $ngay_bd, $ngay_kt, $id_pk_loai, $noi_bd, $bv, $id_dv);
					if (isset($alert) && $alert != "")
						echo "<script>alert('$alert');</script>";
					header('location:?act=dv');
				}
			}
			break;
		case 'tt':
			$tt = new tt;
			$tts = $tt->getAllTT();
			include('tt/news.php');
			break;
		case 'add_tt':
			include('tt/add_news.php');
			break;
		case 'add_news':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$target_dir = "../uploads/";
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
				$tt = new tt;
					$tt->insert_TT($bai_viet, $name, $mo_ta, $dia_diem, $tac_gia, $target_file, $ngay_d);
					if (isset($alert) && $alert != "") {
						echo "<script>alert('$alert');</script>";
				}
						header('location:?act=tt');
			}
			break;
		case 'edit_tt':
			if (isset($_GET['id'])&&$_GET['id']!='') {
				$id = $_GET['id'];
				$tt = new tt;
				$ttID=$tt->getTTID($id);
				include('tt/change_news.php');
			}
			break;
		case 'update_tt':
			// Lỗi ảnh
			if(isset($_POST['save'])&&($_POST['save'])){
				extract($_POST);
			$target_dir = "../uploads/";
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

				$tt = new tt;
				if ($target_name == "") {
					$tt->update_TT($bai_viet,$name,$mo_ta,$dia_diem,$tac_gia,'',$ngay_d,$id_tt);
					if (isset($alert) && $alert != "")
						echo "<script>alert('$alert');</script>";
				} else {
					$tt->update_TT($bai_viet,$name,$mo_ta,$dia_diem,$tac_gia,$target_file,$ngay_d,$id_tt);
					if (isset($alert) && $alert != "") {
						echo "<script>alert('$alert');</script>";
					}
				}
				header('location:?act=tt');
			}
			break;
		case 'delete_tt':
			if (isset($_GET['id'])&&$_GET['id']!='') {
				$id = $_GET['id'];
				$tt = new tt;
				$ttID=$tt->delete_TT($id);
				header('location:?act=tt');
			}
			break;

		case 'bai_viet_tt':
			if (isset($_GET['id'])&&$_GET['id']!='') {
				$id = $_GET['id'];
				$tt = new tt;
				$data=$tt->getTTID($id);
				include('tt/bv_tt.php');
			}
			break;

		case 'dv_act':
			$dvUser = new dvUser;
            $dvUserList=$dvUser->getAllDVUser();
				include('dv_ldv/dv_act/dv_act.php');
			break;

		case 'ct_dv_act':
			if (isset($_GET['id'])&&$_GET['id']!='') {
			$id_dv = $_GET['id'];
			$dvUser = new dvUser;
			$list=$dvUser->getDVUserID($id_dv);
	include('dv_ldv/dv_act/ct_dv_act.php');
		}
			break;
		case 'delete_dv_act':
			if (isset($_GET['id'])&&$_GET['id']!='') {
			$id_dv_act = $_GET['id'];
			$dvUser = new dvUser;
			$list=$dvUser->delete_DVUser($id_dv_act);
			header('location:?act=dv_act');
		}
			break;
		case 'edit_act':
			if (isset($_GET['id'])&&$_GET['id']!='') {
				$id_user = $_GET['id'];
				$dvUser = new dvUser;
				$dvIdUser=$dvUser->getDVUserID_user($id_user);
				include('dv_ldv/dv_act/change_dv_act.php');
			}
			break;
		case 'update_dv_user':
			// lỗi truy sâu
			if (isset($_POST['save'])&&$_POST['save']) {
				extract($_POST);
				$dvUser = new dvUser;
				$dvUser->updateDVUser($ng_dk,$trang_thai,$id_pk_user);
				header('location:?act=dv_act');
			}
			break;

		default:
			require_once('view/home.php');
	}
} else {
	require_once('view/home.php');
}