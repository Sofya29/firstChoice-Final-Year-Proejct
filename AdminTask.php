<?php

	include_once 'Database.php';
	
	class AdminTask
	{
		private $db;
		
		public function __construct($db)
		{
				$db = new Database();
				$this -> db = $db;
		}
		public function addUser($id,$fname,$lname,$email,$pass,$userType,$active)
		{
			$sqlquery = "INSERT INTO User VALUES('" . $id ."','" . $fname . "','" . $lname . "','" . $email . "','" . md5($pass) . "','"  . $userType . "','"  . $active . "')";
			$this->db->insertQuery($sqlquery);
		}
		public function addStudent($id,$course,$level)
		{
			$sqlquery = "INSERT INTO Student VALUES('" . $id ."','" . $course. "','" . $level . "')";
			$this->db->insertQuery($sqlquery);
		}
		public function addCompulsoryModules($id,$course)
		{
			$compulsoryModule = "SELECT * FROM CourseModule WHERE CourseID='" . $course . "' AND Optional='" . 0 . "'";
			$courseModuleArray = $this->db->selectFromCourseModule($compulsoryModule);
			
			for($i=0;$i<count($courseModuleArray);$i++)
			{
				$eachModule = $courseModuleArray[$i];
				
				$courseModuleId = $eachModule -> getCourseModuleId();
				$compusoryCourseModules = "INSERT INTO StudentCourseModule VALUES('" . $id . $courseModuleId . "','" . $id ."','" . $courseModuleId . "')";
				$this->db->insertQuery($compusoryCourseModules);
			}
		}
		public function addLecturer($id,$office)
		{
			$sqlquery = "INSERT INTO Lecturer VALUES('" . $id ."','" . $office. "')";
			$this->db->insertQuery($sqlquery);
		}
		public function addCourse($courseId,$courseTitle)
		{
			$sqlquery = "INSERT INTO Course VALUES('" . $courseId ."','" . $courseTitle. "')";
			$this->db->insertQuery($sqlquery);
		}
		public function addModule($moduleId,$moduleTitle)
		{
			$sqlquery = "INSERT INTO Module VALUES('" . $moduleId ."','" . $moduleTitle. "')";
			$this->db->insertQuery($sqlquery);
		}
		public function addCourseModule($course,$moduleId,$optional,$level)
		{
			$sqlquery = "INSERT INTO CourseModule VALUES('" . $course . $moduleId . "','" . $course ."','" . $moduleId. "','" . $optional . "','" . $level . "')";
			$this->db->insertQuery($sqlquery);
		}	
		public function addStudentModule($studentIdentity,$moduleCode)
		{
			$sqlqueryStudent = "SELECT * FROM Student WHERE UserID='" . $studentIdentity . "'";
			$studentUser = $this->db->selectFromStudent($sqlqueryStudent);
			$studentCourse = $studentUser -> getCourseId();
			$optionalModule = "SELECT * FROM CourseModule WHERE CourseID='" . $studentCourse . "' AND ModuleID='" . $moduleCode . "' AND Optional='" . 1 . "'";
			$optionalModuleArray = $this->db->selectFromCourseModule($optionalModule);
			for($i=0;$i<count($optionalModuleArray);$i++)
			{
				$thisModule = $optionalModuleArray[$i];
				
				$moduleID = $thisModule -> getCourseModuleId();
				$optionalCourseModules = "INSERT INTO StudentCourseModule VALUES('" . $studentIdentity . $moduleID  . "','" . $studentIdentity ."','" . $moduleID . "')";
				$this->db->insertQuery($optionalCourseModules);
			}
		}
		public function addLecturerModule($lecturerIdentity,$moduleCode2)
		{
			$sqlqueryLecturer = "SELECT * FROM Lecturer WHERE UserID='" . $lecturerIdentity . "'";
			$sqlqueryLecturerResult = $this->db->selectFromLecturer($sqlqueryLecturer);
			$sqlqueryModule = "SELECT * FROM Module WHERE ModuleID='" . $moduleCode2 . "'";
			$sqlqueryModuleResult = $this->db->selectFromModule($sqlqueryModule);
			$lecturerModuleId = $lecturerIdentity . $moduleCode2;
			
			if($sqlqueryLecturerResult->getUserId() == $lecturerIdentity && $sqlqueryModuleResult->getModuleId() == $moduleCode2)
			{
				$sqlquery = "INSERT INTO LecturerModule VALUES('" . $lecturerModuleId . "','" . $lecturerIdentity ."','" . $moduleCode2. "')";
				$this->db->insertQuery($sqlquery);
			}
		}
	}
?>