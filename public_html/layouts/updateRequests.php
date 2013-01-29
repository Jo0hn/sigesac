<?
	

			if(isset($_SESSION['user']))
			{
				$Req = new catRequests();
				$Det = new catDetails();
				$Comen = new catComments();
				$Deted = new catDetails();

				// if(isset($_GET['eli']))
				// 	{
				// 			echo "hola";
				// 			$Deted->idDetail = $_GET['eli'];
				// 			$Deted->catDetailsDelete();
				// 			echo'<script>document.location.href="./?ed= '.$_GET['ed'].'";</script>';
				// 	}	
				
				if (isset($_GET['ed']))
				{

					

					$_POST = $Op->cleanPosts($_POST, 'safest');
					if(!isset($_POST['empty']))
					{
						$Req->idRequest = $_GET['ed'];
						$Det->idRequest = $_GET['ed'];
						$Comen->idRequest =  $_GET['ed'];

						$dataReq = $Req->catRequestsSearch();
						$rowsCom = $Comen->catCommentsSearch('request');
						$rowsDet = $Det->catDetailsSearch('request');

					

						if(isset($_POST['ed']))
						{

							
							$Deted->idRequest = $_GET['ed'];
							

							for($i = 0; $i < $_POST['quantDetails']; $i++)
							{
								$Deted->idDetail = $_POST['idDetail'. $i];
								$Deted->quantity = $_POST['txtquantity'. $i ];
								$Deted->description =  $_POST['txtdescription'. $i];
								$Deted->catDetailsUpdate('normal');
							}

							$Req->idRequest = $_GET['ed'];
							$Req->status = $_POST['status'];
							$Req->catRequestsUpdate('status');
							
							echo "<script type='text/javascript'>alert('Requisicion Modificada con exito')</script>";
							echo '<script>document.location.href="./?cat=1";</script>';
						}

			?>

				<article>
					<h3 class='title'>Editar la Requisici&oacute;n No. <?= $dataReq->idRequest; ?></h3>


						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">

						<tr align="center">
							
							<td rowspan="2"><strong>FONDO DE PROTECCI&Oacute;N DE LISIADOS Y DISCAPACITADOS </br> A CONSECUENCIAS DEL CONFLICTO ARMADO </br></br> REQUISICI&Oacute;N DE OBRAS BIENES Y SERVICIOS</strong></td>
							<td><strong>No. <?= $dataReq->idRequest; ?></strong></td></tr>
									<tr align='center'><td><strong><?= $dataReq->date; ?></strong></td></tr>
						</table>
						<form method="post">
						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
						<tr>
							<td width = 30% align="center" ><strong>Cantidad</strong></td>
							<td colspan="3" align="center"><strong>Descripci&oacute;n</strong></td>

						</tr>
						<?
							$i = 0;
							while($dataDet = $rowsDet->fetch_object())
							{
							echo '
							<input type="hidden" name="idDetail'.$i. '"  value=" '. $dataDet->idDetail.'"/>
							<tr>
								
								<td align="center"> <input type ="text" name="txtquantity'.$i. '" value="' . $dataDet->quantity . '" /></td>
								<td colspan="2" align="center"> <textarea name="txtdescription'.$i. '"   width="50px"> ' . $dataDet->description . '</textarea>
								
								</td>
							</tr>
							';
							$i++;
							}
							$var = $i;
							echo '<input type="hidden" name="quantDetails" id="quantDetails" value=" '.$var.' " />';
							//<a href="./?eli=' . $dataDet->idDetail .  '" onclick="return confirmar();"><img src="./img/delete.png"/>
						?>
							
						</table>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
						<tr>
						<td width = 100% >Observaciones: <?= $dataCom->comment; ?>
						<?
							while($dataCome = $rowsCom->fetch_object())
							{
								echo $dataCome->comment; 
							}
							?>
							<select  class='box' name='status'>
							<? 
							if($dataReq->status == 0)
							{
								echo '<option value="0">Sin Estado</option>
								';
							}
							else
							{
								echo '<option value="'.$dataReq->status.'">';

								if($dataReq->status == 1) 
								{
									echo 'Verde (Estado actual)</option>';
								}
								else if($dataReq->status == 2) 
								{
									echo 'Naranja (Estado actual)</option>';
								}
								else if($dataReq->status == 3) 
								{
									echo 'Rojo (Estado actual)</option>';
								}	
							}
							?>
								
								<option value="1">Verde</option>
								<option value="2">Naranja</option>
								<option value="3">Rojo</option>
							</select>
							
						</td>
						</tr>
						
						<tr align='center'>
							<td><input type="submit" name="ed" value="Guardar"/></td> 
						</tr>
						</table>
						</form>
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
