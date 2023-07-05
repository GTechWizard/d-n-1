const home = document.querySelector(".home"),
  formContainer = document.querySelector(".form_container"),
  formCloseBtn = document.querySelector(".form_close"),
  pwShowHide = document.querySelectorAll(".pw_hide");
pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

var signupBtn = document.getElementById("signup");
var loginBtn = document.getElementById("login");
var loginForm = document.querySelector(".login_form");
var signupForm = document.querySelector(".signup_form");
signupBtn.addEventListener("click", (event) => {
  signupForm.style.display='block';
  loginForm.style.display='none';
  event.preventDefault();
});
loginBtn.addEventListener("click", (event) => {
  signupForm.style.display='none';
  loginForm.style.display='block';
  event.preventDefault();
});
