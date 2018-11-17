<?php
		include_once 'AdminTask.php';
		
		$adminTask = new AdminTask();
		
		$active = 1;
		
		$sid = $_POST['txtStudentId'];
		$slevel = $_POST['studentLevel'];
		$spass = $_POST['txtStudentPassword'];
		
		$lid = $_POST['txtLecturerId'];
		$lpass = $_POST['txtLecturerPassword'];
		
		$moduleId = $_POST['txtModuleId'];
		$moduleTitle = $_POST['txtModuleTitle'];
		$course = $_POST['txtCourse'];
		$level = $_POST['level'];
		$optional = $_POST['optional'];
		
		$apass = $_POST['txtAdminPassword'];		
		
		if(isset($_POST['btnEnterStudent']) && $spass==$_POST['txtStudentPassword2'])
		{
			 $adminTask->addUser($sid,$_POST['txtStudentFirstname'],$_POST['txtStudentLastname'],$_POST['txtStudentEmail'],$spass,"Student",$active);
			 $adminTask -> addStudent($sid,$_POST['txtStudentCourse'],$slevel);
			 $adminTask -> addCompulsoryModules($sid,$_POST['txtStudentCourse']);
		}
		else if(isset($_POST['btnEnterLecturer']) && $lpass==$_POST['txtLecturerPassword2'])
		{
			 $adminTask->addUser($lid,$_POST['txtLecturerFirstname'],$_POST['txtLecturerLastname'],$_POST['txtLecturerEmail'],$lpass,"Lecturer",$active);
			 $adminTask -> addLecturer($lid,$_POST['txtLecturerOffice']);
		}
		else if(isset($_POST['btnEnterCourse']))
		{
			 $adminTask->addCourse($_POST['txtCourseId'],$_POST['txtCourseTitle']);
		}
		else if(isset($optional) && isset($_POST['btnEnterModule']))
		{
			$adminTask->addModule($moduleId,$moduleTitle);
			$adminTask->addCourseModule($course,$moduleId,1,$level);
		}
		else if(!isset($optional) && isset($_POST['btnEnterModule']))
		{
			$adminTask->addModule($moduleId,$moduleTitle);
			$adminTask->addCourseModule($course,$moduleId,0,$level);
		}
		else if(isset($_POST['btnEnterAdmin']) && $apass==$_POST['txtAdminPassword2'])
		{
			 $adminTask->addUser($_POST['txtAdminId'],$_POST['txtAdminFirstname'],$_POST['txtAdminLastname'],$_POST['txtAdminEmail'],$apass,"Admin",$active);
		}
		else if(isset($_POST['btnEnterStudentModule']))
		{
			 $adminTask->addStudentModule($_POST['txtStudentIdentity'],$_POST['txtModuleCode']);
		}
		else if(isset($_POST['btnEnterLecturerModule']))
		{
			 $adminTask->addLecturerModule($_POST['txtLecturerIdentity'],$_POST['txtModuleCode2']);
		}
		header('location: adminHome.php');
?>