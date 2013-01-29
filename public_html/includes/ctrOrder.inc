<?
class ctrOrder
	{
		var $idOrder;
		var	$idRequest;
		var $con;
		
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

		function ctrOrderAdd()
		{
			$query = 'INSERT INTO ctrOrder (idRequest) values ('.$this->idRequest.');';   
			$this->con->sendQuery($query);
		}

		function ctrOrderShow($type =  '')
		{
			if($type == '')
			{
					$query='SELECT * FROM ctrOrder WHERE idRequest='.$this->idRequest.';';
					$result = $this->con->getRecords($query);
					return $result;
			}
			else
			{
				$query='SELECT * FROM ctrOrder ORDER BY idOrder DESC';
				$result = $this->con->getRecords($query);
				return $result;
			}
				
		}

		function ctrOrderSearch()
		{
			$query='SELECT * FROM ctrOrder WHERE idOrder='.$this->idOrder.';';
			$result = $this->con->searchQuery($query);
			return $result;
		}
	}

?>