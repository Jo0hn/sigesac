<?
		if(isset($_SESSION['user']))
		{
				$Cer = new catCertificate();
				$Datos = new catRequests();
				$Deta = new catDetails();
				$Comen = new catComments();
				$usr = new catUsers();
				$emp = new catEmployes();
				$auto = new catAuthorization();
		
					 if(isset($_POST['firma1']))
					 {
					 		$_POST = $Op->cleanPosts($_POST, 'safest');
							if(!isset($_POST['empty']))
							{
								$usr->user = $_POST['user1'];
								$usr->pass = $_POST['pass1'];
												
								$log = $usr->catUsersLogin();
																				
								if($log != '')
								{
									$res = $usr->catUsersSearch('us');
									$emp->idEmploye = $res->idEmploye;
									$nameemp = $emp->catEmployesSearch();


									$auto->idRequest = $_GET['req'];
									$auto->idEmploye = $res->idEmploye;
									$auto->date = date('d/m/Y');
									$auto->name = $nameemp->name;
									$auto->status = 1;

									$auto->catAuthorizationAdd();
								}
							}
					 }


					 
					 if(isset($_POST['firma2']))
					 {
					 		$auto->idRequest =  $_GET['req'];
							$auto->status = 1;
							$f2 = $auto->catAuthorizationSearch();

							if($f2->status == 1)
							{	
						 		$_POST = $Op->cleanPosts($_POST, 'safest');
								if(!isset($_POST['empty']))
								{
									$usr->user = $_POST['user2'];
									$usr->pass = $_POST['pass2'];
													
									$log = $usr->catUsersLogin();
																					
									if($log != '')
									{
										$res = $usr->catUsersSearch('us');
										$emp->idEmploye = $res->idEmploye;
										$nameemp = $emp->catEmployesSearch();


										$auto->idRequest = $_GET['req'];
										$auto->idEmploye = $res->idEmploye;
										$auto->date = date('d/m/Y');
										$auto->name = $nameemp->name;
										$auto->status = 2;

										$auto->catAuthorizationAdd();
									}
								}
							}
							 else
							{
								echo "<script type='text/javascript'>alert('Debe Firmar el Solicitante')</script>";
							}
					 }
					

					  if(isset($_POST['firma3']))
					 {
					 		$auto->idRequest =  $_GET['req'];
							$auto->status = 2;
							$f2 = $auto->catAuthorizationSearch();

							if($f2->status == 2)
							{
						 		$_POST = $Op->cleanPosts($_POST, 'safest');
								if(!isset($_POST['empty']))
								{
									$usr->user = $_POST['user3'];
									$usr->pass = $_POST['pass3'];
													
									$log = $usr->catUsersLogin();
																					
									if($log != '')
									{
										$res = $usr->catUsersSearch('us');
										$emp->idEmploye = $res->idEmploye;
										$nameemp = $emp->catEmployesSearch();


										$auto->idRequest = $_GET['req'];
										$auto->idEmploye = $res->idEmploye;
										$auto->date = date('d/m/Y');
										$auto->name = $nameemp->name;
										$auto->status = 3;

										$auto->catAuthorizationAdd();
									}
								}
							}
							 else
							 {
								echo "<script type='text/javascript'>alert('Debe Firmar el Jefe de la Unidad')</script>";
							 }
					 }
					

					 if(isset($_POST['firma4']))
					 {
					 		$auto->idRequest =  $_GET['req'];
							$auto->status = 3;
							$f2 = $auto->catAuthorizationSearch();

							if($f2->status == 3)
							{
						 		$_POST = $Op->cleanPosts($_POST, 'safest');
								if(!isset($_POST['empty']))
								{
									$usr->user = $_POST['user4'];
									$usr->pass = $_POST['pass4'];
													
									$log = $usr->catUsersLogin();
																					
									if($log != '')
									{
										$res = $usr->catUsersSearch('us');
										$emp->idEmploye = $res->idEmploye;
										$nameemp = $emp->catEmployesSearch();


										$auto->idRequest = $_GET['req'];
										$auto->idEmploye = $res->idEmploye;
										$auto->date = date('d/m/Y');
										$auto->name = $nameemp->name;
										$auto->status = 4;

										$auto->catAuthorizationAdd();
									}
								}
							}
							 else
							{
								echo "<script type='text/javascript'>alert('Debe Firmar Disponibilidad Presupuestaria')</script>";
							}
					 }
					


													
									


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
							<td width = 30% HEIGHT="80" align="center" ><strong>Cantidad</strong></td>
							<td colspan="3" HEIGHT="80" align="center"><strong>Descripci&oacute;n</strong></td>
						</tr HEIGHT="">
						<?
							while($dataDet = $rowsDet->fetch_object())
							echo '
							<tr>
								<td align="center" HEIGHT="80">' . $dataDet->quantity . '</td>
								<td colspan="2" align="center" HEIGHT="80">' . $dataDet->description . '</td>
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
											echo "<img src='./$datos->signature'>";
											
										}
										else
										{

									?>
									<form method="post">
										<label for="user1">Usuario</label> &nbsp; &nbsp; &nbsp;
										<input type='text' class='box' name='user1' /><br/><br/>
										<label for="pass1">Contraseña</label>&nbsp;
										<input type='password' class='box' name='pass1' /><br/><br/>
										<input type="submit" name="firma1" value="firmar"> <br/><br/>
									</form>
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
											echo "<img src='./$datos->signature'>";
											
										}
										else
										{

									?>
									<form method="post">
										<label for="user2">Usuario</label> &nbsp; &nbsp; &nbsp;
										<input type='text' class='box' name='user2' /><br/><br/>
										<label for="pass2">Contraseña</label>&nbsp;
										<input type='password' class='box' name='pass2' /><br/><br/>
										<input type="submit" name="firma2" value="firmar"></br><br/>
									</form>
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
											echo "<img src='./$datos->signature'>";
											
										}
										else
										{

									?>
									<form method="post">
										<label for="user3">Usuario</label> &nbsp; &nbsp; &nbsp;
										<input type='text' class='box' name='user3' /><br/><br/>
										<label for="pass3">Contraseña</label>&nbsp;
										<input type='password' class='box' name='pass3' /><br/><br/>
										<input type="submit" name="firma3" value="firmar"> </br><br/>
									</form>
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
											echo "<img src='./$datos->signature'>";
											
										}
										else
										{

									?>
									<form method="post">
									<label for="user4">Usuario</label> &nbsp; &nbsp; &nbsp;
									<input type='text' class='box' name='user4' /><br/><br/>
									<label for="pass4">Contraseña</label>&nbsp;
									<input type='password' class='box' name='pass4' /><br/><br/>
									<input type="submit" name="firma4" value="firmar"> </br><br/>
									<form>
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
											echo '<td width = 100%  HEIGHT="25" align="center"><a href="./?pre=' . $dataReq->idRequest . '">Crear Disponibilidad Presupuestaria</a></td>';
										}
										else
										{
											echo '<td id="ocult" width = 100%  HEIGHT="25" align="center"><a href="./?predet=' . $dataReq->idRequest . '">Ver Disponibilidad Presupuestaria</a></td>';
										}
									}
								?>
							</tr>
							<tr>
								<?
								
									if($resu1->status == 1 && $resu2->status == 2 && $resu3->status == 3 &&  $resu4->status == 4  &&  $resu5->status == 5  &&  $resu6->status == 6)
									{
										echo '<td id="ocult" width = 100%  HEIGHT="25" align="center"><a href="./?coti=' . $dataReq->idRequest . '">Solicitud de Cotizacion de Precios de Bienes y Servicios</a></td>';
									}
								?>
							</tr>
							<tr>
								<?
								if($resu1->status == 1 && $resu2->status == 2 && $resu3->status == 3 &&  $resu4->status == 4  &&  $resu5->status == 5  &&  $resu6->status == 6 &&  $resu7->status == 7)
									{
										echo '<td id="ocult" width = 100%  HEIGHT="25" align="center"><a href="./?orden=' . $dataReq->idRequest . '">Orden de Suministro De Obras Bienes y Servicios</a></td>';
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
