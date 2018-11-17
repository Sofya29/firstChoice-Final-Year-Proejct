<?php

	include_once 'Mark.php';
	session_start();
	$marker = new Mark();
	
	$_SESSION['assessmentIdSession'] = $_POST['btnSubmit'];
	$studentId = $_SESSION['user'] -> getUserId();
	$studentName = $_SESSION['user'] -> getFirstname() . " " . $_SESSION['user'] -> getLastname();
	$studentEmail = $_SESSION['user'] -> getEmail();
	$thisAssessment = $marker -> selectAssessmentByAssessmentId();
	$assessmentModule = $thisAssessment[0] -> getModuleId();
	$assessmentTitle = $thisAssessment[0] -> getTitle();
	$subject = $assessmentModule . " Assessment Results: " . $assessmentTitle;
	$studentAssessment = $studentId . $_SESSION['assessmentIdSession'];
	$from = "From: firstChoice_Sofya_Software@sonyasofya.co.uk";
	
	$thisQ = $marker -> getQuestionsByAssessmentId();
	$arrayOfCorrectAnswers = $marker -> arrayOfCorrectAnswers();
	$mark = 0;
	for($i=1;$i<=count($thisQ);$i++)
	{
			$assessmentId ="q" . $i ;
			$ans = $_POST[$assessmentId];
			if($ans == $arrayOfCorrectAnswers[$i-1])
			{
				$mark = $mark + 1;
			}
	}
	
	$percentage =  ($mark/count($thisQ)) *100;
	$grade = $marker -> gradeAssessment($percentage);
	$weighting = $marker -> getAssessmentWeighting();
	$incompleteStudentAssessment = $marker -> getIncompleteStudentAssessmentbyStudentAssessmentId($studentAssessment);
	$percentageGainedWorth = $marker -> getPercentageGainedWorth($percentage);
	$marker -> updateIncompleteStudentAssessmentsByStudentId($percentage,$studentAssessment);
	
	$msg = "Dear " . $studentName . "," . "\n\n" . $subject . "\n\n" . "You scored " . $mark . " out of " . count($thisQ) ."\n" .
		"Your score as a percentage is " .  $percentage . "%" . "\n" .
		"This assessment was worth: " . $weighting . "%" . ", in which you gained: " . $percentageGainedWorth . "%" .
		"\n" . "Your grade is " . $grade;
	
	if(count($incompleteStudentAssessment) == 0)
	{
		$msg = $msg . "\n\n" . "However, this mark will not be updated, as our records indicate that you have already completed this assessment before.";
	}
	$msg = $msg . "\n\n" . "From the Team at firstChoice by Sofya Software";
	mail($studentEmail,$subject,$msg,$from);
	header('location: viewAssessment.php');
		
?>