<?php
    require_once("connect.php");
    if(isset($_POST['submit_btn'])){
        $town = $_POST['Town'];
        $type = $_POST['Type'];
        $price = $_POST['Price'];
        
        if(!empty($town) && !empty($type) && !empty($price)){
            $town = $link->real_escape_string($town);
            $type = $link->real_escape_string($type);
            $price = $link->real_escape_string($price);
            
            $sql = "SELECT townId FROM tbl_town WHERE town = '$town' ";
            $sql1 = "SELECT typeId FROM tbl_type WHERE type = '$type'";
            $result = $link->query($sql);
            $result1 = $link->query($sql1);
            $row = $result->fetch_array();
            $row1 = $result1->fetch_array();
            $townId = $row['townId'];
            $typeId = $row1['typeId'];
            
            $sql3 = "INSERT INTO tbl_property (price,typeId,townId)
                    VALUES ($price, $typeId, $townId)";
            $link->query($sql3);
            header('location: ../views/list.php');
            
        }
    }
?>