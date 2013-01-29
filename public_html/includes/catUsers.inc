<?
class catUsers
{
	var $idUser;
	var $user;
	var $pass;
	var $idEmploye;
	var $con;
	
	function __CONSTRUCT()
	{
		$this->con = new connection();//provisional porque nose si la ocnexion va a ser una sola D:
	}
	
	function __SET($name, $value)
	{
		$this->$name = $value;
	}
	function __GET($name)
	{
		return $this->$name;
	}

	function catUsersAdd()
	{

		$query ='INSERT INTO catUsers (user,pass,idEmploye) values(\''.$this->user.'\',AES_ENCRYPT(\''.md5($this->pass).'\', \'pinpinela\'),'.$this->idEmploye.');';
		echo $query;
		$this->con->sendQuery($query);
	}
	
	function catUsersUpdate()
	{
		$query ='UPDATE catUsers SET user = \''.$this->user.'\', pass = AES_ENCRYPT(\''.md5($this->pass).'\', \'pinpinela\') WHERE idEmploye = '.$this->idEmploye.';';
		$this->con->sendQuery($query);
	}
	
	function catUsersDelete()
	{
			$query = 'DELETE FROM catUsers WHERE idEmploye=' . $this->idEmploye. ';';
			$this->con->sendQuery($query);	
	}
	function catUsersShow()
	{
			$query = 'SELECT * FROM catUsers ;';
			$result = $this->con->getRecords($query);
			return $result;
	}
	function catUsersLogin()
	{
			
			$query = 'SELECT * FROM catUsers WHERE user=\'' . $this->user . '\' and pass = AES_ENCRYPT(\'' . md5($this->pass) . '\', \'pinpinela\');';
			$result = $this->con->getRecords($query);
			

			$log = '';
			while($info = $result->fetch_object())
			{
				$log['who'] = $info->idEmploye;
				
				$this->idEmploye = $info->idEmploye;
				$query2 = 'SELECT idCharge FROM catEmployes WHERE idEmploye ='.$this->idEmploye.';';
				$result2 = $this->con->getRecords($query2);
				$cha = $result2->fetch_object();
				$log['charge'] = $cha->idCharge;
				
				
			}
			return $log;
		

	}

	function catUsersSearch($type = '')
	{
			if($type == '')
			{
				$query = 'SELECT * FROM catUsers WHERE user = ' . $this->user . ';';
				$result = $this->con->searchQuery($query);
			
			}
			else if($type == 'employe')
			{
				$query = 'SELECT * FROM catUsers WHERE idEmploye = ' . $this->idEmploye . ';';
				$result = $this->con->searchQuery($query);
			}
			else if($type == 'us')
			{
				$query = 'SELECT * FROM catUsers WHERE user =  \''. $this->user . '\' ;';
				$result = $this->con->searchQuery($query);
			}
			else if($type == 'buscar')
			{
				$query='SELECT * FROM catUsers WHERE user REGEXP    \''. $this->user . '\';';
				$result = $this->con->getRecords($query);
			}

			return $result;
	}
}
?>