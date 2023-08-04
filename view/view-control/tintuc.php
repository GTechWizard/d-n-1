<!-- tin tuc -->
<div class="main-container-new mt20">
    <div class="main-container-mb-h1">
      <h1>tin tức</h1>
      <span>Một chuyến đi khám phá là cơ hội để bạn tìm hiểu về chính mình và thế giới xung quanh.</span>
      <br>
      <div class="div-mb">
      </div>

    </div>
    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">

        <?php
            $tt = new tt;
                $alltt = $tt->getAllTT();
          if($alltt){
            while($result=$alltt->fetch_assoc())
            {
        ?>
          <div class="card swiper-slide">
            <div class="card-1">
              <div class="new-top">
                <div class="new-top-img">
                  <img src="<?=$result['img_tt']?>" alt="img">
                </div>
              </div>
              <div class="new-bottom">
                <div class="new-bottom-h3 mt10">
                  <span><?=$result['name']?></span>
                </div>
                <div class="new-bottom-main">
                  <div class="new-bottom-span-container">
                  </div>
                  <div class="new-bottom-submit">
                    <a href="?act=ct_tt&id=<?=$result['id_tt']?>">chi tiết</a>
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