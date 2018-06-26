<?php
	session_start();
	
	if (isset($_POST['submit_button'])) {
		
		$user = $_POST['user'];
		$password = $_POST['password'];
		
		$errors = "";
		
		if (empty($user)) {
			$errors .= "User required!<br/>";
		}
		
		if (empty($password))
			$errors .= "Password required!<br/>";
		
		if (empty($errors)) {
			include("connect.php");
			
			$user = $link->real_escape_string($user);
			$password = $link->real_escape_string($password);
			
			
			$password = sha1($password);
			
			$sql = "SELECT * FROM users WHERE username='$user' and password='$password'";
			
			$result = $link->query($sql);
			
			if ($result->num_rows == 1) {
				$_SESSION['user'] = $user;
				
				header("Location: ../views/list.php");
			}
			else {
				$errors = "Username and/or password do not match!";
				header("Location: ../views/login.php?errors=$errors");
			}
		}
		else {
			header("Location: ../views/login.php?errors=$errors");
		}
			
		
	}
?>