<?php
	include_once 'User.php';
	
	class Student extends User
	{
		private $courseId;
		private $level;
		
		
		public function __construct($userId,$firstname,$lastname,$email,$password,$userType,$active,$courseId,$level)
		{
			parent::__construct($userId,$firstname,$lastname,$email,$password,$userType,$active);
			$this -> courseId = $courseId;
			$this -> level = $level;
		}
		public function setCourseId($courseId)
		{
			$this -> courseId = $courseId;
		}
		public function getCourseId()
		{
			return $this->courseId;
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