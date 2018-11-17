<?php
	
	include_once 'User.php';
	include_once 'DropdownData.php';

	session_start();
	
	if(!isset($_SESSION['user']) || $_SESSION['user']-> getUserType() !== "Lecturer")
	{
		header('location: index.php');
		exit();
	}
	$dd = new DropdownData();
	$lecturerModuleIdArray = $dd -> getLecturerModuleArrayByCol("ModuleID");
	$lecturerModuleNameArray = $dd -> getLecturerModuleArrayByCol("ModuleName");
	
	unset($_SESSION['studentIdResults']);
	unset($_SESSION['firstnameResults']);
	unset($_SESSION['lastnameResults']);
	unset($_SESSION['percentageResults']);
	unset($_SESSION['gradeResults']);
	unset($_SESSION['percentageWorthResults']);
	unset($_SESSION['feedback']);
	
?>

<!DOCTYPE html>
<html>
	<head>
		 <title>firstChoice</title>
		 <link rel="icon" href="firstChoiceFavicon.gif" type="image/gif" sizes="16x16">
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
				var lecturerModules = <?php	echo json_encode($lecturerModuleIdArray);	?> ;
				var countLecturerModules = <?php	echo json_encode(count($lecturerModuleIdArray));	?> ;
				var lecturerModuleNameArray = <?php	echo json_encode($lecturerModuleNameArray);	?> ;
				for(var i=0; i< countLecturerModules; i++)
				{
					$("<option value='" + lecturerModules[i] + "'>" + lecturerModuleNameArray[i] + "</option>").appendTo('#txtModuleCode');
				}
				
				var createAssessmentMessage = <?php	echo json_encode($_SESSION['createAssessmentMessage']);	?> ;
				if(createAssessmentMessage == "success")
				{
					$("<div class='alert alert-success' " + "role='alert'>" +
						"<strong>Success! </strong> The assessment has been created successfully. Please activate the assessment on the homepage when you are ready." +
					"</div>").appendTo("#uploadAssessment");
				}
				else if (createAssessmentMessage == "missing")
				{
					$("<div class='alert alert-danger' " + "role='alert'>" +
						"<strong>Error </strong> Please enter a valid title." +
					"</div>").appendTo("#uploadAssessment");
				}
				else if (createAssessmentMessage == "failure")
				{
					$("<div class='alert alert-danger' " + "role='alert'>" +
						"<strong>Error </strong> There was an error whilst creating the assessment. Please check whether you have uploaded the correct assessment and answer sheet and try again later." +
					"</div>").appendTo("#uploadAssessment");
				}
			});
		</script>
	</head>
	<body>
	<div class="panel panel-primary mainBox" id="uploadAssessment" style="height:65%;font-size:16px">
      				<div class="panel-heading">Upload Assessment</div>
					<div class="panel-body">
					    <div class="form-group">
							 <div class="form-group">
							 <form action="fileReader.php" method="post" enctype='multipart/form-data'>
								Please enter the Title of the Assessment
								<br />
								<input type="text" placeholder="Enter Title" class="form-control" id="txtAssessmentTitle" name="txtAssessmentTitle" required />
								<br />
								Please select the module this assessment is for
								<br />
								<select name="txtModuleCode" id="txtModuleCode" class="form-control"></select>
								<br />
								What percentage is this assessment worth?
								<br />
								<select name="txtPercentageWorth" id="txtPercentageWorth" class="form-control"/>
									<option value='5'>5</option>
									<option value='10'>10</option>
									<option value='15'>15</option>
									<option value='20'>20</option>
									<option value='25'>25</option>
									<option value='30'>30</option>
									<option value='35'>35</option>
									<option value='40'>40</option>
									<option value='45'>45</option>
									<option value='50'>50</option>
									<option value='55'>55</option>
									<option value='60'>60</option>
									<option value='65'>65</option>
									<option value='70'>70</option>
									<option value='75'>75</option>
									<option value='80'>80</option>
									<option value='85'>85</option>
									<option value='90'>90</option>
									<option value='95'>95</option>
									<option value='100'>100</option>
								</select>
								<br />
								Please specify the duration of this assessment
								<br />
								<select name="txtDuration" id="txtDuration" class="form-control"/>
									<option value='10'>10 minutes</option>
									<option value='20'>20 minutes</option>
									<option value='30'>30 minutes</option>
									<option value='40'>40 minutes</option>
									<option value='50'>50 minutes</option>
									<option value='60'>1 hour</option>
									<option value='70'>1 hour 10 minutes</option>
									<option value='80'>1 hour 20 minutes</option>
									<option value='90'>1 hour 30 minutes</option>
									<option value='100'>1 hour 40 minutes</option>
									<option value='110'>1 hour 50 minutes</option>
									<option value='120'>2 hours</option>
								</select>
								<br />
								Please Upload the assessment and the corrosponding Answer Sheet (Please ensure these are  .docx files)     <br />
								<div style="color:red">Questions must be numbered in list format. There must be <b>four possible answers for each question</b> listed from <b>a to d</b>.								
								The answer sheet must be numbered in a list format with the <b>corresponding letter of the answer</b>.
								<a href="SampleAssessmentFormat_QuestionPaper_AnswerSheet.zip"><u>See example here</u></a><br />
								</div>
								<label class="btn btn-default btn-file">
									Upload Assessment <input type="file" id="btnUpload" name="btnUpload" style="display: none;">
								</label>
								<label class="btn btn-default btn-file">
									Upload Answer Sheet <input type="file" id="btnAnswerSheet" name="btnAnswerSheet" style="display: none;">
								</label>
								<br /><br />
							<button class="btn btn-primary" id="btnNext" name="btnNext">Start Creating e-Assessment</button>
					</form>
					</div>
					</div>
			</div>
			</div>
				<nav class="navbar navbar-secondary" id="navBar">
			 <div class="collapse navbar-collapse">
				<div class="navbar-header">
					<a class="navbar-brand" href="">firstChoice</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/LecturerHome.php">Home</a></li>
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
	    <footer class="container-fluid bg text-center" style="position: absolute; bottom: 0px; text-align: center; width:100%;left:0%">
	     <p>firstChoice <i>by</i> SofyaSoftware</p>
	    </footer>
</body>
</html>
