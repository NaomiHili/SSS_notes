<?php
    require_once("connect.php");
    $user = "Admin";
    $pass = sha1("abc123");
    $sql = "Insert INTO users(username,password) VALUES ('$user','$pass')";
    
    $link->query($sql);
?>