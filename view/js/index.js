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


const video = document.getElementById('video');
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