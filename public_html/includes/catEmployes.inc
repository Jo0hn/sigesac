<?
class catEmployes
	{
		var $idEmploye;
		var	$name;
		var $email;
		var $phone;
		var $signature;
		var $idCharge;
		var $ruta;
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
		

		function catEmployesAdd()
		{
			
			$query = 'INSERT INTO catEmployes (name,email,phone,signature,idCharge) values (\''.$this->name.'\',\''.$this->email.'\',\''.$this->phone.'\',\''.$this->signature.'\','.$this->idCharge.');';   
			$this->con->sendQuery($query);
		}
		
		function catEmployesDelete()
		{
			$query = 'DELETE FROM catEmployes WHERE idEmploye=' . $this->idEmploye. ';';
			$this->con->sendQuery($query);	
		}
		
		function catEmployesShow($type =  '')
		{
			if($type == '')
			{
				$query='SELECT * FROM catEmployes';
			}
			else
			{
				$query = 'SELECT * FROM catEmployes ORDER BY idEmploye DESC';
			}
			$result = $this->con->getRecords($query);

			return $result;
		}
		
		function catEmployesSearch()
		{
			$query='SELECT * FROM catEmployes WHERE idEmploye=' . $this->idEmploye. ';';
			$result = $this->con->searchQuery($query);
			return $result;
		}
		
			function catEmployesUpdate()
		{
			$query =' UPDATE catEmployes SET name = \'' . $this->name . '\', email=\''.$this->email.'\', phone=\''. $this->phone. '\' , signature=\''. $this->signature.'\'  WHERE idEmploye='. $this->idEmploye .' ';              
			$this->con->sendQuery($query);
		}

			

		
	
	}
	
	