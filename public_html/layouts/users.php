<?
		$emp = new catEmployes();
		$charg = new catCharge();
		$use = new catUsers();
		$image = new Imagen();

	if(isset($_SESSION['admin']))
	{
		if(isset($_POST['add']))
		{
				$_POST = $Op->cleanPosts($_POST, 'safest');
				if(!isset($_POST['empty']))
				{
				
				$emp->File = $_FILES['signature'];

				$emp->imagenUpload();

				$var = $emp->imagenUpload();

				var_dump($var);

				$emp->name = $_POST['name'];
				$emp->email = $_POST['email'];
				$emp->phone = $_POST['phone'];
				$emp->signature = $_POST['signature'];


				$emp->catEmployesAdd();

				$records = $emp->catEmployesShow('algo');
				$cont = 0;
				$idEmploye = 0;
				while($info = $records->fetch_object())
				{
					$cont++;
					if($cont == 1)
					{
						$idEmp = $info->idEmploye;
					}
				}
				
				$use->user = $_POST['user'];
				$use->pass = $_POST['pass'];
				$use->idEmploye = $idEmp;

				$use->catUsersAdd();

				$charg->name = $_POST['charge'];
				$charg->idEmploye = $idEmp;

				$charg->catChargeAdd();
				}
			
		}
?>
		<article id="content">
			<h3 class='title'>Ingresar Usuario</h3>

			<form method="post" enctype='multipart/form-data'>
				<table id="table"  cellpadding=2 cellspacing=2>
					<tr>
						<td class="style">Nombre</td>
						<td><input type='text' class='box' name='name' size='50'/></td>
					</tr>
					<tr>
						<td class="style">Email</td>
						<td><input type='text' class='box' name='email' size='50'/></td>
					</tr>
					<tr>
						<td class="style">Telefono</td>
						<td><input type='text' class='box' name='phone' size='10'/></td>
					</tr>
					<tr>
						<td class="style">Firma</td>
						<td><input type='file' class='box' name='signature'/></td>
					</tr>
					<tr>
						<td class="style">Cargo</td>
						<td><input type='text' class='box' name='charge' size='50'/></td>
					</tr>
					<tr>
						<td class="style">Usuario</td>
						<td><input type='text' class='box' name='user' size='50'/></td>
					</tr>
					<tr>
						<td class="style">Contrase&ntilde;a</td>
						<td><input type='password' class='box' name='pass' size='50'/></td>
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