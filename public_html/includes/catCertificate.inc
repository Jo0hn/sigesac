<?
	class catCertificate
	{
		var $idCertificate;
		var $idRequest;
		var $amount;
		var $date;
		var $text;
		var $cypher;
		var $deparment;
		var $unit;
		var $resource;
		var $period;
		var $auth;
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


		function catCertificateAdd()
		{
			
			$query='INSERT INTO catCertificate (idRequest,amount,date,text,cypher,deparment,unit,resource,period) values('.$this->idRequest.','.$this->amount.',\''.$this->date.'\',\''.$this->text.'\',\''.$this->cypher.'\',\''.$this->deparment.'\',\''.$this->unit.'\',\''.$this->resource.'\',\''.$this->period.'\');';
			echo $query;
		 $this->con->sendQuery($query);
		}

		function catCertificateUpdate()
		{
			$query='UPDATE catCertificate SET amount='.$this->amount.', date='.$this->date.', text='.$this->text.', cypher='.$this->cypher.', deparment ='.$this->deparment.', unit ='.$this->unit.', resource ='.$this->resource.', period ='.$this->period.', auth ='.$this->auth.' WHERE idRequest = '.$this->idRequest.';';
			$this->con->sendQuery($query);
		}

		function catCertificateDelete()
		{
			$query='DELETE FROM catCertificate WHERE idRequest='.$this->idRequest.';';
			$this->con->sendQuery($query);
		}

		function catCertificateShow()
		{
			$query='SELECT * FROM catCertificate WHERE idRequest='.$this->idRequest.';';
			$result = $this->con->searchQuery($query);
			return $result;
		}

		function catCertificateSearch($type =  '')
		{
			if($type == '')
			{
				$query='SELECT * FROM catCertificate WHERE idCertificate='.$this->idCertificate.';';
					$result = $this->con->searchQuery($query);
			}
			else if($type = 'request')
			{
				$query = 'SELECT * FROM catCertificate WHERE idRequest = ' . $this->idRequest . ';';
					$result = $this->con->getRecords($query);
			}
			return $result;
		}				

	}

?>