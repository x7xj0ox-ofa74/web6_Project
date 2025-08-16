<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .menu {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin: 20px 0;
        }
        .menu .btn {
            background: #4CAF50;
        }
        .menu .btn:hover {
            background: #45a049;
        }
        .quran-btn {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }
        .quran-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>مرحباً <?php echo $_SESSION['user']['name']; ?>!</h2>
        
        <div class="menu">
            <a href="quran.php" class="quran-btn">📖 سور المعوذات</a>
            <a href="logout.php" class="btn">تسجيل الخروج</a>
        </div>
        
        <div class="user-info">
            <p><strong>البريد الإلكتروني:</strong> <?php echo $_SESSION['user']['email']; ?></p>
            <p><strong>تاريخ التسجيل:</strong> <?php echo $_SESSION['user']['created_at']; ?></p>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>