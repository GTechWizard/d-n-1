const searchIcon = document.getElementById('search-icon-hr');
const searchContainer = document.getElementById('search-container');
searchIcon.addEventListener('click', function(event) {
  searchContainer.style.display = 'block';
  event.stopPropagation();
});
document.body.addEventListener('click', function() {
  searchContainer.style.display = 'none';
});


// const video = document.getElementById('video');
// video.addEventListener('ended', function() {
//   video.currentTime = 0;
//   video.play();
// });