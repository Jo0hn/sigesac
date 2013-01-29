<?
	if(isset($_SESSION['admin']))
	{
		$datos= new catUsers();
		$emp= new catEmployes();
		$img= new imagen();
		$Cha= new catCharge();

		if(isset($_GET['usr']))
		{
			$_POST = $Op->cleanPosts($_POST, 'safest');
			if(!isset($_POST['empty']))
			{
				$datos->idEmploye = $_GET['usr'];
				$emp->idEmploye = $_GET['usr'];				
				$img->idEmploye = $_GET['usr'];


				$rowDatos = $datos->catUsersSearch('employe');
				$rowEmp = $emp->catEmployesSearch();
				$Cha->idCharge = $rowEmp->idCharge;
				$rowCha = $Cha->catChargeSearch();
				
			
			?>
			<article id="content">
											
						<h3 class='title'>Detalle De el Usuario  No. <?= $rowDatos->idEmploye; ?></h3>

						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">

						<tr align="center">
							
						<td><strong>Numero de usuario. <?= $rowDatos->idEmploye; ?></strong></td></tr>
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
							<td><?= $rowCha->name; ?></td>
																					
						</tr>
		
						</table>
						<table class="tablita" CELLPADDING=0 CELLSPACING=0   style="margin: 0 auto">
							<tr>
								<td width = 30%  align="center"><strong>Firma</strong></td>
							</tr>

							<tr>
								<td align="center"><? echo "<img src='../$rowEmp->signature'>";?></td>
							</tr>
						</table>
							<br/><a href='?cat=3'>Regresar a la lista</a>

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
