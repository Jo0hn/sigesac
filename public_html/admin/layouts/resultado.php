<?
	

	if(isset($_SESSION['admin']))
			{
				if(isset($_GET['buscar']))
				{
			?>
					<article id="content">

					<div id="breadcrumbs"> <a href="./">Inicio</a> > Mis Requisici&oacute;nes</div>
					
					<h3 class='title'>Resultados</h3>

					<?

				$Req = new catRequests();
				$Det = new catDetails();
				$Com = new catComments();
				
				
					$Req->keywords = $_GET['buscar'];
					$resu = $Req->catRequestsSearch('keywords');

						
				echo "<div id='Request'>";
					echo "	<div class='camp'>
								<div class='cod2'>Codigo</div> 		
								<div class='date'>Fecha</div>
								<div class='ident'>Identificador</div>
								<div class='action2'>Modificar</div>
								<div class='action2'>Eliminar</div>
							</div>";

					$cont=0;
					while ($row = $resu->fetch_object())
					{
						$cont++;
						echo '<a href="?req=' . $row->idRequest . '" />
							<div class="valor">
								<div class="cod2">'.$row->idRequest.'</div>
								<div class="date">'.$row->date.'</div>
								<div class="ident">'.$row->keywords.'</div>
								<div class="action2"><a href="./?edRequest=' . $row->idRequest .  '"><img src="../img/mod.png"/></a></div>
								<div class="action2"><a href="./?delRequest=' . $row->idRequest .  '" onclick="return confirmar();"><img src="../img/delete.png"/></a></div>
							</div>
						</a>
						';
					}

					if($cont==0)
					{
						echo'<div align="center">
								<h4 class="title">No se encontraron Resultados</h4>
							</div>';

					}
					
				

				
					echo '<center><a href="./?cat=1";>Regresar a la Lista</a></center>';	
						
				}
			}
			else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>
					
				
