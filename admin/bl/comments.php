<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Danh sách bình luận</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <div class="fixed-table-container">
        <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">ID Dv</th>
            <th class="th-inner">Tên Dv </th>
            <th class="th-inner">Ngày Bình Luận</th>
            <th class="th-inner">Nội Dung</th>
            <th class="th-inner">Đánh giá</th>
            <th class="th-inner">ID User</th>
            <th class="th-inner">Xóa</th>
          </thead>
          <?php 
            $comment = new comment;
            $blList=$comment->getAllComment();
            if($blList){
              while($result=$blList->fetch_assoc()){
          ?>
          <tbody class="fixed-table-body">
            <td class="th-inner"><?=$result['id_pk_dv']?></td>
            <td class="th-inner"><?=$result['name']?></td>
            <td class="th-inner"><?=$result['ngay_bl']?></td>
            <td class="th-inner"><?=$result['noi_dung']?></td>
            <td class="th-inner"><?=$result['danh_gia']?></td>
            <td class="th-inner"><?=$result['id_pk_user']?></td>
            <td class="th-inner"><a href="?act=delete_comment&id=<?=$result['id_bl']?>" onclick="return confirm('Bạn chắn chắn muốn xóa?')">Xóa</a></td>
          </tbody>
          <?php }}?>
        </table>
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