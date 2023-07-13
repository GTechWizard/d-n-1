<?php 
ob_start();
require_once('../model/model_user.php');
require_once('../model/model_bl.php');
require_once('view/header.php');
require_once('view/menu.php');

if(isset($_GET['act'])&&$_GET['act']){
	$act=$_GET['act'];
	switch ($act) {
		case 'user':
			include('user/user.php');
			break;
		case 'delete_user':
			$id=$_GET['id'];
			$user= new user;
			$user->delete_user($id);
			header('location:?act=user');
			break;
		case 'edit_user':
			if(isset($_GET['id'])&&$_GET['id']){
			$id=$_GET['id'];
			$user= new user;
			$userID = $user->getUserID($id);
			include('user/change_user.php');
			}else{
				die();
			}
			break;
		case 'update_user':
			if(isset($_POST['save'])&&$_POST['save']){
				extract($_POST);
				$user= new user;
			$user->update_user($name,$sdt,$vai_tro,$dia_chi,$email,$id);
			}
			include('user/user.php');
			break;
		case 'comment':
			include ('bl/comments.php') ;
			break;
		case 'delete_comment':
		if(isset($_GET['id'])&&$_GET['id']){
			$id_bl=$_GET['id'];
			$bl= new comment;
			$bl->delete_comment($id_bl);
		}else{
			die();
		}
		header('location:?act=comment');
			break;
		case '':
			break;
		case '':
			break;
		default:
		require_once('view/home.php');
	}
}else{
	require_once('view/home.php');
}
	