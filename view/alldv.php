<div class="baner-product">
  <div class="text-product">
    <h1 class="mb30">HÃY TÌM CHO BẢN THÂN HAY GIA ĐÌNH CỦA BẠN <BR>MỘT CHUYẾN ĐI Ý NGHĨA NHẤT</h1>
  </div>
</div>

<!-- All Products -->
<section class="section all-products" id="products">

  <div class="product-center container">

    <?php
    $dv = new dv;
    // Thiết lập các biến phân trang
    $limit = 3; // Số lượng mục trên mỗi trang
    $dvs = $dv->getAllDV(); // Tổng số kết quả 
    $countdv = 0;
    if ($dvs) {
      while ($result = $dvs->fetch_assoc()) {
        $countdv++;
      }
      $total_pages = ceil($countdv / $limit);
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
      $offset = ($current_page - 1) * $limit; // Vị trí bắt đầu của trang hiện tại
      $query = $dv->dv_pt($offset, $limit);
      // // Hiển thị dữ liệu trên trang hiện tại
      if ($query) {
        while ($result1 = $query->fetch_assoc()) {
          ?>
          <div class="product-item">
            <div class="card-1">
              <div class="card-top">
                <div class="card-top-img">
                  <img src="<?= $result1['img_dv'] ?>" alt="img">
                </div>
                <div class="card-top-hover">
                  <div class="card-top-hover-price">
                    <p>Hãy nhấn yêu thích để có thể xem lại</p>
                  </div>
                  <div class="card-top-submit">
                    <a href="?act=like&iduser=<?= $_SESSION['id'] ?>&iddv=<?= $result1['id_dv'] ?>" class="addCart" style="text-decoration: none; text-transform: uppercase; font-weight: bold;">yêu thích</a>
                  </div>
                </div>
              </div>
              <div class="card-bottom">
                <div class="card-bottom-h1">
                  <span class="h3-mb">
                    <?= $result1['name'] ?>
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
                          $sart = new comment;
                          $getsart = $sart->avg_sart($result1['id_dv']);
                          if ($getsart && isset($getsart)) {
                            while ($result12 = $getsart->fetch_assoc()) {
                              $checkout = floatval($result12['avg']);
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
                        <?= $result1['tong_ng'] ?>
                      </span>
                    </div>
                  </div>

                  <div class="card-bottom-submit">
                    <a href="index.php?act=chitiettour&idsp=<?php echo $result1['id_dv'] ?>"><input type="submit" value="chi tiết"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
      
    }
  }
} 
      // Hiển thị phân trang
      if ($total_pages > 1) {
        echo' <section class="pagination">
        <div class="container" style="border-bottom:1px solid black ;"> ';
        for ($i = 1; $i <= $total_pages; $i++) {
          if ($i == $current_page) {
            echo '<span>' . $i . '</span>';
          } else {
            echo '<a class="bx bx-right-arrow-alt" href="?act=alldv&page=' . $i . '">' . $i . '</a>';
          }
        }
        echo ' </div>
            </section>';
      }?>