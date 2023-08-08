<div class="baner-product">
<?php if (!empty($date2)): ?>
    <!-- Hiển thị sản phẩm tương ứng từ $date2 -->
    <?php foreach ($date2 as $product): ?>
        <!-- Hiển thị thông tin sản phẩm -->
        <h3><?php echo $product['price_young']; ?></h3>
        <p><?php echo $product['price_old']; ?></p>
        <!-- ... -->
    <?php endforeach; ?>
<?php else: ?>
    <!-- Không có sản phẩm nào trong khoảng ngày đã cho -->
    <p>Không tìm thấy sản phẩm.</p>
<?php endif; ?>
  <div class="text-product">
    <h2 class="mb30">kính chào quý khách</h2>
    <h1 class="mb30"></h1>
    <h3 class="mb30">trang chủ/.</h3>
    <h2>KHÁM PHÁ VĂN HÓA ĐỊA PHƯƠNG-TẬN HƯỞNG THIÊN NHIÊN TUYỆT ĐẸP-TRẢI NGHIỆM ẨM THỰC ĐỘC ĐÁO</h2>
  </div>
</div>

<!-- All Products -->
<section class="section all-products" id="products">
  <div class="top container" style="border-bottom:1px solid black ;">
    <h1 style="text-transform: uppercase;">tất cả tour </h1>
  </div>

  <div class="product-center container">
    <div class="product-item">
      <div class="card-1">
        <div class="card-top">
          <div class="card-top-img">
            <img src="img/kinh-nghiem-du-lich-dao-cat-ba-1.jpg" alt="">
          </div>
          <div class="card-top-hover">
            <div class="card-top-hover-price">
              <p><span></span> <span>VNĐ</span></p>
              <p>
                <span></span> -
                <span></span>
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
            <span class="h3-mb"></span>
          </div>
          <div class="card-bottom-h3">
            <span>Đảo Cát Bà là một địa điểm du lịch phổ biến với vẻ đẹp hoang sơ của thiên nhiên, phong cảnh rừng
              núi và biển cả hùng vĩ.</span>
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
                <span>Vacant: </span>
              </div>
            </div>

            <div class="card-bottom-submit">
              <a href=""><input type="submit" value="chi tiết"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="pagination">
  <div class="container" style="border-bottom:1px solid black ;">
    <span>1</span> <span>2</span> <span>3</span> <span>4</span>
    <span><i class="bx bx-right-arrow-alt"></i></span>
  </div>
</section>