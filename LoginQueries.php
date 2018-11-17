<?php
		include_once 'Database.php';
		session_start();
		
		$db = new Database();
		$username = $_POST['txtUsername'];
		$password = $_POST['txtPassword'];
		
		if(isset($_POST['btnLogin']))
		{
			$sqlquery = "SELECT * FROM User WHERE UserID='" . $username . "' AND Password='" . md5($password) . "'";
			$user= $db->SelectFromUser($sqlquery);
			if(!isset($user))
			{
				$_SESSION['invalidUser'] = "invalid";
				header('location: index.php');
			}
			else if(isset($user))
			{
				$_SESSION['user'] = $user;
				header('location: validatesignin.php');
			}
		}
?>