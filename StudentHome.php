<?php
	
	include_once 'User.php';
	include_once 'StudentSpecificModules.php';
	
	session_start();
	
	if(!isset($_SESSION['user']) || $_SESSION['user']-> getUserType() !== "Student")
	{
		header('location: index.php');
		exit();
	}
	
	$ssm = new StudentSpecificModules();
	$studentModulePosts = $ssm -> getPostByLecturerModule();
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
					var studentModulePosts = <?php	echo json_encode($studentModulePosts);	?> ;
					var countStudentModulePosts = <?php	echo json_encode(count($studentModulePosts));	?> ;
					for(var i=0; i< countStudentModulePosts; i++)
					{
						$("<br />" + studentModulePosts[i] + "<br /><hr />").appendTo('#postsmsg');
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
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#posts">POSTS</a></li>
        <li><a href="#help">HELP & SUPPORT</a></li>
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
          <span class="glyphicon glyphicon-list logo-small" style="font-size:120px"></span>
          <h2>VIEW ASSESSMENTS</h2>
          <p></p>
          <p><a class="btn btn-default" href="publishAssessment.php" role="button">View Assessments &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img  src="firstChoiceLogo.jpg" alt="Generic placeholder image" style="height:130px;width:130px">
          <h2>firstChoice</h2>
          <p></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
           <span class="glyphicon glyphicon-signal logo-small" style="font-size:120px"></span>
          <h2>VIEW MY RESULTS</h2>
          <p></p>
          <p><a class="btn btn-default" href="viewMyResults.php" role="button">View Results &raquo;</a></p>
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
<div class="container-fluid text-center" style="overflow:hidden;position:relative" id="posts">
 <h2 class="text-center">POSTS</h2>
 <br />
	<div id="postsmsg">
	
	</div>
	<br /><br /><br /><br />
</div>
<br /><br />

<!-- Container (Portfolio Section) -->
<div id="help" class="container-fluid bg-grey" style="text-align:left">
  <h2 class="text-center">HHELP & SUPPORT: HOW TO COMPLETE AN ASSESSMENT</h2>
  <p>
						<ol>
							<li>Click on View Assessment</li>
							<li>A link to your assessment will be shown here</li>
							<li>Click on the link</li>
							<li>Complete the Assessment</li>
							<li>Once finished, click submit. Your mark will be emailed to you.</li>
							<li>Although you may be able to access the assessment once you have submitted, please note that you wil  not be bale to submit again.</li>
							<li>Good Luck!</li>
						</ol>
						<div>
						</div>
  </P>
</div>
<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid">
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

