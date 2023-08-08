<?php 
  if (isset($list)) {
?>
<div class="baner-product">
  <div class="text-product">
    <h1 class="mb30">kính chào quý khách</h1>
  </div>
</div>

<!-- All Products -->
<section class="section all-products" id="products">
  <div class="top container" style="border-bottom:1px solid black ;">
    <h1 style="text-transform: uppercase;">tất cả tour</h1>
  </div>
  <div class="product-center container">
  <?php
      while ($result = $list->fetch_assoc()) {
        ?>
        <div class="product-item">
          <div class="card-1">
            <div class="card-top">
              <div class="card-top-img">
                <img src="<?= $result['img_dv'] ?>" alt="">
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
                        <?php 
                        $sart= new comment;
                        $getsart = $sart->avg_sart($result['id_dv']);
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
                  <a href="index.php?act=chitiettour&idsp=<?php echo $result['id_dv'] ?>"><input type="submit" value="chi tiết"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }
    } else { ?>
      <div class="baner-product">
  <div class="text-product">
    <h2 class="mb30">kính chào quý khách</h2>
        <h2 class="mb30">Hiện Không Có Dịch Vụ Nào Theo Sự tìm Kiếm Của Bạn</h2>
        <?php   echo $day_start,$day_end,$price_start,$price_end,$diem_den;?>
        <a href="?act=home" class='btn'> Trở Lại</a>
  </div>
</div>
    <?php } ?>
  </div>
</section>
<section class="pagination">
  <div class="container" style="border-bottom:1px solid black ;">
  </div>
</section>