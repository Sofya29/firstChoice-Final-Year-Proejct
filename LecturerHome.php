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
	$lecturerModuleNameArray = $dd -> getLecturerModuleArrayByCol("ModuleName");
	$lecturerModuleIdArray = $dd -> getLecturerModuleArrayByCol("ModuleID");

	$lecturerAssessmentIdArray = $dd->getLecturerAssessmentArrayByCol("AssessmentID");
	$lecturerAssessmentTitleArray = $dd->getLecturerAssessmentArrayByCol("Title");
	
	unset($_SESSION['studentIdResults']);
	unset($_SESSION['firstnameResults']);
	unset($_SESSION['lastnameResults']);
	unset($_SESSION['percentageResults']);
	unset($_SESSION['gradeResults']);
	unset($_SESSION['percentageWorthResults']);
	unset($_SESSION['createAssessmentMessage']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>firstChoice</title>
  <link rel="icon" href="FirstChoiceFavicon.gif" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="Stylesheet.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="stylesheetBootstrap.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  </style>
  		    <script>
			$(document).ready(function()
			{
				var lecturerModules = <?php	echo json_encode($lecturerModuleIdArray);	?> ;
				var countLecturerModules = <?php	echo json_encode(count($lecturerModuleIdArray));	?> ;
				var lecturerModuleNameArray = <?php	echo json_encode($lecturerModuleNameArray);	?> ;
				for(var i=0; i< countLecturerModules; i++)
				{
					$("<option value='" + lecturerModules[i] + "'>" + lecturerModuleNameArray[i] + "</option>").appendTo('#module');
				}
				var lecturerAssessmentIdArray = <?php	echo json_encode($lecturerAssessmentIdArray);	?> ;
				var lecturerAssessmentTitleArray = <?php	echo json_encode($lecturerAssessmentTitleArray);	?> ;
				for(var i=0; i< lecturerAssessmentIdArray.length; i++)
				{
					$("<option value='" + lecturerAssessmentIdArray[i] + "'>" + lecturerAssessmentIdArray[i] + " - " + lecturerAssessmentTitleArray[i] + "</option>").appendTo('#assessment');
				}
				var feedback = <?php	echo json_encode($_SESSION['feedback']);	?> ;
				if(feedback == "success")
				{
					$("<br /><div class='alert alert-success' " + "role='alert'>" +
						"<strong>Success! </strong> The meesage has been posted successfully." +
					"</div><br />").appendTo('#post');
				}
				else if(feedback == "failure")
				{
					$("<br /><div class='alert alert-danger' " + "role='alert'>" +
						"<strong>Error </strong> There was an error whilst posting the message. Please ensure whether you have typed a message and try again later." +
					"</div><br />").appendTo('#post');
				}
				else if(feedback == "active")
				{
					$("<br /><div class='alert alert-info' " + "role='alert'>" +
						"<strong>Assessment Activation </strong> The assessment has been activated." +
					"</div><br />").appendTo('#activedeactive');
				}
				else if(feedback == "deactive")
				{
					$("<br /><div class='alert alert-info' " + "role='alert'>" +
						"<strong>Assessment Deactivation </strong>  The assessment has been deactivated." +
					"</div><br />").appendTo('#activedeactive');
				}
			});
		</script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">firstChoice</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#post">POST MESSAGE</a></li>
        <li><a href="#help">HELP & SUPPORT</a></li>
		<li><a href="#activedeactive">ASSESSMENT STATUS</a></li>
		<li><a href="#contact">CONTACT US</a></li>
		<li><a href="#">ACCOUNT</a></li>
		<li><a href="index.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1 style="font-family:arial">firstChoice</h1>
</div>
<!-- Container (About Section) -->
    <!-- Three columns of text below the carousel -->
      <div class="row" style="text-align:center">
        <div class="col-lg-4">
          <span class="glyphicon glyphicon-edit logo-small" style="font-size:120px"></span>
          <h2>Create Assessment</h2>
          <p></p>
          <p><a class="btn btn-default" href="CreateAssessment.php" role="button">Create Assessment &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img  src="firstChoiceLogo.jpg" alt="Generic placeholder image" style="height:130px;width:130px">
          <h2>firstChoice</h2>
          <p></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
           <span class="glyphicon glyphicon-signal logo-small" style="font-size:120px"></span>
          <h2>View Student Results</h2>
          <p></p>
          <p><a class="btn btn-default" href="viewStudentResults.php" role="button">View Results &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

<div class="container-fluid bg-grey" id="about">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>firstChoice</h2><br>
      <h4><strong>ABOUT </strong>Welcome to firstChoice. This site is designed to allow lecturers to create multiple choice based assessments quickly and easily with limited training, which students can then complete.
						By using this serivce, we ensure that assessments are marked reliably, and that students are given instant results.</h4><br>
      <p><strong>Why Use this Site?</strong></p>
						<ul>
							<li>Allows lecturers to create assessments more easily</li>
							<li>Saves cost of printing</li>
							<li>Saves Time</li>
							<li>Environmentally friendly Approach</li>
						</ul>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<form action="LecturerPost.php" method="post">
<div id="post" class="container-fluid text-center">
 <h2 class="text-center">POST A MESSAGE</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Post a message so that all students <br /> in a particular module can see when they log in. </p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
        	<select name="module" id="module" class="form-control" style="width:113%;"></select>
        </div>
      </div>
      <textarea class="form-control" id="postMessage" name="postMessage" placeholder="Enter your massage" rows="5" style="width:55%;" required></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
         <button type="submit" name="postSubmit" class='btn btn-primary pull-right' style="left:50%;position:absolute">Post</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Container (Portfolio Section) -->
<div id="help" class="container-fluid bg-grey">
  <h2 class="text-center">HHELP & SUPPORT: HOW TO CREATE AN ASSESSMENT</h2><br>
  <P>
						<ol>
							<li>Click on Create Assessment and complete the form</li>
							<li>Create a Word document ('.docx') file with the assessment. All Questions and answers must be written on a new line. Questions must be numbered, whilst answers must be ordered by letters. These must be in list format. Four possible answers must be given from a to d for each question</li>
							<li>Create a Word document ('.docx') file with the answer sheet, consisting of the question number followed by the letter of the answer. Each one must be on a new line in list format</li>
							<li>Upload the Assessment and the Answer Sheet</li>
							<li>Click Create Assessment</li>
							<li>Publish the assessment below. Once the assessment is finished, remember to deactivate it. This is done in the "Assessment Status" section</li>
							<br />
							<a href="SampleAssessmentFormat_QuestionPaper_AnswerSheet.zip"><u>See example here</u></a><br />
						</ol>
						<div>
						</div>
  </P>
</div>

<!-- Container (Pricing Section) -->
<div id="activedeactive" class="container-fluid text-center">
<h2>ASSESSMENT ACTIVATION/DEACTIVATION</h2>
						<form action="ActivateDeactivateAsssessment.php" method="post">
							<select name="assessment" id="assessment" class="form-control" style="width:50%;position:absolute;left:25%"></select>
							<br /><br />
							<button type="submit" class='btn btn-primary btn-sm' id="activateAssessment" name="activateAssessment">Activate</button>
							<button type="submit" class='btn btn-primary btn-sm' id="deactivateAssessment" name="deactivateAssessment">Deactivate</button>
						</form>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> London, United Kingdom</p>
      <p><span class="glyphicon glyphicon-phone"></span> +44 0000000000</p>
      <p><span class="glyphicon glyphicon-envelope"></span> Sofya@something.co.uk</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-primary pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <br />
  firstChoice
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>

