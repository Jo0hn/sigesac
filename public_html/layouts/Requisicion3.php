<?
		if(isset($_SESSION['user']))
				{
					$Req = new catRequests();
					$Deta = new catDetails();
					$auto = new catAuthorization();
					$emp = new catEmployes();
					$usr = new catUsers(); 
					$pro = new catProviders();
					$reqPro = new ctrRequestsProviders();


					if(isset($_GET['coti']))
					{

						if(isset($_POST['addpro']))
						{

							$Req->idRequest = $_GET['coti'];
							$Req->cypher = $_POST['cypher'];

							$Req->catRequestsUpdate('cifra');

							// $reqPro->idRequest = $_GET['coti'];
							// $reqPro->idProvider = $_POST['idProvider'];

							// $reqPro->ctrRequestProviderAdd();

							echo'<script>document.location.href="./?req='.$_GET['coti'].'";</script>';
						}
						

						 if(isset($_POST['firma7']))
					 	{
					 		$_POST = $Op->cleanPosts($_POST, 'safest');
							if(!isset($_POST['empty']))
							{
								$usr->user = $_POST['user7'];
								$usr->pass = $_POST['pass7'];
												
								$log = $usr->catUsersLogin();
																				
								if($log != '')
								{
									$res = $usr->catUsersSearch('us');
									$emp->idEmploye = $res->idEmploye;
									$nameemp = $emp->catEmployesSearch();


									$auto->idRequest =$_GET['coti'];
									$auto->idEmploye = $res->idEmploye;
									$auto->date = date('d/m/Y');
									$auto->name = $nameemp->name;
									$auto->status = 7;

									$auto->catAuthorizationAdd();
								}
							}
					 }

						$Deta->idRequest = $_GET['coti'];
						$Req->idRequest = $_GET['coti'];
						$rowspro = $pro->catProvidersShow();
						$dataReq = $Req->catRequestsSearch();
						$rowsDet = $Deta->catDetailsSearch('request');
			?>
					<article>
						<div id="informacion">
									
									<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
									<h2 class='detalle'>Oficinas FOPROLYD: Entre 2a y 4a Avenida Norte y Alameda Juan Pablo II # 428, San Salvador.<br/> Tel. 2133-6200. <br/> Correo Electr&oacute;nico: uaci7@fondolisiados.gob.sv</h2>

										<h2 class='title'>Solicitud de Cotizaci&oacute;n de Precios de Obras Bienes y Servicios</h2>
										
										<center>
										<table class="posici" border="1" width="700px">
										   <tr>
											<td align="center"><strong>Lugar Y Fecha</strong><br/>
												<strong><?= $dataReq->date; ?></strong>
												<br/><br/></td>
											<td align="center"><strong>Cifras Presupuestaria</strong><br/>
												<?
													if($dataReq->cypher == 1)
													{
														echo "1-Prestaciones a Beneficiarios";
													}
													else if($dataReq->cypher == 2)
													{
														echo "2-Recursos Propios";
													}
													else if($dataReq->cypher == 3)
													{
														echo "3-Funcionamiento Institucional";
													}
													else
													{
												?>
											<form method="post"> 
												<select  class='box' name='cypher'>
													<option value="1">1-Prestaciones a Beneficiarios</option>
													<option value="2">2-Recursos Propios</option>
													<option value="3">3-Funcionamiento Institucional</option>
												</select>
												<?
													}
												?>
												<br/><br/></td>
											<td align="center"><strong>Numero de solicitud</strong><br/>
												<strong><?= $dataReq->idRequest; ?></strong>
												<br/><br/></td>
										   </tr>
											
											<tr>
												<td colspan="3">Nombre del suministrante:


											<?
												/*$reqPro->idRequest = $_GET['coti'];
												$datoP = $reqPro->ctrRequestProviderSearch();
												if($datoP->idRequest == $_GET['coti'])
												{
													$pro->idProvider = $datoP->idProvider;
													$res = $pro->catProvidersSearch();

													echo $res->name;


												}
												else
												{

												echo "<select  class='box' name='idProvider'>";
												while($dataPro = $rowspro->fetch_object())
												{
											echo '
												<option value=" ' .$dataPro->idProvider. ' "> ' .$dataPro->name. '</option>
											';
												}
												echo "</select>";
												}*/
											?>
										
													<br/><br/></td>
											</tr>
											
											<tr>
												<td colspan="3" align="center">Atentamente solicito cotizar a nombre de esta institucion, los Bienes y Servicios que acontinuacion se describen: <br/><br/></td>
											</tr>
										</table>
										<table class="posici" border="1" width="700px">
										<tr>
											<td width = 30% HEIGHT="35" align="center" ><strong>Cantidad</strong></td>
											<td colspan="3" HEIGHT="35" align="center"><strong>Descripci&oacute;n</strong></td>
										</tr HEIGHT="">
										<?
											while($dataDet = $rowsDet->fetch_object())
											echo '
											<tr>
												<td align="center" HEIGHT="35">' . $dataDet->quantity . '</td>
												<td colspan="2" align="center" HEIGHT="35">' . $dataDet->description . '</td>
											</tr>
											';
										?>
										</table>
											<br/>
											<p name="lista" class="lista">Favor indicar en la Oferta</p>
												
											<table>
											<tr>
												<td width="400">
												<ul class="oferta">
													<li class="OF">Precios Unitarios y Totales</li>
													<li class="OF">Tiempo de validez de la oferta</li>
													<li class="OF">Plazo de Entrega en Dia Calendario</li>
													<li class="OF">Forma De Pago</li>
													<li class="OF">Marca del Producto y Pais de fabricacion</li>
												</ul>
												</td>
												<td width="400">
												<ul class="oferta">
													<li class="OF">Nombre de la Persona a quien se debe Notificar para efectos de Adjudicacion</li>
													<li class="OF">Garantia del Suministro(No garantia de Fabrica)</li>
													<li class="OF">Garantizar precios firmes, incluyendo el IVA</li>
													<li class="OF">Direccion de la empresa</li>
												</ul>
												</td>
											</tr>
											</table>
											<br/><br/><br/>
											<hr/>
											<table>
											<tr>
												<?
													if($dataReq->cypher == 1 OR $dataReq->cypher == 2 OR  $dataReq->cypher == 3)
													{
														
													}
													else
													{
													?>
													<td align="center"  width="730px"><input type="submit" name="addpro"/></td>
													<?
													}
													?>
										</tr>
									</table>
									</form>
									

								<table>
									<tr>
										
										<td width="730px" align="center">

										<?
										if($dataReq->cypher == 1 OR $dataReq->cypher == 2 OR  $dataReq->cypher == 3)
										{
											$auto->idRequest =   $_GET['coti'];
											$auto->status = 7;
											$resultado = $auto->catAuthorizationSearch();
											if($resultado->status == 7)
											{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='./$datos->signature'>";
											
											}
											else
											{

											?>
											<form method="post">
											<label for="user7">Usuario</label> &nbsp; &nbsp; &nbsp;
											<input type='text' class='box' name='user7' /><br/><br/>
											<label for="pass7">Contraseña</label>&nbsp;
											<input type='password' class='box' name='pass7' /><br/><br/>
											<input type="submit" name="firma7" value="Firmar"> <br/><br/>
											</form>
											<?

											}

											?>
											<p>Jefe UACI Nombre, Firma y Sello</p>





										<?

										}

										?>
									</td>
								</tr>
							</table>
							</center>
							<br/>
							<br/>
							<?
								$auto->idRequest =   $_GET['coti'];
							$auto->status = 7;
									$resu7 =  $auto->catAuthorizationSearch();
							if($resu7->status == 7 )
							{
							?>
								<center><a id="ocult" onClick="window.print();" href="#"><img width="80" height="70" src="./img/imp.png"/><a/></center>
								<center><p id="ocult">Imprimir</p></center>
								<br/>
								<br/>
							<?
							}
							echo '<center><a id="ocult" href="./?req=' .$_GET['coti']. '";>Regresar a la Requisici&oacute;n</a></center>';
							?>
							<br/>									
						</div>
					</article>
				<?
					}
					else
					{
						echo'<script>document.location.href="./";</script>';
					}
				}	
				?>