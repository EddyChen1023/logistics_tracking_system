<?php
    $link = mysqli_connect("localhost", "anzhe", "angel123", "logistics_tracking");
    $link -> set_charset("UTF-8");
    
    // 輸入中文也 OK 的 encode
    mysqli_query($link, 'SET NAMES utf8');
    
    if($link===false){
        die('Error '.mysqli_connect_error());
    }else{
        return $link;
    }
?>