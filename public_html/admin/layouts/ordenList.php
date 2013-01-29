<?
	
	if(isset($_SESSION['admin']))
		{
			$order = new ctrOrder();
			$Deta = new catDetails();
				if(isset($_GET['orden']))
				{
					$order->idRequest = $_GET['orden'];
					$result = $order->ctrOrderShow();

						$Deta->idRequest = $_GET['orden'];
					$rowsDet = $Deta->catDetailsSearch('solo');


					
					?>
					<article>
				
						<?
							echo "<div 	width='70%' id='tabla'>";
							echo "	<div id='campos'>
						<div class='code'>Orden</div> 		
						<div class='date'>Requisicion</div>
						<div class='valor'>Modificar</div>
						<div class='valor'>Eliminar</div>
					
						</div>";
					$cont=0;

					while($row = $result->fetch_object())
					{
						$cont++;
						echo
						'<a href="?orderView=' . $row->idOrder . '" />
						<div id="valores">
							<div class="code">'.$row->idOrder.'</div>
							<div class="code">'.$row->idRequest.'</div>
							<div class="valor"><a href="./?ed=' . $row->idOrder .  '"><img src="./img/mod.png"/></a></div>
							<div class="valor"><a href="./?del=' . $row->idOrder .  '" onclick="return confirmar();"><img src="./img/delete.png"/></a></div>
						</div>
						</a>
						';
					}

					if($cont==0)
					{
						echo'<div align="center">
								<h4 class="title">No se an Creado Ordenes</h4>
							</div>';

					}

					
					while($dataDetcom = $rowsDet->fetch_object())
						{
							if($dataDetcom->idOrder == 0 )
							{
								$resultado = 1;
							}
								
						}
						
					
						if($resultado == 1)
						{
							
						
						}					
						else
						{
							echo '<div id="nCampos">
								<div class="code"> . . . </div>
								<div class="date"> . . . </div>
								<div class="ident"> . . . </div>
								<div class="valor">Ordenes Completas</div>
							</div>';
							echo '</div>';
						}		
				
						

					?>
					
				</article>

					
					<?
				}
		}
		else
		{
				echo'<script>document.location.href="./";</script>';
		}

?>
					
				
