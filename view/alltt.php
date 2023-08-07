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
    $alltt = $tt->getAllTT();
    if ($alltt) {
      while ($result = $alltt->fetch_assoc()) {
        ?>
        <div class="card swiper-slide">
          <div class="card-1">
            <div class="new-top">
              <div class="new-top-img">
                <img src="<?= $result['img_tt'] ?>" alt="img">
              </div>
            </div>
            <div class="new-bottom">
              <div class="new-bottom-h3 mt10">
                <span>
                  <?= $result['name'] ?>
                </span>
              </div>
              <div class="new-bottom-main">
                <div class="new-bottom-span-container">
                </div>
                <div class="new-bottom-submit">
                  <a href="?act=ct_tt&id=<?= $result['id_tt'] ?>">chi tiết</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }
    } ?>
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