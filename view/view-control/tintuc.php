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
          $tintuc= new tt;
          $tintucz1= $tintuc-> getAllTT();
          if($tintucz1){
            while($result=$tintucz1->fetch_assoc())
            {
        ?>
          <div class="card swiper-slide">
            <div class="card-1">
              <div class="new-top">
                <div class="new-top-img">
                  <img src="uploads/<?=$result['img_tt']?>" alt="">
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
                    <input type="submit" value="chi tiết">
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