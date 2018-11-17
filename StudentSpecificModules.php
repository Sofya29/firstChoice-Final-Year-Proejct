<?php
	include_once 'Database.php';
	session_start();
	
	class StudentSpecificModules
	{
		private $db;
		
		public function __construct($db)
		{
			$db = new Database();
			$this->db = $db;
		}
		public function selectStudentByUserId()
		{
			$selectStudent = "SELECT * FROM Student WHERE UserID ='" . $_SESSION['user'] -> getUserId() . "'";
			$studentUser = $this->db -> selectFromStudent($selectStudent);
			return $studentUser;
		}
		public function getPostByLecturerModule()
		{
			$posts = "SELECT * FROM StudentCourseModule 
				  INNER JOIN CourseModule ON StudentCourseModule.CourseModuleID = CourseModule.CourseModuleID
				  INNER JOIN LecturerModule ON LecturerModule.ModuleID = CourseModule.ModuleID 
				  INNER JOIN Post ON Post.LecturerModuleID = LecturerModule.LecturerModuleID WHERE StudentCourseModule.StudentID='" .  $_SESSION['user']->getUserId() . "' AND CourseModule.Level='" . $this->selectStudentByUserId()->getLevel() . 
				 "' ORDER BY PostID DESC";

			$postArray= $this->db->selectAllFromColumnAsString($posts,"Post");
			return $postArray;
		}
		public function getStudentAssessmentBasedOnModules($col)
		{
			$selectAssessment = "SELECT * FROM Assessment INNER JOIN StudentCourseModule INNER JOIN CourseModule 
					     WHERE StudentCourseModule.CourseModuleId = CourseModule.CourseModuleId 
			     		     AND CourseModule.ModuleId = Assessment.ModuleId AND CourseModule.Level ='" . $this->selectStudentByUserId()->getLevel() . 
					    "' AND Assessment.Active='" . 1 . 
					    "' AND StudentCourseModule.StudentID='" . $_SESSION['user']->getUserId(). "'";
			$activeAssessments = $this->db->selectAllFromColumnAsString($selectAssessment , $col);
			return $activeAssessments;
		}
	}
?>