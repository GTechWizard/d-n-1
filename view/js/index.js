const searchIcon = document.getElementById('search-icon-hr');
const searchContainer = document.getElementById('search-container_hr');
searchIcon.addEventListener('click', function(event) {
  searchContainer.style.display = 'block';
  searchIcon.style.display = 'none';
  event.stopPropagation();
});
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    searchContainer.style.display = 'none';  
  searchIcon.style.display = 'block';
  }
});

const icon_menu= document.querySelector('.icon_menu_hr');
const menu= document.getElementById('menu')
icon_menu.addEventListener('click',function(event){
  if (menu.style.display === "none") {
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
  event.stopPropagation();
})

const video = document.getElementById('video');
video.play();
video.addEventListener('ended', function() {
  video.currentTime = 0;
  video.play();
});


$(document).ready(function() {
  var slideIndex = 0;
  showSlides();
  function showSlides() {
    var i;
    var slides = $(".mySlides_bn");
    // Ẩn tất cả các ảnh
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    // Tăng slideIndex
    slideIndex++;
    // Nếu slideIndex vượt quá số lượng ảnh, đặt lại slideIndex thành 1
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }
    // Hiển thị ảnh tiếp theo
    slides[slideIndex-1].style.display = "block";
    // Chuyển đổi các slide sau mỗi 2 giây
    setTimeout(showSlides, 2000);
  }
});

var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  grabCursor: 'true',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      },
  },
});
