<?
	if(isset($_SESSION['user']))
	{
		$emp = new catEmployes();
		$charg = new catCharge();
		$user = new catUsers();
		


		if(isset($_POST['add']))
		{
			
				$emp->idEmploye = $_SESSION['user'];
				$emp->name = $_POST['name'];
				$emp->email = $_POST['email'];
				$emp->phone = $_POST['phone'];
				

				 $emp->catEmployesUpdate('panel');
			

				$user->idEmploye =  $_SESSION['user'];
				$user->user = $_POST['user'];
				$user->pass = $_POST['pass'];

				$user->catUsersUpdate();


		}


		if(isset($_GET['panelEd']))
		{
			$emp->idEmploye =$_SESSION['user'];
			$rowsemp = $emp->catEmployesSearch();
			// $charg->idEmploye = $_GET['edUser'];
			// $rowscharg = $charg->catChargeSearch('employe');

			$user->idEmploye = $_SESSION['user'];
			$rowsuser = $user->catUsersSearch('employe');
		
?>
		<article id="content">
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
						<td class="style">Usuario</td>
						<td><input type='text' class='box' name='user' size='50' value="<?= $rowsuser->user; ?>"/></td>
					</tr>
					<tr>
						<td class="style">Contrase&ntilde;a</td>
						<td><input type='password' class='box' name='pass' size='50' /></td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
							<br/>
							<input type='submit' value='Guardar' name='add'/>
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