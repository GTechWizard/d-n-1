<section class="home mb40">
      <div class="form_container">
        <!-- Login From -->
        <div class="form login_form">

          <form action="index.php?act=dn" method="post">
            <h2>Login</h2>
            <div class="input_box">
              <input type="email" placeholder="Enter your email" required name="log_email"/>
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Enter your password" required name="log_pass"/>
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="forgot_pw">Forgot password?</a>
            </div>

            <!-- <input class="button" type="submit" name="log" value="Login"> -->
            <button class="button" type="submit" name="log" value="Login">Login</button>

            <div class="login_signup">Don't have an account? <a id="signup">Signup</a></div>
            <?php 
              if(isset($_POST['log']) && $_POST['log']){
                $email = $_POST['log_email'];
                $pass = $_POST['log_pass'];

                $logsign= new log_sign;
                $log = $logsign->sign_log($email);

                // print_r("<script>
                //       alert(''.$log.'');
                //   </script>") ;

                echo "<script>
                      alert(''.$log.'');
                  </script>";
                  echo "<script>
                      alert('có post log');
                  </script>";
                
                  if(isset($log) && $log){
                    if($pass == $log['pass']){
                      $_SESSION['user']= $log;
                      // include "view/home.php";
                      echo "<script>
                      alert('(Đăng nhập thành công');
                      </script>";
                      header('Location http://localhost/dn1/');
                    }else{
                      echo "<script>
                            alert('Email hoặc mật khẩu không đúng');
                          </script>";
                    }
                  }else{
                    echo "<script>
                            alert('ko lấy dc db');
                          </script>";
                  }

              }else{               
                echo "<script>
                      alert('ko có post log');
                  </script>";
              }
              // print_r("<script>
                //     alert(''.$log.'');
                //   </script>") ;
                // }
            ?>
          </form>
        </div>

        <!-- Signup From -->
        <div class="form signup_form">
          <form action="index.php?act=dn" method="post">
            <h2>Signup</h2>
            <?php //re_sign();?>
            <div class="input_box">
              <i class="  uil-user"></i>
              <input type="Full name" placeholder="full name" required name="user_sign"/>
            </div>

            <div class="input_box">
              <input type="email" placeholder="Enter your email" required name="email_sign"/>
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Create password" required name="pass_sign"/>
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Confirm password" required name="re_pass_sign"/>
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="input_box">
              <i class="uil-home"></i>
              <input type="Địa chỉ" placeholder="Địa chỉ" required name="locate_sign"/>
            </div>
            <div class="input_box">
              <i class="uil uil-phone"></i>
              <input type="phone" placeholder="Enter your phone" required name="num_phone_sign"/>
            </div>
            <button class="button" type="submit" name="sign" value="Signup Now">Signup Now</button>
              <input type="button" type="submit" name="sign" value="Signup Now">
            <?php 
              if(isset($_POST['sign']) && $_POST['sign']){
                $name = $_POST['user_sign'];
                $email = $_POST['emal_sign'];
                $pass = $_POST['pass_sign'];
                $re_pass = $_POST['re_pass_sign'];
                $locate = $_POST['locate_sign'];
                $num = $_POST['num_phone_sign'];


                $logsign= new log_sign;
                $sign = $logsign->sign_log($email);

                // print_r("<script>
                //       alert(''.$log.'');
                //   </script>") ;

                echo "<script>
                      alert(''.$log.'');
                  </script>";
                  echo "<script>
                      alert('có post sign');
                  </script>";
                
                  if(isset($log) && $log == false){
                    if($pass != $re_pass){
                      echo "<script>
                              alert('Mật Khẩu xác nhận không trung khớp');
                            </script>";
                    }else{
                      $sql ="INSERT INTO `user`( `name`, `pass`, `sdt`, `dia_chi`, `email`, `img`, `vai_tro`) VALUES ('$name','$pass','$num','$locate','$email','./img/user.png','0'";
                      $logsign->set_one_User($sql);
                    }
                  }else{
                    echo "<script>
                            alert('ko lấy đc db');
                          </script>";
                  }

              }else{               
                echo "<script>
                      alert('ko có post sign');
                  </script>";
              }
              // print_r("<script>
                //     alert(''.$log.'');
                //   </script>") ;
                // }
            ?>
            <div class="login_signup">Already have an account? <a id="login">Login</a></div>
          </form>
        </div>
      </div>
    </section>
