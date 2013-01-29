<?
	if(isset($_SESSION['user']))
	{
		
		$Cer = new catCertificate();
		

		if(isset($_GET['pre']))
		{

			if (isset($_POST['enviar']))
			{
				$_POST = $Op->cleanPosts($_POST, 'safest');
				if(!isset($_POST['empty']))
				{					
					$Cer->idRequest =  $_GET['pre'];
					$Cer->amount = $_POST['precio'];
					$Cer->date = date('Y-m-d');
					$Cer->text = $_POST['text'];
					$Cer->cypher =  $_POST['cypher'];
					$Cer->unit = $_POST['unit'];
					$Cer->deparment = $_POST['deparment'];
					$Cer->resource = $_POST['resource'];
					$Cer->period = $_POST['period'];

					$Cer->catCertificateAdd();

					echo'<script>document.location.href="./?req='.$_GET['pre'].'";</script>';
				}
			}

			$Cer->idRequest = $_GET['pre'];

			$rowCer = $Cer->catCertificateSearch('request');
		
			if($rowCer->num_rows ==0)
			{
?>
				<article>
					<div id="informacion">
						<form method="post">
							<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
							<h2 class='detalle'>2ª y 4ª.avenida norte, sobre alameda juan pablo segundo No.428, Apdo. Postal Nº 05-204 Tel. 2222-0100, Telefax: 2281-1870; Correo Electronico: fondolisiados@fondolisiados.gob.sv; www.fondolisiados.gob.sv</h2>
							<h2 class='title'>Certificado Disponibilidad Presupuestaria No. <? echo $Cer->idRequest; ?></h2><br/>

							<table id='money'>
								<tr>
									<td><strong> POR $ </strong></td> <td> <input type="text" name="precio" width="10"/> </td>
								</tr>
							</table>
							<br/>
							<br/>
							<p class='info'>De acuerdo con la requisici&oacute;n de bienes y servicios <strong> <? echo $_GET['pre']; ?> </strong> de fecha 05 de Julio del presente a&ntilde;o, 
							en donde solicitan Disponibilidad de recursos para <input type="text" name="text" /> y otros bienes ha 
							ser utilizados por otras diferentes unidades y departamento de FOPROLYD.<br/><br/>
							Es oportuno mencionar que de acuerdo a lo programado existen Unidades y Departamentos que no tienen disponibilidades;
							sin embargo se ejecutar&aacute; con los recursos totales disponibles en los espec&iacute;ficos antes citados para el presente a&ntilde;o.<br/><br/>
							Los suscritos abajo firmantes, certificamos que a la fecha, se dispone del Cr&eacute;dito Presupuestario en el Presupuesto de
							<input type="text" name="cypher" />, durante el mes de Julio 2012 por la Cantidad de:<br/><br/>
							</p>
							<br/>
							
							<table width="600px" bgcolor="#6E6E6E">
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
									<td><textarea cols="25" rows="5"  name="deparment"></textarea></td>
									<td><textarea cols="15" rows="5" name="unit"></textarea></td>
									<td><textarea cols="17" rows="5" name="resource"></textarea></td>
									<td><textarea cols="10" rows="5" name="period"></textarea></td>
							   </tr>
							   <tr bgcolor='white'>
									<td>Total Disponibilidad Presupuestaria</td>
									<td><input type="text"></td>
									<td><input type="text" size="23"></td>
									<td></td>
							   </tr>
							</table>
										
							<br/><p align="center">Se extiende la presente certificacion, a los seis dias del mes de julio del a&ntilde;o 2012</p>
							<br/>
							<br/>
							<br/>

							<table>
								<tr align='center'>
									<td width="1000px"><input type="submit" name="enviar" /></td>
								</tr>
							</table>
							<br/>
							<br/>
							<br/>	
						</form>
										
					</div>	
				</article>
<?
			}
			else
			{
				include('./layouts/disDetails.php');
			}
		}

			
	}
?>