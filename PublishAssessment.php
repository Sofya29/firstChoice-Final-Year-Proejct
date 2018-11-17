<?php
	include_once 'Database.php';
	include_once 'EachAssessment.php';
	include_once 'StudentSpecificModules.php';
	session_start();
	$db = new Database();
	$countActive = 0;
	$allAssessments = array();

	$ssm = new StudentSpecificModules();
	$assessmentIdArray= $ssm -> getStudentAssessmentBasedOnModules("AssessmentID");
	$assessmentTitleArray= $ssm -> getStudentAssessmentBasedOnModules("Title");

	$_SESSION['assessmentId'] = $assessmentIdArray;
	$_SESSION['assessmentTitle'] = $assessmentTitleArray;
	
	for($countAssessment=0;$countAssessment<count($_SESSION['assessmentId']);$countAssessment++)
	{
		$eachAssessment = new EachAssessment();
		$arrayOfQuestions = array();
		$arrayOfAnswers = array();
					
		$_SESSION['assessmentIdSession'] = $_SESSION['assessmentId'][$countAssessment];
		$selectQuestions = "SELECT * FROM Question WHERE AssessmentID = '" . $_SESSION['assessmentIdSession'] . "' ORDER BY QuestionNumber ASC";
		$arrayOfQuestions= $db->selectAllFromColumnAsString($selectQuestions , "Question");
		$selectAnswers = "SELECT * FROM Answer WHERE AssessmentID = '" . $_SESSION['assessmentIdSession'] . "'  ORDER BY QuestionNumber ASC, AnswerLetter ASC";
		$arrayOfAnswers= $db->selectAllFromColumnAsString($selectAnswers, "Answer");
			
		$eachAssessment = new EachAssessment($_SESSION['assessmentIdSession'],$arrayOfQuestions,$arrayOfAnswers);
		$allAssessments[] = $eachAssessment;
		unset($arrayOfQuestions);
		unset($arrayOfAnswers);
	}
		
	$_SESSION['allAssessments'] = $allAssessments;
		
	for($countAssessmentQuestions=0;$countAssessmentQuestions<count($_SESSION['assessmentId']);$countAssessmentQuestions++)
	{
		$allQs = $_SESSION['allAssessments'][$countAssessmentQuestions]  -> getQuestionArray();
		$allAssessmentQuestions[$countAssessmentQuestions] = $allQs;
	}
	for($countAssessmentAnswers=0;$countAssessmentAnswers<count($_SESSION['assessmentId']);$countAssessmentAnswers++)
	{
		$allAs = $_SESSION['allAssessments'][$countAssessmentAnswers] -> getAnswerArray();
		$allAssessmentAnswers[$countAssessmentAnswers] = $allAs;
	}
		
	$_SESSION['allAssessmentQuestions'] = $allAssessmentQuestions;
	$_SESSION['allAssessmentAnswers'] = $allAssessmentAnswers;
		
	header('location: viewAssessment.php');
?>