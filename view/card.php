<br />
<br /><br /><br /><br />

<div class="container">
    <div class="checkoutLayout">
        <!-- header  -->


        <!--  check in -->
        <form class="right" method="post" action="?act=bill">
            <h1>Checkout</h1>

            <div class="form">
                <div class="group">
                    <label for="name">Name tour</label>
                    <input type="text" name="nametour" id="name" value="<?= $_GET['name'] ?>">
                    <input type="hidden" name="id_pk_dv" value="<?= $_GET['id_dv'] ?>">
                </div>
                <div class="group">
                    <label for="name">Full Name</label>
                    <input type="text" name="nameuser" id="name" value="<?= $_SESSION['name'] ?>">
                </div>

                <div class="group">
                    <label for="phone">Điểm đón</label>
                    <input type="text" name="diemden" id="phone" value="<?= $_GET['diem_den'] ?>">
                </div>

                <div class="group">
                    <label for="name">EMail</label>
                    <input type="text" name="email" id="name" value="<?= $_SESSION['email'] ?>">
                </div>

                <div class="group">
                    <label for="address">Phone number</label>
                    <input type="text" name="sdt" id="address" value="<?= $_SESSION['sdt'] ?>">
                </div>


                <div class="group">
                    <label for="country">Trẻ Em</label>
                    <label for="quantity">Từ 1 Đến 18</label><br>
                    <label for="country">Giá Trẻ Em: <?= $_GET['price_young'] ?></label>
                    <input type="number" id="quantity" name="price_young" min="1" max="10" require>
                    <input type="hidden"name="price_young_origin"  value="<?= $_GET['price_young'] ?>">
                </div>

                <div class="group">
                    <label for="city">Người Lớn</label>
                    <label for="quantity">Từ 19 Đến 100</label><br>
                    <label for="city">Giá Người Lớn: <?= $_GET['price_old'] ?></label>
                    <input type="number" id="quantity" name="price_old" min="1" max="10" require>
                    <input type="hidden"name="price_old_origin"  value="<?= $_GET['price_old'] ?>">
                    </select>
                </div>
            </div>
            <div class="return">
                <div class="row">
                    <h4> Hình Thức Thanh Toán: Thẻ Ngân Hàng</h4>
                </div>
                <div class="row">
                </div>
            </div>
            <input class="buttonCheckout" onclick=" return confirm('bạn có  chắc chắc không')" type="submit" name="get">
            <input class="buttonCheckout" type="reset">
        </form>
    </div>
</div>