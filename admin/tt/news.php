<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Tin Tức</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
  <?php 
            if($tts){
              while($result=$tts->fetch_assoc()){
          ?>
    <div class="col-md-4 col-lg-3 col-sm-6">
      <div class="card">
        <img src="<?=$result['img_tt']?>" class="card-img-top" alt="img" />
        <div class="card-body">
          <h5 class="card-title"><?=$result['name']?></h5>
          <p class="card-text"><?=$result['mo_ta']?></p>
          <p class="card-text">Tác giả: <?=$result['tac_gia']?></p>
          <p class="card-text">Ngày Đăng: <?=$result['ngay_d']?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="?act=bai_viet_tt&id=<?=$result['id_tt']?>">Nội dung</a></li>
        </ul>
        <div class="card-body-btn">
          <a href="?act=edit_tt&id=<?=$result['id_tt']?>" class="card-link" onclick="return confirm('Bạn chắn chắn muốn chỉnh sửa?')">Sửa</a>
          <a href="?act=delete_tt&id=<?=$result['id_tt']?>" class="card-link" onclick="return confirm('Bạn chắn chắn muốn xóa?')">Xóa</a>
        </div>
      </div>
    </div>
    <?php }}?>
  </div>
</div>
</div>
<!--/.main-->

<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/chart.min.js"></script>
<script src="../js/chart-data.js"></script>
<script src="../js/easypiechart.js"></script>
<script src="../js/easypiechart-data.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>