<?
	if(isset($_SESSION['admin']))
	{
			if(isset($_POST['btnSearch']))
				{
					$name = $_POST['search'];
					

					echo '<script>document.location.href="./?buscarPro='.$name.'";</script>'; 
				}

?>
	<article id="content">

		<h3 class='title'>Lista de Proveedores</h3>

<?

		$prov=new catProviders();
		$Record = $prov -> catProvidersShow();

		if(isset($_GET['del']))
		{
			echo '<script>document.location.href=./$cat=4;</script>';
		
			$prov->idProvider = $_GET['del'];
			$prov->catProvidersDelete();
		}
	//Cerrar div
		echo "<div id='Proveedores'>
				<div class='camp'>
					<div class='cod'>Codigo</div>
					<div class='nom'>Nombre</div>
					<div class='email'>Email</div>
					<div class='action2'>Modificar</div>
					<div class='action2'>Eliminar</div>
				</div>";

				$cont=0;
				while ($row = $Record->fetch_object())
					{
						$cont++;

						echo '<a href="?prov=' . $row->idProvider . '" />
							<div class="valor">
								<div class="cod">'.$row->idProvider.'</div>
								<div class="nom">'.$row->name.'</div>
								<div class="email">'.$row->email.'</div>
								<div class="action2"><a href="./?ed=' . $row->idProvider .  '"><img src="../../img/mod.png"/></a></div>
								<div class="action2"><a href="./?del=' . $row->idProvider .  '" onclick="return confirmar();"><img src="../../img/delete.png"/></a></div>
							</div>
							</a>
						';
					}

				if($cont==0)
					{
						echo'<div align="center">
								<h4 class="title">No hay Proveedores</h4>
							</div>';

					}

						echo '<div id="nCamp">

							<div class="cod"> . . . </div>
							<div class="nom"> . . . </div>
							<div class="email"> . . . </div>
							<div class="action2"><a href="./?add3"><img src="../../img/prueba.png"/></a></div>
						</div>';
					echo '</div>';

					echo"</div>";
					echo '<form method="post">
						<label for="search">Ingrese el nombre del proveedor</label>
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
