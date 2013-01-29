<?
		if(isset($_SESSION['admin']))
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

						$Deta->idRequest = $_GET['coti'];
						$Req->idRequest = $_GET['coti'];
						$rowspro = $pro->catProvidersShow();
						$dataReq = $Req->catRequestsSearch();
						$rowsDet = $Deta->catDetailsSearch('request');
			?>
					<article>
						<div id="informacion">
									
									<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
									<h2 class='detalle'>Alameda Juan Pablo II y 4ª. Av. Norte # 428, Barrio San Jos&eacute;, Centro Hist&oacute;rico de San Salvador, El Salvador, C.A.<br/> PBX: 2222-0100, Fax: 2221-1567. Correo Electr&oacute;nico: uaci@fondolisiados.gob.sv</h2>

										<h2 class='title'>Solicitud de Cotizaci&oacute;n de Precios de Obras y Servicios</h2>
										
										<table border="1" width="700px">
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
													Sin cifra Presupuestaria
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
												$reqPro->idRequest = $_GET['coti'];
												$datoP = $reqPro->ctrRequestProviderSearch();
												if($datoP->idRequest == $_GET['coti'])
												{
													$pro->idProvider = $datoP->idProvider;
													$res = $pro->catProvidersSearch();

													echo $res->name;


												}
												else
												{

												echo 'Sin suministrante';
												}
											?>
										
													<br/><br/></td>
											</tr>
											
											<tr>
												<td colspan="3" align="center">Atentamente solicito cotizar a nombre de esta institucion, los Bienes y Servicios que acontinuacion se describen: <br/><br/></td>
											</tr>
										</table>
										<table  border="1" width="700px">
										<tr>
											<td width = 30% HEIGHT="40" align="center" ><strong>Cantidad</strong></td>
											<td colspan="3" HEIGHT="40" align="center"><strong>Descripci&oacute;n</strong></td>
										</tr HEIGHT="">
										<?
											while($dataDet = $rowsDet->fetch_object())
											echo '
											<tr>
												<td align="center" HEIGHT="100">' . $dataDet->quantity . '</td>
												<td colspan="2" align="center" HEIGHT="100">' . $dataDet->description . '</td>
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
													if($datoP->idRequest == $_GET['coti'] AND $dataReq->cypher == 1 OR $dataReq->cypher == 2 OR  $dataReq->cypher == 3)
													{
														
													}
													else
													{
													?>
													
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
										if($datoP->idRequest == $_GET['coti'] AND $dataReq->cypher == 1 OR $dataReq->cypher == 2 OR  $dataReq->cypher == 3)
										{
											$auto->idRequest =   $_GET['coti'];
											$auto->status = 7;
											$resultado = $auto->catAuthorizationSearch();
											if($resultado->status == 7)
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
											<p>Jefe UACI Nombre, Firma y Sello</p>





										<?

										}

										?>
									</td>
								</tr>
							</table>
							<br/>
							<br/>
							<?
							echo '<center><a href="./?req=' .$_GET['coti']. '";>Regresar a la Requisici&oacute;n</a></center>';
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