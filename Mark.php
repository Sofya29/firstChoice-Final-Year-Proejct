<?php

	include_once 'Database.php';
	session_start();
	
	class Mark
	{
		private $db;
		
		public function __construct($db)
		{
			$db = new Database();
			$this -> db = $db;
		}
		public function getQuestionsByAssessmentId()
		{
			$selectQuestions = "SELECT * FROM Question WHERE AssessmentID = '" . $_SESSION['assessmentIdSession'] . "'  ORDER BY QuestionID ASC";
			$thisQ = $this -> db -> selectFromQuestion($selectQuestions);
			return $thisQ;
		}
		public function getCorrectAnswersByAssessmentId()
		{
			$correctAnswers = "SELECT * FROM Answer WHERE AssessmentID = '" . $_SESSION['assessmentIdSession'] . "' AND Correct=" . 1 . " ORDER BY QuestionNumber ASC";
			$correct = $this -> db -> selectFromAnswer($correctAnswers);
			return $correct;
		}
		public function arrayOfCorrectAnswers()
		{
			$arrayOfCorrectAnswers = array();
			$correct = $this -> getCorrectAnswersByAssessmentId();
			for($counting=0;$counting<count($correct);$counting++)
			{
				$thisCorrectAnswer = $correct[$counting]->getAnswer();
				$arrayOfCorrectAnswers[$counting] = $thisCorrectAnswer;
			}
			return $arrayOfCorrectAnswers;
		}
		public function getIncompleteStudentAssessmentbyStudentAssessmentId($studentAssessment)
		{
			$selectResults = "SELECT * FROM StudentAssessment WHERE StudentAssessmentID='" . $studentAssessment . "' AND Complete='" . 0 . "'";
			$selectRecord = $this-> db -> selectFromStudentAssessment($selectResults);
			return $selectRecord;
		}
		public function gradeAssessment($percentage)
		{
			$grade;
			
			if($percentage>=70)
			{
				$grade = "A";
			}
			else if($percentage<70 && $percentage>=60)
			{
				$grade = "B";
			}
			else if($percentage<60 && $percentage>=50)
			{
				$grade = "C";
			}
			else if($percentage<50 && $percentage>=40)
			{
				$grade = "D";
			}
			else if($percentage<40)
			{
				$grade = "F";
			}
			return $grade;
		}
		public function selectAssessmentByAssessmentId()
		{
			$selectAssessment = "SELECT * FROM Assessment WHERE AssessmentID='" . $_SESSION['assessmentIdSession'] . "'" ;
			$assessment = $this -> db -> selectFromAssessment($selectAssessment);
			return $assessment;
		}
		public function getAssessmentWeighting()
		{
			$assessment = $this -> selectAssessmentByAssessmentId();
			$weighting = $assessment[0] -> getPercentageWorth();
			return $weighting;
		}
		public function getPercentageGainedWorth($percentage)
		{
			$weighting = $this -> getAssessmentWeighting();
			$percentageGainedWorth = ($percentage * $weighting)/100;
			return $percentageGainedWorth;
		}
		public function updateIncompleteStudentAssessmentsByStudentId($percentage,$studentAssessment)
		{
			$grade = $this -> gradeAssessment($percentage);
			$percentageGainedWorth = $this->getPercentageGainedWorth($percentage);
			$enterResults = "Update StudentAssessment SET Percentage='" . $percentage . "', Grade='" . $grade . "', PercentageWorth='" . $percentageGainedWorth . "', Complete='" . 1 . "' WHERE StudentAssessmentID='" . $studentAssessment . "' AND Complete='" . 0 . "'";
			$this -> db -> updateQuery($enterResults);
		}
	}
?>