<?php
    session_start();
    session_unset();
    header("location: ../views/list.php");
?>