// JavaScript để xử lý khi cuộn trang
window.addEventListener("scroll", function() {
    var menu = document.querySelector(".menu");
    var scrollY = window.scrollY;
  
    if (scrollY > 100) {
      menu.style.backgroundColor = "#333"; // Màu nền menu khi cuộn trang
    } else {
      menu.style.backgroundColor = "transparent"; // Màu nền menu khi ở đầu trang
    }
  });
  