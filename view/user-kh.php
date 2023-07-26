<div class="wrapper">
    <article class="final-user-page">
        <!-- thanh bar -->
        <main class="left-bar-user-page">
            <div>
                <ul>
                    <li class="">
                        <a>Tài Khoản</a>
                        <ul>
                            <li><a data-target="account-user-page" class="query_btn">hồ sơ của tôi</a></li>
                            <li><a data-target="change-pass-user-page" class="query_btn">đổi mật khẩu</a></li>
                            <li>
                                <a data-target="cntt" class="query_btn">cập nhật thông tin</a>
                            </li>
                        </ul>
                    </li>
                    <li data-target="dvl" class="query_btn">Dịch vụ Đã Thích</li>
                    <li data-target="dvs" class="query_btn">Dịch vụ Của Bạn</li>
                    <li><a href="../admin/index.html">Đăng Nhập Admin</a></li>
                </ul>
                <a href=""><img src="../img/logout.png" alt="log out" title="log out" /></a>
            </div>
        </main>
        <div class="user-control-trang-user">
            <!-- hiện thông tin -->
            <div class="query account-user-page active" id="account-user-page">
                <h2>hồ sơ của tôi</h2>
                <p>quản lý thông tin hồ sơ</p>
                <div class="form_tt">
                    <form action="#" method="post">
                        <div class="check_tt">
                            <div class="form_ck">
                                <label for="">
                                    <p>Tên đăng nhập</p>
                                    <em>trung minh</em>
                                </label>
                                <label for="">
                                    <p>Email</p>
                                    <em>123*******com</em>
                                </label>
                                <label for="">
                                    <p>Số điện thoại</p>
                                    <em>0123****90</em>
                                </label>
                                <label for="">
                                    <p>Địa chỉ</p>
                                    <em>quang trung, tp hcm</em>
                                </label>
                            </div>
                            <div class="img_ur">
                                <img src="../img/user.png" alt="ảnh đại diện" />
                                <input type="file" name="" id="iput_file" />
                            </div>
                        </div>
                        <input type="submit" value="Lưu" name="save" />
                    </form>
                </div>
            </div>
            <!-- đổi mật khẩu -->
            <div class="query change-pass-user-page " id="change-pass-user-page">
                <div class="content_mk">
                    <h2>Đổi mật khẩu</h2>
                    <form action="#" method="post">
                        <label for="">
                            <p>Mật khẩu cũ:</p>
                            <input type="password" name="" class="input_pass" id="see1" />
                            <label data-pass_see="see1" class="input_check_pass" id="hmk1">ẩn/hiện</label>
                        </label>
                        <label for="">
                            <p>Mật khẩu mới:</p>
                            <input type="password" name="" class="input_pass" id="see3" />
                            <label data-pass_see="see3" class="input_check_pass" id="hmk2">ẩn/hiện</label>
                        </label>
                        <label for="">
                            <p>Nhập lại mật khẩu mới:</p>
                            <input type="password" name="" class="input_pass" id="see2" />
                            <label data-pass_see="see2" class="input_check_pass" id="hmk3">
                                ẩn/hiện</label>
                        </label>
                        <div class="input_submit">
                            <input type="submit" value="Lưu" name="" />
                        </div>
                        <p data-target="qmk" class="query_btn">Quên mật khẩu</p>
                    </form>
                </div>
            </div>
            <!-- quên pass -->
            <div class="query qmk " id="qmk">
                <p>Đã gửi tin nhắn về email của bạn</p>
                <form>
                    <label for="">Nhập dãy số trong email<input type="text" placeholder="1234..." name="" /></label>
                    <input type="submit" value="Gửi" name="" data-target="mk_new" class="query_btn" />
                </form>
            </div>
            <div class="query dvl " id="dvl"></div>
            <!-- dich vu cua ban -->
            <div class="query dvs " id="dvs">
                <h2>dịch vụ đã đăng ký</h2>
                <div class="dv">
                    <ul class="uldvth">
                        <li>stt</li>
                        <li>tên dịch vụ</li>
                        <li>ảnh</li>
                        <li>ngày di chuyển</li>
                        <li>số người</li>
                        <li>Trạng thái</li>
                        <li>chi tiết</li>
                    </ul>
                    <ul class="uldvtd">
                        <li>1</li>
                        <li>cắm trại nơi sơn la kỳ thú</li>
                        <li><img src="../img/3.jpg" alt="" /></li>
                        <li>12/02/1212</li>
                        <li>12</li>
                        <li>chưa đi</li>
                        <li><a href="#">chi tiết</a></li>
                    </ul>
                </div>
            </div>
            <!-- nhap lai mat khau -->
            <div class="query mk_new " id="mk_new">
                <h2>Đổi mật khẩu</h2>
                <form action="#" method="post">
                    <label for="">
                        <p>Mật khẩu mới:</p>
                        <input type="password" name="" class="input_pass" id="mknew_1" />
                        <p class="input_check_pass" data-pass_see="mknew_1">ẩn/hiện</p>
                    </label>
                    <label for="">
                        <p>Nhập lại mật khẩu mới:</p>
                        <input type="password" name="" class="input_pass" id="mknew_2" />
                        <p class="input_check_pass" data-pass_see="mknew_2">ẩn/hiện</p>
                    </label>
                    <input type="submit" value="Lưu" name="" />
                </form>
            </div>
            <!--  update thong tin -->
            <div class="query cntt " id="cntt">
                <h2>cập nhật thông tin</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <div>
                            <label for="">
                                <p>tên đăng nhập:</p>
                                <input type="text" name="" />
                            </label>
                            <label for="">
                                <p>email:</p>
                                <input type="email" name="" />
                            </label>
                            <label for="">
                                <p>Mật khẩu:</p>
                                <input type="password" name="" /><br>
                                <em>Lưu ý: mật khẩu phải đúng</em>
                            </label>
                        </div>
                        <div>
                            <label for="">
                                <p>số điện thoại:</p>
                                <input type="number" name="" />
                            </label>
                            <label for="">
                                <p>địa chỉ:</p>
                                <input type="text" name="" /><br>
                                <em>Lưu ý: chúng tôi sẽ xác định bạn ở đâu, để chọn tuyến đường phù hợp</em>
                            </label>
                        </div>
                    </div>
                    <div class="check">
                        <input type="submit" value="lưu" name="save">
                        <input type="reset" value="làm lại">
                    </div>
                </form>
            </div>
        </div>
    </article>
</div><script src="view/js/userkh.js"></script>