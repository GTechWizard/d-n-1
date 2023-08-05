<?php
require_once('database.php');
require_once('format.php');
require_once('model_dv.php');
?>

<?php
if (isset($_POST["action"])) {
    $search_name = $_POST["search_name"];
    $search1 = new dv;
    $search2 = $search1->searchsp($search_name);
    if (!$search2) {
        echo "KHONG CÓ SẢN PHẨM";
    } else {
        while ($result = $search2->fetch_assoc()) { ?>
            <div class="search-product mt20" style="width: 430px; height: 118px;margin: auto;">
                <div class="search-img">
                    <img src="/duan1/d-n-1/<?= $result['img_dv'] ?>" alt="" width="100px">
                </div>
                <div class="search-font">
                    <div class="search-h2 mt20">
                        <h2><?= $result['name'] ?></h2>
                    </div>
                    <div class="search-price">
                        <span><?= $result['tong_ng'] ?></span>
                    </div>
                    <div class="search-date">
                        <span>Từ đến s</span>
                    </div>
                    <img src="" alt="">
                </div>
            </div>
            
        <?php
        }
    }
}