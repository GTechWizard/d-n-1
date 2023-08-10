<?php
require_once('model_dv_user.php');
// Gọi hàm getpricetour và truyền giá trị id_price từ tham số GET
$id_price = $_GET['id_price'];
$dv_user= new dvUser;
$data = $dv_user->getpricetour($id_price);
$result=$data->fetch_assoc();
// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($result);

// Hàm lấy giá trị từ cơ sở dữ liệu
?>