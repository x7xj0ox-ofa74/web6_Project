<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// بيانات السور الثلاث
$suras = [
    [
        'number' => 112,
        'name' => 'الإخلاص',
        'content' => "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ قُلْ هُوَ اللَّهُ أَحَدٌ (1) اللَّهُ الصَّمَدُ (2) لَمْ يَلِدْ وَلَمْ يُولَدْ (3) وَلَمْ يَكُنْ لَهُ كُفُوًا أَحَدٌ (4)"
    ],
    [
        'number' => 113,
        'name' => 'الفلق',
        'content' => "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ قُلْ أَعُوذُ بِرَبِّ الْفَلَقِ (1) مِنْ شَرِّ مَا خَلَقَ (2) وَمِنْ شَرِّ غَاسِقٍ إِذَا وَقَبَ (3) وَمِنْ شَرِّ النَّفَّاثَاتِ فِي الْعُقَدِ (4) وَمِنْ شَرِّ حَاسِدٍ إِذَا حَسَدَ (5)"
    ],
    [
        'number' => 114,
        'name' => 'الناس',
        'content' => "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ قُلْ أَعُوذُ بِرَبِّ النَّاسِ (1) مَلِكِ النَّاسِ (2) إِلَٰهُ النَّاسِ (3) مِنْ شَرِّ الْوَسْوَاسِ الْخَنَّاسِ (4) الَّذِي يُوَسْوِسُ فِي صُدُورِ النَّاسِ (5) مِنَ الْجِنَّةِ وَالنَّاسِ (6)"
    ]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>المعوذات - القرآن الكريم</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .quran-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .page-title {
            color: #fff;
            font-size: 36px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .page-subtitle {
            color: #e0e0e0;
            font-size: 18px;
        }
        
        .suras-container {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .sura-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 300px;
            max-width: 350px;
        }
        
        .sura-card:hover {
            transform: translateY(-5px);
        }
        
        .sura-header {
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .sura-number {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 5px;
        }
        
        .sura-name {
            font-size: 24px;
            font-weight: bold;
        }
        
        .sura-content {
            padding: 25px;
            font-size: 20px;
            line-height: 2.5;
            text-align: right;
            font-family: 'Traditional Arabic', 'Amiri Quran', 'Arial', sans-serif;
            direction: rtl;
        }
        
        .basmala {
            color: #4CAF50;
            font-weight: bold;
            text-align: center;
            font-size: 22px;
            margin-bottom: 15px;
            padding: 10px;
            border-bottom: 1px dashed #e0e0e0;
        }
        
        .ayah {
            margin-bottom: 15px;
            padding-right: 10px;
            border-right: 3px solid #4CAF50;
        }
        
        .ayah:last-child {
            margin-bottom: 0;
        }
        
        .ayah-number {
            color: #4CAF50;
            font-weight: bold;
            margin-left: 5px;
            font-size: 18px;
        }
        
        .back-btn {
            display: inline-block;
            background: #2196F3;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 25px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
        }
        
        .back-btn:hover {
            background: #1976D2;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
        }
        
        .footer-note {
            text-align: center;
            color: #e0e0e0;
            margin-top: 40px;
            font-size: 16px;
        }
        
        /* ألوان مختلفة لكل سورة */
        .sura-card:nth-child(1) .sura-header {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        }
        
        .sura-card:nth-child(2) .sura-header {
            background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);
        }
        
        .sura-card:nth-child(3) .sura-header {
            background: linear-gradient(135deg, #9C27B0 0%, #7B1FA2 100%);
        }
        
        /* تصميم متجاوب */
        @media (max-width: 768px) {
            .suras-container {
                flex-direction: column;
                align-items: center;
            }
            
            .sura-card {
                max-width: 100%;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .sura-content {
                font-size: 18px;
                padding: 20px;
            }
            
            .sura-name {
                font-size: 22px;
            }
        }
        
        @media (max-width: 480px) {
            .sura-card {
                min-width: 280px;
            }
            
            .basmala {
                font-size: 20px;
            }
            
            .sura-content {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="quran-container">
        <div class="page-header">
            <h1 class="page-title">سور المعوذات</h1>
            <p class="page-subtitle">الإخلاص - الفلق - الناس</p>
        </div>
        
        <a href="dashboard.php" class="back-btn">← العودة للرئيسية</a>
        
        <div class="suras-container">
            <?php foreach ($suras as $sura): ?>
                <div class="sura-card">
                    <div class="sura-header">
                        <div class="sura-number">سورة رقم <?php echo $sura['number']; ?></div>
                        <div class="sura-name"><?php echo $sura['name']; ?></div>
                    </div>
                    <div class="sura-content">
                        <div class="basmala">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
                        <?php 
                        // تقسيم الآيات وإضافة أرقامها
                        $ayahs = explode('(', $sura['content']);
                        foreach ($ayahs as $ayah) {
                            if (trim($ayah) != '') {
                                $parts = explode(')', $ayah, 2);
                                if (count($parts) == 2) {
                                    echo '<div class="ayah">' . trim($parts[1]) . '<span class="ayah-number">(' . $parts[0] . ')</span></div>';
                                } else {
                                    echo '<div class="ayah">' . trim($parts[0]) . '</div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="footer-note">
            <p>﴿ وَقُل رَّبِّ زِدْنِي عِلْمًا ﴾</p>
            <p>سورة طه، الآية 114</p>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>