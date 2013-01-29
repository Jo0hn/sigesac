	<?php
	$Req = new catRequests();
	$Det = new catDetails();
	$Com = new catComments();

	if(isset($_POST['btnAdd']))
	{	
		$_POST = $Op->cleanPosts($_POST, 'safest');
		if(!isset($_POST['empty']))
		{
			$Req->date = date('Y-m-d');
			$Req->idEmploye = $_SESSION['user'];
			$Req->keywords = $_POST['key'];

			$Req->catRequestsAdd();

			$records = $Req->catRequestsShow('algo');
			$cont = 0;
			$idRequest = 0;
			while($info = $records->fetch_object())
			{
				$cont++;
				if($cont == 1)
				{
					$idReq = $info->idRequest;
				}
			}
			for($i = 0; $i <= $_POST['quantDetails']; $i++)
			{
				$Det->idRequest = $idReq;
				$Det->quantity = $_POST['txtQuant' . $i];
				$Det->description = $_POST['txtDesc' . $i];
				$Det->idOrder = 0 ;

				$Det->catDetailsAdd();
			}

			$Com->idRequest = $idReq;
			$Com->idEmploye = $_SESSION['user'];
			$Com->comment = $_POST['txto'];

			$Com->catCommentsAdd();
			echo "<script type='text/javascript'>alert('Requisicion agregada con exito')</script>";
			echo '<script>document.location.href="./?cat=1";</script>';
		}

	}

	else if(isset($_POST['btnAdd']) & isset($_GET['ed']))
	{
		$_POST = $Op->cleanPosts($_POST, 'safest');
		if(!isset($_POST['empty']))
		{
			
			$Req->date = date('d/m/Y');
			$Req->idEmploye = $_SESSION['user'];

			$Req->catRequestsUpdate();

			$idReq = $Req->catRequestsSearch('code')->idRequest;

			for($i = 0; $i < $_POST['quantDetails']; $i++)
			{
				$Det->idRequest = $idReq;
				$Det->quantity = $_POST['txtQuant' . $i];
				$Det->Description = $_POST['txtDesc' . $i];

				$Det->catDetailsUpdate();
			}

		}

	}

	else if(isset($_GET['del']))
	{
		$_GET=$Op->cleanPosts($_GET);
		if(!$_GET['del'] = 0)
		{
			$Req->idRequest = $_GET['del'];
			$Req->catRequestsDelete();

			
			$Det->catDetailsSearch();
			$Det->idRequest=$_GET['del'];
			$Det->catDetailsDelete();
		}
		
	}

	?>

<script>
	var i = 1;
	function eliminarTr(id)
	{
		var tr = document.getElementById(id);
		var parent = tr.parentNode;
		parent.removeChild(tr);

		i--;

		document.getElementById('quantDetails').value = i;
	}
	function clonarTr(id)
	{
		var tr = document.getElementById(id)
		var newTr = tr.cloneNode(true);
		var father = document.getElementById(id).parentNode;
		newTr.id = 'reqChild' + i;
		newTr.getElementsByTagName('input')[0].name = 'txtQuant' + i;
		newTr.getElementsByTagName('input')[0].value = '';
		newTr.getElementsByTagName('textarea')[0].name = 'txtDesc' + i;
		newTr.getElementsByTagName('textarea')[0].innerHTML = '';
		newTr.getElementsByTagName('td')[4].innerHTML = '';
		newTr.getElementsByTagName('td')[5].innerHTML = '<a onClick="eliminarTr(\'reqChild' + i +  '\');">Eliminar</a>';

		father.appendChild(newTr);

		i++;

		document.getElementById('quantDetails').value = i;

	}
</script>


<article>
	<div id="breadcrumbs"> <a href="./">Inicio</a> > <a href="./?cat=1">Requisici&oacute;nes</a> > Nueva requisici&oacute;n</div>
	<h2>Nueva requisici&oacute;n</h2>

	<form method="post">
		<table>
			<tbody id="reqParent">
				<tr id="reqChild0">
					<td>Cantidad:</td>
					<td><input type="text" name="txtQuant0" required="true" /></td>
					<td>Descripci&oacute;n</td>
					<td><textarea name="txtDesc0" required="true" width="50px"></textarea></td>
					<td><a  onClick="clonarTr('reqChild0');">Agregar</a></td>
					<td></td>
				</tr>
			<tr>
				<td><input type="hidden" name="quantDetails" id="quantDetails" value="0" /></td>
			</tr>
			</tbody>
		</table>
		<br/>
		<br/>
		<table>
			<tr>
				<td>Identificador: </td>
				<td><input type="text" name="key" required="true"/> </td>
				<td>Observaciones: </td>
				<td><textarea name="txto" required="false" width="50px"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="Agregar" name="btnAdd"/></td>
			</tr>
		</table>
	</form>

</article>