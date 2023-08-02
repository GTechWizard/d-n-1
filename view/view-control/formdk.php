<section class="home mb40">
      <div class="form_container">
        <!-- Login From -->
        <div class="form login_form">
          <!-- ko cần index.php rồi ?act=... -->
          <form action="?act=login" method="post">
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
            <input class="button" type="submit" name="log" value="Login">

            <div class="login_signup">Don't have an account? <a id="signup">Signup</a></div>
          </form>
        </div>

        <!-- Signup From -->
        <div class="form signup_form">
          <form action="?act=signup" method="post">
            <h2>Signup</h2>
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
            <input class="button" type="submit" name="sign" value="Signup Now">
              <input type="reset" value="reset">
            <div class="login_signup">Already have an account? <a id="login">Login</a></div>
          </form>
        </div>
      </div>
    </section>
