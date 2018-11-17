<?php
	class User
	{
		protected $userId;
		protected $firstname;
		protected $lastname;
		protected $email;
		protected $password;
		protected $userType;
		protected $active;
		
		public function __construct($userId,$firstname,$lastname,$email,$password,$userType,$active)
		{
			$this -> userId = $userId;
			$this -> firstname = $firstname;
			$this -> lastname = $lastname;
			$this -> email = $email;
			$this -> password = $password;
			$this -> userType = $userType;
			$this -> active = $active;
		}
		public function setUserId($userId)
		{
			$this -> userId = $userId;
		}
		public function getUserId()
		{
			return $this->userId;
		}
		public function setFirstname($firstname)
		{
			$this -> firstname = $firstname;
		}
		public function getFirstname()
		{
			return $this->firstname;
		}
		public function setLastname($lastname)
		{
			$this -> lastname = $lastname;
		}
		public function getLastname()
		{
			return $this->lastname;
		}
		public function setEmail($email)
		{
			$this -> email = $email;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function setPassword($password)
		{
			$this -> password = $password;
		}
		public function getPassword()
		{
			return $this->password;
		}
		public function setUserType($userType)
		{
			$this -> userType = $userType;
		}
		public function getUserType()
		{
			return $this->userType;
		}
		public function setActive($active)
		{
			$this -> active = $active;
		}
		public function getActive()
		{
			return $this->active;
		}
		
	}
?>