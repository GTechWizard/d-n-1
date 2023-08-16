<?php 
session_start();
require_once('../../model/model_dv_user.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous">
  <style>
    body {
      padding: 3%;
      background-color: rgb(249, 249, 249);
    }

    .main {
      width: 70%;
      border: 1px solid gray;
      background-color: white;
      border-radius: 25px;
      box-shadow: 0px 0px 100px rgb(255, 255, 255);
    }

    .main img {
      width: 50%;
      object-fit: cover;
      height: 30vh;
    }
    .img-circle{
      border-radius: 100%;
      border: 2px solid orange;
    }
    .color-w{
      color: white;
    }
    .color-or{
      color:orange;
    }
    .text-ca{
      text-transform: capitalize;
    }
    .border-2{
      border-radius: 12px;
    }
    .text-aline-l{
      text-align: left;
    }
    .text-aline-r{
      text-align: right;
    }
  </style>
</head>

<body>
  <?php 
   if (isset($_GET['idu']) && isset($_GET['idvu'])) {
    $id_user = $_GET['idu'];
    $id_dv_user = $_GET['idvu'];
  $dv_user = new dvUser;
  $log = $dv_user->forbillafter($id_user,$id_dv_user);
                if (isset($log) && $log) {
                    $result = $log->fetch_assoc();
                    $tong = number_format($result['so_luong_old']*$result['price_old']+$result['so_luong_young']*$result['price_young']);
                    $price_old = number_format($result['price_old']);
                    $price_young = number_format($result['price_young']);
  ?>
  <a href="../../index.php?act=user&cn=dvmyself" class="btn btn-close"></a>
  <article class="main container">
    <header class="p-2 row">
      <h1 class="bg-success color-w text-ca border-2 p-1 col-md-12"><?=$result['name']?></h1>
      <p class="text-ca text-aline-l col-md-6">Nơi bắt đầu: <?=$result['noi_bd']?></p><p class="text-ca text-aline-r col-md-6">điểm đến: <?=$result['diem_den']?> </p>
      <p class="text-ca">Tổng người: <?=$result['tong_ng']?></p>
      <hr>
    </header>

    <article class="row p-1">
      <section class="col-md-6 bg-info border-2">
        <div class="p-2 text-center">
          <img src="../<?=$result['img_dv']?>" alt="img">
        </div>
        <div class="p-2">
        <p class="bg-light text-ca p-1">day start: <?=$result['day_start']?></p>
        <p class="bg-light text-ca p-1">day end: <?=$result['day_end']?></p>
        <p class="bg-light text-ca p-1">price-old: <?=$price_old?> VND</p>
        <p class="bg-light text-ca p-1">price-young: <?=$price_young?> VND</p>
      </div>
      </section>

      <section class="col-md-6 bg-light p-2 border-2">
        <div class="text-center">
          <img src="../../<?=$_SESSION['img']?>" alt="anh dai dien" class="img-circle">
          <p class="text-ca"><?=$result['user_name']?></p>
        </div>
        <p class="bg-warning color-w text-ca p-1">ngày đăng ký: <em><?=$result['ngay_dkdv']?></em></p>
        <p class="bg-warning color-w text-ca p-1">email: <em><?=$result['user_email']?></em> </p>
        <p class="bg-warning color-w text-ca p-1">liên hệ: <em><?=$result['user_sdt']?></em></p>
        <p class="bg-warning color-w text-ca p-1">
          số lượng người lớn: <b><?=$result['so_luong_old']?></b> <em>&</em> số lượng trẻ em: <b><?=$result['so_luong_young']?></b>
        </p>
        <p class="bg-warning text-ca p-1">tổng giá: <b><?=$tong?> VND</b></p>
      </section>
    </article>
    <p>
      <div class="row">
<p class="col-md-5"></p>
    <p class="col-md-6 bg-success text-ca p-1 text-center color-w w-25"><b>
      <?php 
        switch ($result['trang_thai']) {
          case 0:
            echo "Đang chờ xác nhận";
            break;
          case 1:
            echo "Chưa bắt đầu";
            break;
          case 2:
            echo "Đang trong tour";
            break;
          case 3:
            echo "Hoàn thành tour";
            break;
          default:
        }
      ?>
    </b> </p>
      </div>
    <a href="../../index.php?act=chitiettour&idsp=<?=$result['id_pk_dv']?>" class="btn btn-info text-ca">đánh giá</a>

    </p>
  </article>
  <?php 
                }
}?>
</body>

</html>