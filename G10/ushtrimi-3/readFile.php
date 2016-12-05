<?php
	class readFile{
		private $file;
		private $method;
		private $delimiter;
		private $f;
		public function __construct($file,$method,$delimiter){
			$this->file = $file;
			$this->method = $method;
			$this->delimiter = $delimiter;
		}
		public function openFile(){
			$this->f = fopen($this->file, $this->method);
			if($this->f)
				return '<span style="color:green">Hapja e fajlit u be me sukses</span>';
			else
				return '<span style="color:red">Hapja e fajlit nuk u be me sukses</span>';
		}
		public function closeFile(){
			$c = fclose($this->f);
			if($c)
				return '<span style="color:green">Mbyllja e fajlit u be me sukses</span>';
			else
				return '<span style="color:red">Mbyllja e fajlit nuk u be me sukses</span>';
		}
		public function fileToAssocArray(){
			$data = array();
			while(($line = fgets($this->f)) !== false) {
				$line = str_replace("\n", "", $line);
				$line = str_replace("\r", "", $line);				
				$obj=explode($this->delimiter,$line);
				$data[]=array("email_address"=>$obj[0],"subject"=>$obj[1],"body"=>$obj[2]);
			}
			return $data;
		}
	}

?>