<?
	if(isset($_SESSION['admin']))
		{
			
			$auto = new catAuthorization();
			$Cer = new catCertificate();
			$usr = new catUsers(); 
			$emp = new catEmployes();


			if(isset($_GET['predet']))
			{
				

				$Cer->idRequest = $_GET['predet'];
				$rowsCer = $Cer->catCertificateSearch('request');
				$datos = $rowsCer->fetch_object()
?>

				<article id="content">
						<div id="informacion">
							<form method="post">
								<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
								<h2 class='detalle'>2ª y 4ª.avenida norte, sobre alameda juan pablo segundo No.428, Apdo. Postal Nº 05-204 Tel. 2222-0100, Telefax: 2281-1870; Correo Electronico: fondolisiados@fondolisiados.gob.sv; www.fondolisiados.gob.sv</h2>
								<h2 class='title'>Certificado Disponibilidad Presupuestaria No.<? echo $datos->idCertificate;?></h2><br/>
								<table id='money'>
									<tr>
										<td><strong> POR $ </strong></td> 
										<td><strong> <? echo $datos->amount;?> </strong></td>
									</tr>
								</table>
								<br/>
								<br/>
								<p class='info'>De acuerdo con la requisici&oacute;n de bienes y servicios <strong> <? echo $datos->idRequest;?> </strong>	de fecha 05 de Julio del presente a&ntilde;o, 
								en donde solicitan Disponibilidad de recursos para 
								<strong><? echo $datos->text;?></strong>
								 y otros bienes ha 
								ser utilizados por otras diferentes unidades y departamento de FOPROLYD.<br/><br/>
								Es oportuno mencionar que de acuerdo a lo programado existen Unidades y Departamentos que no tienen disponibilidades;
								sin embargo se ejecutar&aacute; con los recursos totales disponibles en los espec&iacute;ficos antes citados para el presente a&ntilde;o.<br/><br/>
								Los suscritos abajo firmantes, certificamos que a la fecha, se dispone del Cr&eacute;dito Presupuestario en el Presupuesto de
								<strong><? echo $datos->cypher;?></strong>, durante el mes de Julio 2012 por la Cantidad de:<br/><br/>
								</p>
								<br/>
								
								<center><table width="600px" bgcolor="#6E6E6E">
								   <tr align='center' bgcolor='white'>
										<td>Unidad o Departamento</td>
										<td>Unidad de medida</td>
										<td>Recursos programados 2012</td>
										<td>Periodo</td>
								   </tr>
								   <tr bgcolor='white'>
								   		<td>Departamento de Servicios Generales</td>
								   		<td>$dinero</td>
								   		<td>$</td>
								   		<td>2012</td>
								   </tr>
								   <tr bgcolor='white'>
										<td><? echo $datos->deparment;?></td>
										<td><? echo $datos->unit;?></td>
										<td><? echo $datos->resource;?></td>
										<td><? echo $datos->period;?></td>
								   </tr>
								   <tr bgcolor='white'>
										<td>Total Disponibilidad Presupuestaria</td>
										<td><input type="text"></td>
										<td><input type="text" size="23"></td>
										<td></td>
								   </tr>
								</table></center>
											
								<br/><p align="center">Se extiende la presente certificacion, a los seis dias del mes de julio del a&ntilde;o 2012</p>

									<br/>
									<center>
										<table>
										<tr>
											<td width='400' align='center'>
										<?
										$auto->idRequest =   $_GET['predet'];
										$auto->status = 5;
										$resultado = $auto->catAuthorizationSearch();

										if($resultado->status == 5)
										{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='./$datos->signature'>";
											
										}
										else
										{

										?>
										<p>Aun No se firma </p>
									<?
										}
									?>
										<p align="center">Jefe del departamento de Presupuesto</p>
									</td>
									<td width='400' align='center'>
											<?
										$auto->idRequest =   $_GET['predet'];
										$auto->status = 6;
										$resultado = $auto->catAuthorizationSearch();

										if($resultado->status == 6)
										{
											$emp->idEmploye = $resultado->idEmploye;
											$datos = $emp->catEmployesSearch();
											echo "<img src='./$datos->signature'>";
											
										}
										else
										{

									?>
										<p>Aun No se firma </p>
									<?
										}
									?>

										<p align="center">	Jefe de Unidad Financiera </p>
										</td>
									</tr>
									</table>
									</center>
									<br/>
									<br/>
									<? 
									echo '<center><a href="./?req=' .$_GET['predet']. '";>Regresar a la Requisici&oacute;n</a></center>';
									
									?>
									<br/>
							</form>
											
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