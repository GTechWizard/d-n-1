 <!--  update thong tin -->
 <div class=" cntt " id="cntt">
                <h2>cập nhật thông tin</h2>
                <form action="index.php?act=user" method="post">
                    <div class="form-group">
                        <div>
                            <label for="">
                                <p>tên đăng nhập:</p>
                                <input type="text" name="up_name" value="
                                <?php
                                echo $_SESSION['name'];
                                ?>
                                " />
                            </label>
                            <label for="">
                                <p>email:</p>
                                <input type="email" name="up_email" value="
                                <?php
                                echo $_SESSION['email'];
                                ?>
                                " />
                            </label>
                            <label for="">
                                <p>Mật khẩu:</p>
                                <input type="password" name="up_pass" /><br>
                                <em>Lưu ý: mật khẩu phải đúng</em>
                            </label>
                        </div>
                        <div>
                            <label for="">
                                <p>số điện thoại:</p>
                                <input type="number" name="up_num" value="
                                <?php
                                echo $_SESSION['sdt'];
                                ?>
                                " />
                            </label>
                            <label for="">
                                <p>địa chỉ:</p>
                                <input type="text" name="up_locate" value="
                                <?php
                                echo $_SESSION['dia_chi'];
                                ?>
                                " /><br>
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