<!-- đổi mật khẩu -->
<div class="change-pass-user-page">
    <div class="content_mk">
        <h2>Đổi mật khẩu</h2>
        <form action="index.php?act=user" method="post">
            <label for="">
                <p>Mật khẩu cũ:</p>
                <input type="password" class="input_pass" id="see1" name="old_pass"min="3" max="100" required/>
                <label data-pass_see="see1" class="input_check_pass" id="hmk1">ẩn/hiện</label>
            </label>
            <label for="">
                <p>Mật khẩu mới:</p>
                <input type="password" class="input_pass" id="see3" name="new_pass" min="3" max="100" required/>
                <label data-pass_see="see3" class="input_check_pass" id="hmk2">ẩn/hiện</label>
            </label>
            <label for="">
                <p>Nhập lại mật khẩu mới:</p>
                <input type="password" class="input_pass" id="see2" name="re_new_pass"min="3" max="100" required />
                <label data-pass_see="see2" class="input_check_pass" id="hmk3">ẩn/hiện</label>
            </label>
            <div class="input_submit">
                <input type="submit" value="Lưu" name="update_pass" />
                <!-- lưu pass -->
            </div>
            <a class="query_btn" href="?act=user&cn=qmk">Quên mật khẩu</a>
        </form>
    </div>
</div>