<!-- slide-tour -->
<div class="main-font">
    <div class="main-h1">
      <h1>địa điểm tour du lịch</h1>
      <br>
      <h3>Khám phá văn hóa địa phương-Tận hưởng thiên nhiên tuyệt đẹp-Trải nghiệm ẩm thực độc đáo</h3>
      <br>
      <img src="img/logo.png" alt="" width="50px">
    </div>
    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">

        <?php
          $getallloai = new loai;
          $getloai = $getallloai->getAllLoai();
          while($result=$getloai->fetch_assoc())
          {
        ?>
          <div class="card swiper-slide">
            <div class="ui-card">
              <img src="uploads/<?=$result['img']?>">
              <div class="description">
                <h3><?=$result['kieu_dv']?></h3>
                <p>SỐ TOUR:10</p>
                <a href="index.php?act=dmsp&iddm=<?php echo $result['id_loai'] ?>">TÌM THÊM</a>
              </div>
            </div>
          </div>
          <?php 
              }
          ?>
         
        </div>
      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>