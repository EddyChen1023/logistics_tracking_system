<?php

$link=require_once "config.php";

// 清理使用者輸入
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $driver_id = isset($_POST['driver_id']) ? mysqli_real_escape_string($link, $_POST['driver_id']) : '';
    $driver_password = isset($_POST['driver_password']) ? mysqli_real_escape_string($link, $_POST['driver_password']) : '';
}

$result = $link -> query("SELECT driver_name FROM `driver` where driver_id = '$driver_id' and driver_password = '$driver_password'");
if(!$result){
    die('Error '.mysqli_error($link));
}

if($result->num_rows > 0){
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION["loggedin"] = true;
    $_SESSION["driver_name"] = $row["driver_name"];
    header("location: profile_info/driver.php");
    // $output[] = $row;
    // print(json_encode($output, JSON_UNESCAPED_UNICODE));
}else{
    echo '<script>
    alert("登入失敗，請重新輸入登入憑證。"); 
    location.href="/logistics_tracking_system/driver_login.html";
    </script>';
}

$link -> close()
?>