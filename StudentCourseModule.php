<?php
	class StudentCourseModule
	{
		private $studentCourseModuleId;
		private $studentId;
		private $courseModuleId;
		
		public function __construct($studentCourseModuleId,$studentId,$courseModuleId)
		{
			$this -> studentCourseModuleId = $studentCourseModuleId;
			$this -> studentId = $studentId;
			$this -> courseModuleId = $courseModuleId;
		}
		public function setStudentCourseModuleId($studentCourseModuleId)
		{
			$this -> studentCourseModuleId = $studentCourseModuleId;
		}
		public function getStudentCourseModuleId()
		{
			return $this -> studentCourseModuleId;
		}
		public function setStudentId($studentId)
		{
			$this -> studentId = $studentId;
		}
		public function getStudentId()
		{
			return $this -> studentId;
		}
		public function setCourseModuleId($courseModuleId)
		{
			$this -> courseModuleId = $courseModuleId;
		}
		public function getCourseModuleId()
		{
			return $this -> courseModuleId;
		}
	}
?>