<?
class  ctrRequestsProviders
{
	var $idRequest;
	var $idProvider;
	var $idOrder;
	private $con;
	
	function __CONSTRUCT()
	{
		$this->con = new connection();//provisional porque nose si la ocnexion va a ser una sola D:
	}
	
	function __SET($name,$value)
			{
				$this->$name=$value;
			}
			function __GET($name)
			{
				return $this->$name;
			}
		function ctrRequestProviderAdd()
	{
		$query ='INSERT INTO   ctrRequestsProviders (idRequest,idProvider,idOrder) values('.$this->idRequest.','.$this->idProvider.','.$this->idOrder.');';
		echo $query;
		$this->con->sendQuery($query);
	}
	
	function ctrRequestProviderDelete()
	{
			$query = 'DELETE FROM  ctrRequestsProviders WHERE idRequest=' . $this->idRequest. ' AND idProvider=' .$this->idProvider.';';
			$this->con->sendQuery($query);	
	}
	function ctrAccessShow()
	{
			$query = 'SELECT * FROM  ctrRequestsProviders ;';
			$result = $this->con->getRecords($query);
			return $result;
	}
	function ctrRequestProviderSearch($type = '')
	{
		if($type == '')
		{
		$query = 'SELECT * FROM  ctrRequestsProviders WHERE idRequest = ' .$this->idRequest . ';';
		$result = $this->con->searchQuery($query);
		return $result;
		}
		else if($type = 'orden')
		{
			$query = 'SELECT * FROM  ctrRequestsProviders WHERE idOrder = ' .$this->idOrder . ';';
			$result = $this->con->searchQuery($query);
			return $result;
		}
	}
	
	function ctrRequestProviderUpdate($oldIdReq, $oldIdProv)
	{
		$query ='UPDATE  ctrRequestsProviders SET idRequest = ' .$this->idRequest .' AND idProvider = '.$this->idProvider.' WHERE idRequest = '.$oldIdReq.' AND idProvider = '.$oldIdProv.';';
		$this->con->sendQuery($query);
	}
	
	
	

}
?>