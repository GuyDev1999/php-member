<?php
    session_start();
    $conn = new mysqli('localhost','root','','myweb');
    $conn->set_charset("utf8");
    
    if ($conn->connect_errno) {
        die("Connection Failed! " .$conn->connect_error);
    }

    date_default_timezone_set ('Asia/Bangkok');
?>

