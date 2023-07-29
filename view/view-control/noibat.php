 <!-- thẻ tour trong nước -->
 <div  class="main-container-mb">
    <div class="main-container-mb-h1">
      <h1>địa điểm du lịch nổi bật</h1>
      <span>Một chuyến đi khám phá là cơ hội để bạn tìm hiểu về chính mình và thế giới xung quanh.</span>
      <br>
      <div class="div-mb">
      </div>

    </div>

    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">

        <?php
          $noibatdv= new dv;
          $noibat = $noibatdv->noibat();
          if($noibat){
            while($result=$noibat->fetch_assoc())
            {
        ?>
          <div class="card swiper-slide">
            <div class="card-1">
              <div class="card-top">
                <div class="card-top-img">
                  <img src="uploats/<?=$result['img_dv']?>" alt="">
                </div>
                <div class="card-top-hover">
                  <div class="card-top-hover-price">
                    <p><span><?=$result['price_young']?></span> <span>Đ</span></p>
                    <p>
                      <span><?=$result['day_start']?></span> -
                      <span><?=$result['day_end']?></span>
                    </p>
                  </div>
                  <div class="card-top-submit">
                    <input type="submit" value="yêu thích">
                    <input type="submit" value="đặt Tour">
                  </div>
                </div>
              </div>
              <div class="card-bottom">
                <div class="card-bottom-h1">
                  <span class="h3-mb"><?=$result['name']?></span>
                </div>
                <div class="card-bottom-main">
                  <div class="card-bottom-span-container">
                  </div>
                  <div class="cart-bottom-span-main">
                    <div class="card-bottom-span-1">
                      <span>
                        <span>3.5</span>
                        <i class="fas fa-star" style="color:yellow ;"></i>
                      </span>
                    </div>
                    <div class="card-bottom-span-2">
                      <span>Vacant: <?=$result['tong_ng']?></span>
                    </div>
                  </div>

                  <div class="card-bottom-submit">
                  <a href="index.php?act=chitiettour&idsp=<?php echo $result['id_dv'] ?>"><input type="submit" value="chi tiết"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          }}
          ?>
          
        </div>
      </div>
    </div>
  </div>