<?php

	include_once 'Database.php';
	session_start();
	
	$db = new Database();
	$assessmentId = $_POST['assessment'];

	if(isset($assessmentId))
	{
		if(isset($_POST['activateAssessment']))
		{
			$sqlActivate = "Update Assessment SET Active ='" . 1 . "' WHERE AssessmentID = '" . $assessmentId . "'";
			$updateActive = $db -> updateQuery($sqlActivate);
			$_SESSION['feedback'] = "active";
		}
		else if(isset($_POST['deactivateAssessment']))
		{
			$sqlDeactivate = "Update Assessment SET Active ='" . 0 . "' WHERE AssessmentID = '" . $assessmentId . "'";
			$updateDeactive = $db -> updateQuery($sqlDeactivate);
			$_SESSION['feedback'] = "deactive";
		}
		header('location: lecturerhome.php#activedeactive');
	}
?>