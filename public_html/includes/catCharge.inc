<?
class catCharge 
	{
		var $idCharge;
		var	$name;	
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
	
		function catChargeAdd()
		{
			$query = 'INSERT INTO catCharge (name,idEmploye) values (\''.$this->name.'\');';   
			$this->con->sendQuery($query);
		}
		
		function catChargeDelete()
		{
			$query = 'DELETE FROM catCharge WHERE idEmploye=' . $this->idEmploye. ';';
			$this->con->sendQuery($query);	
		}
		
		function catChargeShow()
		{
			$query = 'SELECT * FROM catCharge ;';
			$result = $this->con->getRecords($query);
			return $result;
		}
		
		function catChargeSearch()
		{			
				$query='SELECT * FROM catCharge WHERE  idCharge=' . $this->idCharge. ';';
				$result = $this->con->searchQuery($query);
				return $result;
			
		}
		
		function catChargeUpdate()
		{
			$query = 'UPDATE catCharge SET name= \'' . $this->name . '\'';               
			$this->con->sendQuery($query);		
		}


	
	}
		