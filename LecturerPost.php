<?php

	include_once 'Database.php';
	session_Start();
	
	$db = new Database();
	
	$lecturerId = $_SESSION['user'] -> getUserId();
	$lecturerName = $_SESSION['user'] -> getFirstname() . " " . $_SESSION['user'] -> getLastname();
	$module = $_POST['module'];
	$lecturerModule = $lecturerId . $module;
	
	$selectModule = "SELECT * FROM Module WHERE ModuleID='" . $module . "'";
	$moduleObject = $db -> selectFromModule($selectModule);
	$moduleName = $moduleObject -> getName();
	
	$stripMsgLines = preg_replace('/\s+/', '', $_POST['postMessage']);
	$message = $lecturerName . " posted on " . $moduleName . ": " . $_POST['postMessage'];
	$postSubmit = $_POST['postSubmit'];
		
		if(isset($postSubmit) && !empty($_POST['postMessage']) && $stripMsgLines !== "")
		{
			$selectAll = "SELECT * FROM Post";
			$postArray = $db -> selectFromPost($selectAll);
			$postId = count($postArray) + 1;
			$insertPost = "INSERT INTO Post(PostID,Post,LecturerModuleID) VALUES('" . $postId . "','" . $message . "','" . $lecturerModule . "')";
			$db -> insertQuery($insertPost);
			$_SESSION['feedback'] = "success";
		}
		else
		{
			$_SESSION['feedback'] = "failure";
		}
		
	header('location: lecturerhome.php#post');
?>