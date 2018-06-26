<?php
    
    function connect()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'school_db', '3306') or die ('Cannot connect to the school_db');
        return $conn;
    }

?>