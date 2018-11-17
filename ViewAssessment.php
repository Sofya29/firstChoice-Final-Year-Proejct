<?php
	include_once 'Database.php';
	include_once 'EachAssessment.php';
	session_start();
	
	if(!isset($_SESSION['user']) || $_SESSION['user']-> getUserType() !== "Student")
	{
		header('location: index.php');
		exit();
	}
	
	$db = new Database();
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
			var noOfAssessments = <?php echo json_encode(count($_SESSION['assessmentId'])); ?>;
			var assessmentIds = <?php echo json_encode($_SESSION['assessmentId']); ?>;
			var titles = <?php echo json_encode($_SESSION['assessmentTitle']); ?>;
			
		$(document).ready(function()
		{	
			for(var x=0;x<noOfAssessments;x++)
			{
					$("<button type='submit'" + " class='btn btn-primary btn-block buttonLinks' " + "id='btnAssessment" + "' name='btnAssessment" + "' value='" + x + "' style='" + "position:absolute;left:0%" + "'>" + titles[x] + "</button><br /><br />").appendTo('#questionBox');
			}			
			$(".buttonLinks").click(function()
			{
				var valueOfClickedButton = $(this).val();
				$("div:first").after("<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />");
				var ansNumber = 0;
				var allAssessments = <?php echo json_encode($_SESSION['allAssessments']); ?>;
				var questionArray = <?php echo json_encode($_SESSION['allAssessmentQuestions']); ?>;
				var answerArray = <?php echo json_encode($_SESSION['allAssessmentAnswers']); ?>; 
				var noOfQs = questionArray[valueOfClickedButton].length;
				var thisQuestion = questionArray[valueOfClickedButton];
				var thisAnswer = answerArray[valueOfClickedButton];
				
			for(var i=1;i<=noOfQs;i++)
			{	
				$("<br /><br /><div class='panel panel-primary questions'" + " id='question" + i + "'" + ">" +
      				"<div class='panel-heading'" + ">Question " + i + "</div>" +
					"<div class='panel-body'>" +
							 "<div class='form-group'>" +
								thisQuestion[i-1] +
								"<br /><br />" +
								"<div" + " class='form-control'>" + "<input type='radio'" + " value='" + thisAnswer[ansNumber]  + "'" + " name='q"+ i + "'>" + thisAnswer[ansNumber] + "</div>" +
								"<br />" +
								"<div" + " class='form-control'>" + "<input type='radio'" + " value='" + thisAnswer[ansNumber+1]  + "'" +  " name='q" + i + "'>"  + thisAnswer[ansNumber+1] + "</div>" +
								"<br />" +
								"<div" + " class='form-control'>" + "<input type='radio'" + " value='" + thisAnswer[ansNumber+2]  + "'" +  " name='q" + i + "'>"   + thisAnswer[ansNumber+2] + "</div>" +
								"<br />" +
								"<div" + " class='form-control'>" + "<input type='radio'" + " value='" + thisAnswer[ansNumber+3]  + "'" +  " name='q" +  i + "'>"   + thisAnswer[ansNumber+3] + "</div>" +
							"</div>"
					).fadeIn(500).appendTo('#complete');
					ansNumber = ansNumber+4;
					$('#question' + i).after("<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />");
			}
				$("<br /><br /><button type='submit'" + " class='btn btn-primary btn btn-block'" + " name='btnSubmit'" + " id='btnSubmit'" + "value='" + assessmentIds[valueOfClickedButton] + "'" + ">Submit Assessment</button><br /><br /></div></div>").appendTo('#complete');	
				$('.buttonLinks').prop("disabled",true);
			}
			);
			}
			);
		</script>
	</head>
	<body>
	<div class="panel panel-primary" id="questionBox">
      				<div class="panel-heading">Assessments</div>
					<div class="panel-body">
					    <div class="form-group">
					</div>
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
			<form action="MarkAssessment.php" method="post" name="complete" id="complete"></form>
</body>
</html>
