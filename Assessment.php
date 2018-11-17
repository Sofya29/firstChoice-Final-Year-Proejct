<?php
	class Assessment
	{
		private $assessmentId;
		private $title;
		private $moduleId;
		private $percentageWorth;
		private $duration;
		private $lecturerId;
		private $active;
		
		public function __construct($assessmentId,$title,$moduleId,$percentageWorth,$duration,$lecturerId,$active)
		{
			$this -> assessmentId = $assessmentId;
			$this -> title = $title;
			$this -> moduleId = $moduleId;
			$this -> percentageWorth = $percentageWorth;
			$this -> duration = $duration;
			$this -> lecturerId = $lecturerId;
			$this -> active = $active;
		}
		public function setAssessmentId($assessmentId)
		{
			$this -> assessmentId = $assessmentId;
		}
		public function getAssessmentId()
		{
			return $this->assessmentId;
		}
		public function setTitle($title)
		{
			$this -> title = $title;
		}
		public function getTitle()
		{
			return $this->title;
		}
		public function setModuleId($moduleId)
		{
			$this -> moduleId = $moduleId;
		}
		public function getModuleId()
		{
			return $this->moduleId;
		}
		public function setPercentageWorth($percentageWorth)
		{
			$this -> percentageWorth = $percentageWorth;
		}
		public function getPercentageWorth()
		{
			return $this-> percentageWorth;
		}
		public function setDuration($duration)
		{
			$this -> duration = $duration;
		}
		public function getDuration()
		{
			return $this->duration;
		}
		public function setLecturerId($lecturerId)
		{
			$this -> lecturerId = $lecturerId;
		}
		public function getLecturerId()
		{
			return $this->lecturerId;
		}
		public function setActive($active)
		{
			$this -> active = $active;
		}
		public function getActive()
		{
			return $this->active;
		}
		
	}
?>