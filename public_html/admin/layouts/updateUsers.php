<?
	if(isset($_SESSION['admin']))
	{
		$emp = new catEmployes();
		$charg = new catCharge();
		$user = new catUsers();
		$image = new Imagen();


		if(isset($_POST['add']))
		{
			$image->File = $_FILES['signature'];
			$imagen = $image->imagenUpload();

			if($imagen == 'errType')
			{
				 $emp->idEmploye = $_GET['edUser'];
				 $emp->name = $_POST['name'];
				 $emp->email = $_POST['email'];
				 $emp->phone = $_POST['phone'];
				 $emp->signature = $_POST['firma'];

				 $emp->catEmployesUpdate();
			}
			else
			{
				 $emp->idEmploye = $_GET['edUser'];
				 $emp->name = $_POST['name'];
				 $emp->email = $_POST['email'];
				 $emp->phone = $_POST['phone'];
				 $emp->signature = $imagen;

				 $emp->catEmployesUpdate();
			}

			$charg->idEmploye =  $_GET['edUser'];
			$charg->name = $_POST['charge'];

			$charg->catChargeUpdate();

			$user->idEmploye =  $_GET['edUser'];
			$user->user = $_POST['user'];
			$user->pass = $_POST['pass'];

			$user->catUsersUpdate();
			echo "<script type='text/javascript'>alert('Usuario Modificado con Exito')</script>";
					echo '<script>document.location.href="./?cat=3";</script>';
		}


		if(isset($_GET['edUser']))
		{
			$emp->idEmploye = $_GET['edUser'];
			$rowsemp = $emp->catEmployesSearch();
			// $charg->idEmploye = $_GET['edUser'];
			// $rowscharg = $charg->catChargeSearch('employe');

			$user->idEmploye = $_GET['edUser'];
			$rowsuser = $user->catUsersSearch('employe');
		
?>
		<article id="content">
			<h3 class='title'>Modificar Usuario</h3>

			<form method="post" enctype='multipart/form-data'>
				<table id="table"  cellpadding=2 cellspacing=2>
					<tr>
						<td class="style">Nombre</td>
						<td><input type='text' class='box' name='name' size='50' value="<?= $rowsemp->name; ?>"/></td>
					</tr>
					<tr>
						<td class="style">Email</td>
						<td><input type='text' class='box' name='email' size='50' value="<?= $rowsemp->email; ?>"/></td>
					</tr>
					<tr>
						<td class="style">Telefono</td>
						<td><input type='text' class='box' name='phone' size='10' value="<?= $rowsemp->phone; ?>"/></td>
					</tr>
					<tr>
						<td class="style">Firma</td>
						<td><input type='file' class='box' name='signature'/></td>
					</tr>
					<tr>
						<td class="style">Cargo</td>
						<td><select  class='box' name='charge'>
							<option value="<?= $rowscharg->name; ?>"><?= $rowscharg->name; ?> (Cargo actual)</option>
							<option value="Administrador">Administrador</option>
							<option value="Usuario">Usuario</option>
						</select></td>
					</tr>
					<tr>
						<td class="style">Usuario</td>
						<td><input type='text' class='box' name='user' size='50' value="<?= $rowsuser->user; ?>"/></td>
					</tr>
					<tr>
						<td class="style">Contrase&ntilde;a</td>
						<td><input type='password' class='box' name='pass' size='50' value="<?= $rowsuser->pass; ?>"/></td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
							<br/>
							<input type='submit' value='Guardar' name='add'/>
							<input type='submit' value='Cancelar' name='cancel'/>
						</td>
					</tr>
					<input type="hidden" name="firma"  value="<?= $rowsemp->signature; ?>"/>
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