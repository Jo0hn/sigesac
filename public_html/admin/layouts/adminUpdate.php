<?

	if(isset($_SESSION['admin']))
		{
			$emp = new catEmployes();			
			$acc = new ctrAccess();
			$image = new Imagen();

			if(isset($_POST['add']))
			{

				$image->File = $_FILES['signature'];

				$imagen = $image->imagenUpload();

				if($imagen == 'errType')
				{
					 $emp->idEmploye = $_GET['edAdm'];
					 $emp->name = $_POST['name'];
					 $emp->email = $_POST['email'];
					 $emp->phone = $_POST['phone'];
					 $emp->signature = $_POST['firma'];

					 $emp->catEmployesUpdate();
				}
				else
				{
					 $emp->idEmploye = $_GET['edAdm'];
					 $emp->name = $_POST['name'];
					 $emp->email = $_POST['email'];
					 $emp->phone = $_POST['phone'];
					 $emp->signature = $imagen;

					 $emp->catEmployesUpdate();

				}

				
				
				$acc->idEmploye =  $_GET['edAdm'];
				$acc->user = $_POST['user'];
				$acc->pass = $_POST['pass'];

				$acc->ctrAccessUpdate();

				echo "<script type='text/javascript'>alert('Administrador modificado con exito')</script>";
				echo '<script>document.location.href="./?cat=2";</script>';
			
			}

			if(isset($_GET['edAdm']))
			{
				$emp->idEmploye = $_GET['edAdm'];				
				$acc->idEmploye = $_GET['edAdm'];

				$rowsemp = $emp->catEmployesSearch();				
				$rowsacc = $acc->ctrAccessSearch('employe');
			}
?>


			<article id="content">
						<h3 class='title'>Modificar Administrador</h3>

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
									<td class="style">Usuario</td>
									<td><input type='text' class='box' name='user' size='50' value="<?= $rowsacc->user; ?>" /></td>
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
								<input type="hidden" name="firma"  value="<?= $rowsemp->signature; ?>"/>
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