<div class="baner-product">
  <div class="text-product">
    <h1 class="mb30">CÙNG NHAU TÌM HIỂU VỀ NƠI BẠN MUỐN ĐẾN NÀO</h1>
    <em>Chúc bạn có khoảng thời gian tuyệt vời trên chuyến hành trình của bản thân</em>
  </div>
</div>

<!-- All Products -->
<section class="section all-products" id="products">

  <div class="slide-container swiper">
    <div class="slide-content">
      <div class="card-wrapper swiper-wrapper">
        <?php
        $tt = new tt;
        $limit = 3;
        $alltt = $tt->getAllTT();
        $count = 0;
        if ($alltt) {
          while ($result = $alltt->fetch_assoc()) {
            $count++;
          }
          $total_pages = ceil($count / $limit);
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
          $offset = ($current_page - 1) * $limit; // Vị trí bắt đầu của trang hiện tại
          $query = $tt->tt_pt($offset, $limit);
          // Hiển thị dữ liệu trên trang hiện tại
          if ($query) {
            while ($result1 = $query->fetch_assoc()) {
              ?>
              <div class="card swiper-slide">
                <div class="card-1">
                  <div class="new-top">
                    <div class="new-top-img">
                      <img src="<?= $result1['img_tt'] ?>" alt="img">
                    </div>
                  </div>
                  <div class="new-bottom">
                    <div class="new-bottom-h3 mt10">
                      <span>
                        <?= $result1['name'] ?>
                      </span>
                    </div>
                    <div class="new-bottom-main">
                      <div class="new-bottom-submit">
                        <a href="?act=ct_tt&id=<?= $result1['id_tt'] ?>">chi tiết</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
          }
        } ?>
      </div>
    </div>
  </div>
</section>
<?php
// Hiển thị phân trang
if ($total_pages > 1) {
  echo ' <section class="pagination">
        <div class="container" style="border-bottom:1px solid black ;"> ';
  for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
      echo '<span>' . $i . '</span>';
    } else {
      echo '<a class="bx bx-right-arrow-alt" href="?act=alltt&page=' . $i . '">' . $i . '</a>';
    }
  }
  echo ' </div>
            </section>';
} ?>