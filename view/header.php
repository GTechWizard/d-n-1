<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- boostrap -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- icon-font -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
  <link
    href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira"
    rel="stylesheet">
  <!-- link font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <!-- ScrollReveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Box icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
  
   



    <link rel="stylesheet" href="./view/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="./view/css/index.css">
  <style>
    .card {
    background-color:rgb(255, 255, 255);
}
.card_slide {
    background-color:rgba(0, 0, 0, 0.571);
}

nav ul li {
  margin: 0 3px;
}

nav ul li a {
  color: rgb(255, 115, 0);
  font-size: 20px;
  text-decoration: none;
  text-transform: capitalize;
  padding: 5px 10px;
  display: block;
  position: relative;
  overflow: hidden;
  z-index: 2;
  border-radius: 10px;
  background-color: white;
}
  /* layout */
.checkoutLayout{
 display: flex;
align-items: center;
justify-content: center;
 overflow: hidden;  
  padding: 20px;
  /* transform: translate(50%, 00%); */
}
.checkoutLayout .right{
  background-color: #5358B3;
  border-radius: 20px;
  padding: 40px;
  color: #fff;
  margin: auto;
}
.checkoutLayout .right .form{
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  border-bottom: 1px solid #7a7fe2;
  padding-bottom: 20px;
}
.checkoutLayout .form h1,
.checkoutLayout .form .group:nth-child(-n+3){
  grid-column-start: 1;
  grid-column-end: 3;
}
.checkoutLayout .form input, 
.checkoutLayout .form select
{
  width: 100%;
  padding: 10px 20px;
  box-sizing: border-box;
  border-radius: 20px;
  margin-top: 10px;
  border:none;
  background-color: #6a6fc9;
  color: #fff;
}
.checkoutLayout .right .return .row{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}
.checkoutLayout .right .return .row div:nth-child(2){
  font-weight: bold;
  font-size: x-large;
}
.buttonCheckout{
  width: 100%;
  height: 40px;
  border: none;
  border-radius: 20px;
  background-color: #49D8B9;
  margin-top: 20px;
  font-weight: bold;
  color: #fff;


}
.left h1{
  border-top: 1px solid #eee;  
  padding: 20px 0;
}
.left .list .item img{
  height: 80px;
}
.left .list .item{
  display: grid;
  grid-template-columns: 80px 1fr  50px 80px;
  align-items: center;
  gap: 20px;
  margin-bottom: 30px;
  padding: 0 10px;
  box-shadow: 0 10px 20px #5555;
  border-radius: 20px;
}
.left .list .item .name,
.left .list .item .returnPrice{
  font-size: large;
  font-weight: bold;
}
.content{
    width: 70%;
}
.a{
  text-decoration: none!important ;
  text-transform: capitalize;
  padding: 1%;
  width: 20%;
  background-color: blue;
  border-radius: 15px;
  color: white;
}
.a:hover{
  background-color: blue;
  color: white;
  box-shadow: 0px 0px 10px white;
}

.account-user-page .form_tt form .check_tt .img_ur img {
  width: 50%;
  height: 150%;
  border-radius: 50%;
  object-fit: contain;
  background-color: gray;
}
  </style>
</head>

<body>
  <input type="checkbox" id="check">
  <nav>

    <div class="icon">
      <a href="?act=home"><img src="img/logononfont.png" alt="Come Back"></a>
    </div>
    <?php
      include "./view/view-control/search.php";
    ?>
    <ul>
      <li><a href="" class="card">Chúng tôi</a></li>
      <li><a href="#" class="card">Du Lịch</a></li>
      <li><a href="?act=tt" class="card">Tin Tức</a></li>
      <li><a href="#" class="card">Hỗ Trợ</a></li>
    </ul>
    <div class="navbar">
    <?php 
          if (isset($_SESSION['id']) && $_SESSION['id']) {
            // http://localhost/dn1/index.php lỗi tạo 1 trang hoàn toàn mới
            echo '<a id="user-btn" class="far fa-user" href="?act=user"></a>';
          }else{
            echo '<a href="?act=dn" class="btn-icon fas fa-arrow-right-to-bracket"></a>';
          }
      ?>
    </div>
    <label for="check" class="bar">
      <span class="fa fa-bars" id="bars"></span>
      <span class="fa fa-times" id="times"></span>
    </label>

  </nav>