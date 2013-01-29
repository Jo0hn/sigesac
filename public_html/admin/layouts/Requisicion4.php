<?
		if(isset($_SESSION['user']))
				{
					$Req = new catRequests();
					$reqPro = new ctrRequestsProviders();
					$pro = new catProviders();
					$Deta = new catDetails();
						if(isset($_GET['orden']))
							{
								if(isset($_POST['addend']))
								{
									$Deta->idRequest = $_GET['orden'];

										for($i = 0; $i < $_POST['quantDetails']; $i++)
										{
											$Deta->idDetail = $_POST['idDetail'. $i];
											$Deta->unitPrice = $_POST['unitPrice'. $i ];
											$Deta->totalPrice =  $_POST['totalPrice'. $i];
											$Deta->catDetailsUpdate('algo');
										}

								}
								$Req->idRequest = $_GET['orden'];
								$dataReq = $Req->catRequestsSearch();

								$Deta->idRequest = $_GET['orden'];
								$rowsDet = $Deta->catDetailsSearch('request');
								
?>

								<article>
								<div id="infomacion">
										<h2>Orden y suministros por bienes y Servicios</h2>
											<table border="2" width="740px">
												<tr>
													<td>Fecha<br/>
														<?= $dataReq->date; ?>
														<br/><br/></td>
													<td>Cifra Presupuestaria<br/>
														<?= $dataReq->cypher; ?>
														<br/><br/></td>
													<td>Numero de orden<br/>
														<?= $dataReq->idRequest; ?>
														<br/><br/></td>
												 </tr>
														
														<tr>
															<td colspan="3">Nombre del suministrante: 
																<?
																$reqPro->idRequest = $_GET['orden'];
																$datoP = $reqPro->ctrRequestProviderSearch();

																$pro->idProvider = $datoP->idProvider;
																$res = $pro->catProvidersSearch();

																echo $res->name;

																?>

																<br/><br/></td>
														</tr>
														
														<tr>
															<td colspan="3">Atentamente solicito proporcionar a este fondo de Proteccion, Los bienes o servicios que acontinuacion se detallan <br/><br/></td>
														</tr>
											</table>
										
									</div>
									</article><br/>
										<article>
										<div id="informacion">
											<form method="post">
											<table border="2" width="740px">
												<tbody>
												<tr>
													<td>Descripcion</td>
													<td>Cantidad</td>
													<td>Precio Unitario</td>
													<td>Precio Total</td>
												</tr>
												<?
													$i = 0;
													while($dataDet = $rowsDet->fetch_object())
													{
													echo '
													<tr>
														<input type="hidden" name="idDetail'.$i. '"  value=" '. $dataDet->idDetail.'"/>
														<td align="center" HEIGHT="40">' . $dataDet->quantity . '</td>
														<td ">' . $dataDet->description . '</td>
														<td><input type="text" name="unitPrice'.$i. '"/></td>
														<td><input type="text" name="totalPrice'.$i. '"/></td>
													';
													$i++;
													}
													$var = $i;
													echo '<input type="hidden" name="quantDetails" id="quantDetails" value=" '.$var.' " />';

													// for($i = 0 ; $i < $rowsDet->num_rows; $i++)
													// {
													// 	echo '<td><input type="text" name="precio'.$i. '"/></td>
													// 		 <td><input type="text" name="total'.$i. '"/></td>

													// 	';
													// }
													
												?>
											</tr>
												<tr>
												<td>Total</td>
											   </tr>
											   </tbody>
												</table>
													<br/><br/><br/>
													Totales en Letras_______________________________________________________________
														<br/><br><br/>
														<hr/>
														<p>Jefe UACI Nombre,Firma y Sello</p>
													<input type ="submit" name="addend" value="Agregar"/>
													</form>
										</div>
										</article>
<?
						}

						
				}
				else
				{
					echo'<script>document.location.href="./";</script>';
				}
?>