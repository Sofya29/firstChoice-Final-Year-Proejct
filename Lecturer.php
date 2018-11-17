<?php
	include_once 'User.php';

	class Lecturer extends User
	{
		private $office;
		
		public function __construct($userID,$firstname,$lastname,$email,$password,$office)
		{
			parent::__construct($userID,$firstname,$lastname,$email,$password);
			$this -> office = $office;
		}
		public function setOffice($office)
		{
			$this -> office = $office;
		}
		public function getOffice()
		{
			return $this->office;
		}	
	}
?>