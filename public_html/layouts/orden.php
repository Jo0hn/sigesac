<?if(isset($_SESSION['user']))
		{
				$Req = new catRequests();
				$Deta = new catDetails();
				$reqPro = new ctrRequestsProviders();
				$pro = new catProviders();
				$orden = new ctrOrder();
				if(isset($_GET['ordenDetail']))
				{

					$Req->idRequest = $_GET['ordenDetail'];
					$dataReq = $Req->catRequestsSearch();

					$Deta->idRequest = $_GET['ordenDetail'];
					$rowsDet = $Deta->catDetailsSearch('solo');
					$rowspro = $pro->catProvidersShow();



					if(isset($_POST['crearOrden']))
					{
						$orden->idRequest = $_GET['ordenDetail'];
						$orden->ctrOrderAdd();

						$records = $orden->ctrOrderShow('algo');
						$cont = 0;
						$idOrder = 0;
						while($info = $records->fetch_object())
						{
							$cont++;
							if($cont == 1)
							{
								$idOrd = $info->idOrder;
							}
						}
						
						
						for($i = 0; $i < $_POST['quantDetails']; $i++)
						{

							$Deta->idDetail = $_POST['checkbox'. $i];
							$Deta->idOrder=$idOrd;
							$Deta->catDetailsUpdate('orden');
						}
						echo $idOrd."<br>";
						$reqPro->idRequest = $_GET['ordenDetail'];
						$reqPro->idProvider = $_POST['idProvider'];
						$reqPro->idOrder = $idOrd;
						$reqPro->ctrRequestProviderAdd();

						echo "<script type='text/javascript'>alert('Orden agregada con exito')</script>";
						//echo '<script>document.location.href="./?orden=";</script>';
					
					}
					?>
					<article>
	<div id="informacion">
		<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
		<h2 class='detalle'>6ª. 10ª. C.Pte. y 29 Av. Sur No. 1537, Col. Flor Blanca. Apdo. Postal No. 05-204. <br/> PBX: 222-0100, Fax: 281-1870. <br/> Correo Electr&oacute;nico: fondolisiados@telesal.net</h2>
		<h2 class='title'>Orden y Suministros de Bienes y Servicios</h2>
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
					<!-- <strong><?= $dataReq->idRequest; ?></strong> -->
					<br/><br/></td>
				</tr>
				<form method="post">								
				<tr>
					<td colspan="3">Nombre del suministrante: 
						<?
							echo "<select  class='box' name='idProvider'>";
												while($dataPro = $rowspro->fetch_object())
												{
											echo '
												<option value=" ' .$dataPro->idProvider. ' "> ' .$dataPro->name. '</option>
											';
												}
												echo "</select>";
												
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
					<td width="15%" align="center">Seleccion</td>
					
				</tr>
				
					<?
					$i = 0;
					while($dataDetcom = $rowsDet->fetch_object())
						{
							$dataDetcom->unitPrice;
							$dataDetcom->totalPrice;

						
									echo '
									<tr>
										<input type="hidden" name="idDetail'.$i. '"  value=" '. $dataDetcom->idDetail.'"/>
										<td align="center" HEIGHT="100">' . $dataDetcom->quantity . '</td>
										<td align="center">  '. $dataDetcom->description . '</input></td>
										<td align="center"><input type="checkbox"  name="checkbox'.$i. '" value=" '. $dataDetcom->idDetail.'"></td>
									';
									$i++;
								
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
					<center><input type="submit" name="crearOrden" /></center>
				</form>
				
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
?>
