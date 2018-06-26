<?php

    session_start();
    
    require_once("connection.php");
    $conn = connect();
    
    $hashpass = "SELECT Password FROM account_tbl WHERE (Username = '$_POST[Auser]')";
    
    $result = mysqli_query($conn,$hashpass) or die ("Error in query" . mysqli_error($conn));
    
    $userpass = $_POST['Apass'];
    
    $isCorrect = password_verify ($userpass,$hashpass);
    if($isCorrect)
    {
        echo "password is corect";
    }
    else
    {
       // echo"Incorrect password";
        echo"<script>window.location.href='login.php';alert('incorrect password. ');</script>";
    }
    
    
    $query1 = "select * from account_tbl where (Username = '$_POST[Auser]' && Password = '$isCorrect')";
    $result1 = mysqli_query($conn,$query1) or die ("Error in query1". mysqli_error($conn));

    
    if (mysqli_num_rows($result1) > 0)
    {
        $_SESSION ["Username"] = $_POST['Auser'];
        $_SESSION ["Password"] = $_POST['Apass'];
            
        echo $_SESSION['Username'];
        echo $_SESSION['Password'];
        
        $row = mysqli_fetch_row($result1);
        
        if($row[0] > 0)
        {
            $_SESSION['rowl'] = "student";
        }
        
         echo"<script>window.location.href='index.php';alert('Logged in as,  $_SESSION[rowl]. ');</script>";
        
  
        //echo"<script>window.location.href='login.php';alert('Incorrect username or password');</script>";
    
        
    }

?>