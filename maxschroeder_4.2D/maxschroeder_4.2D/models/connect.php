<?php
	
	$link = new mysqli("localhost", "root", "", "maxschroeder_4.2d");
	
	
	if ($link->connect_error) {
		die("Error connecting to database....".$link->connect_error);
	}
	
?>