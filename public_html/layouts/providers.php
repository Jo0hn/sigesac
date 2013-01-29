<?

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
						<td><input type='text' class='box' name='typeservice' size='50'/></td>
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