<?
	if(isset($_SESSION['admin']))
	{
		$Datos = new catProviders();

		if(isset($_GET['prov']))
			{
				$_POST = $Op->cleanPosts($_POST, 'safest');
				if(!isset($_POST['empty']))
				{
					$Datos->idProvider = $_GET['prov'];
					$dataProv = $Datos->catProvidersSearch();
?>
				
					<article id="content">
						
						<h3 class='title'>Detalle Del Proveedor   No. <?= $dataProv->idProvider; ?></h3>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
							<tr align="center">
								<td><strong>Numero del Proveedor. <?= $dataProv->idProvider; ?></strong></td></tr>
							<tr align='center'><td><strong><?= $dataProv->date; ?></strong></td></tr>
						</table>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
						<tr>
							<td width = 25% align="center"><strong>Nombre</strong></td>
							<td width = 12% align="center"><strong>NIT</strong></td>
							<td width = 30% align="center"><strong>Direccion</strong></td>
							<td width = 8% align="center"><strong>Telefono</strong></td>
							<td width = 12% align="center"><strong>Tipo de Servicio</strong></td>
							<td width = 12% align="center"><strong>Fax</strong></td>
							<td width = 12% align="center"><strong>Iva</strong></td>
							<td width = 12% align="center"><strong>Categoria</strong></td>
							<td width = 12% align="center"><strong>Contacto</strong></td>

						</tr>
						<tr>
							<td align="center"><?= $dataProv->name; ?></td>
							<td align="center"><?= $dataProv->nit; ?></td>
							<td align="center"><?= $dataProv->address; ?></td>
							<td align="center"><?= $dataProv->phone; ?></td>
							<td align="center"><?= $dataProv->typeservice; ?></td>	
							<td align="center"><?= $dataProv->Fax; ?></td>	
							<td align="center"><?= $dataProv->ivaReg; ?></td>	
							<td align="center"><?= $dataProv->categorie; ?></td>	
							<td align="center"><?= $dataProv->contact; ?></td>							
						</tr>
		
						</table>
							<br/><a href='?cat=4'>Regresar a la lista</a>

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
