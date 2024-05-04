//回頂端
window.addEventListener('scroll', function () {
    var scrollPosition = window.scrollY;

    if (scrollPosition > 200) { // 調整這個閾值
        // 顯示回到頂部按鈕的代碼
        document.querySelector('.back-to-top').style.display = 'block';
    } else {
        // 隱藏回到頂部按鈕的代碼
        document.querySelector('.back-to-top').style.display = 'none';
    }
});

//聯絡我們表單
function openContactForm() {
    document.getElementById('contactForm').style.display = 'block';
}
function closeContactForm() {
    document.getElementById('contactForm').style.display = 'none';
}
function ContactFormSuccess(){
	alert("送出成功，謝謝您的意見！");
}
