<?php

    $Name = $_POST["Sname"];
    $Surname = $_POST["Ssurname"];
    
    $Username = $_POST["Auser"];
    $Password = $_POST["Apass"];
    $Email = $_POST["Aemail"];
    
    
    $HashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    
    
    
    require_once("connection.php");
    $conn = connect();
    
    $query1 = "INSERT INTO account_tbl (Username,Email,Password) VALUES ('$Username', '$Email', '$HashedPassword')";
    echo $query1;
    

    require_once("connection.php");
    $conn1 = connect();
    
    $query2 = "INSERT INTO student_tbl (Name,Surname,Account_id) VALUES ('$Name', '$Surname',(select Account_Id from account_tbl where Username = '$Username') )";
    echo $query2;
    
    if($Name == "" || $Surname == "" || $Username == "" || $Password == "" || $Email == "")
    {
      echo "<script>window.location.href='register.php';alert('Please fill in all the fields.');</script>";  
    }
   
    else
    {
        echo"<script>window.location.href='index.php';alert('Welcome you have registered to the system.');</script>";
        mysqli_query($conn,$query1);
        mysqli_query($conn1,$query2);
    }


?>