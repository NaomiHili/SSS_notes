<?php
    
    require_once('connection.php');
    $conn = connect();
    
    $id = $_GET['id'];
    $query = "Delete from student_tbl where Id = '$id'";
    $result= mysqli_query($conn, $query) or die ('Error in query');
    
    header("Location: revision.php");
   
    
?>
        