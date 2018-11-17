<?php
	class Course
	{
		private $courseId;
		private $title;
		
		public function __construct()
		{
			
		}
		public function __construct($courseId,$title)
		{
			$this -> courseId = $courseId;
			$this -> title = $title;
		}
		public function setCourseId($courseId)
		{
			$this -> courseId = $courseId;
		}
		public function getCourseId()
		{
			return $courseID;
		}
		public function setTitle($title)
		{
			$this -> title = $title;
		}
		public function getTitle()
		{
			return $title;
		}
	}
?>