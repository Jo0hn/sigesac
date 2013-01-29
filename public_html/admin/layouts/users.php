<?
		$emp = new catEmployes();
		$charg = new catCharge();
		$use = new catUsers();
		$image = new Imagen();
		
		$cargos = $charg->catChargeShow();

	if(isset($_SESSION['admin']))
	{
		if(isset($_POST['add']))
		{
				$_POST = $Op->cleanPosts($_POST, 'safest');
				if(!isset($_POST['empty']))
				{

				$image->File = $_FILES['signature'];

				$imagen = $image->imagenUpload();
			
				$emp->name = $_POST['name'];
				$emp->email = $_POST['email'];
				$emp->phone = $_POST['phone'];
				$emp->signature = $imagen;
				$emp->idCharge = $_POST['charge'];
				
				


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
			
				echo "<script type='text/javascript'>alert('Agregado con Exito')</script>";
				}
			
		}
?>
		<article id="content">
			<h3 class='title'>Ingresar Usuario</h3>

			<form method="post" enctype='multipart/form-data'>
				<table id="table"  cellpadding=2 cellspacing=2>
					<tr>
						<td class="style">Nombre</td>
						<td><input type='text' class='box' name='name' size='50' required/></td>
					</tr>
					<tr>
						<td class="style">Email</td>
						<td><input type='text' class='box' name='email' size='50' required/></td>
					</tr>
					<tr>
						<td class="style">Telefono</td>
						<td><input type='text' class='box' name='phone' size='10' required pattern="(\d{4})-(\d{4})" title="0000-0000" /></td>
					</tr>
					<tr>
						<td class="style">Firma</td>
						<td><input type='file' class='box' name='signature' required/></td>
					</tr>
					<tr>
						<td class="style">Cargo</td>
						<td><select  class='box' name='charge'>
						<?
							while($cargo = $cargos->fetch_object())
							{
								if($cargo->name != "Administrador")
								echo "<option value=".$cargo->idCharge.">".$cargo->name."</option>";
							}
						?>
						</select></td>
					</tr>
					<tr>
						<td class="style">Usuario</td>
						<td><input type='text' class='box' name='user' size='50' required/></td>
					</tr>
					<tr>
						<td class="style">Contrase&ntilde;a</td>
						<td><input type='password' class='box' name='pass' size='50' required/></td>
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