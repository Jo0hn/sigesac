<?
		if(isset($_SESSION['user']))
		{
			
			$orden = new ctrOrder();
			$Req = new catRequests();
			$reqPro = new ctrRequestsProviders();
			$pro = new catProviders();
			$Deta = new catDetails();

				if(isset($_GET['orderView']))
					{
						if(isset($_POST['addend']))
							{
								$Deta->idOrder = $_GET['orderView'];
									for($i = 0; $i < $_POST['quantDetails']; $i++)
										{
											echo $_POST['unitPrice'. $i ];
											echo $_POST['canti'. $i];
											$total = ($_POST['unitPrice'. $i ] * $_POST['canti'. $i]);
											$Deta->idDetail = $_POST['idDetail'. $i];
											$Deta->unitPrice = $_POST['unitPrice'. $i ];

											$Deta->totalPrice = $total;
									
											$Deta->catDetailsUpdate('ordenUpdate');
										}

							}
						$orden->idOrder = $_GET['orderView'];
						$dataOrden = $orden->ctrOrderSearch();	

						$Req->idRequest = $dataOrden->idRequest;
						$dataReq = $Req->catRequestsSearch();

						$Deta->idOrder =  $_GET['orderView'];
						$rowsDet = $Deta->catDetailsSearch('order');


	?>
					<article>
						<div id="informacion">
							<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
							<h2 class='detalle'>6ª. 10ª. C.Pte. y 29 Av. Sur No. 1537, Col. Flor Blanca. Apdo. Postal No. 05-204. <br/> PBX: 222-0100, Fax: 281-1870. <br/> Correo Electr&oacute;nico: fondolisiados@telesal.net</h2>
							<h2 class='title'>Orden y Suministros de Obras Bienes y Servicios </h2>
								<table border="1" width="740px">
									<tr>
										<td align="center"><strong>Fecha</strong><br/>
										<strong><?= $dataReq->date; ?></strong>
										<br/><br/></td>
										<td align="center"><strong>Cifra Presupuestaria</strong><br/>
										<strong>
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
												?>
										</strong>
										<br/><br/></td>
										<td align="center"><strong>Numero de orden</strong><br/>
										<strong><?= $dataOrden->idOrder; ?></strong>
										<br/><br/></td>
									</tr>
																			
									<tr>
										<td colspan="3">Nombre del suministrante: 
										<?
											$reqPro->idOrder = $_GET['orderView'];
											$datoP = $reqPro->ctrRequestProviderSearch('order');
										
											$pro->idProvider = $datoP->idProvider;
											$res = $pro->catProvidersSearch();

											echo $res->name;
											
										?>

										<br/><br/></td>
									</tr>
																			
									<tr>
										<td colspan="3" align="center">Atentamente solicito proporcionar a este fondo de Proteccion, Los bienes o servicios que acontinuacion se detallan: <br/><br/></td>
									</tr>
								</table>						
								<table border="1" width="740px">
									<tr>
										<td align="center">Descripcion</td>
										<td width="15%" align="center">Cantidad</td>
										<td width="15%" align="center">Precio Unitario</td>
										<td width="15%" align="center">Precio Total</td>
									</tr>
									<form method="post">
									<?
										$i = 0;
										while($dataDetcom = $rowsDet->fetch_object())
											{
												$dataDetcom->unitPrice;
												$dataDetcom->totalPrice;

												if($dataDetcom->unitPrice == 0 AND   $dataDetcom->totalPrice == 0)
													{
																						
														echo '
														<tr>
															<input type="hidden" name="idDetail'.$i. '"  value=" '. $dataDetcom->idDetail.'"/>
															<input type="hidden" name="canti'.$i. '"  value=" '. $dataDetcom->quantity.'"/>
															<td align="center" HEIGHT="100">' . $dataDetcom->description . '</td>
															<td ">' . $dataDetcom->quantity . '</td>
															<td><input type="text" name="unitPrice'.$i. '"/></td>
														';
														$boton = 1;
														$i++;
																						
													}
													else
													{
														echo '
														<tr>
															<td align="center" HEIGHT="100">' . $dataDetcom->description . '</td>
															<td align="center">' . $dataDetcom->quantity . '</td>
															<td align="center">' . $dataDetcom->unitPrice . '</td>
															<td align="center">' . $dataDetcom->totalPrice . '</td>
														';
													}
											}
											$var = $i;
											echo '<input type="hidden" name="quantDetails" id="quantDetails" value=" '.$var.' " />';
														
											?>


									</tr>
									<tr>
										<td></td>
										<td align="center">Total</td>
										
									</tr>
									</table>
										<br/><br/><br/>
										Totales en Letras:
										__________________________________________________________________________________
										<br/><br><br/><br/><br/><br/><br/>


										<center>____________________________</center>
										<p align="center">Jefe UACI Nombre, Firma y Sello</p>

										<br/>
										<br/>
										<?
										echo $boton;
										if($boton == 1)
										{
											echo '<center><input type="submit" name="addend" /></center>';
										}
										?>
										
									</form>
										<center><a id="ocult" href="#"><img width="80" height="70" src="./img/imp.png"/><a/></center>
										<center><p id="ocult">Imprimir</p></center>

										<br/>
										<br/>
										<?
										echo '<center><a id="ocult" href="./?req=' .$_GET['orden']. '";>Regresar a la Requisici&oacute;n</a></center>';
										?>
										<br/>
						</div>
					</article>

<?
			}
		}
?>