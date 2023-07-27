<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Loại dịch vụ</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <div class="fixed-table-container">
        <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">STT</th>
            <th class="th-inner">ID</th>
            <th class="th-inner">Ảnh</th>
            <th class="th-inner">Kiểu Dv</th>
          </thead>
          <?php 
            $loai = new loai;
            $loaiList=$loai->getAllLoai();
            $i=0;
            if($loaiList){
              while($result=$loaiList->fetch_assoc()){
                $i++;
          ?>
          <tbody class="fixed-table-body">
            <td class="th-inner"><?=$i?></td>
            <td class="th-inner"><?=$result['id_loai']?></td>
            <td class="th-inner"><?=$result['img']?></td>
            <td class="th-inner"><?=$result['kieu_dv']?></td>
          <tbody>
            <td colspan="4"><a href="?act=edit_loai&id=<?=$result['id_loai']?>" onclick="return confirm('Bạn chắn chắn muốn sửa?')">Sửa</a> <a href="?act=delete_loai&id=<?=$result['id_loai']?>" onclick="return confirm('Bạn chắn chắn muốn xóa?')">Xóa</a></td>
          </tbody>
          </tbody>
          <?php }}?>
        </table>
      </div>
    </div>
  </div>
  <!--/.main-->

  <script src="../../js/jquery-1.11.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/chart.min.js"></script>
  <script src="../../js/chart-data.js"></script>
  <script src="../../js/easypiechart.js"></script>
  <script src="../../js/easypiechart-data.js"></script>
  <script src="../../js/bootstrap-datepicker.js"></script>
  <script src="../../js/custom.js"></script>
</body>

</html>