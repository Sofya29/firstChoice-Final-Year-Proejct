<?php
	include_once 'Database.php';
	include_once 'ResultsInformation.php';
	session_start();
	
	class StudentResults
	{
		private $db;
		
		public function __construct($db)
		{
			$db = new Database();
			$this->db = $db;
		}
		public function getAssessmentByAssessmentId($assessmentId)
		{
			$sql = "SELECT * FROM Assessment WHERE AssessmentID='" . $assessmentId . "'";
			$assessmentArray = $this->db->selectFromAssessment($sql);
			return $assessmentArray;
		}
		public function getStudentAssessmentByStudentId()
		{
			$sql = "SELECT * FROM StudentAssessment WHERE StudentID='" . $_SESSION['user']->getUserId() . "'";
			$studentAssessment = $this->db->selectFromStudentAssessment($sql);
			return $studentAssessment;
		}
		public function getStudentAssessmentId()
		{	
			$assessmentIds = array();
			$studentAssessment = $this->getStudentAssessmentByStudentId();
			for($i=0;$i<count($studentAssessment);$i++)
			{
				$assessmentIds[$i] = $studentAssessment[$i] -> getAssessmentId();
			}
			return $assessmentIds;
		}
		public function getStudentPercentageMarks()
		{	
			$percentage = array();
			$studentAssessment = $this->getStudentAssessmentByStudentId();
			for($i=0;$i<count($studentAssessment);$i++)
			{
				$percentage[$i] = $studentAssessment[$i] -> getPercentage();
			}
			return $percentage;
		}
		public function getStudentGrades()
		{	
			$grades = array();
			$studentAssessment = $this->getStudentAssessmentByStudentId();
			for($i=0;$i<count($studentAssessment);$i++)
			{
				$grades[$i] = $studentAssessment[$i] -> getGrade();
			}
			return $grades;
		}
		public function getStudentWeightingGained()
		{	
			$weightingGained = array();
			$studentAssessment = $this->getStudentAssessmentByStudentId();
			$assessentIdArray = $this -> getStudentAssessmentId();
			for($i=0;$i<count($studentAssessment);$i++)
			{
				$assessmentId = $assessentIdArray[$i];
				$assessmentArray = $this->getAssessmentByAssessmentId($assessmentId);
				$assessmentWeighting = $assessmentArray[0] -> getPercentageWorth();
				$assessmentModule = $assessmentArray[0] -> getModuleId();
				$assessmentTitle = $assessmentArray[0] -> getTitle();
				$weightingGained[$i] = $studentAssessment[$i] -> getPercentageWorth() . " out of " . $assessmentWeighting;
			}
			return $weightingGained;
		}
		public function getAssessmentTitle()
		{	
			$assessmentTitle = array();
			$studentAssessment = $this->getStudentAssessmentByStudentId();
			$assessentIdArray = $this -> getStudentAssessmentId();
			for($i=0;$i<count($studentAssessment);$i++)
			{
				$assessmentId = $assessentIdArray[$i];
				$assessmentArray = $this->getAssessmentByAssessmentId($assessmentId);
				$assessmentTitle[$i] = $assessmentArray[0] -> getTitle();
			}
			return $assessmentTitle;
		}
		public function getAssessmentModule()
		{	
			$assessmentModule = array();
			$studentAssessment = $this->getStudentAssessmentByStudentId();
			$assessentIdArray = $this -> getStudentAssessmentId();
			for($i=0;$i<count($studentAssessment);$i++)
			{
				$assessmentId = $assessentIdArray[$i];
				$assessmentArray = $this->getAssessmentByAssessmentId($assessmentId);
				$assessmentModule[$i] = $assessmentArray[0] -> getModuleId();
			}
			return $assessmentModule;
		}
		public function getResultsByAssessmentId($assessmentResultList)
		{
			$resultsInfoArray = array();
			
			for($i=0;$i<count($assessmentResultList);$i++)
			{
				$studentId = $assessmentResultList[$i] -> getStudentId();
				$assessmentId = $assessmentResultList[$i] -> getAssessmentId();
				$percentage = $assessmentResultList[$i] -> getPercentage();
				$grade = $assessmentResultList[$i] -> getGrade();
				$percentageWorth = $assessmentResultList[$i] -> getPercentageWorth();
		
				$student = "SELECT * FROM User WHERE UserID='" . $studentId . "'";
				$studentInfo = $this->db -> selectFromUser($student);
				$fname = $studentInfo -> getFirstname();
				$lname = $studentInfo -> getLastname();
				
				$resultsInfo = new ResultsInformation($studentId ,$lname,$fname,$percentage,$grade,$percentageWorth);
				$resultsInfoArray[$i] = $resultsInfo;
			}
			return $resultsInfoArray;
		}
		public function getStudentIdFromAssessmentResultsArray($assessmentResultsArrayList)
		{
			$studentIdArray = array();
			for($i=0;$i<count($assessmentResultsArrayList);$i++)
			{
				$studentId = $assessmentResultsArrayList[$i] -> getStudentId();
				$studentIdArray[$i] = $studentId;
			}
			return $studentIdArray;
		}
		public function getStudentFirstnameFromAssessmentResultsArray($assessmentResultsArrayList)
		{
			$firstnameArray = array();
			for($i=0;$i<count($assessmentResultsArrayList);$i++)
			{
				$fname = $assessmentResultsArrayList[$i] -> getFirstname();
				$firstnameArray[$i] = $fname;
			}
			return $firstnameArray;
		}
		public function getStudentLastnameFromAssessmentResultsArray($assessmentResultsArrayList)
		{
			$lastnameArray = array();
			for($i=0;$i<count($assessmentResultsArrayList);$i++)
			{
				$lname = $assessmentResultsArrayList[$i] -> getLastname();
				$lastnameArray[$i] = $lname;
			}
			return $lastnameArray;
		}
		public function getStudentPercentageFromAssessmentResultsArray($assessmentResultsArrayList)
		{
			$percentageArray = array();
			for($i=0;$i<count($assessmentResultsArrayList);$i++)
			{
				$percentage = $assessmentResultsArrayList[$i] -> getPercentage();
				$percentageArray[$i] = $percentage;
			}
			return $percentageArray;
		}
		public function getStudentGradeFromAssessmentResultsArray($assessmentResultsArrayList)
		{
			$gradeArray = array();
			for($i=0;$i<count($assessmentResultsArrayList);$i++)
			{
				$grade = $assessmentResultsArrayList[$i] -> getGrade();
				$gradeArray[$i] = $grade;
			}
			return $gradeArray;
		}
		public function getStudentPercentageWorthFromAssessmentResultsArray($assessmentResultsArrayList)
		{
			$percentageWorthArray = array();
			for($i=0;$i<count($assessmentResultsArrayList);$i++)
			{
				$percentageWorth = $assessmentResultsArrayList[$i] -> getPercentageWorth();
				$percentageWorthArray[$i] = $percentageWorth;
			}
			return $percentageWorthArray;
		}
	}
?>