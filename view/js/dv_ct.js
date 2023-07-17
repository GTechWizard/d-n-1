var tabButtons=document.querySelectorAll(".tabContainer .buttonContainer button");
var tabPanels=document.querySelectorAll(".tabContainer  .tabPanel");

function showPanel(panelIndex,colorCode) {
    tabButtons.forEach(function(node){
        node.style.backgroundColor="";
        node.style.color="";
    });
    tabButtons[panelIndex].style.backgroundColor=colorCode;
    tabButtons[panelIndex].style.color="white";
    tabPanels.forEach(function(node){
        node.style.display="none";
    });
    tabPanels[panelIndex].style.display="block";
}
showPanel(0,'#f44336');
// from none



const myInput = document.getElementById("my-input");
const myForm = document.getElementById("my-form");
const closeButton = document.createElement("span");

myInput.addEventListener("click", function() {
  myForm.classList.remove("hidden");
  document.body.style.overflow = "hidden"; // ngăn không cho trang cuộn khi form hiển thị
  document.body.appendChild(closeButton); // thêm nút đóng vào góc phải trên cùng của màn hình
});

closeButton.addEventListener("click", function() {
  myForm.classList.add("hidden");
  document.body.style.overflow = "auto"; // cho phép trang cuộn lại khi form đã bị ẩn
  document.body.removeChild(closeButton); // xóa nút đóng
});

// cài đặt nội dung và kiểu dáng cho nút đóng
closeButton.textContent = "X";
closeButton.style.position = "fixed";
closeButton.style.top = "20px";
closeButton.style.right = "20px";
closeButton.style.fontSize = "20px";
closeButton.style.cursor = "pointer";




