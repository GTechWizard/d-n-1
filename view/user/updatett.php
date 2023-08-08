 <!--  update thong tin -->
 <div class=" cntt " id="cntt">
                <h2>cập nhật thông tin</h2>
                <form action="index.php?act=user" method="post">
                    <div class="form-group">
                        <div>
                            <label for="">
                                <p>tên đăng nhập:</p>
                                <input type="text" name="up_name"  required/>
                            </label>
                            <br>
                            <label for="">
                                <p>email:</p>
                                <input type="email" name="up_email" value="
                                <?php
                                echo $_SESSION['email'];
                                ?>
                                " required/>
                            </label>
                            <label for="">
                                <p>Mật khẩu:</p>
                                <input type="password" name="up_pass" required/><br>
                                <em>Lưu ý: mật khẩu phải đúng</em>
                            </label>
                        </div>
                        <div>
                            <label for="">
                                <p>số điện thoại:</p>
                                <input type="number" name="up_num"required/>
                            </label>
                            <label for="">
                                <p>địa chỉ:</p>
                                <input type="text" name="up_locate" required/><br>
                                <em>Lưu ý: chúng tôi sẽ xác định bạn ở đâu, để chọn tuyến đường phù hợp</em>
                            </label>
                        </div>
                    </div>
                    <div class="check">
                        <input type="submit" value="lưu" name="up_infor">
                        <input type="reset" value="làm lại">
                    </div>

                </form>
            </div>