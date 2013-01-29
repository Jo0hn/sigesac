<?
	if(isset($_SESSION['admin']))
	{
		if(isset($_POST['btnSearch']))
				{
					$name = $_POST['search'];
					

					echo '<script>document.location.href="./?buscar='.$name.'";</script>'; 
				}
?>
		<article id="content">

			<h3 class='title'>Lista de mis Requisiciones</h3>

	

<?

			$Req = new catRequests();
			$Det = new catDetails();
			$Com = new catComments();
			$records = $Req->catRequestsShow();
				
			if(isset($_GET['delRequest']))
			{
				
				$Req->idRequest = $_GET['delRequest'];
				$Req->catRequestsDelete();
						
				
				$Det->idRequest=$_GET['delRequest'];
				$Det->catDetailsDelete();

				$Com->idRequest=$_GET['delRequest'];
				$Com->catCommentsDelete();
			}


				echo "<div id='Request'>";
					echo "	<div class='camp'>
								<div class='cod2'>Codigo</div> 		
								<div class='date'>Fecha</div>
								<div class='ident'>Identificador</div>
								<div class='action2'>Modificar</div>
								<div class='action2'>Eliminar</div>
							</div>";

					$cont=0;
					while ($row = $records->fetch_object())
					{
						$cont++;
						echo '<a href="?req=' . $row->idRequest . '" />
							<div class="valor">
								<div class="cod2">'.$row->idRequest.'</div>
								<div class="date">'.$row->date.'</div>
								<div class="ident">'.$row->keywords.'</div>
								<div class="action2"><a href="./?edRequest=' . $row->idRequest .  '"><img src="../img/mod.png"/></a></div>
								<div class="action2"><a href="./?delRequest=' . $row->idRequest .  '" onclick="return confirmar();"><img src="../img/delete.png"/></a></div>
							</div>
						</a>
						';
					}


					if($cont==0)
					{
						echo'<div align="center">
								<h4 class="title">No hay Requisiciones</h4>
							</div>';

					}
					echo '<div id="nCamp">
							<div class="cod2"> . . . </div>
							<div class="date"> . . . </div>
							<div class="ident"> . . . </div>
							<div class="action2"><a href="./?add4"><img src="../img/prueba.png"/></a></div>
						</div>';
					echo '</div>';

					echo '<form method="post">
						<label for="search">Ingrese la palabra clave</label>
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

