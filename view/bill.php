<br/>
<br/><br/><br/><br/>
    
<div class="container">
    <div class="checkoutLayout">
<!-- header  -->
        

        <!--  check in -->
        <div class="right">
            <h1>Thông Tin Dịch Vụ</h1>

            <div class="form">
                <div class="group">
                    <p> Người đăng ký: <?=$_POST['nameuser']?></p>
                </div>
                <div class="group">
                <p>Tên Tour: <?=$_POST['nametour']?></p>
                </div>
    
                <div class="group">
                <p>Điểm Đón: <?=$_POST['diemden']?></p>
                </div>

                <div class="group">
                <p>Email Của Bạn: <?=$_POST['email']?></p>
                </div><br>
    
                <div class="group">
                    <p>Số Điện Thoại Của Bạn: <?=$_POST['sdt']?></p>
                </div><br>
    

                <div class="group">
                    <p> Tổng Tiền: 
                        <?php 
                    if(isset($_POST['price_young'])&& isset($_POST['price_old']))
                    {$tongtien= $_POST['price_young'] * $_POST['price_young_origin'] + $_POST['price_old'] * $_POST['price_old_origin']
                     ;echo $tongtien;}else{echo "bạn chưa chọn số lượng";}?> VND</p>
                </div>
            </div>
            <div class="return">
                <div class="row">
                    <h4> Hình Thức Thanh Toán: Thẻ Ngân Hàng</h4>
                </div>
                <div class="row">
                </div>
                <a href="?act=home" class="button">Trở Lại</a>
            </div>
            </div>
    </div>
</div>