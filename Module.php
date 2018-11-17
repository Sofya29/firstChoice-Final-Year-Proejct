<?php
	class Module
	{
		private $moduleId;
		private $name;
		
		public function __construct($moduleId,$name)
		{
			$this -> moduleId = $moduleId;
			$this -> name = $name;
		}
		public function setModuleId($moduleId)
		{
			$this -> moduleId = $moduleId;
		}
		public function getModuleId()
		{
			return $this->moduleId;
		}
		public function setName($name)
		{
			$this -> name = $name;
		}
		public function getName()
		{
			return $this->name;
		}
	}
?>