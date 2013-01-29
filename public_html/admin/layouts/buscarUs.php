<?
	

	if(isset($_SESSION['admin']))
			{
				if(isset($_GET['buscarUs']))
				{
					$User = new catUsers();
					$employe = new catEmployes();
			?>
				<article>

					<article id="content">

					<h3 class='title'>Resultado de la Busqueda</h3>

					<?		
					$User->user =$_GET['buscarUs']; 		
					$Record = $User -> catUsersSearch('buscar');

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
								<h4 class="title">No se encontraron Resultados</h4>
							</div>';

					}

					
				

				
					echo '<center><a href="./?cat=3";>Regresar a la Lista</a></center>';	
						
				}
			}
			else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>
					
				
