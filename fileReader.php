<?php

	include_once 'Database.php';
	include_once 'FileHandler.php';
	include_once 'FeedbackMessage.php';
	include_once 'DocxToTxt.php';
	
	session_start();
	$db = new Database();
	$docxToText = new DocxToTxt();
	
	$number=0;
	$countingQ = 0;
	$countingA = 0;
	$countingCorrect = 0;
	$queries [] = array();
	
	$destination = FileHandler :: uploadFile("btnUpload");
	$destination2 = FileHandler :: uploadFile("btnAnswerSheet");

	$assessmentId = count($db->selectFromAssessment("SELECT * FROM Assessment"))+1;
	$assessmentDetails = "INSERT INTO Assessment(AssessmentID,Title, ModuleID, PercentageWorth, Duration,LecturerID) VALUES('" . $assessmentId . "','" . $_POST['txtAssessmentTitle'] . "','" . $_POST['txtModuleCode'] . "','" . $_POST['txtPercentageWorth'] . "','" . $_POST['txtDuration'] . "','" . $_SESSION['user']->getUserId() . "')";
	$queries[] = $assessmentDetails;

	$docxToText -> formattedTxtQnA($destination);
	$qNum = 0;
	$fileName = "questionsPaper.txt";
	$openFile = fopen($fileName,"r");
	while(!feof($openFile))
	{
		$eachLine = fgets($openFile,filesize($fileName));
		$length = strlen($eachLine);
		
		$letters = array("a","b","c","d");
		$separate = explode("/*****/",$eachLine);
		$numbers = array();
		$insert;

		for($i=1;$i<100;$i++)
		{
			$numbers[] = $i;
		}	
		
		if(in_array($separate[0],$numbers))
		{
			$qNum = $separate[0];
			$number = $assessmentId . "." . $separate[0];
			$insert = "INSERT INTO Question VALUES('" . $number . "','" . ltrim($separate[1]) . "','" . $assessmentId . "','" . $separate[0] . "')";
			$countingQ = $countingQ + 1;
		}
		else if (in_array($separate[0],$letters))
		{
			$letter = $separate[0];
			$numberLetter = $number . $letter;
			$insert = "INSERT INTO Answer(AnswerID, Answer, AssessmentID, QuestionID, QuestionNumber, AnswerLetter) VALUES('" . $numberLetter . "','" . ltrim($separate[1]) .  "','" . $assessmentId . "','" . $number . "','" . $qNum . "','" . $letter . "')";
			$countingA = $countingA + 1;
		}
		$queries [] = $insert;
	}
	fclose($openFile);
	
	$docxToText -> formattedAnswerSheet($destination2);
	
	$fileName = "AnswerSheet.txt";
	$openFile = fopen($fileName,"r");
	while(!feof($openFile))
	{
		$eachLine = fgets($openFile,filesize($fileName));
		$split = explode("/*****/", rtrim($eachLine));
		$update;
		if($split[0] !== null && $split[1] !== null)
		{
			$ans = $assessmentId . '.' . $split[0] . ltrim($split[1]);
			$correct = 1;
			$countingCorrect = $countingCorrect + 1;
			$updateAnswer = "UPDATE Answer SET Correct = '" . $correct . "' WHERE AnswerID ='" . $ans . "'";
			$update = $updateAnswer;
		}
		$queries [] = $update;
	}
	fclose($openFile);
	
	if(($countingA == $countingQ * 4) && ($countingQ == $countingCorrect))
	{
		for($i=0; $i<count($queries); $i++)
		{
			$db -> insertAndOrUpdateQuery($queries[$i]);
		}
			$_SESSION['createAssessmentMessage'] = "success";
	}
	else
	{
		$_SESSION['createAssessmentMessage'] = "failure";
	}

	$courseModulesWithThisMOdule =  "SELECT * FROM CourseModule 
					INNER JOIN StudentCourseModule ON CourseModule.CourseModuleID = StudentCourseModule.CourseModuleID 
					INNER JOIN Student ON Student.UserID = StudentCourseModule.StudentID 
					WHERE CourseModule.ModuleID = '" . $_POST['txtModuleCode'] . "' AND Student.Level = CourseModule.Level";
 
	$studentIDList = $db -> selectAllFromColumnAsString($courseModulesWithThisMOdule ,"StudentID");

	for($i=0;$i<count($studentIDList);$i++)
	{
			$student = $studentIDList[$i] ;
			$studentAssessmentId = $student . $assessmentId;
			$insertStudentAssessment = "INSERT INTO StudentAssessment(StudentAssessmentID,StudentID,AssessmentID) VALUES('" . $studentAssessmentId . "','" . $student . "','" .  $assessmentId . "')";
			$db -> insertQuery($insertStudentAssessment);
	}

	$docxToText -> emptyTheFile("questionsPaper.txt");
	$docxToText -> emptyTheFile("AnswerSheet.txt");
	unlink($destination);
	unlink($destination2);

	header('location: CreateAssessment.php');
?>