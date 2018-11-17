<?php

	include_once 'Database.php';
	include_once 'User.php';
	session_start();
	
	$user = $_SESSION['user'];
	$id = $user->getUserId();
	$type = $user->getUserType();
	$active = $user->getActive();
	
	if($type=="Lecturer" && $active==1)
	{
		header('location: lecturerhome.php');
	}
	else if($type=="Student" && $active==1)
	{
		header('location: studenthome.php');
	}
	else if($type=="Admin" && $active==1)
	{
		header('location: adminhome.php');
	}
	else
	{
		$_SESSION['invalidUser'] = "invalid";
		header('location: index.php');
	}
?>