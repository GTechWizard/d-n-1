<?php 
    if(isset($_GET['k098hsjuannkiy'])){
        echo "<script>
                            alert('Email hoặc số điện thoại không đúng');
                        </script>";
    }elseif(isset($_GET['mzxcnmjhdajsiwdnn'])){
        echo "<script>
        alert('Mật khẩu của bạn là: ".$_SESSION['pass']."');
    </script>";
    }
?>
 <div class=" mk_new ">
    <h2>Quên mật khẩu</h2>
    <form action="?act=user" method="post">
        <label for="">
            <p>Nhập email của bạn</p>
            <input type="email" name="email" class="input_pass" id="mknew_1" required autofocus/>
        </label>
        <label for="">
            <p>Nhập số điện thoại của bạn:</p>
            <input type="number" name="sdt" class="input_pass" id="mknew_2" required/>
        </label>
        <input type="submit" value="Gửi" name="pass" />
    </form>
</div>