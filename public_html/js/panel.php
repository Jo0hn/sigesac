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
							
						<td><strong>Numero de usuario. </td><td><?= $rowDatos->idEmploye; ?></td></tr>
						<tr align='center'><td><strong><?= $rowDatos->date; ?></strong></td></tr>
						</table>
						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
						<tr>
							<td width = 30% align="center" ><strong>Nombre</strong></td>
							<td width = 30% ><strong>Email</strong></td>
							<td width = 30%  align="center"><strong>Telefono</strong></td>
							<td width = 30%  align="center"><strong>Cargo</strong></td>
							<td width = 30%  align="center"><strong>Firma</strong></td>
						</tr>
						<tr>
							<td><?= $rowEmp->name; ?></td>
							<td><?= $rowEmp->email; ?></td>
							<td><?= $rowEmp->phone; ?></td>
							<td><?= $rowEmp->charge; ?></td>
							<td><? echo "<img src='../$rowEmp->signature'>";?></td>
							
							
							
						</tr>
		
						</table>
							<br/><a href='?cat=3'>Regresar a la lista</a>

					</article>
				<?
				}
			}

?>