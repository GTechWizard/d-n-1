<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Tìm kiếm</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
       <ul>
          <?php 
           if($files && $files!=''){
          foreach ($files as $file) {
            echo '<li><img src="'.$file.'" alt="img" width="20%" title="Ảnh đã tìm">
            <em>'.$search_term.'</em>
            <li>'; // In ra tên của từng file tìm được
          }
        }else{
          echo"<li>Không có ảnh trong folder uploads</li>";
        }?>
</ul>
        <?php 
            if($results1 && $results1!=false){
              while($result=$results1->fetch_assoc()){
              echo'
              <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">ID</th>
            <th class="th-inner">Tên</th>
            <th class="th-inner">SĐT</th>
            <th class="th-inner">Địa Chỉ</th>
            <th class="th-inner">Email</th>
            <th class="th-inner">Ảnh Đại Diện</th>
            <th class="th-inner">Vai Trò</th>
          </thead>
          <tbody class="fixed-table-body">
            <td class="th-inner">'.$result['id_user'].'</td>
            <td class="th-inner">'.$result['name'].'</td>
            <td class="th-inner">'.$result['sdt'].'</td>
            <td class="th-inner">'.$result['dia_chi'].'</td>
            <td class="th-inner">'.$result['email'].'</td>
            <td class="th-inner">'.$result['img'].'</td>
            <td class="th-inner">'.$result['vai_tro'].'</td>
          <tbody>
            <td colspan="8"><a href="?act=edit_user&id='.$result['id_user'].'"  onclick="return confirm(\'Bạn chắn chắn muốn chỉnh sửa?\')">Sửa</a>
            <a href="?act=delete_user&id='.$result['id_user'].'" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a></td>
          </tbody>
          </tbody>
        </table>';
      }
            }
              if($results2 && $results2!=false){
              while($result=$results2->fetch_assoc()){
                echo'
                <div class="col-md-4 col-lg-3 col-sm-6">
      <div class="card">
        <img src="'.$result['img_tt'].'" class="card-img-top" alt="img" />
        <div class="card-body">
          <h5 class="card-title">'.$result['name'].'</h5>
          <p class="card-text">'.$result['mo_ta'].'</p>
          <p class="card-text">Tác giả: '.$result['tac_gia'].'</p>
          <p class="card-text">Ngày Đăng: '.$result['ngay_d'].'</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="?act=bai_viet_tt&id='.$result['id_tt'].'">Nội dung</a></li>
        </ul>
        <div class="card-body-btn">
          <a href="?act=edit_tt&id='.$result['id_tt'].'" class="card-link" onclick="return confirm(\'Bạn chắn chắn muốn chỉnh sửa?\')">Sửa</a>
          <a href="?act=delete_tt&id='.$result['id_tt'].'" class="card-link" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a>
        </div>
      </div>
    </div>';
              }

              }
                if($results3 && $results3!=false){
              while($result=$results3->fetch_assoc()){
                echo'
                <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">ID</th>
            <th class="th-inner">Ảnh</th>
            <th class="th-inner">Kiểu Dv</th>
          </thead>
          <tbody class="fixed-table-body">
            <td class="th-inner">'.$result['id_loai'].'</td>
            <td class="th-inner">'.$result['img'].'</td>
            <td class="th-inner">'.$result['kieu_dv'].'</td>
          <tbody>
            <td colspan="4"><a href="?act=edit_loai&id='.$result['id_loai'].'" onclick="return confirm(\'Bạn chắn chắn muốn chỉnh sửa?\')">Sửa</a> <a href="?act=delete_loai&id='.$result['id_loai'].'" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a></td>
          </tbody>
          </tbody>
        </table>';
              }

              }
                if($results4 && $results4!=false){
              while($result=$results4->fetch_assoc()){
                echo'
                <table class="table fixed-table-container ">
                <thead class="fixed-table-header th-inner">
                  <th class="th-inner">ID DV</th>
                  <th class="th-inner">Tên DV</th>
                  <th class="th-inner">Nơi Bắt Đầu</th>
                  <th class="th-inner">Điểm đến</th>
                  <th class="th-inner">Ngày Đi</th>
                  <th class="th-inner">Ngày Về</th>
                  <th class="th-inner">Giá Trẻ Em</th>
                  <th class="th-inner">Giá Người Lớn</th>
                  <th class="th-inner">Lượt Xem</th>
                  <th class="th-inner">Tổng Người</th>
                  <th class="th-inner">Bài Viết</th>
                </thead>
                <tbody class="fixed-table-body">
                  <td class="th-inner">'.$result['id_dv'].'</td>
                  <td class="th-inner">'.$result['name'].'</td>
                  <td class="th-inner">'.$result['noi_bd'].'</td>
                  <td class="th-inner">'.$result['diem_den'].'</td>
                  <td class="th-inner">'.$result['day_start'].'</td>
                  <td class="th-inner">'.$result['day_end'].'</td>
                  <td class="th-inner">'.$result['price_young'].'</td>
                  <td class="th-inner">'.$result['price_old'].'</td>
                  <td class="th-inner">'.$result['luot_xem'].'</td>
                  <td class="th-inner">'.$result['tong_ng'].'</td>
                  <td class="th-inner"><a href="?act=ctbv_dv&id='.$result['id_dv'].'">Chi tiết</a></td>
                <tbody>
                  <td colspan="11"><a href="?act=edit_dv&id='.$result['id_dv'].'" onclick="return confirm(\'Bạn chắn chắn muốn chỉnh sửa?\')">Sửa</a> <a href="?act=delete_dv&id='.$result['id_dv'].'" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a></td>
                </tbody>
                </tbody>
              </table>';
              }

              }
          ?>
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