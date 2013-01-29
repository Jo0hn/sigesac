<?
	if(isset($_SESSION['user']))
		{
			
			$auto = new catAuthorization();
			$Cer = new catCertificate();
			$usr = new catUsers(); 
			$emp = new catEmployes();


			if(isset($_GET['predet']))
			{
				 if(isset($_POST['firma5']))
					 {
					 		$_POST = $Op->cleanPosts($_POST, 'safest');
							if(!isset($_POST['empty']))
							{
								$usr->user = $_POST['user5'];
								$usr->pass = $_POST['pass5'];
												
								$log = $usr->catUsersLogin();
																				
								if($log != '')
								{
									$res = $usr->catUsersSearch('us');
									$emp->idEmploye = $res->idEmploye;
									$nameemp = $emp->catEmployesSearch();


									$auto->idRequest =$_GET['predet'];
									$auto->idEmploye = $res->idEmploye;
									$auto->date = date('d/m/Y');
									$auto->name = $nameemp->name;
									$auto->status = 5;

									$auto->catAuthorizationAdd();
								}
							}
					 }

					  if(isset($_POST['firma6']))
					 {
					 		$_POST = $Op->cleanPosts($_POST, 'safest');
							if(!isset($_POST['empty']))
							{
								$usr->user = $_POST['user6'];
								$usr->pass = $_POST['pass6'];
												
								$log = $usr->catUsersLogin();
																				
								if($log != '')
								{
									$res = $usr->catUsersSearch('us');
									$emp->idEmploye = $res->idEmploye;
									$nameemp = $emp->catEmployesSearch();


									$auto->idRequest =$_GET['predet'];
									$auto->idEmploye = $res->idEmploye;
									$auto->date = date('d/m/Y');
									$auto->name = $nameemp->name;
									$auto->status = 6;

									$auto->catAuthorizationAdd();
								}
							}
									 else
							{
								echo "<script type='text/javascript'>alert('Debe Firmar el Jefe del Departamento')</script>";
								echo '<script>document.location.href="./?predet='.$_GET['predet'].'";</script>'; 
							}
					 }

				$Cer->idRequest = $_GET['predet'];
				$rowsCer = $Cer->catCertificateSearch('request');
				$datos = $rowsCer->fetch_object()
?>

				<article>
						<div id="informacion">
							<form method="post">
								<h2 class='title'>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS <br/> A CONSECUENCIAS DEL CONFLICTO ARMADO </h2>
								<h2 class='detalle'>Oficinas FOPROLYD: Entre 2a y 4a Avenida Norte y Alameda Juan Pablo II # 428, San Salvador. <br/> Tel. 2133-6200. <br/> Correo Electr&oacute;nico: uaci7@fondolisiados.gob.sv</h2>
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
								
								<center><table width="600px" bgcolor="#6E6E6E" border="1">
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
									
									
									
												<form method="post">
												<label for="user5">Usuario</label> &nbsp; &nbsp; &nbsp;
												<input type='text' class='box' name='user5' /><br/><br/>
												<label for="pass5">Contraseña</label>&nbsp;
												<input type='password' class='box' name='pass5' /><br/><br/>
												<center><input type="submit" name="firma5" value="Firmar"></center> <br/>
												</form>
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
										<form method="post">
											<label for="user6">Usuario</label> &nbsp; &nbsp; &nbsp;
											<input type='text' class='box' name='user6' /><br/><br/>
											<label for="pass6">Contraseña</label>&nbsp;
											<input type='password' class='box' name='pass6' /><br/><br/>
											<center><input type="submit" name="firma6" value="Firmar"></center> <br/>
										</form>
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

									$auto->idRequest =  $_GET['predet'];
									$auto->status = 1;
									$resu1 =  $auto->catAuthorizationSearch();

									$auto->idRequest =  $_GET['predet'];
									$auto->status = 2;
									$resu2 =  $auto->catAuthorizationSearch();

									$auto->idRequest =   $_GET['predet'];
									$auto->status = 3;
									$resu3 =  $auto->catAuthorizationSearch();

									$auto->idRequest =   $_GET['predet'];
									$auto->status = 4;
									$resu4 =  $auto->catAuthorizationSearch();

									$auto->idRequest =   $_GET['predet'];
									$auto->status = 5;
									$resu5 =  $auto->catAuthorizationSearch();

									$auto->idRequest =   $_GET['predet'];
									$auto->status = 6;
									$resu6 =  $auto->catAuthorizationSearch();

									if($resu1->status == 1 && $resu2->status == 2 && $resu3->status == 3 &&  $resu4->status == 4 &&  $resu5->status == 5 &&  $resu6->status == 6 )
									{
										?>
									<center><a id="ocult" onClick="window.print();" href="#"><img width="80" height="70" src="./img/imp.png"/><a/></center>
									<center><p id="ocult">Imprimir</p></center>
									<?

									}
									?>
									<br/>
									<br/>
									<? 
									echo '<center><a id="ocult" href="./?req=' .$_GET['predet']. '";>Regresar a la Requisici&oacute;n</a></center>';
									
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