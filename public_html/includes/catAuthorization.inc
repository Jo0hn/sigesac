<?
class catAuthorization
	{
		var $idAuthorization;
		var	$idRequest;
		var $idEmploye;
		var $date;
		var $name;
		var $status; 
		private $con;
		
		function __CONSTRUCT()
		{
			$this->con = new connection(); // inicializamos la conexion
		}
		
		function __SET($name,$value)
			{
				$this->$name=$value;
			}
			function __GET($name)
			{
				return $this->$name;
			}


		function catAuthorizationAdd()
		{
			$query = 'INSERT INTO catAuthorization (idRequest,idEmploye,date,name,status) values ('.$this->idRequest.','.$this->idEmploye.','.$this->date.',\''.$this->name.'\',\''.$this->status.'\');';   
			$this->con->sendQuery($query);
		}
		
		function catAuthorizationDelete()
		{
			$query = 'DELETE FROM catAuthorization WHERE idAuthorization=' . $this->idAuthorization. ';';
			$this->con->sendQuery($query);	
		}
		
		function catAuthorizationShow()
		{
			$query = 'SELECT * FROM catAuthorization ;';
			$result = $this->con->getRecords($query);
			return $result;
		}
		
			function catAuthorizationSearch()
		{
			$query='SELECT * FROM catAuthorization WHERE idRequest=' . $this->idRequest. ' AND status = ' . $this->status. ';';
			$result = $this->con->searchQuery($query);
			return $result;
		}
		
			function catAuthorizationUpdate()
		{
				$query='UPDATE catAuthorization SET idRequest='. $this->idRequest.', idEmploye=' . $this->idEmploye. ', date=\'' . $this->date. '\' name=\'' . $this->name .'\' status='.$this->status.' WHERE idAuthorization= ' . $this->idAuthorization . ' ;';
				$this->con->sendQuery($query);
		}


	
	}
	

