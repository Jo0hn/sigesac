<?
	if(isset($_SESSION['admin']))
	{

		$User = new ctrAccess();
		$employe = new catEmployes();
		$charge = new catCharge();
		

		if(isset($_GET['delAdm']))
		{
			$charge->idEmploye = $_GET['delAdm'];
			$charge->catChargeDelete();

			$User->idEmploye = $_GET['delAdm'];
			$User->ctrAccessDelete();

			$employe->idEmploye = $_GET['delAdm'];
			$employe->catEmployesDelete();

			echo'<script>document.location.href="./?cat=2";</script>';
		}
?>

	<article id="content">

		<h3 class='title'>Lista de Administradores</h3>

<?
		
	$Record = $User -> ctrAccessShow();


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
						'<a href="?adm='.$row->idEmploye.'"><div class="valor">
							<div class="user">'.$row->user."</div> <div class='nomb'> ". $consult->name .'</div>
							<div class="action"><a href="./?edAdm=' . $row->idEmploye .  '"><img src="../../img/mod.png"/></a></div>
							<div class="action"><a href="./?delAdm=' . $row->idEmploye .  '" onclick="return confirmar();"><img src="../../img/delete.png"/></a></div>
						</a></div>';

					}

				if($cont==0)
					{
						echo'<div align="center">
								<h4 class="title">No hay Administradores/h4>
							</div>';

					}
					echo '<div id="nCamp">

							<div class="user"> . . . </div>
							<div class="nomb"> . . . </div>
							<div class="action"><a href="./?add"><img src="../../img/prueba.png"/></a></div>
						</div>';
					echo '</div>';


			echo"</div>";

	}

		else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>

	</article>