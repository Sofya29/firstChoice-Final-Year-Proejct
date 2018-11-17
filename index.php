<?php
	
	include_once 'User.php';
	include_once 'DocxToTxt.php';

	session_start();
	$docxToText = new DocxToTxt();
	$docxToText -> emptyTheFile("assessment.csv");

	if(isset($_SESSION['user']))
	{
		unset($_SESSION['user']);
		session_destroy();
	}
?>

<!DOCTYPE HTML>
<htlml>
    
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
		  	<script>
			$(document).ready(function()
			{
				var invalidUser = <?php	echo json_encode($_SESSION['invalidUser']);	?> ;
				
				if(invalidUser == "invalid")
				{
					$("<br /><div class='alert alert-danger' style='font-size:14px' " + "role='alert'>" +
						"<strong>Invalid User:</strong> The password and/or username you have entered is incorrect. Please try again." +
					"</div>").appendTo('#loginBox');
				}
			});
		</script>
	    </head>
		<body>
				<nav class="navbar navbar-secondary" id="navBar">
			 <div class="collapse navbar-collapse">
				<div class="navbar-header">
					<a class="navbar-brand" href="">firstChoice</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/index.php">Home</a></li>
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/index.php">Account</a></li>
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/index.php">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				</ul>
				<br /><br /><hr />
			 </div>
			</nav>
						<div class="panel panel-primary" id="login">
						<div class="panel-heading">Login</div>
						<div class="panel-body" id="loginBox">
									 	<form action="LoginQueries.php" method = "post">
											<div class="form-group">
												<input type="username" class="form-control" id = "txtUsername" name="txtUsername" placeholder="Enter username" required />
											</div>
											<div class="form-group">
												<input type="password" class="form-control" id = "txtPassword" name="txtPassword" placeholder="Enter password" required />
											</div>
											<button type="submit" class="btn btn-default" name="btnLogin">Submit</button>
										</form>
						</div>
					</div>
			</div>
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
	     <p>first choice <i>by</i> SofyaSoftware</p>
	    </footer>
</body>
</html>