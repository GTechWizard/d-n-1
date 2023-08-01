<!-- Product Details -->
<?php
$result = $getiddv->fetch_assoc();
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
                <img src="uploads/<?= $result['img_dv'] ?>" id="zoom" alt="" style="border-radius:10px ;" />
            </div>
            <div>

            </div>
        </div>
        <div class="right">

            <h1 style="text-transform: uppercase;">
                <?= $result['name'] ?>
            </h1>
            <div class="price">
                <?= $result['price_young'] ?>
            </div> <span>VND</span>
            <br>
            <div class="detail-span">
                <span>Ngày bắt đầu:
                    <?= $result['day_start'] ?>
                </span>-<span>Ngày kết thúc:
                    <?= $result['day_end'] ?>
                </span>
                <br>
                <span>điểm đón:
                    <?= $result['noi_bd'] ?> --> điểm đến:
                    <?= $result['diem_den'] ?>
                </span>
                <br>
                <br>
            </div>
            <form class="form-product">
                <a href="?act=dattuor&name=<?=$result['name']?>&day_start=<?=$result['day_start']?>&day_end=<?=$result['day_end']?>&price_young=<?=$result['price_young']?>&diem_den=<?=$result['diem_den'] ?>&noi_bd=<?=$result['noi_bd']?>" class="addCart" style="text-decoration: none; text-transform: uppercase; font-weight: bold;">đặt tour</a>
                <a href="cart.html" class="addCart" style="text-decoration: none; text-transform: uppercase; font-weight: bold;">yêu thích</a>
            </form>
        </div>
    </div>
</section>
<div class="tabContainer container-product">
    <div class="buttonContainer">
        <button onclick="showPanel(0,'red')">chi tiết</button>
        <button class="ml10" onclick="showPanel(1,'#f44336')">đánh giá</button>
    </div>
    <div class="tabPanel">
        <section class="view-post">

            <div class="heading">
                <h1>
                    <?= $result['bai_viet']?>
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
                    <img src="img/sapa.jpg" alt="" class="image">
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
                <input type="submit" value="đánh giá" class="inline-delete-btn" id="my-input">

                <div id="my-form" class="hidden">
                    <form action="" method="post" class="from-main">
                        <h3>đánh giá của bạn</h3>
                        <p class="placeholder">tiêu đề <span>*</span></p>
                        <input type="text" name="title" required maxlength="50" placeholder="nhập tiêu đề" class="box">
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


                <div class="box">
                    <div class="user">

                        <img src="img/profile8.jpg" alt="">
                        <!-- <h3><?= substr($fetch_user['name'], 0, 1); ?></h3> -->
                        <div>
                            <p>binhpeo</p>
                            <span>23-1-2023</span>
                        </div>
                    </div>

                    <div class="ratings">

                        <p style="background:var(--red);"><i class="fas fa-star"></i><span>1</span></p>
                        <!-- <p style="background:var(--orange);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--orange);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span></span></p> -->
                    </div>
                    <h3 class="title">tốt</h3>

                    <p class="description">Tại đất nước hồi giáo Malaysia: vui chơi giải trí tại Cao nguyên Genting
                        – Quần thể Resort Casino nổi tiếng thế giới.
                        Tham quan động Batu, Phố cổ Malacca và tòa nhà cao nhất Malaysia – Twin Towers (Niềm tự hào
                        của người dân Malaysia).</p>
                    <br>
                    <form action="" method="post" class="flex-btn">
                        <input type="hidden" name="delete_id" value="">
                        <div id="my-form" class="hidden">
                        </div>
                        <input type="submit" value="xóa đánh giá" class="inline-delete-btn" name="delete_review" onclick="return confirm('delete this review?');">
                    </form>
                </div>
                <div class="box">
                    <div class="user">

                        <img src="img/profile6.jpg" alt="">
                        <!-- <h3><?= substr($fetch_user['name'], 0, 1); ?></h3> -->
                        <div>
                            <p>binhpeo</p>
                            <span>23-1-2023</span>
                        </div>
                    </div>

                    <div class="ratings">

                        <p style="background:var(--red);"><i class="fas fa-star"></i><span>1</span></p>
                        <!-- <p style="background:var(--orange);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--orange);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span></span></p>
                  <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span></span></p> -->
                    </div>
                    <h3 class="title">tốt</h3>

                    <p class="description">Tại đất nước hồi giáo Malaysia: vui chơi giải trí tại Cao nguyên Genting
                        – Quần thể Resort Casino nổi tiếng thế giới.
                        Tham quan động Batu, Phố cổ Malacca và tòa nhà cao nhất Malaysia – Twin Towers (Niềm tự hào
                        của người dân Malaysia).</p>

                </div>
            </div>

        </section>

    </div>

</div>

<script src="view/js/nav.js"></script>