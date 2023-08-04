<br><br><br><br><br><br>
<div class="wrapperz1">
    <div class="content">
        <h5><?=$result['name']?></h5>
        <span>
        <?=$result['bai_viet']?>
        </span>
            
    </div>
    
    <!-- tin mới  -->
    <div class="sidebar">
        <h4>Tin Mới</h4>
        <?php
          $noibattt= new tt;
          $tt = $noibattt->noibat();
          if($tt){
            while($result=$tt->fetch_assoc())
            {
        ?>
            <a href="?act=ct_tt&id=<?=$result['id_tt']?>">
                <hr>
                <div class="link">
                <div class="anh">
                    <img src="<?=$result['img_tt']?>" alt="img">
                </div>
                <div class="content_sile1">
                    <h6 class="mini1">
                    <?=$result['name']?>
                    </h6>
                    <div class="row">
                        <div class="riw">Bởi: <?=$result['tac_gia']?></div>
                        <div class="riw0">Ngày: <?=$result['ngay_d']?></div>
                    </div>
                </div></div>
            </a>
           <?php }}?>
    </div>
</div>
<br/> <br/>