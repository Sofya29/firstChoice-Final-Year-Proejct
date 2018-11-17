<?php
	
	include_once 'User.php';
	
	session_start();
	
	if(!isset($_SESSION['user']) || $_SESSION['user']-> getUserType() !== "Admin")
	{
		header('location: index.php');
		exit();
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
		 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
			 <link rel="stylesheet" type="text/css" href="Stylesheet.css">
	     <style>
	     .carousel-inner > .item > img,
	     .carousel-inner > .item > a > img {
	         width: 70%;
	         margin: auto;
	     }

	     </style>
	    </head>
		<body>
				<nav class="navbar navbar-secondary" style="position: fixed;z-index: 1; width: 100%;background-color:white">
			 <div class="collapse navbar-collapse">
				<div class="navbar-header">
					<a class="navbar-brand" href="">firstChoice</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/AdminHome.php">Home</a></li>
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/Account.php">Account</a></li>
					<li><a href="http://www.sofya.sonyasofya.co.uk/FirstChoice/ContactUs.php">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
				</ul>
				<br /><br /><hr />
			 </div>
			</nav>
			<form action="AdminTaskConditions.php" method="post">
			    <div class="panel with-nav-tabs panel-secondary" id="adminContent">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Student</a></li>
                            <li><a href="#tab2" data-toggle="tab">Lecturer</a></li>
                            <li><a href="#tab3" data-toggle="tab">Course</a></li>
							<li><a href="#tab4" data-toggle="tab">Module</a></li>
							<li><a href="#tab5" data-toggle="tab">Admin</a></li>
							<li><a href="#tab6" data-toggle="tab">Add Student to Module</a></li>
							<li><a href="#tab7" data-toggle="tab">Add Lecturer to Module</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
							<input type="text" class="form-control" id = "txtStudentId" name="txtStudentId" placeholder="Enter Student ID" />
							<br />
							<input type="text" class="form-control" id = "txtStudentFirstname" name="txtStudentFirstname" placeholder="Enter Firstname" />
							<br />
							<input type="text" class="form-control" id = "txtStudentLastname" name="txtStudentLastname" placeholder="Enter Lastname" />
							<br />
							<input type="email" class="form-control" id = "txtStudentEmail" name="txtStudentEmail" placeholder="Enter Email" />
							<br />
							<input type="text" class="form-control" id = "txtStudentCourse" name="txtStudentCourse" placeholder="Enter Course" />
							<br />
							what level is the student in?
							<br />
							<div class="btn-group" id="buttonLevel" name="buttonLevel" data-toggle="buttons">
								<label class="btn btn-default active">
								<input type="radio" name="studentLevel" id="studentLevel" value="4"> 4
								</label>
								<label class="btn btn-default">
								<input type="radio" name="studentLevel" id="studentLevel" value="5"> 5
								</label>
								<label class="btn btn-default">
								<input type="radio" name="studentLevel" id="studentLevel" value="6"> 6
								</label>
							</div>
							<br />
							<br />
							<input type="password" class="form-control" id = "txtStudentPassword" name="txtStudentPassword" placeholder="Enter Password" />
							<br />
							<input type="password" class="form-control" id = "txtStudentPassword2" name="txtStudentPassword2" placeholder="Enter Password" />
							<br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterStudent" name="btnEnterStudent" value="Add new Student record" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateStudent" name="btnUpdateStudent" value="Update Student record" />
						</div>
						
                        <div class="tab-pane fade" id="tab2">
						<input type="text" class="form-control" id = "txtLecturerId" name="txtLecturerId" placeholder="Enter Lecturer ID" />
							<br />
							<input type="text" class="form-control" id = "txtLecturerFirstname" name="txtLecturerFirstname" placeholder="Enter Firstname" />
							<br />
							<input type="text" class="form-control" id = "txtLecturerLastname" name="txtLecturerLastname" placeholder="Enter Lastname" />
							<br />
							<input type="email" class="form-control" id = "txtLecturerEmail" name="txtLecturerEmail" placeholder="Enter Email" />
							<br />
							<input type="text" class="form-control" id = "txtLecturerOffice" name="txtLecturerOffice" placeholder="Enter Office" />
							<br />
							<input type="password" class="form-control" id = "txtLecturerPassword" name="txtLecturerPassword" placeholder="Enter Password" />
							<br />
							<input type="password" class="form-control" id = "txtLecturerPassword2" name="txtLecturerPassword2" placeholder="Enter Password" />
							<br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterLecturer" name="btnEnterLecturer" value="Add new Lecturer record" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateLecturer" name="btnUpdateLecturer" value="Update Lecturer record" />
						</div>
						
                        <div class="tab-pane fade" id="tab3">
							<input type="text" class="form-control" id = "txtCourseId" name="txtCourseId" placeholder="Enter Course ID" />
							<br />
							<input type="text" class="form-control" id = "txtCourseTitle" name="txtCourseTitle" placeholder="Enter Course Title" />
							<br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterCourse" name="btnEnterCourse" value="Add new Course" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateCourse" name="btnUpdateCourse" value="Update Course" />
						</div>
						
						<div class="tab-pane fade" id="tab4">
							<input type="text" class="form-control" id = "txtModuleId" name="txtModuleId" placeholder="Enter Module ID" />
							<br />
							<input type="text" class="form-control" id = "txtModuleTitle" name="txtModuleTitle" placeholder="Enter Module Title" />
							<br />
							<input type="text" class="form-control" id = "txtCourse" name="txtCourse" placeholder="Enter Course ID" />
							<br />  
							Which level is this module taught in?
							<br />
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default active">
								<input type="radio" id="level" name="level" value="4"> 4
								</label>
								<label class="btn btn-default">
								<input type="radio" id="level" name="level" value="5"> 5
								</label>
								<label class="btn btn-default">
								<input type="radio" id="level" name="level" value="6"> 6
								</label>
							</div>
							<br /><br />
							Is this an optional module?
							<input type="checkbox" id="optional" name="optional" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="default" />
							<br /><br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterModule" name="btnEnterModule" value="Add new Module" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateModule" name="btnUpdateModule" value="Update Module" />
							</div>
							
							<div class="tab-pane fade" id="tab5">
							<input type="text" class="form-control" id = "txtAdminId" name="txtAdminId" placeholder="Enter Admin ID" />
							<br />
							<input type="text" class="form-control" id = "txtAdminFirstname" name="txtAdminFirstname" placeholder="Enter Firstname" />
							<br />
							<input type="text" class="form-control" id = "txtAdminLastname" name="txtAdminLastname" placeholder="Enter Lastname" />
							<br />
							<input type="email" class="form-control" id = "txtAdminEmail" name="txtAdminEmail" placeholder="Enter Email" />
							<br />
							<input type="password" class="form-control" id = "txtAdminPassword" name="txtAdminPassword" placeholder="Enter Password" />
							<br />
							<input type="password" class="form-control" id = "txtAdminPassword2" name="txtAdminPassword2" placeholder="Enter Password" />
							<br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterStudent" name="btnEnterAdmin" value="Add new Admin record" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateStudent" name="btnUpdateAdmin" value="Update Admin record" />
						</div>
						
						<div class="tab-pane fade" id="tab6">
							<input type="text" class="form-control" id = "txtStudentIdentity" name="txtStudentIdentity" placeholder="Enter Student ID" />
							<br />
							<input type="text" class="form-control" id = "txtModuleCode" name="txtModuleCode" placeholder="Enter Module Code" />
							<br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterStudentModule" name="btnEnterStudentModule" value="Add Student to Module" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateStudentModule" name="btnUpdateStudentModule" value="Update Student on Module" />
						</div>
						
						<div class="tab-pane fade" id="tab7">
							<input type="text" class="form-control" id = "txtLecturerIdentity" name="txtLecturerIdentity" placeholder="Enter Lecturer ID" />
							<br />
							<input type="text" class="form-control" id = "txtModuleCode2" name="txtModuleCode2" placeholder="Enter Module Code" />
							<br />
							<input type="submit" class="btn btn btn-primary" id = "btnEnterLecturerModule" name="btnEnterLecturerModule" value="Add Lecturer to Modue" />
							<input type="submit" class="btn btn btn-primary" id = "btnUpdateLecturerModule" name="btnUpdateLecturerModule" value="Update Lecturer to Module" />
						</div>
						</div>
                    </div>
					</div>
			  </form>
</body>
</html>