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
	$lecturerAssessmentIdArray = $dd->getLecturerAssessmentArrayByCol("AssessmentID");
	$lecturerAssessmentTitleArray = $dd->getLecturerAssessmentArrayByCol("Title");
	$lecturerAssessmentModuleIdArray = $dd->getLecturerAssessmentArrayByCol("ModuleID");
	
	unset($_SESSION['feedback']);
	
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
				var lecturerAssessmentIdArray = <?php	echo json_encode($lecturerAssessmentIdArray);	?> ;
				var lecturerAssessmentTitleArray = <?php	echo json_encode($lecturerAssessmentTitleArray);	?> ;
				var lecturerAssessmentModuleIdArray = <?php	echo json_encode($lecturerAssessmentModuleIdArray);	?> ;
				
				var studentIdResults = <?php echo json_encode($_SESSION['studentIdResults']);	?> ;
				var firstnameResults = <?php echo json_encode($_SESSION['firstnameResults']);	?> ;
				var lastnameResults = <?php	echo json_encode($_SESSION['lastnameResults']);	?> ;
				var percentageResults = <?php echo json_encode($_SESSION['percentageResults']);	?> ;
				var gradeResults = <?php echo json_encode($_SESSION['gradeResults']);	?> ;
				var percentageWorthResults = <?php	echo json_encode($_SESSION['percentageWorthResults']);	?> ;
					
				for(var i=0; i< lecturerAssessmentIdArray.length; i++)
				{
					$("<option value='" + lecturerAssessmentIdArray[i] + "'>" + lecturerAssessmentModuleIdArray[i] + " - " + lecturerAssessmentTitleArray[i] + "</option>").appendTo('#assessment');
				}
				if(studentIdResults !== null)
				{
					$(" <table class='table table-hover table-responsive'" + "id='resultsTable'>" +
							"<thead>" +
								"<tr>" +
									"<th></th>" +
									"<th>Student ID</th>" +
									"<th>Lastname</th>" +
									"<th>Firstname</th>" +
									"<th>Percentage</th>" +
									"<th>Grade</th>" +
									"<th>Mark gained from Weighting</th>" +
								"</tr>" +
							"</thead>" +
						"</table>").appendTo('#results');
					$("<tbody>").appendTo('#resultsTable');
					for(var i=0; i<studentIdResults.length; i++)
					{
						$("<tr>" +
						"<th scope='row'></th>" +
							"<td>" + studentIdResults[i] + "</td>" +
							"<td>" + lastnameResults[i] + "</td>" +
							"<td>" + firstnameResults[i] + "</td>" +
							"<td>" + percentageResults[i] + "</td>" +
							"<td>" + gradeResults[i] + "</td>" +
							"<td>" + percentageWorthResults[i] + "</td>" +
						"</tr>").appendTo('#resultsTable');
					}
					$("</tbody><br />").appendTo('#resultsTable');
					$("<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />").appendTo('#results');
				}
			});
		</script>
	</head>
	<body>
	<div class="panel panel-primary mainBox" style="font-size:14px" id="results">
      				<div class="panel-heading">View Student Results</div>
					<div class="panel-body">
					    <div class="form-group">
							 <div class="form-group">
							 <form action="fileWriter.php" method="post">
								Please select the module this assessment is for
								<br />
								<select name="assessment" id="assessment" class="form-control"></select>
								<br />
								<button class="btn btn-primary" id="btnViewResults" name="btnViewResults">View Results</button>
								<button class="btn btn-primary" id="btnDownloadResults" name="btnDownloadResults">Download Results</button>
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
	    <footer class="container-fluid bg text-center" style="position: fixed; bottom: 0px; text-align: center; width:100%;left:0%">
	    <p>firstChoice <i>by</i> SofyaSoftware</p>
	    </footer>
</body>
</html>
