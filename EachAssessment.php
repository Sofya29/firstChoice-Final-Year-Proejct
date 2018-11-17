<?php
	class EachAssessment
	{
		private $assessmentId;
		private $questionArray;
		private $answerArray;

		public function __construct($assessmentId,$questionArray,$answerArray)
		{
			$this -> assessmentId = $assessmentId;
			$this -> questionArray = $questionArray;
			$this -> answerArray = $answerArray;
			$this -> answerQuestionNumber = $answerQuestionNumber;
		}
		public function setAssessmentId($assessmentId)
		{
			$this -> assessmentId = $assessmentId;
		}
		public function getAssessmentId()
		{
			return $this -> assessmentId;
		}
		public function setQuestionArray($questionArray)
		{
			$this -> questionArray = $questionArray;
		}
		public function getQuestionArray()
		{
			return $this -> questionArray;
		}
		public function setAnswerArray($answerArray)
		{
			$this -> answerArray = $answerArray;
		}
		public function getAnswerArray()
		{
			return $this -> answerArray;
		}
	}
?>