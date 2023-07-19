<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Dịch vụ đang hiện hành</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="fixed-table-container">
      <table class="table fixed-table-container ">
        <thead class="fixed-table-header th-inner">
          <th class="th-inner">STT</th>
          <th class="th-inner">Nơi xuất Phát</th>
          <th class="th-inner">Điểm đến</th>
          <th class="th-inner">Ngày Đi</th>
          <th class="th-inner">Ngày Về</th>
          <th class="th-inner">Tổng Người</th>
          <th class="th-inner">Tổng Người Đã Đăng Ký </th>
          <th class="th-inner">Trạng Thái</th>
        </thead>
        <?php
        $i = 0;
        if ($dvUserList) {
          while ($result = $dvUserList->fetch_assoc()) {
            $i++;
            ?>
            <tbody class="fixed-table-body">
              <td class="th-inner">
                <?= $i ?>
              </td>
              <td class="th-inner">
                <?= $result['noi_bd'] ?>
              </td>
              <td class="th-inner">
                <?= $result['diem_den'] ?>
              </td>
              <td class="th-inner">
                <?= $result['day_start'] ?>
              </td>
              <td class="th-inner">
                <?= $result['day_end'] ?>
              </td>
              <td class="th-inner">
                <?= $result['tong_ng'] ?>
              </td>
              <td class="th-inner">
                <?= $result['so_luong'] ?>
              </td>
              <td class="th-inner">
                <?php
                switch ($result['trang_thai']) {
                  case 0:
                    echo "Đang chờ xác nhận";
                    break;
                  case 1:
                    echo "Chưa bắt đầu";
                    break;
                  case 2:
                    echo "Đang trong tour";
                    break;
                  case 3:
                    echo "Hoàn thành tour";
                    break;
                  default:
                }
                ?>
              </td>
            <tbody>
              <td colspan="11">
                <a href="?act=ct_dv_act&id=<?= $result['id_pk_dv'] ?>">Chi tiết</a>
                <a href="?act=delete_dv_act&id=<?= $result['id_pk_dv'] ?>">Xóa</a>
                <a href="?act=edit_act&id=<?= $result['id_price']?>" class="mr-l-5">Sửa</a>
              </td>
            </tbody>
            </tbody>
          <?php }
        } ?>
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