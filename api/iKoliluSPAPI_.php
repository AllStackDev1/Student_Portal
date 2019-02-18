<?php
	class CreateFunction 
	{
		private $apiPathURL;
		
		function __construct($apiPathURL)
		{

			$this->URL = $apiPathURL;

		}

		function GetEndPoint()
		{
			if($this->URL){
				$this->requestinfo = explode('/',$this->URL);
				$this->requestinfoCount = count($this->requestinfo) - 2;
				$this->endpoint = $this->requestinfo[$this->requestinfoCount];
				return $this->endpoint;
			}
		}
	}
