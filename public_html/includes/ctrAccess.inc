<?
class ctrAccess
{
	var $idAccess;
	var $user;
	var $pass;
	var $idEmploye;
	var $con;
	
	function __GET($name)
	{
		return $this->$name;
	}
	
	function __SET($name, $value)
	{
		$this->$name = $value;
	}
	
	function __CONSTRUCT()
	{
		$this->con = new connection();
	}
	
	function ctrAccessAdd()
	{
		$query ='INSERT INTO ctrAccess (user,pass,idEmploye) values(\''.$this->user.'\',AES_ENCRYPT(\''.md5($this->pass).'\', \'pinpinela\'),'.$this->idEmploye.');';
		$this->con->sendQuery($query);
	}
	
	function ctrAccessUpdate()
	{
		$query ='UPDATE ctrAccess SET user = \''.$this->user.'\', pass = AES_ENCRYPT(\''.md5($this->pass).'\', \'pinpinela\') WHERE idEmploye = \''.$this->idEmploye.'\';';
		echo $query;
		$this->con->sendQuery($query);

	}
	
	function ctrAccessDelete()
	{
			$query = 'DELETE FROM ctrAccess WHERE idEmploye=' . $this->idEmploye. ';';
			$this->con->sendQuery($query);	
	}
	function ctrAccessShow()
	{
			$query = 'SELECT * FROM ctrAccess ;';
			$result = $this->con->getRecords($query);
			return $result;
	}
	function ctrAccessSearch($type = '')
	{
		if($type = 'employe')
		{
			$query = 'SELECT * FROM ctrAccess WHERE idEmploye = ' . $this->idEmploye . ';';
			$result = $this->con->searchQuery($query);
			return $result;
		}
		else
		{
			$query = 'SELECT * FROM ctrAccess WHERE idAccess = ' . $this->idAccess . ';';
			$result = $this->con->searchQuery($query);
			return $result;
		}
	}

	function ctrAccessLogin()
	{
			$query = 'SELECT * FROM ctrAccess WHERE user=\'' . $this->user . '\' and pass = AES_ENCRYPT(\'' . md5($this->pass) . '\', \'pinpinela\');';
			$result = $this->con->getRecords($query);
			$log = '';
			while($info = $result->fetch_object())
			{
				$log['who'] = $info->idEmploye;
			}
			return $log;
	}
}
?>