<?php
	class ResultsInformation
	{
		private $studentId;
		private $lastname;
		private $firstname;
		private $percentage;
		private $grade;
		private $percentageWorth;
		
		public function __construct($studentId,$lastname,$firstname,$percentage,$grade,$percentageWorth)
		{
			$this -> studentId = $studentId;
			$this -> lastname = $lastname;
			$this -> firstname = $firstname;
			$this -> percentage = $percentage;
			$this -> grade = $grade;
			$this -> percentageWorth = $percentageWorth;
		}
		public function setStudentId($studentId)
		{
			$this -> studentId = $studentId;
		}
		public function getStudentId()
		{
			return $this -> studentId;
		}
		public function setLastname($lastname)
		{
			$this -> lastname = $lastname;
		}
		public function getLastname()
		{
			return $this -> lastname;
		}
		public function setFirstname($firstname)
		{
			$this -> firstname = $firstname;
		}
		public function getFirstname()
		{
			return $this -> firstname;
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
	}
?>