 <!-- the tour yeu thich nhat -->
 <div class="tf-container">
 <?php
            $dv = new dv;
            $sart= new comment;
                $alldv = $dv->noibatnhat();
          if($alldv){
            while($result=$alldv->fetch_assoc())
            {
        ?>
    <div class="tf-mian">
      <img src="img/Phu-Quoc-dao-dang-ghe-tham-nhat-hanh-tinh.jpg" alt="">
      <div class="tf-main-font">
        <div class="tf-font">
          <div class="tf-h2 p20">
            <h1>Địa Điểm Yêu Thích Nhất</h1>
          </div>
          <div class="tf-h2">
            <span style="font-size:16px ; text-transform:uppercase ;">
              <span>Đánh Giá:</span>
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
          <div class="tf-h1 p20">
            <h2><?=$result['name']?></h2>
          </div>
          <br>
          <div class="tf-input mt20">
            <a href="?act=chitiettour&idsp=<?=$result['id_dv']?>" class="a">Xem Thêm</a>
          </div>
        </div>
      </div>
    </div>
    <?php }}?>
  </div>