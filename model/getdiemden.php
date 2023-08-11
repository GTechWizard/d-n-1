<?php
require_once('model_dv.php');
if(isset($_GET['noi_bd'])&&($_GET['noi_bd'])){

$noi_bd = $_GET['noi_bd'];
$dv_user = new dv;
$data = $dv_user->getDiemDen($noi_bd);

$results = array();
while ($result = $data->fetch_assoc()) {
    $results[] = $result;
}

header('Content-Type: application/json');
echo json_encode($results);
}

if(isset($_GET['diem_d'])&&($_GET['diem_d'])){

$diem_d = $_GET['diem_d'];
$dv_user = new dv;
$data = $dv_user->getNoiBd($diem_d);

$results = array();
while ($result = $data->fetch_assoc()) {
    $results[] = $result;
}

header('Content-Type: application/json');
echo json_encode($results);
}
?>