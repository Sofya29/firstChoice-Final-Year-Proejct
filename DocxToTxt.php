<?php
	class DocxToTxt
	{	
		public function docx2text($filename) 
		{
			return $this -> readZippedXML($filename, "word/document.xml");
		}
		public function readZippedXML($archiveFile, $dataFile) 
		{
		// Create new ZIP archive
		$zip = new ZipArchive;

		// Open received archive file
		if (true === $zip->open($archiveFile)) 
		{
			// If done, search for the data file in the archive
			if (($index = $zip->locateName($dataFile)) !== false) 
			{
				// If found, read it to the string
				$data = $zip->getFromIndex($index);
				// Close archive file
				$zip->close();
				// Load XML from a string
				// Skip errors and warnings
				$xml = new DOMDocument();
				$xml->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
				// Return data without XML formatting tags
			return $xml->saveXML();
			}
		}
		$zip->close();
		}
		
		public function returnArray($filename)
		{
			header('Content-Type: text/plain');
			$array = explode("<w:numPr>",strip_tags($this -> docx2text($filename),"<w:numPr><w:ilvl>"));
			array_shift ($array);
			return $array;
		}
		public function formattedTxtQnA($filename)
		{
			$questionPaper = fopen("questionsPaper.txt",'w');
			$array = $this -> returnArray($filename);
			$answerLetter = array("ignore","a","b","c","d");
			$questionNumber = 1;
			for($i=0;$i<count($array);$i++)
			{
				$line = "";
				$arrayElement = explode("</w:numPr>",$array[$i]);
				if($arrayElement[0] == '<w:ilvl w:val="0"/>')
				{
					reset($answerLetter);
					$line = $questionNumber++ . "/*****/" .  $arrayElement[1];
				}
				else if($arrayElement[0] == '<w:ilvl w:val="1"/>')
				{
					$line = next($answerLetter) .  "/*****/" . $arrayElement[1];
				}
				fwrite($questionPaper,$line . "\r\n");
			}
			fclose($questionPaper);
		}
		public function formattedAnswerSheet($filename)
		{
			$answerSheet = fopen("AnswerSheet.txt",'w');
			$array = $this -> returnArray($filename);
			for($i=0;$i<count($array);$i++)
			{
				$line = "";
				$arrayElement = explode("</w:numPr>",$array[$i]);
				if(!empty($arrayElement))
				{
					$line = ($i+1) . "/*****/" . $arrayElement[1];
				}
				fwrite($answerSheet, $line . "\r\n");
			}
			fclose($answerSheet);
		}
		public function emptyTheFile($filename)
		{
			$file= fopen($filename,'w');
			fwrite($file, "");
			fclose($file);
		}
		
}
?>