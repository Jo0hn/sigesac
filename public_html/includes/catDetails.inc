<?
	class catDetails 
	{
		var $idDetail;
		var $idRequest;
		var $quantity;
		var $description;
		var $unitPrice;
		var $totalPrice;
		var $idOrder;
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
			function catDetailsAdd()
			{
			 $query='INSERT INTO catDetails (idRequest,quantity,description,idOrder) values('.$this->idRequest.', '.$this->quantity.', \''.$this->description. '\', '.$this->idOrder.');';
			 $this->con->sendQuery($query);
			}
			function catDetailsDelete($type='')
			{
				if($type='')
				{
					$query='DELETE FROM catDetails WHERE idRequest='.$this->idRequest.';';
					$this->con->sendQuery($query);
				}
				else if($type = 'detail')
				{
					$query='DELETE FROM catDetails WHERE idDetail='.$this->idDetail.';';
					$this->con->sendQuery($query);
				}
			}
			function catDetailsShow()
			{
				$query='SELECT * FROM catDetails';
				$result = $this->con->getRecords($query);

				return $result;
			}
			function catDetailsUpdate($type = '')
			{
				if($type == 'ordenUpdate')
				{
					$query='UPDATE catDetails SET  unitPrice='.$this->unitPrice.', totalPrice='.$this->totalPrice.' WHERE idOrder = '.$this->idOrder.';';
					$this->con->sendQuery($query);
				}
				else if($type == 'normal')
				{
					$query='UPDATE catDetails SET quantity=' .$this->quantity.', description= \''.$this->description.'\' WHERE idDetail = '.$this->idDetail.';';
					$this->con->sendQuery($query);
				}
				else if($type == 'orden')
				{
					$query='UPDATE catDetails SET idOrder=' .$this->idOrder.' WHERE idDetail = '.$this->idDetail.';';
					$this->con->sendQuery($query);
				}

			}
			function catDetailsSearch($type = '')
			{
				
				if($type == '')
				{
					echo "1";
					$query='SELECT * FROM catDetails WHERE idDetail='.$this->idDetail.';';
					$result = $this->con->searchQuery($query);
				}
				else if($type == 'request')
				{
					
					$query = 'SELECT * FROM catDetails WHERE idRequest = ' . $this->idRequest . ';';
					$result = $this->con->getRecords($query);
					
				}
				else if($type == 'order')
				{
				
					$query = 'SELECT * FROM catDetails WHERE idOrder = ' . $this->idOrder . ';';
					$result = $this->con->getRecords($query);
					
				}
				else if($type == 'solo')
				{
				
					$query = 'SELECT * FROM catDetails WHERE  idRequest = ' . $this->idRequest . '  AND idOrder =  0 ;';
					$result = $this->con->getRecords($query);
					
				}
				return $result;
			}
	}
?>