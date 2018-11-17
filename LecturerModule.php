<?php
	class LecturerModule
	{
		private $lecturerModuleId;
		private $lecturerId;
		private $moduleId;
		
		public function __construct($lecturerModuleId,$lecturerId,$moduleId)
		{
			$this -> lecturerModuleId = $lecturerModuleId;
			$this -> lecturerId = $lecturerId;
			$this -> moduleId = $moduleId;
		}
		public function setLecturerModuleId($lecturerModuleId)
		{
			$this -> lecturerModuleId = $lecturerModuleId;
		}
		public function getLecturerModuleId()
		{
			return $this->lecturerModuleId;
		}
		public function setLecturerId($lecturerId)
		{
			$this -> lecturerId = $lecturerId;
		}
		public function getLecturerId()
		{
			return $this->lecturerId;
		}
		public function setModuleId($moduleId)
		{
			$this -> moduleId = $moduleId;
		}
		public function getModuleId()
		{
			return $this->moduleId;
		}
	}
?>