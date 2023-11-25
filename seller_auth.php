<?php

$link=require_once "config.php";

// 清理使用者輸入
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $seller_id = isset($_POST['seller_id']) ? mysqli_real_escape_string($link, $_POST['seller_id']) : '';
    $seller_password = isset($_POST['seller_password']) ? mysqli_real_escape_string($link, $_POST['seller_password']) : '';
}

$result = $link -> query("SELECT seller_name, seller_address FROM `seller` where seller_id = '$seller_id' and seller_password = '$seller_password'");
if(!$result){
    die('Error '.mysqli_error($link));
}

if($result->num_rows > 0){
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION["loggedin"] = true;
    $_SESSION["seller_name"] = $row["seller_name"];
    $_SESSION["seller_address"] = $row["seller_address"];
    header("location: profile_info/seller.php");
    // $output[] = $row;
    // print(json_encode($output, JSON_UNESCAPED_UNICODE));
}else{
    echo '<script>
    alert("登入失敗，請重新輸入登入憑證。"); 
    location.href="/logistics_tracking_system/seller_login.html";
    </script>';
}

$link -> close()
?>