<?php
	class CourseModule
	{
		private $courseModuleId;
		private $courseId;
		private $moduleId;
		private $optional;
		private $level;
		
		public function __construct($courseModuleId,$courseId,$moduleId,$optional,$level)
		{
			$this -> courseModuleId = $courseModuleId;
			$this -> courseId = $courseId;
			$this -> moduleId = $moduleId;
			$this -> optional = $optional;
			$this -> level = $level;
		}
		public function setCourseModuleId($courseModuleId)
		{
			$this -> courseModuleId = $courseModuleId;
		}
		public function getCourseModuleId()
		{
			return $this->courseModuleId;
		}
		public function setCourseId($courseId)
		{
			$this -> courseId = $courseId;
		}
		public function getCourseId()
		{
			return $this->courseId;
		}
		public function setModuleId($moduleId)
		{
			$this -> moduleId = $moduleId;
		}
		public function getModuleId()
		{
			return $this->moduleId;
		}
		public function setOptional($optional)
		{
			$this -> optional = $optional;
		}
		public function getOptional()
		{
			return $this->optional;
		}
		public function setLevel($level)
		{
			$this -> level = $level;
		}
		public function getLevel()
		{
			return $this->level;
		}
	}
?>