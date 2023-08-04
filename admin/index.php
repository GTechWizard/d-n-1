<?php
session_start();
ob_start();
require_once('../model/model_user.php');
require_once('../model/model_home.php');
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

		case 'login':
			if(isset($_POST['get']) && $_POST['get']){
				$email=$_POST['email'];
				echo $email, $password;
				$user  = new user;
				$userID = $user->get_user_email($email);
				if(isset($userID)&&($userID)){
					while($userOne = $userID->fetch_assoc()){
					$_SESSION['id'] = $userOne['id_user'];
					$_SESSION['name'] = $userOne['name'];
					$_SESSION['pass'] = $userOne['pass'];
					$_SESSION['dia_chi'] = $userOne['dia_chi'];
					$_SESSION['email'] = $userOne['email'];
					$_SESSION['sdt'] = $userOne['sdt'];
					$_SESSION['img'] = $userOne['img'];
					$_SESSION['vai_tro'] = $userOne['vai_tro'];
					header('location:?act=home');
					}
				}else{
					header('location:login.php');
				}
				
			}
			break;

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
			$DV = new dv;
			$DVList = $DV->getAllDV();
			$i = 0;
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
				$target_dir = "uploads/";
				$target_file = $target_dir . date('HisadmY') . basename($_FILES["img_dv"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				// Kiểm tra xem tệp có phải là ảnh hay không
				$check = getimagesize($_FILES["img_dv"]["tmp_name"]);
				if ($check !== false) {
					$uploadOk = 1;
				} else {
					$alert = "không phải file ảnh, vui lòng chọn lại";
					$uploadOk = 0;
				}
				// Kiểm tra xem có xảy ra lỗi khi tải lên tệp hay không
				if ($uploadOk == 0) {
					$alert = "đăng ảnh không thành công";
				} else {
					move_uploaded_file($_FILES["img_dv"]["tmp_name"], $target_file);
				}
				$dv = new dv;
				$dv->insert_DV($name, $noi_bd, $diem_den, $id_pk_loai, $tong_ng, $target_file, $bv);
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
				$data = $dv->getDVID_notprice($id_dv);
				include('dv_ldv/dv/ctbv_dv.php');
			}
			break;
		case 'edit_dv':
			if (isset($_GET['id']) && $_GET['id']) {
				$id = $_GET['id'];
				$dv = new dv;
				$dvID = $dv->getDVID_notprice($id);
				$loai = new loai;
				$dsl = $loai->getAllLoai();
				include('dv_ldv/dv/change_dv.php');
			}
			break;
		case 'update_dv':
			if (isset($_POST['save']) && $_POST['save']) {
				extract($_POST);
				$dv = new dv;
				// Kiểm tra xem người dùng đã chọn ảnh mới hay chưa
				if (!empty($_FILES["img_dv"]["name"])) {
						$target_dir = "uploads/";
						$target_name = basename($_FILES["img_dv"]["name"]);
						$target_file = $target_dir . date('HisadmY') . basename($_FILES["img_dv"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
						// Kiểm tra xem tệp có phải là ảnh hay không
						$check = getimagesize($_FILES["img_dv"]["tmp_name"]);
						if ($check !== false) {
								$uploadOk = 1;
						} else {
								$alert = "Không phải file ảnh, vui lòng chọn lại";
								$uploadOk = 0;
						}
						// Kiểm tra xem có xảy ra lỗi khi tải lên tệp hay không
						if ($uploadOk == 0) {
								$alert = "Đăng ảnh không thành công";
						} else {
								move_uploaded_file($_FILES["img_dv"]["tmp_name"], $target_file);
								$dv->update_DV($name, $noi_bd, $diem_den, $id_pk_loai, $tong_ng, $target_file, $bv, $id_dv);
						}
				} else {
						$dv->update_DV($name, $noi_bd, $diem_den, $id_pk_loai, $tong_ng, '', $bv, $id_dv);
				}
				
				if (isset($alert) && $alert != "") {
						echo "<script>alert('$alert');</script>";
				 }
		
				header('location:?act=dv');
		}
			break;
		case 'price':
			$price = new dv;
			$priceList = $price->getAllPrice();
			$i = 0;
			include('price/price.php');
			break;

		case 'add_price':
			$dv = new dv;
			$dsdv = $dv->getAllDV();
			include('price/add_price.php');
			break;

		case 'price_new':
			if (isset($_POST['save']) && $_POST['save']) {
				$dv = new dv;
				$dv->insert_price($_POST['id_dv'],$_POST['day_end'],$_POST['day_start'],$_POST['price_young'],$_POST['price_old']);
				header('location:?act=price');
			}
			break;

		case 'delete_price':
			if (isset($_GET['id']) && $_GET['id']) {
				$id_price = $_GET['id'];
				$price = new dv;
				$price->delete_price($id_price);
				header("Location:?act=price");
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
				$tt = new tt;
				$tt->insert_TT($bai_viet, $name, $mo_ta, $dia_diem, $tac_gia, $target_file, $ngay_d);
				if (isset($alert) && $alert != "") {
					echo "<script>alert('$alert');</script>";
				}
				header('location:?act=tt');
			}
			break;
		case 'edit_tt':
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$id = $_GET['id'];
				$tt = new tt;
				$ttID = $tt->getTTID($id);
				include('tt/change_news.php');
			}
			break;
		case 'update_tt':
			if (isset($_POST['save']) && ($_POST['save'])) {
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
				$tt = new tt;
				if ($target_name == "") {
					$tt->update_TT($bai_viet, $name, $mo_ta, $dia_diem, $tac_gia, '', $ngay_d, $id_tt);
				} else {
					$tt->update_TT($bai_viet, $name, $mo_ta, $dia_diem, $tac_gia, $target_file, $ngay_d, $id_tt);
				}
				if (isset($alert) && $alert != "")
					echo "<script>alert('$alert');</script>";
				header('location:?act=tt');
			}
			break;
		case 'delete_tt':
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$id = $_GET['id'];
				$tt = new tt;
				$ttID = $tt->delete_TT($id);
				header('location:?act=tt');
			}
			break;

		case 'bai_viet_tt':
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$id = $_GET['id'];
				$tt = new tt;
				$data = $tt->getTTID($id);
				include('tt/bv_tt.php');
			}
			break;

		case 'dv_act':
			$dvUser = new dvUser;
			$dvUserList = $dvUser->getAllDVUser();
			include('dv_ldv/dv_act/dv_act.php');
			break;

		case 'ct_dv_act':
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$id_dv = $_GET['id'];
				$dvUser = new dvUser;
				$list = $dvUser->getDVUserID($id_dv);
				include('dv_ldv/dv_act/ct_dv_act.php');
			}
			break;
		case 'delete_dv_act':
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$id_dv_act = $_GET['id'];
				$dvUser = new dvUser;
				$list = $dvUser->delete_DVUser($id_dv_act);
				header('location:?act=dv_act');
			}
			break;
		case 'edit_act':
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$id = $_GET['id'];
				$dvUser = new dvUser;
				$trang_thai = $dvUser->gettrang_thai($id);
				include('dv_ldv/dv_act/change_dv_act.php');
			}
			break;
		case 'update_dv_user':
			if (isset($_POST['save']) && $_POST['save']) {
				// lỗ hổng bảo mật
				extract($_POST);
				$dvUser = new dvUser;
				$dvUser->updateDVUser($trang_thai, $id_dv_user);
				header('location:?act=dv_act');
			}
			break;
		case 'search':
			if (isset($_POST['get']) && $_POST['get']) {
				$search_term = $_POST['value']; // Lấy từ khóa tìm kiếm từ input
				$dir_path = '../uploads'; // Đường dẫn đến thư mục chứa ảnh
				$files = glob('../uploads*' . '/*' . $search_term. '*.{jpg,png,gif}', GLOB_BRACE); // Tìm tất cả các file có tên chứa từ khóa được nhập từ input
				$results = new home;
				$results1 = $results->search_user($_POST['value']);
				$results2 = $results->search_tt($_POST['value']);
				$results3 = $results->search_loai($_POST['value']);
				$results4 = $results->search_dv($_POST['value']);
				include('view/layoutfind.php');
			}
			break;
		case 'ff':
			include('view/file_folder.php');
			break;
		case 'fup':
			include('view/file_folder.php');
			break;
		case 'fvi':
			include('view/file_folder.php');
			break;
		case 'fim':
			include('view/file_folder.php');
			break;
		case 'delete_file':
			if (isset($_GET['value']) && $_GET['value'] != '' && isset($_GET['dir']) && $_GET['dir'] != '') {
				$dir = $_GET['dir'];
				$value = "/" . $_GET['value'];
				$hr = $_GET['hr'];
				$file_path = $dir . $value;

				if (file_exists($file_path)) {
					unlink($file_path);
					$alert = "<script>alert('Đã xóa file $value thành công từ thư mục $dir');</script>";
				} else {
					$alert = "<script>alert('File $value không tồn tại trong thư mục $dir');</script>";
				}
				header('location:?act=' . $hr . '&alert=' . $alert . '');
			}
			break;

		default:
			require_once('view/home.php');
			break;
	}
} else {
	if(isset($_SESSION['id']) && $_SESSION['id']!=''){
		if($_SESSION['vai_tro'] == '1'){
			require_once('view/home.php');
		}else{
			header('location:login.php');
		}
	}else{
		header('location:login.php');
	}
}