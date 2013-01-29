<?
	class catComments 
	{
			var $idComment;
			var $idRequest;
			var $idEmploye;
			var $comment;
			private $con;
			
		
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
			function catCommentsAdd()
			{
				$query='INSERT INTO catComments (idRequest,idEmploye,comment) values('.$this->idRequest.', '.$this->idEmploye.', \''.$this->comment.'\');';
				$this->con->sendQuery($query);
			}
			function catCommentsDelete()
			{
				$query='DELETE FROM catComments WHERE idRequest='.$this->idRequest.';';
				$this->con->sendQuery($query);
			}
			function catCommentsShow()
			{
				$query='SELECT * FROM catComments';
				$this->sendQuery($query);
			}
			function catCommentsUpdate()
			{
				$query='UPDATE catComments SET idRequest='.$this->idRequest.', idEmploye='.$this->idEmploye.', comment=\''.$this->comment.'\';';
				$this->sendQuery($query);
			}
			function catCommentsSearch($type = '')
			{
				if($type = '')
				{
					$query='SELECT * FROM catComments WHERE idComment='.$this->idComment.';';
					$result = $this->con->searchQuery($query);
				}
				else if($type = 'request')
				{
					$query = 'SELECT * FROM catComments WHERE idRequest = ' . $this->idRequest . ';';
					$result = $this->con->getRecords($query);
				}
				return $result;
			}
	}
?>