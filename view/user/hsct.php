<!-- hiện thông tin -->
<div class="query account-user-page active" id="account-user-page">
                <h2>hồ sơ của tôi</h2>
                <p>quản lý thông tin hồ sơ</p>
                <div class="form_tt">
                    <form action="index.php?act=user" method="post" enctype="multipart/form-data">
                        <div class="check_tt">
                            <div class="form_ck">
                                <!-- in ra bản thông tin -->
                                <?php
                                if (isset($_SESSION['id']) && $_SESSION['id']) {
                                    echo '<label for="">
                                                    <p>Tên đăng nhập</p>
                                                    <em>' . $_SESSION['name'] . '</em>
                                                </label>
                                                <label for="">
                                                    <p>Email</p>
                                                    <em>' . $_SESSION['email'] . '</em>
                                                </label>
                                                <label for="">
                                                    <p>Số điện thoại</p>
                                                    <em>' . $_SESSION['sdt'] . '</em>
                                                </label>
                                                <label for="">
                                                    <p>Địa chỉ</p>
                                                    <em>' . $_SESSION['dia_chi'] . '</em>
                                                </label>';
                                }
                                ;
                                ?>

                            </div>
                            <div class="img_ur">
                                <img src="<?= $_SESSION['img'] ?>" alt="ảnh đại diện" /><br><br>
                                <input type="file" id="iput_file" name="img" required />
                            </div>
                        </div>
                        <input type="submit" value="Lưu" name="save_img" />
                        <!-- lưu ảnh mới -->
                    </form>
                </div>
            </div>