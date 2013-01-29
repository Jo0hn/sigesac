<?php
session_start();
	include('../includes/connection.inc');
	include('../includes/Operations.inc');
	include('../includes/catRequests.inc');
	include('../includes/catDetails.inc');
	include('../includes/catAuthorization.inc');
	include('../includes/catCharge.inc');
	include('../includes/catComments.inc');
	include('../includes/catEmployes.inc');
	include('../includes/catProviders.inc');
	include('../includes/catUsers.inc');
	include('../includes/ctrAccess.inc');
	include('../includes/catCertificate.inc');
	include('../includes/ctrRequestProvider.inc');
	include('../includes/Imagen.inc');
	include('../includes/ctrOrder.inc');
$Op=new Operations();

?>

<! DOCTYPE html>
<html lang="es">
	<head> 
		<title>Administracion</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet/less" href="style.less" type="text/css" />
		<script type="text/javascript">
			function confirmar()
			{
				if(confirm('Esta seguro que desea eliminar este registro?'))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		</script>
	</head>
	<body>
		<div id="line"> <label class="info"><strong>Sistema de Administraci&oacute;n SIGESAC</strong></label> </div>
		<?
			if(isset($_SESSION['admin']))
			{
		?>
		<div id="nav"> 
			<ol id="olNav">
				<a href="./"><li>Inicio</li></a>
				<a href="./?cat=1"><li>Requisiciones</li></a>
				<a href="./?cat=2"><li>Administradores</li></a>
				<a href="./?cat=3"><li>Usuarios</li></a>
				<a href="./?cat=4"><li>Proveedores</li></a>
				<a href="./?logout"><li>Salir</li></a>
			</ol>
		</div>
		<?
			}
		?>


		<?
		    if(isset($_GET['cat']))
    		{
    			if(intval($_GET['cat']) == 1)
	    		{
	    			include('./layouts/request.php');
			    }
		    	elseif(intval($_GET['cat'])== 2)
		    	{
		    		include('./layouts/listadmin.php');
		    	}
		    	elseif(intval($_GET['cat'])== 3)
		    	{
		    		include('./layouts/listusers.php');
		    	}

		    		elseif(intval($_GET['cat'])== 4)
		    	{
		    		include('./layouts/listproviders.php');
		    	}

		    		    	
		    }
		    else if(isset($_GET['req']))
				{
					include('./layouts/requestD.php');
				}

			else if(isset($_GET['usr']))
			{
				include('./layouts/usersDetail.php');
			}

			else if(isset($_GET['adm']))
			{
				include('./layouts/adminDetail.php');
			}

			else if(isset($_GET['prov']))
			{
				include('./layouts/providersDetail.php');
			}
			else if(isset($_GET['coti']))
			{
				if(intval($_GET['coti'])>0)
				{
					include('./layouts/Requisicion3.php');
				}
			}
			else if(isset($_GET['predet']))
			{
				if(intval($_GET['predet'])>0)
				{
					include('./layouts/disDetails.php');
				}
			}
		    else if(isset($_GET['del']))
			{
					if(intval($_GET['del'])>0)
				{
					include('./layouts/listproviders.php');
					echo '<script>document.location.href=\'./?cat=4\';</script>';
				}
			}
			else if(isset($_GET['orden']))
			{
				if(intval($_GET['orden'])>0)
				{
					include('./layouts/ordenList.php');
				}
			}
			else if(isset($_GET['orderView']))
			{
				if(intval($_GET['orderView'])>0)
				{
					include('./layouts/orderView.php');
				}
			}
			else if(isset($_GET['delRequest']))
			{
					if(intval($_GET['delRequest'])>0)
				{
					include('./layouts/request.php');
					echo '<script>document.location.href=\'./?cat=1\';</script>';
				}						
			}
			else if (isset($_GET['ed']))
			{
				if(intval($_GET['ed'])>0)
				{
					include('./layouts/updateProviders.php');
					//echo '<script>document.location.href=\'./?cat=4\';</script>';
				}
			}
			else if (isset($_GET['delAdm']))
			{
				if(intval($_GET['delAdm'])>0)
				{
					include('./layouts/listadmin.php');
					//echo '<script>document.location.href=\'./?cat=4\';</script>';
				}
			}
			else if (isset($_GET['edAdm']))
			{
				if(intval($_GET['edAdm'])>0)
				{
					include('./layouts/adminUpdate.php');
					//echo '<script>document.location.href=\'./?cat=4\';</script>';
				}
			}
			else if (isset($_GET['delUser']))
			{
				if(intval($_GET['delUser'])>0)
				{
					include('./layouts/listusers.php');
					//echo '<script>document.location.href=\'./?cat=4\';</script>';
				}
			}

			else if(isset($_GET['edRequest']))
			{
				if(intval($_GET['edRequest'])>0)
				{
					include('./layouts/modRequest.php');
				}
			}
		    else if(isset($_GET['logout']))
		    {
		    	session_unset();
		    	echo '<script>document.location.href=\'./\';</script>';
		    }
		    else if(isset($_GET['add']))
		    {
		    	include('layouts/admin.php');
		    }
		    else if(isset($_GET['add2']))
		    {
		    	include('layouts/users.php');
		    }

		  	else if(isset($_GET['add3']))
		  	{
		  		include('layouts/providers.php');
		  	}
		  	  else if(isset($_GET['edUser']))
			{
					if(intval($_GET['edUser'])>0)
				{
					include('./layouts/updateUsers.php');
					//echo '<script>document.location.href=\'./?cat=4\';</script>';
				}
			}
		  	else if(isset($_GET['add4']))
		  	{
		  		include('layouts/RequestAdd.php');
		  	}
		 
		  	else if(isset($_GET['image']))
		  	{
		  		include('layouts/imagen.php');
		  	}
		    else
		    {
		    	include('layouts/login.php');
		    }
		?>
	</body>
</html>