<?php
	class LecturerAssessment
	{
		private $lecturerAssessmentId;
		private $lecturerId;
		private $assessmentId;
		
		public function __construct()
		{
			
		}
		public function __construct($lecturerAssessmentId,$lecturerId,$assessmentId)
		{
			$this -> lecturerAssessmentId = $lecturerAssessmentId;
			$this -> lecturerId = $lecturerId;
			$this -> assessmentId = $assessmentId;
		}
		public function setLecturerAssessmentId($lecturerAssessmentId)
		{
			$this -> lecturerAssessmentId = $lecturerAssessmentId;
		}
		public function getLecturerAssessmentId()
		{
			return $lecturerAssessmentId;
		}
		public function setLecturerId($lecturerId)
		{
			$this -> lecturerId = $lecturerId;
		}
		public function getLecturerId()
		{
			return $lecturerId;
		}
		public function setAssessmentId($assessmentId)
		{
			$this -> assessmentId = $assessmentId;
		}
		public function getAssessmentId()
		{
			return $assessmentId;
		}
	}
?>