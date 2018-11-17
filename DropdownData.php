<?php
	include_once 'Database.php';
	session_start();
	
	class DropdownData
	{
		private $db;
		
		public function __construct($db)
		{
			$db = new Database();
			$this -> db = $db;
		}
		//createAsessment
		public function getLecturerModuleArrayByCol($col)
		{
				$moduleCode = "SELECT * FROM Module INNER JOIN LecturerModule ON Module.ModuleID = LecturerModule.ModuleID WHERE LecturerModule.LecturerID = '" . $_SESSION['user']->getUserId() . "'";
				$lecturerModuleNames= $this->db->selectAllFromColumnAsString($moduleCode,$col);
				return $lecturerModuleNames;
		}
		//viewStudentResults
		public function getLecturerAssessmentArrayByCol($col)
		{
				$lecturerAssessments = "SELECT * FROM Assessment WHERE LecturerID='" . $_SESSION['user']->getUserId() . "'";
				$lecturerAssessment = $this->db -> selectAllFromColumnAsString($lecturerAssessments,$col);
				return $lecturerAssessment;
		}
	}
?>