<?
		if(isset($_SESSION['admin']))
		{
				$Cer = new catCertificate();
				$Datos = new catRequests();
				$Deta = new catDetails();
				$Comen = new catComments();
				$usr = new catUsers();
				$emp = new catEmployes();
				$auto = new catAuthorization();

				if(isset($_GET['req']))
				{
					$_POST = $Op->cleanPosts($_POST, 'safest');
					if(!isset($_POST['empty']))
					{
						$Deta->idRequest = $_GET['req'];
						$Datos->idRequest = $_GET['req'];
						$Comen->idRequest =  $_GET['req'];

						$Cer->idRequest = $_GET['req'];

						$rowCer = $Cer->catCertificateSearch('request');
			

						$rowsCom = $Comen->catCommentsSearch('request');

						$dataReq = $Datos->catRequestsSearch();

						$rowsDet = $Deta->catDetailsSearch('request');


				?>
				
					<article id="content">
											
						<article>
						<div id="breadcrumbs"> <a href="./">Inicio</a> > <a href="./?cat=1">Mis Requisici&oacute;nes</a> > Detalle de Requisicion</div>

						
						<h3 class='title'>Detalle De La Requisicion   No. <?= $dataReq->idRequest; ?></h3>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">

						<tr align="center">
							
							<td rowspan="2"><strong>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS </br> A CONSECUENCIAS DEL CONFLICTO ARMADO </br></br> REQUISICI&Oacute;N DE OBRAS BIENES Y SERVICIOS</strong></td>
							<td HEIGHT="25"><strong>No. <?= $dataReq->idRequest; ?></strong></td></tr>
									<tr align='center'><td><strong><?= $dataReq->date; ?></strong></td></tr>
						</table>
						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
						<tr>
							<td width = 30% HEIGHT="40" align="center" ><strong>Cantidad</strong></td>
							<td colspan="3" HEIGHT="40" align="center"><strong>Descripci&oacute;n</strong></td>
						</tr HEIGHT="">
						<?
							while($dataDet = $rowsDet->fetch_object())
							echo '
							<tr>
								<td align="center" HEIGHT="40">' . $dataDet->quantity . '</td>
								<td colspan="2" align="center" HEIGHT="40">' . $dataDet->description . '</td>
							</tr>
							';
						?>
						</table>
						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
							<tr>
							<td width = 100% HEIGHT="40"><strong>Observaciones:</strong> 
						<?
							while($dataCome = $rowsCom->fetch_object())
							{
								echo $dataCome->comment; 
							}
						?>
							</td>
							</tr>
						</table>
						<table  class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
							
							<tr>

								<td  HEIGHT="140" WIDTH="50%" align="center">
									<?
										$auto->idRequest =  $_GET['req'];
										$auto->status = 1;
										$resultado = $auto->catAuthorizationSearch();

										if($resultado->status == 1)
										{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='../$datos->signature'>";
											
										}
										else
										{

									?>
										<p>Aun No se firma </p> 
									<?
										}
									?>
									<p>Solicitante</p>

								</td>
								<td  HEIGHT="140"  WIDTH="50%" align="center">
									<?
										$auto->idRequest =  $_GET['req'];
										$auto->status = 2;
										$resultado = $auto->catAuthorizationSearch();

										if($resultado->status == 2)
										{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='../$datos->signature'>";
											
										}
										else
										{

									?>
										<p>Aun No se firma </p> 
									<?
										}
									?>
									<p>Jefe de Unidad</p>
								</td>
							</tr>
							<tr>
								<td  HEIGHT="140"  WIDTH="50%" align="center">
									<?
										$auto->idRequest =  $_GET['req'];
										$auto->status = 3;
										$resultado = $auto->catAuthorizationSearch();

										if($resultado->status == 3)
										{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='../$datos->signature'>";
											
										}
										else
										{

									?>
									<p>Aun No se firma </p> 
										<?
										 }
										?>
									<p>Disponibilidad Presupuestaria</p>
								</td>
								<td  HEIGHT="140"  WIDTH="50%" align="center">
									<?
										$auto->idRequest =  $_GET['req'];
										$auto->status = 4;
										$resultado = $auto->catAuthorizationSearch();

										if($resultado->status == 4)
										{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='../$datos->signature'>";
											
										}
										else
										{

										?>
											<p>Aun No se firma </p> 

										<?
										}
										?>

									<p>Gerencia General </p>
								</td>
						</table>
						<table  class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
							</tr>
								<tr>
							
								<?	
									$auto->idRequest =  $_GET['req'];
									$auto->status = 1;
									$resu1 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['req'];
									$auto->status = 2;
									$resu2 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['req'];
									$auto->status = 3;
									$resu3 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['req'];
									$auto->status = 4;
									$resu4 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['req'];
									$auto->status = 5;
									$resu5 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['req'];
									$auto->status = 6;
									$resu6 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['req'];
									$auto->status = 7;
									$resu7 =  $auto->catAuthorizationSearch();

									if($resu1->status == 1 && $resu2->status == 2 && $resu3->status == 3)
									{
										if($rowCer->num_rows ==0)
										{
											//echo '<td width = 100%  HEIGHT="25" align="center"><a href="./?pre=' . $dataReq->idRequest . '">Crear Disponibilidad Presupuestaria</a></td>';
										}
										else
										{
											echo '<td width = 100%  HEIGHT="25" align="center"><a href="./?predet=' . $dataReq->idRequest . '">Ver Disponibilidad Presupuestaria</a></td>';
										}
									}
								?>
							</tr>
							<tr>
								<?
								
									if($resu1->status == 1 && $resu2->status == 2 && $resu3->status == 3 &&  $resu4->status == 4  &&  $resu5->status == 5  &&  $resu6->status == 6)
									{
										echo '<td width = 100%  HEIGHT="25" align="center"><a href="./?coti=' . $dataReq->idRequest . '">Solicitud de Cotizacion de Precios de Bienes y Servicios</a></td>';
									}
								?>
							</tr>
							<tr>
								<?
								if($resu1->status == 1 && $resu2->status == 2 && $resu3->status == 3 &&  $resu4->status == 4  &&  $resu5->status == 5  &&  $resu6->status == 6 &&  $resu7->status == 7)
									{
										echo '<td width = 100%  HEIGHT="25" align="center"><a href="./?orden=' . $dataReq->idRequest . '">Orden de Suministro De Obras Bienes y Servicios</a></td>';
									}
								?>
							</tr>
						</table>
						<br/>
						<br/>
					</article>
					<?

					}


				}
		}
		else
		{
			echo'<script>document.location.href="./";</script>';
		}
?>