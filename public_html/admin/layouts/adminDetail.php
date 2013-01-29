<?
	if(isset($_SESSION['admin']))
	{
		$datos= new catUsers();
		$emp= new catEmployes();
		$Cha= new catCharge();

		if(isset($_GET['adm']))
		{
			$_POST = $Op->cleanPosts($_POST, 'safest');
			
			if(!isset($_POST['empty']))
			{
				$datos->idEmploye = $_GET['adm'];
				$emp->idEmploye = $_GET['adm'];
				$Cha->idEmploye = $_GET['adm'];

				$rowDatos = $datos->catUsersSearch('employe');
				$rowEmp = $emp->catEmployesSearch();
				
			
?>
					<article id="content">
											
						<h3 class='title'>Detalle De el Administrador  No. <?= $rowEmp->idEmploye; ?></h3>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
							<tr align="center">
								<td><strong>Numero de administrador. <?= $rowEmp->idEmploye; ?></strong></td></tr>
							<tr align='center'><td><strong><?= $rowDatos->date; ?></strong></td></tr>
						</table>
						
						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
						<tr>
							<td width = 30% align="center" ><strong>Nombre</strong></td>
							<td width = 30% ><strong>Email</strong></td>
							<td width = 30%  align="center"><strong>Telefono</strong></td>
							<td width = 30%  align="center"><strong>Cargo</strong></td>
						</tr>
						<tr>
							<td><?= $rowEmp->name; ?></td>
							<td><?= $rowEmp->email; ?></td>
							<td><?= $rowEmp->phone; ?></td>
							<td>Administrador</td>							
						</tr>
		
						</table>
							<br/><a href='?cat=2'>Regresar a la lista</a>

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