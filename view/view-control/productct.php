<!-- Product Details -->
<?php
$result = $getiddv->fetch_assoc()
    ?>
<section class="section product-detail">
    <div class="div-mb-span" style="width: 72%; margin: auto; margin-bottom: 20px; text-transform: uppercase;">
        <span>trang chủ/
            <?= $result['name'] ?>
        </span>
    </div>
    <div class="details container-product">
        <div class="left image-container">
            <div class="main" style="border-radius:10px ;">
                <img src="uploads/<?= $result['img_dv'] ?>" id="zoom" alt="img" style="border-radius:10px ;" />
            </div>
            <div>

            </div>
        </div>
        <div class="right">

            <h1 style="text-transform: uppercase;">
                <?= $result['name'] ?>
            </h1>
            <div class="price">
                <?= $result['price_young'] ?> <span>VND</span>
            </div>
            <br>
            <div class="detail-span">
                <span>Ngày bắt đầu - Ngày kết thúc</span><br>
                <?php
                while ($result2 = $getPriceDay->fetch_assoc()) {
                    echo $result2['day_start'] . " - " . $result2['day_end'] . "<br>";
                }
                ?>
                <br>
                <span>Điểm Đón:
                    <?= $result['noi_bd'] ?> --> Điểm Đến:
                    <?= $result['diem_den'] ?>
                </span>
                <br>
                <br>
            </div>
            <form class="form-product">
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] != '') { ?>
                    <a href="?act=dattuor&id_dv=<?= $result['id_dv'] ?>&name=<?= $result['name'] ?>&day_start=<?= $result['day_start'] ?>&day_end=<?= $result['day_end'] ?>&price_young=<?= $result['price_young'] ?>&price_old=<?= $result['price_old'] ?>&diem_den=<?= $result['diem_den'] ?>&noi_bd=<?= $result['noi_bd'] ?>"
                        class="addCart" style="txext-decoration: none; text-transform: uppercase; font-weight: bold;">đặt tour</a>
                    <a href="?act=like&iduser=<?= $_SESSION['id'] ?>&iddv=<?= $result['id_dv'] ?>" class="addCart" style="text-decoration: none; text-transform: uppercase; font-weight: bold;">yêu thích</a>
                    <?php
                } else { ?>
                    <em>Hãy đăng nhập để có thể đặt tour</em><br><br><br>
                    <a href="?act=dn" class="addCart" style="text-decoration: none; text-transform: uppercase; font-weight: bold;">đăng nhập</a>
                <?php } ?>
            </form>
        </div>
    </div>
</section>
<div class="tabContainer container-product">
    <div class="buttonContainer">
        <button onclick="showPanel(0,'red')">chi tiết</button>
        <?php
        if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
            echo ' <button class="ml10" onclick="showPanel(1,\'#f44336\')">đánh giá</button>';
        } else {
            echo '<em>Hãy đăng nhập để bình luận cho dịch vụ này</em>';
        }
        ?>

    </div>
    <div class="tabPanel">
        <section class="view-post">

            <div class="heading">
                <h1>
                    <?= $result['bai_viet'] ?>
                </h1>
            </div>



        </section>
    </div>
    <div class="tabPanel">
        <section class="view-post">

            <div class="heading">
                <?= $result['name'] ?>
            </div>

            <div class="row">
                <div class="col">
                    <img src="uploads/<?= $result['img_dv'] ?>" alt="img" class="image">
                    <h3 class="title"></h3>
                </div>
                <div class="col">
                    <div class="flex">
                        <div class="total-reviews">
                            <h3>5<i class="fas fa-star"></i></h3>
                            <p>10 đánh giá</p>
                        </div>
                        <div class="total-ratings">
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>5</span>
                            </p>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>0</span>
                            </p>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>2</span>
                            </p>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>0</span>
                            </p>
                            <p>
                                <i class="fas fa-star"></i>
                                <span>1</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews-container">
            <div class="heading">
                <h1>tất cả đánh giá</h1>
                <?php
                $bl = new comment;
                $counts = $bl->getBlIdUser($_SESSION['id'], $result['id_dv']);
                $count = $counts->fetch_assoc();
                if ($count['count'] > 0) {
                    echo '';
                } else {
                    echo '<input type="submit" value="đánh giá" class="inline-delete-btn" id="my-input">';
                }
                ?>
                <div id="my-form" class="hidden">
                    <form action="?act=bl" method="post" class="from-main">
                        <h3>Đánh Giá Của Bạn</h3>
                        <p class="placeholder">tiêu đề <span>*</span></p>
                        <input type="text" name="title" required maxlength="50" placeholder="nhập tiêu đề" class="box">
                        <input type="hidden" name="id_dv" value="<?= $result['id_dv'] ?>">
                        <p class="placeholder">nội dung</p>
                        <textarea name="description" class="box" placeholder="nhập nội dung" maxlength="1000" cols="30" rows="10"></textarea>
                        <p class="placeholder">đánh giá sao <span>*</span></p>
                        <select name="rating" class="box" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input type="submit" value="đăng bài" name="submit" class="btn">
                    </form>
                </div>
            </div>

            <div class="box-container">
                <?php
                $blall = $bl->userOfBl($result['id_dv']);
                if ($blall) {
                    while ($resultbluser = $blall->fetch_assoc()) {
                        ?>
                       <div class="box">
                            <div class="user">
                                <img src="<?= $resultbluser['img'] ?>" alt="ảnh đại diện">
                                <p>
                                    <?= $resultbluser['name']; ?>
                                </p>
                                <div>
                                    <p></p>
                                    <span>
                                        <?= $resultbluser['ngay_bl'] ?>
                                    </span>
                                </div>
                            </div>

                            <div class="ratings">

                                <p style="background:var(--red);"><i class="fas fa-star"></i><span>
                                        <?= $resultbluser['danh_gia'] ?>
                                    </span></p>
                                <!-- <p style="background:var(--orange);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--orange);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span></span></p> -->
                            </div>
                            <h3 class="title">
                                <?= $resultbluser['td'] ?>
                            </h3>

                            <p class="description">
                                <?= $resultbluser['noi_dung'] ?>
                            </p>
                            <br>
                            <form action="" method="post" class="flex-btn">
                                <input type="hidden" name="delete_id" value="">
                                <div id="my-form" class="hidden">
                                </div>
                                <input type="submit" value="xóa đánh giá" class="inline-delete-btn" name="delete_review" onclick="return confirm('delete this review?');">
                            </form>
                        </div>
                    <?php }
                } ?>
            </div>

        </section>

    </div>

</div>

<script src="view/js/nav.js"></script>