<?php
	include_once 'Database.php';
	include_once 'StudentResults.php';
	
	unset($_SESSION['studentIdResults']);
	unset($_SESSION['firstnameResults']);
	unset($_SESSION['lastnameResults']);
	unset($_SESSION['percentageResults']);
	unset($_SESSION['gradeResults']);
	unset($_SESSION['percentageWorthResults']);
		
	$db = new Database();
	$studentResults = new StudentResults();
	
	$assessmentResultsArray = $db -> selectFromStudentAssessment("SELECT * FROM StudentAssessment WHERE AssessmentID='" . $_POST['assessment'] . "'");
	$assessmentResultsArrayList = $studentResults -> getResultsByAssessmentId($assessmentResultsArray);
	
	if(isset($_POST['btnDownloadResults']))
	{
	$testCSV = fopen("assessment.csv",'w');
	fwrite($testCSV,"StudentID,Lastname,Firstname,Percentage,Grade,Percentage gained from weigthting \n");
	
	for($i=0;$i<count($assessmentResultsArrayList);$i++)
	{
		$studentId = $assessmentResultsArrayList[$i] -> getStudentId();
		$fname = $assessmentResultsArrayList[$i] -> getFirstname();
		$lname = $assessmentResultsArrayList[$i] -> getLastname();
		$percentage = $assessmentResultsArrayList[$i] -> getPercentage();
		$grade = $assessmentResultsArrayList[$i] -> getGrade();
		$percentageWorth = $assessmentResultsArrayList[$i] -> getPercentageWorth();
		
		$resultsInfo = $studentId . ',' . $lname . ',' . $fname . ',' . $percentage . ',' . $grade . ',' . $percentageWorth;
		fwrite($testCSV,$resultsInfo . "\n");
	}
	fclose($testCSV);
	
	header('location: assessment.csv');
	}
	else if(isset( $_POST['btnViewResults']))
	{
		$_SESSION['studentIdResults'] = $studentResults -> getStudentIdFromAssessmentResultsArray($assessmentResultsArrayList);
		$_SESSION['firstnameResults'] = $studentResults -> getStudentFirstnameFromAssessmentResultsArray($assessmentResultsArrayList);
		$_SESSION['lastnameResults'] = $studentResults -> getStudentLastnameFromAssessmentResultsArray($assessmentResultsArrayList);
		$_SESSION['percentageResults'] = $studentResults -> getStudentPercentageFromAssessmentResultsArray($assessmentResultsArrayList);
		$_SESSION['gradeResults'] = $studentResults -> getStudentGradeFromAssessmentResultsArray($assessmentResultsArrayList);
		$_SESSION['percentageWorthResults'] = $studentResults -> getStudentPercentageWorthFromAssessmentResultsArray($assessmentResultsArrayList);
		
		header('location: viewStudentResults.php');
	}
?>