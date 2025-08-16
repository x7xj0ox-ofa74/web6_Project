<?php
// بدء الجلسة مرة واحدة فقط
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// الصفحات المحمية
$protectedPages = ['dashboard.php', 'quran.php'];
$currentFile = basename($_SERVER['SCRIPT_NAME']);

// التحقق من تسجيل الدخول
if (in_array($currentFile, $protectedPages)) {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
}
?>

<link rel="stylesheet" href="footer-style.css">

<div class="footer">
    <div class="footer-content">
        <p class="copyright">جميع الحقوق محفوظة</p>
        <p class="developer">Youssef Mohammed</p>
        <p class="supervisor">تحت إشراف برنامج كالقابض على الجمر</p>
    </div>
    <div class="footer-decoration">
        <div class="decoration-line"></div>
        <div class="decoration-icon">✨</div>
        <div class="decoration-line"></div>
    </div>
</div>


