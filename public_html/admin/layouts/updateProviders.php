<?
	if(isset($_SESSION['admin']))
	{
		$Pro = new catProviders();

		if(isset($_GET['ed']))
		{

			$_POST = $Op->cleanPosts($_POST, 'safest');
			if(!isset($_POST['empty']))
			{
				$Pro->idProvider =  $_GET['ed'];

				$dataPro = $Pro->catProvidersSearch();
				
				if(isset($_POST['ed']))
				{
					
					$Proed  = new catProviders();

					$Proed->idProvider = $_GET['ed'];
					$Proed->name = $_POST['name'];
					$Proed->nit = $_POST['nit'];
					$Proed->address = $_POST['address'];
					$Proed->phone =  $_POST['phone'];
					$Proed->email =  $_POST['email'];
					$Proed->typeservice =  $_POST['typeservice'];
					$Proed->Fax= $_POST['Fax'];
					$Proed->ivaReg = $_POST['ivaReg'];
					$Proed->categorie = $_POST['categorie'];
					$Proed->contact = $_POST['contact'];

					$Proed->ctrProvidersUpdate();

					echo "<script type='text/javascript'>alert('Proveedor Modificado con Exito')</script>";
					echo '<script>document.location.href="./?cat=4";</script>';
				}
			}


?>

		<article>
			<div id="breadcrumbs"> <a href="./">Inicio</a> >  Nuevo Proveedor</div>
			<h2>Nuevo Proveedor</h2>

			<form method="post" enctype='multipart/form-data'>
						<table id="table"  border=2 cellpadding=2 cellspacing=2>
							<tr>
								<td class="style">Nombre</td>
								<td><input type='text' class='box' name='name' size='50' value="<?= $dataPro->name; ?>" /></td>
							</tr>
							<tr>
								<td class="style">Nit</td>
								<td><input type='text' class='box' name='nit' size='50' value="<?= $dataPro->nit; ?>" /></td>
							</tr>
							<tr>
								<td class="style">Direccion</td>
								<td><input type='text' class='box' name='address' size='50' value="<?= $dataPro->address; ?>" /></td>
							</tr>
							<tr>
								<td class="style">Telefono</td>
								<td><input type='text' class='box' name='phone' size='50' value="<?= $dataPro->phone; ?>" /></td>
							</tr>
							<tr>
								<td class="style">Email</td>
								<td><input type='text' class='box' name='email' size='50' value="<?= $dataPro->email; ?>" /></td>
							</tr>
							<tr>
								<td class="style">Tipo Servicio</td>
								<td><input type='text' class='box' name='typeservice' size='50' value="<?= $dataPro->typeservice; ?>" /></td>
							</tr>
								<tr>
								<td class="style">Fax</td>
								<td><input type='text' class='box' name='Fax' size='50' value="<?= $dataPro->Fax; ?>"/></td>
							</tr>
							<tr>
								<td class="style">Iva</td>
								<td><input type='text' class='box' name='ivaReg' size='50' value="<?= $dataPro->ivaReg; ?>"/></td>
							</tr>
							<tr>
								<td class="style">Categoria</td>
								<td><input type='text' class='box' name='categorie' size='50' value="<?= $dataPro->categorie; ?>"/></td>
							</tr>
							<tr>
								<td class="style">Contacto</td>
								<td><input type='text' class='box' name='contact' size='50' value="<?= $dataPro->contact; ?>"/></td>
							</tr>
							<tr>
								<td colspan='2' align='center'>
									<br/>
									<input type='submit' value='Editar' name='ed'/>
									<input type='submit' value='Cancelar' name='cancel'/>
								</td>
							</tr>
						</table>
					</form>

		</article>
<?
	
		}

	}
	else
	{
		echo'<script>document.location.href="./";</script>';
	}

?>