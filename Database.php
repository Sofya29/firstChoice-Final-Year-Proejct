<?php
	include_once 'User.php';
	include_once 'Student.php';
	include_once 'CourseModule.php';
	include_once 'Assessment.php';
	include_once 'Question.php';
	include_once 'Answer.php';
	include_once 'Lecturer.php';
	include_once 'Module.php';
	include_once 'LecturerModule.php';
	include_once 'StudentCourseModule.php';
	include_once 'StudentAssessment.php';
	include_once 'Post.php';
	
	class Database
	{
		private $host_name = "db625229836.db.1and1.com";
		private $database   = "db625229836";
		private $user_name  = "dbo625229836";
		private $password = "Sofya1234";
		
		public function __construct()
		{
			$this->connectToDatabase();
		}
		public function connectToDatabase()
		{
			$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
    
			if(mysqli_connect_errno())
			{
				echo '<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>';
			}
		}
		public function selectAllFromColumnAsString($sql,$col)
		{
			$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
			$result = $connect->query($sql);
			$array;
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_Assoc())
				{
    					$array[] =  $row[$col];  
				}
			}
			return $array;
		}
		public function insertAndOrUpdateQuery($sqlquery)
			{
				$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
				$result=$connect -> query($sqlquery);
				$connect->close();
			}

		public function insertQuery($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
				    $connect->close();
			}
		public function updateQuery($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
				    $connect->close();
			}
		public function deleteQuery($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
				    $connect->close();
			}
		public function selectFromUser($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$user = new User();
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$userId = $row["UserID"];
							$firstname = $row["Firstname"];
							$lastname = $row["Lastname"];
							$email = $row["Email"];
							$pass = $row["Password"];
							$userType = $row["UserType"];
							$active = $row["Active"];
							
							$user = new User($userId,$firstname,$lastname,$email,$pass,$userType,$active);
						}
					}
					return $user;
			}
			public function selectFromStudent($sqlqueryStudent)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlqueryStudent);
					$student = new Student();
					
					if($result->num_rows > 0)
					{	
						while($row = $result->fetch_Assoc())
						{
							$userId = $row["UserID"];
							$courseId = $row["CourseID"];
							$level = $row["Level"];
							
							$sql = "SELECT * FROM User WHERE USerID='" . $userId . "'";
							$thisUser = $this->SelectFromUser($sql);
							$thisUserId =$thisUser -> getUserId();
							$thisUserfn =$thisUser -> getFirstname();
							$thisUserln =$thisUser -> getLastname();
							$thisUserEmail =$thisUser -> getEmail();
							$thisUserPass =$thisUser -> getPassword();
							$thisUserType =$thisUser -> getUserType();
							$thisUserActive =$thisUser -> getActive();
							
							$student = new Student($thisUserId,$thisUserfn,$thisUserln,$thisUserEmail,$thisUserPass,$thisUserType,$thisUserActive,$courseId,$level);
						}
					}
					return $student;
			}
			public function selectFromLecturer($sqlqueryLecturer)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlqueryLecturer);
					$lecturer = new Lecturer();
					
					if($result->num_rows > 0)
					{	
						while($row = $result->fetch_Assoc())
						{
							$userId = $row["UserID"];
							$office = $row["Office"];
							
							$sql = "SELECT * FROM User WHERE USerID='" . $userId . "'";
							$thisUser = $this->SelectFromUser($sql);
							$thisUserId =$thisUser -> getUserId();
							$thisUserfn =$thisUser -> getFirstname();
							$thisUserln =$thisUser -> getLastname();
							$thisUserEmail =$thisUser -> getEmail();
							$thisUserPass =$thisUser -> getPassword();
							$thisUserType =$thisUser -> getUserType();
							$thisUserActive =$thisUser -> getActive();
							
							$lecturer = new Lecturer($thisUserId,$thisUserfn,$thisUserln,$thisUserEmail,$thisUserPass,$thisUserType,$thisUserActive,$office);
						}
					}
					return $lecturer;
			}
			public function selectFromModule($sqlqueryModule)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlqueryModule);
					$module = new Module();
					
					if($result->num_rows > 0)
					{	
						while($row = $result->fetch_Assoc())
						{
							$moduleId = $row["ModuleID"];
							$moduleName = $row["ModuleName"];
							
							$module = new Module($moduleId,$moduleName);
						}
					}
					return $module;
			}
			public function selectFromLecturerModule($sqlqueryLecturerModule)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlqueryLecturerModule);
					$lecturerModule = new LecturerModule();
					$counter = 0;
					
					if($result->num_rows > 0)
					{	
						while($row = $result->fetch_Assoc())
						{
							$lecturerModuleId = $row["LecturerModuleID"];
							$lecturerId = $row["LecturerID"];
							$moduleId = $row["ModuleID"];
							
							$lecturerModule = new LecturerModule($lecturerModuleId,$lecturerId,$moduleId);
							$lecturerModuleArray[$counter] = $lecturerModule;
							$counter = $counter+1;
						}
					}
					return $lecturerModuleArray;
			}
			public function selectFromCourseModule($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$courseModule = new CourseModule();
					$courseModuleArray = array();
					$counter =0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$courseModuleId = $row["CourseModuleID"];
							$courseId = $row["CourseID"];
							$moduleId = $row["ModuleID"];
							$optional = $row["Optional"];
							$level = $row["Level"];
							
							$courseModule = new CourseModule($courseModuleId,$courseId,$moduleId,$optional,$level);
							$courseModuleArray[$counter] = $courseModule;
							$counter = $counter+1;
						}
					}
					return $courseModuleArray;
			}
			public function selectFromAssessment($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$assessment = new Assessment();
					$counter = 0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$assessmentId = $row["AssessmentID"];
							$title = $row["Title"];
							$moduleId = $row["ModuleID"];
							$percentageWorth = $row["PercentageWorth"];
							$duration = $row["Duration"];
							$lecturerId = $row["LecturerID"];
							$active = $row["Active"];
							
							$assessment = new Assessment($assessmentId,$title,$moduleId,$percentageWorth,$duration,$lecturerId,$active);
							$assessmentArray[$counter] = $assessment;
							$counter = $counter+1;
						}
					}
					return $assessmentArray;	
			}
			public function selectFromQuestion($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$question = new Question();
					$counter = 0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$questionId = $row["QuestionID"];
							$questionString = $row["Question"];
							$assessmentId = $row["AssessmentID"];
							
							$question = new Question($questionId,$questionString,$assessmentId);
							$questionArray[$counter] = $question;
							$counter = $counter+1;
						}
					}
					return $questionArray;
			}
			public function selectFromAnswer($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$answer = new Answer();
					$answerArray = array();
					$counter = 0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$answerId = $row["AnswerID"];
							$answerString = $row["Answer"];
							$assessmentId = $row["AssessmentID"];
							$correct = $row["Correct"];
							$questionId = $row["QuestionID"];
							
							$answer = new Answer($answerId,$answerString,$assessmentId,$correct,$questionId);
							$answerArray[$counter] = $answer;
							$counter = $counter+1;
						}
					}
					return $answerArray;
			}
			public function selectFromStudentCourseModule($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$studentCourseModule = new StudentCourseModule();
					$counter = 0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$studentCourseModuleId = $row["StudentCourseModuleID"];
							$studentId = $row["StudentID"];
							$courseModuleId = $row["CourseModuleID"];
							
							$studentCourseModule = new StudentCourseModule($studentCourseModuleId,$studentId,$courseModuleId);
							$studentCourseModuleArray[$counter] = $studentCourseModule;
							$counter = $counter+1;
						}
					}
					return $studentCourseModuleArray;
			}
			public function selectFromStudentAssessment($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$StudentAssessment = new StudentAssessment();
					$counter = 0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$studentAssessmentId = $row["StudentAssessmentID"];
							$studentId = $row["StudentID"];
							$assessmentId = $row["AssessmentID"];
							$markGained = $row["Percentage"];
							$grade = $row["Grade"];
							$percentageGained = $row["PercentageWorth"];
							
							$studentAssessment = new StudentAssessment($studentAssessmentId,$studentId,$assessmentId,$markGained,$grade,$percentageGained);
							$studentAssessmentArray[$counter] = $studentAssessment;
							$counter = $counter+1;
						}
					}
					return $studentAssessmentArray;
			}
			public function selectFromPost($sqlquery)
			{
					$connect = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->database);
					$result=$connect -> query($sqlquery);
					$post = new Post();
					$counter = 0;
					
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_Assoc())
						{
							$postId = $row["PostID"];
							$post = $row["Post"];
							$lecturerModuleId = $row["LecturerModuleID"];
							
							$post = new Post($postId,$post,$lecturerModuleId);
							$postArray[$counter] = $post;
							$counter = $counter+1;
						}
					}
					return $postArray;
			}
	}
?>