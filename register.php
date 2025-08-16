<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
        
        $_SESSION['success'] = "تم إنشاء الحساب بنجاح!";
        header("Location: login.php");
        exit();
        
    } catch(PDOException $e) {
        $error = "خطأ: البريد الإلكتروني مستخدم مسبقاً!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>إنشاء حساب جديد</h2>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="text" name="name" placeholder="الاسم الكامل" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">إنشاء الحساب</button>
        </form>
        
        <p>لديك حساب؟ <a href="login.php">سجل دخولك</a></p>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
</html>