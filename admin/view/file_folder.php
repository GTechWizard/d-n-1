<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Quản Lý File Và Folder</li>
    </ol>
  </div>
  <!--/.row-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <ul class="flex ul bg-info">
        <li class="nav-item pm-1_05">
          <a class="nav-link active" aria-current="page" href="?act=fup">Folder Uploads</a>
        </li>
        <li class="nav-item pm-1_05">
          <a class="nav-link" href="?act=fim">Folder Images</a>
        </li>
        <li class="nav-item pm-1_05">
          <a class="nav-link" href="?act=fvi">Folder Videos</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- menu -->
  <div class="row">
    <?php
    if (isset($_GET['alert']) && $_GET['alert'] != '') {
      echo $_GET['alert'];
    }
    if (isset($_GET['act']) && $_GET['act']) {
      $act = $_GET['act'];
      switch ($act) {
          case 'fup':
            $dir = "../uploads";

            // Kiểm tra xem thư mục tồn tại không
            if (is_dir($dir)) {
              // Lấy danh sách các file và folder trong thư mục
              $files = scandir($dir);

              // Hiển thị danh sách các file và folder
              echo "<h4>Các file và folder trong thư mục uploads<h4>";
              echo "<ul>";
              foreach ($files as $file) {
                echo '<div class="col-md-4 ">
          <img src="' . $dir . '/' . $file . '" alt="img" width="90%" height="150px" class="mt-3">
          <em>' . $file . '</em>
          <a href="?act=delete_file&dir=' . $dir . '&value=' . $file . '&hr=' . $act . '" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a>
          </div>';
              }
              echo "</ul>";
            } else {
              echo "Thư mục $dir không tồn tại!";
            }
            break;
        case 'fim':
          $dir = "../img";

          // Kiểm tra xem thư mục tồn tại không
          if (is_dir($dir)) {
            // Lấy danh sách các file và folder trong thư mục
            $files = scandir($dir);

            // Hiển thị danh sách các file và folder
            echo "<h4>Các file và folder trong thư mục images</h4>";
            echo "<ul>";
            foreach ($files as $file) {
              echo '<div class="col-md-4">
        <img src="' . $dir . '/' . $file . '" alt="img" width="100%" class="mt-3">
        <em>' . $file . '</em>
        <a href="?act=delete_file&dir=' . $dir . '&value=' . $file . '&hr=' . $act . '" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a>
        </div>';
            }
            echo "</ul>";
          } else {
            echo "Thư mục $dir không tồn tại!";
          }
          break;
        case 'fvi':
          $dir = "../video";

          // Kiểm tra xem thư mục tồn tại không
          if (is_dir($dir)) {
            // Lấy danh sách các file và folder trong thư mục
            $files = scandir($dir);

            // Hiển thị danh sách các file và folder
            echo "<h4>Các file và folder trong thư mục videos<h4>";
            echo "<ul>";
            foreach ($files as $file) {
              echo '<div class="col-md-4 overh">
        <div class="controler">
        <video src="' . $dir . '/' . $file . '" alt="video" width="90%" controls>
        </div>
        <div class="container">
        <em>' . $file . '</em>
        <a href="?act=delete_file&dir=' . $dir . '&value=' . $file . '&hr=' . $act . '" onclick="return confirm(\'Bạn chắn chắn muốn xóa?\')">Xóa</a>
        </div>
        </div>';
            }
            echo "</ul>";
          } else {
            echo "Thư mục $dir không tồn tại!";
          }
          break;
          case 'ff':
            echo'
            <div class="container w-100">
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa rem nemo cupiditate. Dolores, minus magnam? Inventore quod temporibus sed voluptas neque nemo ipsam porro, autem magnam quae perspiciatis minima recusandae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut id nemo hic magnam aspernatur temporibus fugiat, recusandae quod nisi suscipit voluptates, facere mollitia reprehenderit fugit ut iure ipsa sequi voluptate!</p>
            </div>';
            break;
      }
    }else{
      die();
    }
    ?>
  </div>

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