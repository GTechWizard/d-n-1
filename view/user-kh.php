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
                if( isset($_GET['cn']) && $_GET['cn']!=''){
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
                }else{
                    include('user/hsct.php');
                }
            ?>
        </div>
    </article>
</div>
<script src="view/js/userkh.js"></script>