<?php
    session_start();
    $seller_name=$_SESSION["seller_name"];
    $seller_address=$_SESSION["seller_address"];
    if($_SESSION["loggedin"] == false){
       // 如果有人按登出後試圖按上一頁回到登入狀態，將被定向至首頁
       // 延遲執行確認資料未外洩
       //echo'<script>alert("請重新登入"); window.setTimeout((() => window.location="../home.php"), 10000);</script>';
       echo'<script>alert("請重新登入"); window.location="../home.php";</script>';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistics Tracking System</title>
    <link rel="stylesheet" href="../css/styles_of_list.css">
</head>
<body>
    <header>
        <h1>物流追蹤系統</h1>
    </header>
    
    <section id="user-info">
        <h2>賣家資訊</h2>
        <p><strong>姓名:</strong> <span id="seller-name"><?php echo $seller_name ?></span></p>
        <p><strong>地址:</strong> <span id="seller-address"><?php echo $seller_address ?></span></p>
    </section>

    <section id="action-buttons">
        <button id="view_list" onclick="viewAllLists()">View All Lists</button>
        <button id ="logout" onclick="location.href='../logout.php'">Logout</button>
    </section>
    
    <footer>
        <p>&copy; 2023 Logistics Tracking System</p>
    </footer>
</body>
</html>