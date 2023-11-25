<?php

$link=require_once "config.php";

// 清理使用者輸入
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $buyer_id = isset($_POST['buyer_id']) ? mysqli_real_escape_string($link, $_POST['buyer_id']) : '';
    $buyer_password = isset($_POST['buyer_password']) ? mysqli_real_escape_string($link, $_POST['buyer_password']) : '';
}

$result = $link -> query("SELECT buyer_name, buyer_address FROM `buyer` where buyer_id = '$buyer_id' and buyer_password = '$buyer_password'");
if(!$result){
    die('Error '.mysqli_error($link));
}

if($result->num_rows > 0){
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION["loggedin"] = true;
    $_SESSION["buyer_name"] = $row["buyer_name"];
    $_SESSION["buyer_address"] = $row["buyer_address"];
    header("location: profile_info/buyer.php");
    exit();
    // $output[] = $row;
    // print(json_encode($output, JSON_UNESCAPED_UNICODE));
}else{
    echo '<script>
    alert("登入失敗，請重新輸入登入憑證。"); 
    location.href="/logistics_tracking_system/buyer_login.html";
    </script>';
}

$link -> close()
?>