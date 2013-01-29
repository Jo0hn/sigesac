<?
if(isset($_SESSION['admin']))
	{
		$prov = new catProviders();

		if(isset($_POST['add']))
		{
			$_POST = $Op->cleanPosts($_POST, 'safest');
				if(!isset($_POST['empty']))
				{
					$prov->name = $_POST['name'];
					$prov->nit = $_POST['nit'];
					$prov->address = $_POST['address'];
					$prov->phone = $_POST['phone'];
					$prov->email = $_POST['email'];
					$prov->typeservice = $_POST['typeservice'];
					$prov->Fax= $_POST['Fax'];
					$prov->ivaReg = $_POST['ivaReg'];
					$prov->categorie = $_POST['categorie'];
					$prov->contact = $_POST['contact'];
					$prov->catProvidersAdd();
					$records = $prov->catProvidersShow('algo');
					$cont = 0;
 						while($info = $records->fetch_object())
						{
							$cont++;
							if($cont == 1)
							{
								$idProv = $info->idProvider;
							}
						}
					echo "<script type='text/javascript'>alert('Agregado con Exito')</script>";
					echo '<script>document.location.href="./?cat=4";</script>';
				}
		}

?>


		<article id="content">
			<h3 class='title'>Nuevo Proveedor</h3>

			<form method="post" enctype='multipart/form-data'>
						<table id="table"  cellpadding=2 cellspacing=2>
							<tr>
								<td class="style">Nombre</td>
								<td><input type='text' class='box' name='name' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Nit</td>
								<td><input type='text' class='box' name='nit' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Direccion</td>
								<td><input type='text' class='box' name='address' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Telefono</td>
								<td><input type='text' class='box' name='phone' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Email</td>
								<td><input type='text' class='box' name='email' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Tipo Servicio</td>
								<td>
									<select  class='box' name='charge'>
										<option>Informatico</option>
										<option>Ventas</option>
										<option>Electrodomesticos</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="style">Fax</td>
								<td><input type='text' class='box' name='Fax' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Iva</td>
								<td><input type='text' class='box' name='ivaReg' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Categoria</td>
								<td><input type='text' class='box' name='categorie' size='50'/></td>
							</tr>
							<tr>
								<td class="style">Contacto</td>
								<td><input type='text' class='box' name='contact' size='50'/></td>
							</tr>
							<tr>
								<td colspan='2' align='center'>
									<br/>
									<input type='submit' value='Agregar' name='add'/>
									<input type='submit' value='Cancelar' name='cancel'/>
								</td>
							</tr>
						</table>
					</form>



		</article>
<?
	}
	else
	{
		echo'<script>document.location.href="./";</script>';
	}
?>