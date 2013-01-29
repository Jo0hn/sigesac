<?
	

	if(isset($_SESSION['admin']))
			{
				if(isset($_GET['buscarPro']))
				{
			?>
				<article>

					<article id="content">

					<h3 class='title'>Resultado de la Busqueda</h3>

					<?

				$prov=new catProviders();
				
				
				
					$prov->name = $_GET['buscarPro'];
					$resu = $prov->catProvidersShow('buscar');

						echo "<div id='Proveedores'>
						<div class='camp'>
						<div class='cod'>Codigo</div>
						<div class='nom'>Nombre</div>
						<div class='email'>Email</div>
						<div class='action2'>Modificar</div>
						<div class='action2'>Eliminar</div>
						</div>";

					$cont=0;
					while ($row = $resu->fetch_object())
					{
						$cont++;

						echo '<a href="?prov=' . $row->idProvider . '" />
							<div class="valor">
								<div class="cod">'.$row->idProvider.'</div>
								<div class="nom">'.$row->name.'</div>
								<div class="email">'.$row->email.'</div>
								<div class="action2"><a href="./?ed=' . $row->idProvider .  '"><img src="../../img/mod.png"/></a></div>
								<div class="action2"><a href="./?del=' . $row->idProvider .  '" onclick="return confirmar();"><img src="../../img/delete.png"/></a></div>
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

					
				

				
					echo '<center><a href="./?cat=4";>Regresar a la Lista</a></center>';	
						
				}
			}
			else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>
					
				
