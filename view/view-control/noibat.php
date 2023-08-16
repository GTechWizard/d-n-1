<!-- thẻ tour trong nước -->
<div class="main-container-mb">
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
        $sart = new comment;
        $noibatdv = new dv;
        $noibat = $noibatdv->noibat();
        if ($noibat) {
          while ($result = $noibat->fetch_assoc()) {
            ?>
            <div class="card swiper-slide">
              <div class="card-1">
                <div class="card-top">
                  <div class="card-top-img">
                    <img src="uploads/<?= $result['img_dv'] ?>" alt="">
                  </div>
                  <div class="card-top-hover">
                    <div class="card-top-hover-price">
                      <p><span>
                          <?= $result['price_young'] ?>
                        </span> <span>VNĐ</span></p>
                      <p>
                        <span>
                          <?= $result['day_start'] ?>
                        </span> -
                        <span>
                          <?= $result['day_end'] ?>
                        </span>
                      </p>
                    </div>
                    <div class="card-top-submit">
                    <a href="?act=like&iduser=<?php if(isset($_SESSION['id'])){ echo $_SESSION['id'];} ?>&iddv=<?=$result['id_dv']?>" class="addCart" style="text-decoration: none; text-transform: uppercase; font-weight: bold;">yêu thích</a>
                    </div>
                  </div>
                </div>
                <div class="card-bottom">
                  <div class="card-bottom-h1">
                    <span class="h3-mb">
                      <?= $result['name'] ?>
                    </span>
                  </div>
                  <div class="card-bottom-h3">
                    <span></span>
                  </div>
                  <div class="card-bottom-main">
                    <div class="card-bottom-span-container">
                    </div>
                    <div class="cart-bottom-span-main">
                      <div class="card-bottom-span-1">
                        <span>
                          <span>
                            <?php $getsart = $sart->avg_sart($result['id_dv']);
                            if ($getsart && isset($getsart)) {
                              while ($result2 = $getsart->fetch_assoc()) {
                                $checkout = floatval($result2['avg']);
                                echo $checkout;
                              }
                            }
                            ; ?>
                          </span>
                          <i class="fas fa-star" style="color:yellow ;"></i>
                        </span>
                      </div>
                      <div class="card-bottom-span-2">
                        <span>Tổng Người:
                          <?= $result['tong_ng'] ?>
                        </span>
                      </div>
                    </div>

                    <div class="card-bottom-submit">
                    <div class="card-bottom-submit" style="margin-top: 10px;
    margin: auto;
    margin-top: 10px;
    /* color: white; */
    /* text-align: center; */
    /* font-weight: bold; */
    background: orange;
    width: 50%;
    border: 1px solid;
    padding: 5px;
    border-radius: 20px;">
                      <a href="index.php?act=chitiettour&idsp=<?php echo $result['id_dv'] ?>" style="color: white; font-weight: bold; font-size: 20px;">Chi tiết</a>
                    </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>

      </div>
    </div>
  </div>
</div>