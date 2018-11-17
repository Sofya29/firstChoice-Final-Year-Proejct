<?php
	class Question
	{
		private $questionId;
		private $question;
		private $assessmentId;
		private $questionNumber;

		public function __construct($questionId,$question,$assessmentId,$questionNumber)
		{
			$this -> questionId = $questionId;
			$this -> question = $question;
			$this -> assessmentId = $assessmentId;
			$this -> questionNumber= $questionNumber;
		}
		public function setQuestionId($questionId)
		{
			$this -> questionId = $questionId;
		}
		public function getQuestionId()
		{
			return $this->questionId;
		}
		public function setQuestion($question)
		{
			$this -> question = $question;
		}
		public function getQuestion()
		{
			return $this->question;
		}
		public function setAssessmentId($assessmentId)
		{
			$this -> assessmentId = $assessmentId;
		}
		public function getAssessmentId()
		{
			return $this->assessmentId;
		}
		public function setQuestionNumber($questionNumber)
		{
			$this -> questionNumber= $questionNumber;
		}
		public function getQuestionNumber()
		{
			return $this->questionNumber;
		}
	}
?>