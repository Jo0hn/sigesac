<?
	

	if(isset($_SESSION['user']))
			{
				if(isset($_GET['buscar']))
				{
			?>
				<article>

					<div id="breadcrumbs"> <a href="./">Inicio</a> > Mis Requisici&oacute;nes</div>
					
					<h3 class='title'>Resultados</h3>

					<?

				$Req = new catRequests();
				$Det = new catDetails();
				$Com = new catComments();
				
				
					$Req->keywords = $_GET['buscar'];
					$resu = $Req->catRequestsSearch('keywords');

						echo "	<div id='campos'>
						<div class='code'>Codigo</div> 		
						<div class='date'>Fecha</div>
						<div class='ident'>Identificador</div>
						<div class='valor'>Modificar</div>
						<div class='valor'>Eliminar</div>
						<div class='valor'>Estado</div>
						</div>";

					while ($rows = $resu->fetch_object())
					{
						$cont++;
						echo
						'<a href="?req=' . $rows->idRequest . '" />
						<div id="valores">
							<div class="code">'.$rows->idRequest.'</div>
							<div class="date">'.$rows->date.'</div>
							<div class="ident">'.$rows->keywords.'</div>
							<div class="valor"><a href="./?ed=' . $rows->idRequest .  '"><img src="./img/mod.png"/></a></div>
							<div class="valor"><a href="./?del=' . $rows->idRequest .  '" onclick="return confirmar();"><img src="./img/delete.png"/></a></div>';
							if($rows->status == 0)
							{
								echo '<div class="valor"><a href="#"><img src="./img/gris.png"/></a></div>';
							}
							else if($rows->status == 1)
							{
								echo '<div class="valor"><a href="#"><img src="./img/verde.png"/></a></div>';
							}
							else if($rows->status == 2)
							{
								echo '<div class="valor"><a href="#"><img src="./img/naranja.png"/></a></div>';
							}
							else if($rows->status == 3)
							{
								echo '<div class="valor"><a href="#"><img src="./img/rojo.png"/></a></div>';
							}
							echo'
						</div>
						</a>
						';
					}

					
				

				
					echo '<center><a href="./?cat=1";>Regresar a la Lista</a></center>';	
						
				}
			}
			else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>
					
				
