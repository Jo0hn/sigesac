<?
	if(isset($_SESSION['admin']))
	{
			$User = new catUsers();
			$employe = new catEmployes();
			$charge = new catCharge();


		if(isset($_GET['delUser']))
		{
			$charge->idEmploye = $_GET['delUser'];
			$charge->catChargeDelete();

			$User->idEmploye = $_GET['delUser'];
			$User->catUsersDelete();

			$employe->idEmploye = $_GET['delUser'];
			$employe->catEmployesDelete();

			echo'<script>document.location.href="./?cat=3";</script>';
		}

			if(isset($_POST['btnSearch']))
				{
					$name = $_POST['search'];
					

					echo '<script>document.location.href="./?buscarUs='.$name.'";</script>'; 
				}



?>

	<article id="content">

		<h3 class='title'>Lista de Usuarios</h3>

<?
	
		$Record = $User -> catUsersShow();

		echo "<div id='Usuarios'>
				<div class='camp'>
					<div class='user'>Usuario</div>
					<div class='nomb'>Nombre del Empleado</div>
					<div class='action'>Modificar</div>
					<div class='action'>Eliminar</div>
				</div>";

				$cont=0;
				while ($row = $Record->fetch_object())
					{
						$cont++;
						$employe->idEmploye = $row->idEmploye;
						$consult = $employe->catEmployesSearch();

						echo 
						'<a href="?usr='.$row->idEmploye.'"><div class="valor">
							<div class="user">'.$row->user."</div> <div class='nomb'> ". $consult->name .'</div>
							<div class="action"><a href="./?edUser=' . $row->idEmploye .  '"><img src="../../img/mod.png"/></a></div>
							<div class="action"><a href="./?delUser=' . $row->idEmploye .  '" onclick="return confirmar();"><img src="../../img/delete.png"/></a></div>
						</a></div>';

					}

				if($cont==0)
					{
						echo'<div align="center">
								<h4 class="title">No hay Usuarios</h4>
							</div>';

					}
					echo '<div id="nCamp">

							<div class="user"> . . . </div>
							<div class="nomb"> . . . </div>
							<div class="action"><a href="./?add2"><img src="../../img/prueba.png"/></a></div>
						</div>';
					echo '</div>';


			echo"</div>";


					echo '<form method="post">
						<label for="search">Ingrese el nombre del Usuario</label>
						<input type="text" name="search"/>
						<input type="submit" name="btnSearch" value="buscar"/>
						</form> ';
				

	}

		else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>

	</article>