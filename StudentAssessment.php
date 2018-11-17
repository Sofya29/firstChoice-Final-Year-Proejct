<?php
	class StudentAssessment
	{
		private $studentAssessmentId;
		private $studentId;
		private $assessmentId;
		private $percentage;
		private $grade;
		private $percentageWorth;
		private $complete;
		
		public function __construct($studentAssessmentId,$studentId,$assessmentId,$percentage,$grade,$percentageWorth,$complete)
		{
			$this -> studentAssessmentId = $studentAssessmentId;
			$this -> studentId = $studentId;
			$this -> assessmentId = $assessmentId;
			$this -> percentage = $percentage;
			$this -> grade = $grade;
			$this -> percentageWorth = $percentageWorth;
			$this -> complete = $complete;
		}
		public function setStudentAssessmentId($studentAssessmentId)
		{
			$this -> studentAssessmentId = $studentAssessmentId;
		}
		public function getStudentAssessmentId()
		{
			return $this -> studentAssessmentId;
		}
		public function setStudentId($studentId)
		{
			$this -> studentId = $studentId;
		}
		public function getStudentId()
		{
			return $this -> studentId;
		}
		public function setAssessmentId($assessmentId)
		{
			$this -> assessmentId = $assessmentId;
		}
		public function getAssessmentId()
		{
			return $this -> assessmentId;
		}
		public function setPercentage($percentage)
		{
			$this -> percentage = $percentage;
		}
		public function getPercentage()
		{
			return $this -> percentage;
		}
		public function setGrade($grade)
		{
			$this -> grade = $grade;
		}
		public function getGrade()
		{
			return $this -> grade;
		}
		public function setPercentageWorth($percentageWorth)
		{
			$this -> percentageWorth = $percentageWorth;
		}
		public function getPercentageWorth()
		{
			return $this -> percentageWorth;
		}
			public function setComplete($complete)
		{
			$this -> complete = $complete;
		}
		public function getComplete()
		{
			return $this -> complete;
		}
	}
?>