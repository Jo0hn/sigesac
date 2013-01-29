<?
class catProviders
{
	var $idProvider;
	var $name;
	var $nit;
	var $address;
	var $phone;
	var $email;
	var $typeservice;
	var $Fax;
	var $ivaReg;
	var $categorie;
	var $contact;
	private $con;
	
	function __CONSTRUCT()
	{
		$this->con = new connection();//provisional porque nose si la ocnexion va a ser una sola D:
	}
	
		function catProvidersAdd()
	{
		$query ='INSERT INTO catProviders (name,nit,address,phone,email,typeservice,Fax,ivaReg,categorie,contact) values(\''.$this->name.'\',\''.$this->nit.'\',\''.$this->address.'\',\''.$this->phone.'\',\''.$this->email.'\',\''.$this->typeservice.'\',\''.$this->Fax.'\',\''.$this->ivaReg.'\',\''.$this->categorie.'\',\''.$this->contact.'\');';
		$this->con->sendQuery($query);
		echo $query;
	}
	
	function catProvidersDelete()
	{
			$query = 'DELETE FROM catProviders WHERE idProvider=' . $this->idProvider. ';';
			$this->con->sendQuery($query);	
	}
	function catProvidersShow($type = '')
	{
		if($type == '')
		{
			$query = 'SELECT * FROM catProviders ;';
			$result = $this->con->getRecords($query);
			return $result;
		}
		else if($type == 'buscar')
		{
			$query='SELECT * FROM catProviders WHERE name REGEXP    \''. $this->name . '\';';
			$result = $this->con->getRecords($query);
				return $result;
			
		}
	}
	function catProvidersSearch()
	{
		$query = 'SELECT * FROM catProviders WHERE idProvider = ' . $this->idProvider . ';';
		$result = $this->con->searchQuery($query);
		return $result; 
	}
	
	function ctrProvidersUpdate()
	{
		$query ='UPDATE catProviders SET name = \''.$this->name.'\', nit = \''.$this->nit.'\', address = \''.$this->address.'\', phone =\''.$this->phone.'\', email = \''.$this->email.'\', typeservice = \''.$this->typeservice.'\', Fax = \''.$this->Fax.'\', ivaReg = \''.$this->ivaReg.'\', categorie = \''.$this->categorie.'\', contact = \''.$this->contact.'\' WHERE idProvider = '.$this->idProvider.';';
		$this->con->sendQuery($query);
		echo $query;
	}
}
?>	