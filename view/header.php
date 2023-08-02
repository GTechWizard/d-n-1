<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- boostrap -->
  
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
.grid_two{
  display: grid;
  grid-template-columns: 1fr 1fr;
}
.w-50{
  max-width: 50%;
}
.w-200{
  max-width: 200%;
}
.w-100{
  width: 100%;
}
.center{
  display: grid;
  place-items: center;;
}
.hidden{
  overflow: hidden;
  
}
  </style>
</head>

<body>
  <input type="checkbox" id="check">
     <nav>

  <div class="icon">
      <a href="#"><img src="img/logononfont.png" alt=""></a>
    </div>
    <div class="search_box">
      <input type="search" placeholder="search_box" />
      <span class="fa fa-search"></span>
    </div>
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