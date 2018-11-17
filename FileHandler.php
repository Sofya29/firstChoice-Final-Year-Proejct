<?php
	include_once 'Database.php';

	class FileHandler
	{
		public static function uploadFile($buttonName)
		{
			$destination;
			if(isset($_FILES[$buttonName]))
			{
				$fileName = $_FILES[$buttonName]['name'];
				$fileTemporaryname = $_FILES[$buttonName]['tmp_name'];
				
				$fileExtension = explode('.', $fileName);
				$fileExtension = strtolower(end($fileExtension));
				
				$fileTypesAllowed = array('docx');
		
				if(in_array($fileExtension, $fileTypesAllowed))
				{
					$uniqueFile = uniqid('',true) . "." . $fileExtension;
					$destination = "Uploads/". $uniqueFile;
					$file = move_uploaded_file($fileTemporaryname,$destination);
				}
			}
			return $destination;
		}
	}
?>