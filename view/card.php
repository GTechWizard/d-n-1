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
                    <input type="text" name="nameuser" id="name" value="<?php 
                     if(isset($_SESSION['id'])){
                        echo $_SESSION['name'];
                    }else{
                        echo"";
                    }?>">
                </div>

                <!-- <div class="group">
                    <label>Điểm đón</label>
                    <input type="text" name="diemden" id="phone" value="">
                </div> -->
                <div class="group">
                    <label>Ngày đi</label>
                    <select name="id_pk_price_tour" id="id_pk_price_tour">
                        <?php 
                            if(isset($getPriceDay) && $getPriceDay!=''){
                               while ($result= $getPriceDay->fetch_assoc()) {
                                    echo '<option value="'.$result['id_price'].'">'.$result['day_start']." - ".$result['day_end'].'</option>';
                               }
                                }
                        ?>
                    </select>
                </div>

                <div class="group">
                    <label for="name">EMail</label>
                    <input type="text" name="email" id="name" value="<?php 
                     if(isset($_SESSION['id'])){
                        echo $_SESSION['email'];
                    }else{
                        echo"";
                    }?>">
                </div>

                <div class="group">
                    <label for="address">Phone number</label>
                    <input type="text" name="sdt" id="address" value="<?php 
                     if(isset($_SESSION['id'])){
                        echo $_SESSION['sdt'];
                    }else{
                        echo"";
                    }?>">
                </div>


                <div class="group">
                    <label >Trẻ Em</label>
                    <label >Từ 1 Đến 18</label><br>
                    <label>Giá Trẻ Em: <em id="pricey"></em></label>
                    <input type="number"name="price_young" required>
                    <input type="hidden"name="price_young_origin"  value="<?= $_GET['price_young'] ?>">
                </div>

                <div class="group">
                    <label >Người Lớn</label>
                    <label >Từ 19 Đến 100</label><br>
                    <label >Giá Người Lớn: <em id="priceo"></em></label>
                    <input type="number"name="price_old" required>
                    <input type="hidden"name="price_old_origin"  value="<?= $_GET['price_old'] ?>">
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