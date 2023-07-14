<?php
ob_start();
require_once('../model/model_user.php');
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
			break;
		case 'delete_loai':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_loai = $_GET['id'];
				$loai = new loai;
				$loai->delete_loai($id_loai);
			} else {
				die();
			}
			header('location:?act=loai');
			break;
		case 'edit_loai':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_loai = $_GET['id'];
				$loai = new loai;
				$loaiID=$loai->getLoaiID($id_loai);
				include('dv_ldv/ldv/change_ldv.php');
			} else {
				die();
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
				if($target_name!=""){
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
				} else {move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);}

				$loai= new loai;
				if($target_name==""){
			$loai->update_loai($kieu_dv,"",$id_loai);
			if(isset($alert)&&$alert!="")echo"<script>alert('$alert');</script>";
			header('location:?act=loai');
				}else{
					$loai->update_loai($kieu_dv,$target_file,$id_loai);
					if(isset($alert)&&$alert!="")echo"<script>alert('$alert');</script>";
			header('location:?act=loai');
				}
			}

			break;
		case 'add_dv':
			break;
		case 'dv':
			break;
		case 'delete_dv':
			break;
		case 'edit_dv':
			break;
		default:
			require_once('view/home.php');
	}
} else {
	require_once('view/home.php');
}