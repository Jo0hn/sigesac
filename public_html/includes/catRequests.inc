<?
	class catRequests 
	{
		var $idRequest;
		var $date;
		var $idEmploye;
		var $keywords;
		var $cypher;
		var $status;
		var $con;
		
		
		function __CONSTRUCT()
		{
			$this->con = new connection();
		}

		function __SET($name,$value)
			{
				$this->$name=$value;
			}
		function __GET($name)
			{
				return $this->$name;
			}
			
		function catRequestsAdd()
		{
		$query='INSERT INTO catRequests (date,idEmploye,keywords) values(\''.$this->date.'\','.$this->idEmploye.',\''.$this->keywords.'\');';
		 $this->con->sendQuery($query);
		}

		function catRequestsUpdate($type = '')
		{
			if($type == '')
			{
			$query='UPDATE catRequests SET date=\''.$this->date. '\',keywords=\''.$this->keywords.'\',cypher=\''.$this->cypher.'\', idEmploye='.$this->idEmploye.' WHERE idRequest = '.$this->idRequest.';';
			$this->con->sendQuery($query);
			}
			else if($type == 'cifra')
			{
				$query='UPDATE catRequests SET cypher=\''.$this->cypher.'\' WHERE idRequest = '.$this->idRequest.';';
				$this->con->sendQuery($query);
			}
			else if($type == 'status')
			{
				$query='UPDATE catRequests SET status=\''.$this->status.'\' WHERE idRequest = '.$this->idRequest.';';
				$this->con->sendQuery($query);
			}
		}

		function catRequestsDelete()
		{
			$query='DELETE FROM catRequests WHERE idRequest='.$this->idRequest.';';
			$this->con->sendQuery($query);
		}

		function catRequestsSearch($type =  '')
		{
			if($type == '')
			{
				$query='SELECT * FROM catRequests WHERE idRequest='.$this->idRequest.';';
				$result = $this->con->searchQuery($query);
				return $result;
			}
			elseif($type == 'keywords')
			{
				$query='SELECT * FROM catRequests WHERE keywords REGEXP    \''. $this->keywords . '\';';
				$result = $this->con->getRecords($query);
				return $result;
			}
		}

		function catRequestsShowLimit($limit)
		{
			$query = 'SELECT * FROM catRequests ORDER BY idRequest DESC '. $limit . ';';
		
			$result = $this->con->getRecords($query);
			return $result;
		}

		function catRequestsShow($type =  '')
		{
			if($type == '')
			{
				$query='SELECT * FROM catRequests';
			
			}
			else
			{
				$query = 'SELECT * FROM catRequests ORDER BY idRequest DESC';
			
			}
			$result = $this->con->getRecords($query);

			return $result;

		}				
	}
?>