<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Bài viết của tin tức</li>
        </ol>
      </div>
      <!--/.row-->
      <div class="row pa-2">
      <a href="?act=tt" class="btn btn-info">Trở Lại</a>
      <?php 
            if($data){
              while($result=$data->fetch_assoc()){
                print_r($result['bai_viet']);
              }}
          ?>
            <a href="?act=tt" class="btn btn-info">Trở Lại</a>
    </div>
    <!--/.main-->
  </body>
</html>
