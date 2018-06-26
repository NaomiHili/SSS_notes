<?php
    if(isset($_POST['submit_btn'])){
        $email = $_POST['email1'];
        $number = $_POST['number1'];
        $comment = $_POST['comment1'];
        if($email != "" && $number != "" && $comment != ""){
            $myfile = fopen("../mydata.txt","a")or die("Unable to open file!");
            $txt = $email . "\n" . $number . "\n" . $comment . "\n";
            header('Location: ../views/contact.php?id=2');
            fwrite($myfile, "\n" . $txt);
            fclose($myfile);
        }
        else {
            header('Location: ../views/contact.php?id=1');
        }
    }
?>