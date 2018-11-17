<?php
	class Answer
	{
		private $answerId;
		private $answer;
		private $assessmentId;
		private $correct;
		private $questionId;
		private $questionNumber;
		private $answerLetter;

		
		public function __construct($answerId,$answer,$assessmentId,$correct,$questionI,$questionNumberd,$answerLetter)
		{
			$this -> answerId = $answerId;
			$this -> answer = $answer;
			$this -> assessmentId = $assessmentId;
			$this -> correct = $correct;
			$this -> questionId = $questionId;
			$this -> questionNumberd= $questionNumberd;
			$this -> answerLetter= $answerLetter;
		}
		public function setAnswerId($answerId)
		{
			$this -> answerId = $answerId;
		}
		public function getAnswerId()
		{
			return $this -> answerId;
		}
		public function setAnswer($answer)
		{
			$this -> answer = $answer;
		}
		public function getAnswer()
		{
			return $this -> answer;
		}
		public function setAssessmentId($assessmentId)
		{
			$this -> assessmentId = $assessmentId;
		}
		public function getAssessmentId()
		{
			return $this -> assessmentId;
		}
		public function setCorrect($correct)
		{
			$this -> correct = $correct;
		}
		public function getCorrect()
		{
			return $this -> correct;
		}
		public function setQuestionId($questionId)
		{
			$this -> questionId = $questionId;
		}
		public function getQuestionId()
		{
			return $this -> questionId;
		}
		public function setQuestionNumber($questionNumber)
		{
			$this -> questionNumber = $questionNumber;
		}
		public function getQuestionNumber()
		{
			return $this -> questionNumber;
		}
		public function setAnswerLetter($answerLetter)
		{
			$this -> answerLetter= $answerLetter;
		}
		public function getAnswerLetter()
		{
			return $this -> answerLetter;
		}

	}
?>