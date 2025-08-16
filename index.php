<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>موقع WEB6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>مرحبا بكم </h1>
        <div class="options">
            <a href="register.php" class="btn">إنشاء حساب جديد</a>
            <a href="login.php" class="btn">تسجيل الدخول</a>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>