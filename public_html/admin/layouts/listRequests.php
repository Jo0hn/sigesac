<?
	

	if(isset($_SESSION['user']))
			{
			?>
				<article>

					<div id="breadcrumbs"> <a href="./">Inicio</a> > Mis Requisici&oacute;nes</div>
					
					<h3 class='title'>Lista de mis Requisiciones</h3>

					<?

				$Req = new catRequests();
				$Det = new catDetails();
				$Com = new catComments();
				$records = $Req->catRequestsShow();
				
					if(isset($_GET['del']) && intval($_GET['del'])>0)
				{
						
							echo '<script>document.location.href=./$cat=1;</script>';
							$Req->idRequest = $_GET['del'];
							$Req->catRequestsDelete();

							
							
							$Det->idRequest=$_GET['del'];
							$Det->catDetailsDelete();

							$Com->idRequest=$_GET['del'];
							$Com->catCommentsDelete();
				}


				echo "<div 	width='70%' id='tabla'>";
				echo "	<div id='campos'>
						<div class='code'>Codigo</div> 		
						<div class='date'>Fecha</div>
						<div class='ident'>Identificador</div>
						<div class='valor'>Modificar</div>
						<div class='valor'>Eliminar</div>
						<div class='valor'>Estado</div>
						</div>";

				$cont=0;
				while ($row = $records->fetch_object())
					{
						$cont++;
						echo
						'<a href="?req=' . $row->idRequest . '" />
						<div id="valores">
							<div class="code">'.$row->idRequest.'</div>
							<div class="date">'.$row->date.'</div>
							<div class="ident">'.$row->keywords.'</div>
							<div class="valor"><a href="./?ed=' . $row->idRequest .  '"><img src="./img/mod.png"/></a></div>
							<div class="valor"><a href="./?del=' . $row->idRequest .  '" onclick="return confirmar();"><img src="./img/delete.png"/></a></div>
							<div class="valor"><a href="#"><img src="./img/imp2.png"/></a></div>
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
					echo '<div id="nCampos">
							<div class="code"> . . . </div>
							<div class="date"> . . . </div>
							<div class="ident"> . . . </div>
							<div class="valor">Agregar...<a href="./?add"><img src="./img/prueba.png"/></a></div>
						</div>';
					echo '</div>';
					echo '<form>
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
