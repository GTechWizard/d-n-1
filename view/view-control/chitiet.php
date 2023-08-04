<div class="baner-product">
<?php
    if ($getnameid) {
      $result = $getnameid->fetch_assoc();
      $a= $result["kieu_dv"];
      ?>
  <div class="text-product">
    <h2 class="mb30">kính chào quý khách</h2>
    <h1 class="mb30"><?php echo $a ?></h1>
    <h3 class="mb30">trang chủ/<?php echo $a ?>.</h3>
    <h2>KHÁM PHÁ VĂN HÓA ĐỊA PHƯƠNG-TẬN HƯỞNG THIÊN NHIÊN TUYỆT ĐẸP-TRẢI NGHIỆM ẨM THỰC ĐỘC ĐÁO</h2>
  </div>
</div>

<!-- All Products -->
<section class="section all-products" id="products">
  <div class="top container" style="border-bottom:1px solid black ;">
    <h1 style="text-transform: uppercase;">tất cả tour</h1>
<!--  
    <form style="margin-bottom: 10px;">
      <select>
        <option value="1">giá tiền</option>
        <option value="2">dưới 1tr</option>
        <option value="3">1tr -> 3tr</option>
        <option value="4">3tr->6tr</option>
        <option value="5">trên 6tr</option>
      </select>
      <span><i class="bx bx-chevron-down"></i></span>
    </form> -->
  </div>

  <div class="product-center container">
    
    <?php
    if($getloai){
    while($result = $getloai->fetch_assoc()) 
    {
    ?>
    <div class="product-item">
      <div class="card-1">
        <div class="card-top">
          <div class="card-top-img">
            <img src="<?=$result['img_dv']?>" alt="">
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
          <div class="card-bottom-h3">
            <span></span>
          </div>
          <div class="card-bottom-main">
            <div class="card-bottom-span-container">
            </div>
            <div class="cart-bottom-span-main">
              <div class="card-bottom-span-1">
                <span>
                  <span><?php  $getsart= $sart->avg_sart($result['id_dv']);
                    if ($getsart && isset($getsart)) {
                      while($result2 = $getsart->fetch_assoc()) {
                        $checkout=floatval( $result2['avg']);
                        echo $checkout;
                      }
                    }
                  ;?></span>
                  <i class="fas fa-star" style="color:yellow ;"></i>
                </span>
              </div>
              <div class="card-bottom-span-2">
                <span>Tổng Người: <?=$result['tong_ng']?></span>
              </div>
            </div>

            <div class="card-bottom-submit">
              <a href="index.php?act=chitiettour&idsp=<?php echo $result['id_dv'] ?>"><input type="submit" value="chi tiết"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php }}}else{?>
        <div class="text-product">
    <h2 class="mb30">kính chào quý khách</h2>
    <h2>Hiện Không Còn Dịch Vụ Nào Cho Bạn Ở Mục Này</h2>
    <a href="?act=home" class='btn'> Trở Lại</a>
  </div>
        <?php }?>
  </div>
</section>
<section class="pagination">
  <div class="container" style="border-bottom:1px solid black ;">
    <span>1</span> <span>2</span> <span>3</span> <span>4</span>
    <span><i class="bx bx-right-arrow-alt"></i></span>
  </div>
</section>