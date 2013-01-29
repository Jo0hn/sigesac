<?php
	class connection
	{
		var $con;
		
		function __CONSTRUCT()
		{
			
		}
		
		function connect()
		{
			$this->con = new mysqli('mysql1.000webhost.com', 'a9422327_rqss', 'rqss13', 'a9422327_rqss');
		}
		
		function sendQuery($query)	
		{
			$this->connect();
			$this->con->query($query);
			$this->con->close();
		}
		function searchQuery($query, $type = 'object')
		{
			$this->connect();
			$result= $this->con->query($query);
			if($type=='object')
			{
				$records = $result->fetch_object();
			}
			else if($type=='array')
			{
				$records = $result->fetch_array();
			}
			$this->con->close();
			return $records;
		}
		function getRecords($query)
		{
			$this->connect();
			$result = null;
			$result = $this->con->query($query);
			$this->con->close();
			return $result;
		}
	}
?>
