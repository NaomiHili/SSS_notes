<?php
if(isset($_POST['submit_btn'])){
    $option = $_POST['attribute'];
    $index = $_POST['index'];
    if ($option == "Default")
        $option = "propertyId";
    if ($option == "Town")
        $option = "town ";
    if ($option == "Type")
        $option = "type ";
    if ($option == "Price")
        $option = "price ";
    if ($index == "Descending")
        $index = "DESC";
    else
        $index = "";
    header('location: ../views/list.php?option='.$option.'&index='.$index);
}
?>