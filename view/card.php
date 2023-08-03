<br/>
<br/><br/><br/><br/>
    
<div class="container">
    <div class="checkoutLayout">
<!-- header  -->
        

        <!--  check in -->
        <div class="right">
            <h1>Checkout</h1>

            <div class="form">
                <div class="group">
                    <label for="name">Name tour</label>
                    <input type="text" name="name" id="name" value="<?=$_GET['name']?>">
                </div>
                <div class="group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="<?=$_SESSION['name']?>">
                </div>
    
                <div class="group">
                    <label for="phone">Điểm đón</label>
                    <input type="text" name="phone" id="phone" value="<?=$_GET['diem_den']?>">
                </div>

                <div class="group">
                    <label for="name">GMail</label>
                    <input type="text" name="name" id="name" value="<?=$_SESSION['gmail']?>">
                </div>
    
                <div class="group">
                    <label for="address">Phone number</label>
                    <input type="text" name="address" id="address" value="<?=$_SESSION['sdt']?>">
                </div>
    

                <div class="group">
                    <label for="country">Trẻ Em</label>
                    <label for="quantity">Từ 1 Đến 18</label>
                <input type="number" id="quantity" name="quantity" min="1" max="18" placeholder="Giá Trẻ Em: <?=$_GET['price_young']?>">
                </div>
    
                <div class="group">
                    <label for="city">Người Lớn</label>
                    <label for="quantity">Từ 19 Đến 100</label>
                    <input type="number" id="quantity" name="quantity" min="19" max="100"  placeholder="Giá Người Lớn: <?=$_GET['price_old']?>">
                    </select>
                </div>
            </div>
            <div class="return">
                <div class="row">
                    <h2> hình thức thanh toán</h2>
                    <form action="">
                        <input type="radio" checked="checked" value="male" name="gender"> Tiền Mặt<br>
                        <input type="radio" value="female" name="gender"> Thẻ Bar<br>
                        <input type="radio" value="female" name="gender"> App<br>
                        <input type="radio" value="female" name="gender"> PyPay<br>
                        
                      </form>
                </div>
                <div class="row">
                    <div>Total Price</div>
                    <div class="totalPrice">$900</div>
                </div>
            </div>
            <button class="buttonCheckout"onclick=" return confirm('bạn có  chắc chắc không')">checkout</button>
            </div>
    </div>
</div>