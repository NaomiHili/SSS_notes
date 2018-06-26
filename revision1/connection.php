<?php

    function connect()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'revision1_db', '3306') or die ('Cannot donnect to the db');
        return  $conn;
    }
   
            
    
    
?>