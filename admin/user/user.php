<?php 
  require_once('../model/model_user.php');
?>
  <!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Người Dùng</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <div class="fixed-table-container">
        <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">STT</th>
            <th class="th-inner">ID</th>
            <th class="th-inner">Tên</th>
            <th class="th-inner">SĐT</th>
            <th class="th-inner">Địa Chỉ</th>
            <th class="th-inner">Email</th>
            <th class="th-inner">Ảnh Đại Diện</th>
            <th class="th-inner">Vai Trò</th>
          </thead>
          <?php 
            $user = new user;
            $userList=$user->getAllUser();
            $i=0;
            if($userList){
              while($result=$userList->fetch_assoc()){
                $i++;
          ?>
          <tbody class="fixed-table-body">
            <td class="th-inner"><?=$i?></td>
            <td class="th-inner"><?=$result['id_user']?></td>
            <td class="th-inner"><?=$result['name']?></td>
            <td class="th-inner"><?=$result['sdt']?></td>
            <td class="th-inner"><?=$result['dia_chi']?></td>
            <td class="th-inner"><?=$result['email']?></td>
            <td class="th-inner"><?=$result['img']?></td>
            <td class="th-inner"><?=$result['vai_tro']?></td>
          <tbody>
            <td colspan="8"><a href="?act=edit_user&id=<?=$result['id_user']?>">Sửa</a><a href="?act=delete_user&id=<?=$result['id_user']?>">Xóa</a></td>
          </tbody>
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