<?php
	
	include_once 'User.php';
	include_once 'Database.php';
	include_once 'StudentResults.php';
	
	session_start();
	
	if(!isset($_SESSION['user']) || $_SESSION['user']-> getUserType() !== "Student")
	{
		header('location: index.php');
		exit();
	}
	$studentResults = new StudentResults();
	$studentWeightingGained = $studentResults -> getStudentWeightingGained();
	$assessmentTitle = $studentResults -> getAssessmentTitle();
	$assessmentModule = $studentResults -> getAssessmentModule();
	$assessmentPercentageMarks = $studentResults -> getStudentPercentageMarks();
	$assessmenStudentGrades = $studentResults -> getStudentGrades();
?>

<!DOCTYPE html>
<html>
	<head>
		 <title>firstChoice</title>
		<link rel="icon" href="FirstChoiceFavicon.gif" type="image/gif" sizes="16x16">
	     <meta charset="utf-8">
	     <meta name="viewport" content="width=device-width, initial-scale=1">
	     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		 <link rel="stylesheet" type="text/css" href="Stylesheet.css">
	     <style>
	     .carousel-inner > .item > img,
	     .carousel-inner > .item > a > img {
	         width: 70%;
	         margin: auto;
	     }
		</style>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script>
			$(document).ready(function()
			{
				var studentWeightingGained = <?php	echo json_encode($studentWeightingGained);	?> ;
				var assessmentTitle = <?php	echo json_encode($assessmentTitle);	?> ;
				var assessmentModule = <?php	echo json_encode($assessmentModule);	?> ;
				var assessmentPercentageMarks = <?php	echo json_encode($assessmentPercentageMarks);	?> ;
				var assessmenStudentGrades = <?php	echo json_encode($assessmenStudentGrades);	?> ;
				$("<tbody>").appendTo('#resultsTable');
				for(var i=studentWeightingGained.length-1; i>=0; i--)
				{
					$("<tr>" +
						"<th scope='row'></th>" +
							"<td>" + assessmentModule[i] + "</td>" +
							"<td>" + assessmentTitle[i] + "</td>" +
							"<td>" + assessmentPercentageMarks[i] + "</td>" +
							"<td>" + assessmenStudentGrades[i] + "</td>" +
							"<td>" + studentWeightingGained[i] + "</td>" +
						"</tr>").appendTo('#resultsTable');
				}
				$("</tbody>").appendTo('#resultsTable');
				$("<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />").appendTo('#resultsTable');
			});
		</script>
	</head>
	<body>
	<div class="panel panel-primary mainBox" style="font-size:14px">
      				<div class="panel-heading">View My Results</div>
					<div class="panel-body">
					    <table class="table table-hover table-responsive" id="resultsTable">
							<thead>
								<tr>
									<th></th>
									<th>Module ID</th>
									<th>Assessment Title</th>
									<th>Percentage</th>
									<th>Grade</th>
									<th>Mark gained from Weighting</th>
								</tr>
							</thead>
						</table>
					</div>
	</div>
				<nav class="navbar navbar-secondary" id="navBar">
			 <div class="collapse navbar-collapse">
				<div class="navbar-header">
					<a class="navbar-brand" href="">firstChoice</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/StudentHome.php">Home</a></li>
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/Account.php">Account</a></li>
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/ContactUs.php">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
				</ul>
				<br /><br /><hr />
			 </div>
			</nav>
		<style>
	    .bg {
	      background-color: #428BCA;
	      color: #fff;
	    }
	    .container-fluid {
	      padding-top: 70px;
	      padding-bottom: 70px;
	    }
	    </style>
	    <footer class="container-fluid bg text-center" style="position: fixed; bottom: 0px; text-align: center; width:100%;left:0%">
	    <p>firstChoice <i>by</i> SofyaSoftware</p>
	    </footer>
</body>
</html>
