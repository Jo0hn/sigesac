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
											echo $_POST['unitPrice'. $i ];
											echo $_POST['canti'. $i];
											$total = ($_POST['unitPrice'. $i ] * $_POST['canti'. $i]);
											$Deta->idDetail = $_POST['idDetail'. $i];
											$Deta->unitPrice = $_POST['unitPrice'. $i ];

											$Deta->totalPrice = $total;
									
											$Deta->catDetailsUpdate('algo');
										}

							}
								$Req->idRequest = $_GET['orden'];
								$dataReq = $Req->catRequestsSearch();

								$Deta->idRequest = $_GET['orden'];
								$rowsDet = $Deta->catDetailsSearch('request');
?>

<article>
	<div id="informacion">
		<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
		<h2 class='detalle'>6ª. 10ª. C.Pte. y 29 Av. Sur No. 1537, Col. Flor Blanca. Apdo. Postal No. 05-204. <br/> PBX: 222-0100, Fax: 281-1870. <br/> Correo Electr&oacute;nico: fondolisiados@telesal.net</h2>
		<h2 class='title'>Orden y Suministros de Obras Bienes y Servicios</h2>
			<table border="1" width="740px">
				<tr>
					<td align="center"><strong>Fecha</strong><br/>
					<strong><?= $dataReq->date; ?></strong>
					<br/><br/></td>
					<td align="center"><strong>Cifra Presupuestaria</strong><br/>
					<strong><?= $dataReq->cypher; ?></strong>
					<br/><br/></td>
					<td align="center"><strong>Numero de orden</strong><br/>
					<strong><?= $dataReq->idRequest; ?></strong>
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
										<td align="center" HEIGHT="100">' . $dataDetcom->quantity . '</td>
										<td ">' . $dataDetcom->description . '</td>
										<td><input type="text" name="unitPrice'.$i. '"/></td>
									';
									$boton = 1;
									$i++;
																	
								}
								else
								{
									echo '
									<tr>
										<td align="center" HEIGHT="100">' . $dataDetcom->quantity . '</td>
										<td align="center">' . $dataDetcom->description . '</td>
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
					<input type="submit" name="addend" />
				</form>
					<center><a href="#"><img width="80" height="70" src="./img/imp.png"/><a/></center>
					<center>Imprimir</center>

					<br/>
					<br/>
					<?
					echo '<center><a href="./?req=' .$_GET['orden']. '";>Regresar a la Requisici&oacute;n</a></center>';
					?>
					<br/>
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