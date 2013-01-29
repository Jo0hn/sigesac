<?php
	session_start();
	include('./includes/connection.inc');
	include('./includes/Operations.inc');
	include('./includes/catRequests.inc');
	include('./includes/catDetails.inc');
	include('./includes/catAuthorization.inc');
	include('./includes/catCharge.inc');
	include('./includes/catComments.inc');
	include('./includes/catEmployes.inc');
	include('./includes/catProviders.inc');
	include('./includes/catUsers.inc');
	include('./includes/ctrAccess.inc');
	include('./includes/ctrRequestProvider.inc');
	include('./includes/catCertificate.inc');
	include('./includes/ctrOrder.inc');

	$Op=new Operations();
?>

<! DOCTYPE htmml>
<html lang="es">
	<head>

		<title>UACI | Requisiciones</title>

		<meta content="text/html;" http-equiv="content-type" charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />

		<link rel="stylesheet/less" href="style.less" type="text/css" />
		<link rel="stylesheet/less" href="print.less" type="text/css" media="print" />
		<link rel="shortcut icon" href="./img/favicon.ico" type="favicon" />

		<script src="./js/less.js"></script>
		<script>
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
		<section id="container">
			<header>
				<a href="./"><table width="95%" height="150px">
					<tr>
						<td><img src="./img/salvador.PNG"  width="85" height="81" /></td>
						<td>
							<hgroup>
								<h1>Unidad de Adquisiciones y Contrataciones Institucionales</h1>
								Gobierno de El Salvador
							</hgroup>
						</td>
						<td><img src="./img/logoGob.png"  width="90" height="85" /></td>
					</tr>
				</table></a>
			</header>

			<section id="content">
			<?
			if(isset($_SESSION['user']))
			{

			?>
					<nav>
						<ul>
							<a href="./"><li>Inicio</li></a>
							<a href="./?page=1&ipp=5&cat=1"><li>Mis requisiciones</li></a>
							<a href="./?panel"><li>Panel del usuario</li></a>
							<a href="./?logout"><li>Cerrar Sesion</li></a>
						</ul>
					</nav>
			<?
			}
			?>
			
				<?
					if(isset($_GET['cat']))
					{
						if(intval($_GET['cat']) == 1)
						{
							include('./layouts/listRequests.php');	
						}
						elseif(intval($_GET['cat'])== 2)
						{
							include('./layouts/panel.php');
						}
					}
					else if(isset($_GET['req']))
					{
						include('./layouts/requestsDetail.php');
					}
					else if(isset($_GET['add']))
					{
						include('./layouts/Requests.php');
					}
					else if(isset($_GET['del']))
					{
						if(intval($_GET['del'])>0)
						{
							include('./layouts/listRequests.php');
							echo '<script>document.location.href=\'./?cat=1\';</script>';
						}
						
					}
					else if(isset($_GET['pre']))
					{
						if(intval($_GET['pre'])>0)
						{
							include('./layouts/Requisicion2.php');
						}
					}
					else if(isset($_GET['buscar']))
					{
						include('./layouts/resultado.php');
					}

					else if(isset($_GET['predet']))
					{
						if(intval($_GET['predet'])>0)
						{
							include('./layouts/disDetails.php');
						}
					}
					else if(isset($_GET['coti']))
					{
						if(intval($_GET['coti'])>0)
						{
							include('./layouts/Requisicion3.php');
						}
					}
					else if(isset($_GET['panelEd']))
					{
						if(intval($_GET['panelEd'])>0)
						{
							include('./layouts/panelEd.php');
						}
					}
					else if(isset($_GET['orderView']))
					{
						if(intval($_GET['orderView'])>0)
						{
							include('./layouts/orderView.php');
						}
					}
					else if(isset($_GET['ed']))
					{
						if(intval($_GET['ed'])>0)
						{
							include('./layouts/updateRequests.php');
						}
					}
					else if(isset($_GET['eli']))
					{
						if(intval($_GET['eli'])>0)
						{
							include('./layouts/updateRequests.php');
						}
					}
					else if(isset($_GET['orden']))
					{
						if(intval($_GET['orden'])>0)
						{
							include('./layouts/ordenList.php');
						}
					}
					else if(isset($_GET['panel']))
					{
						
							include('./layouts/panel.php');
						
					}
					else if(isset($_GET['ordenDetail']))
					{
						if(intval($_GET['ordenDetail'])>0)
						{
							include('./layouts/orden.php');
						}
					}
					else if(isset($_GET['logout']))
					{
						session_unset();
						echo '<script>document.location.href=\'./\';</script>';
					}
					else
					{
						include('./layouts/login.php');
					}
				?>
				</section>
				<article id="info">
					</br>
					<p align="center">Unidad de Adquisiciones y Contrataciones Institucionales </p></br>
					<p align="justify">Es responsable de gestionar las adquisiciones y contrataciones de obras, bienes y servicios necesarios para la consecución de los fines de las instituciones del sector público, razón por la cual es importante para la Superintendencia de Competencia (SC) realizar trabajos en conjunto con dichas instancias, a fin de capacitar a su personal, con el objetivo de  identificar elementos que podrían estar sugiriendo posibles manipulaciones de ofertas en los procesos de adquisiciones institucionales.</p>
			</article>
			
			<footer>
					</br>
					<p>Telefono: 2222-0100 </p>
					<p>2a Y 4a Avenida Norte, Sobre Alameda Juan Pablo II, N° 428, San Salvador </p>
					<p>Puede contactarnos a:<a href="www.fondolisiados.gob.sv"> www.fondolisiados.gob.sv</a></p>
			</footer>
				
		</section>
	
	</body>
</html>