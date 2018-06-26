<?php
	$id_to_delete = $_GET['id'];
	
	include("../models/connect.php");
					
	$sql = "DELETE FROM tbl_property WHERE propertyId='$id_to_delete'";
	
	//send statement to mysql
	$link->query($sql);
	
	//check if rows were affected
	if ($link->affected_rows == 1) {
		header("Location: ../views/list.php");
	}
	else {
		die("Something went wrong while deleting record!!");
	}
?>