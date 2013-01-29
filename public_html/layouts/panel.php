<? 
if(isset($_SESSION['user']))
			{
				if(isset($_GET['panel']))
				{
					$datos= new catUsers();
					$emp= new catEmployes();
				

					$datos->idEmploye = $_SESSION['user'];
					$emp->idEmploye = $_SESSION['user'];
					$Cha->idEmploye = $_SESSION['user'];
				


					$rowDatos = $datos->catUsersSearch('employe');
					$rowEmp = $emp->catEmployesSearch();
					//$rowCha = $Cha->catChargeSearch('employe');
					
				?>
					<article id="content">
											
						<h3 class='title'><?= $rowEmp->name; ?></h3>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">

					<tr align="center">
						<td><strong>Numero de usuario </td><td><?= $rowDatos->idEmploye; ?></td>
					</tr>
					<tr>
						<td ><strong>Nombre</strong></td><td><?= $rowEmp->name; ?></td>
					</tr>
					<tr>
						<td ><strong>Email</strong></td><td><?= $rowEmp->email; ?></td>
					</tr>
					<tr>
						<td ><strong>Telefono</strong></td><td><?= $rowEmp->phone; ?></td>
					</tr>
					<tr>
						<td ><strong>Cargo</strong></td><td><?= $rowEmp->charge; ?></td>
					</tr>
					<tr>
						<td ><strong>Nombre de Usuario</strong></td><td><?= $rowDatos->user; ?></td>
					</tr>
					<tr>
						<td ><strong>Firma</strong></td><td><? echo "<img src='../$rowEmp->signature'>";?></td>
					</tr>
						</table>
						<?
					echo
						'<a href="?panelEd=' .  $_SESSION['user'] . '" >Modificar</a>';
						?>
					</article>
				<?
				}
			}

?>