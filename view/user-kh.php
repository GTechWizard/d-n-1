<div class="wrapper">
    <article class="final-user-page">
        <!-- thanh bar -->
        <main class="left-bar-user-page" style="user-select: none;">
            <div>
                <ul>
                    <li>
                        <a>Tài Khoản</a>
                        <ul>
                            <li><a class="query_btn" href="?act=user&cn=hsct">hồ sơ của tôi</a></li>
                            <li><a class="query_btn" href="?act=user&cn=change_mk">đổi mật khẩu</a></li>
                            <li>
                                <a class="query_btn" href="?act=user&cn=updatett">cập nhật thông tin</a>
                            </li>
                        </ul>
                    </li>
                    <li class="query_btn"> <a href="?act=user&cn=dvl">Dịch vụ Đã Thích</a> </li>
                    <li class="query_btn"> <a href="?act=user&cn=dvmyself">Dịch vụ Của Bạn</a> </li>
                    <?php
                    if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
                        if ($_SESSION['vai_tro'] == 1) {
                            echo '<li><a href="admin/index.php">Đăng Nhập Admin</a></li>';
                        } else {
                            echo '';
                        }
                    } else {
                        echo '';
                    }
                    ;
                    ?>
                    <li><a href="?act=logout" onclick="return confirm('Bạn Muốn Đăng Xuất')">Đăng Xuất</a></li>
                </ul>
            </div>
        </main>
        <div class="user-control-trang-user">
            <?php
            if (isset($_GET['cn']) && $_GET['cn'] != '') {
                $cn = $_GET['cn'];
                switch ($cn) {

                    case 'change_mk':
                        include('user/change_mk.php');
                        break;

                    case 'hsct':
                        include('user/hsct.php');
                        break;

                    case 'updatett':
                        include('user/updatett.php');
                        break;

                    case 'dvl':
                        include('user/dvl.php');
                        break;

                    case 'dvmyself':
                        include('user/dvmyselt.php');
                        break;

                    case 'qmk':
                        include('user/quenpass.php');
                        break;

                    default:
                        include('user/hsct.php');
                        break;
                }
            } else {
                include('user/hsct.php');
            }
            ?>
        </div>
    </article>
</div>
<script src="view/js/userkh.js"></script>
<script>
    function hideEmail(email) {
        // Tìm vị trí của ký tự @ trong email
        var atIndex = email.indexOf('@');

        // Lấy phần tên người dùng (trước ký tự @)
        var username = email.slice(0, atIndex);

        // Lấy phần tên miền (sau ký tự @)
        var domain = email.slice(atIndex + 6);

        // Ẩn các ký tự trong phần tên người dùng
        var hiddenUsername = username.substring(0, 2) + '*******'.repeat(username.length - 2);

        // Kết hợp phần tên người dùng ẩn và phần tên miền
        var hiddenEmail = hiddenUsername + '@' + domain;

        return hiddenEmail;
    }
    var email = '<?= $_SESSION['email'] ?>';
    var hiddenEmail = hideEmail(email);
    document.getElementById("email").innerHTML=hiddenEmail;

    function hideCharacters(str) {
  // Kiểm tra xem chuỗi có đủ độ dài để ẩn hay không
  if (str.length < 10) {
    return str; // Trả về chuỗi ban đầu nếu không đủ độ dài
  }
  
  // Lấy ký tự đầu tiên và ký tự cuối cùng
  var firstChar = str[0];
  var lastChar = str[str.length - 1];
  
  // Tạo chuỗi với ký tự đầu tiên, các dấu * và ký tự cuối cùng
  var hiddenStr = firstChar + '*'.repeat(str.length - 3) + lastChar;
  
  return hiddenStr;
}

var inputStr = '<?= $_SESSION['sdt'] ?>';
var hiddenStr = hideCharacters(inputStr);
document.getElementById("sdt").innerHTML=hiddenStr;
</script>