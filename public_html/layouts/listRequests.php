<?
	include('./includes/kpaginate.inc');
	$pages = new Paginator();	

	echo '
			<style type="text/css">
.paginate {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
}
a.paginate {
border: 1px solid #000080;
padding: 2px 6px 2px 6px;
text-decoration: none;
color: #000080;
}
a.paginate:hover {
background-color: #000080;
color: #FFF;
text-decoration: underline;
}
a.current {
border: 1px solid #000080;
font: bold .7em Arial,Helvetica,sans-serif;
padding: 2px 6px 2px 6px;
cursor: default;
background:#000080;
color: #FFF;
text-decoration: none;
}
span.inactive {
border: 1px solid #999;
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
padding: 2px 6px 2px 6px;
color: #999;
cursor: default;
}
</style>
	';

	if(isset($_SESSION['user']))
			{
				if(isset($_POST['btnSearch']))
				{
					$name = $_POST['search'];
					

					echo '<script>document.location.href="./?buscar='.$name.'";</script>'; 
				}
			?>
				<article>

					<div id="breadcrumbs"> <a href="./">Inicio</a> > Mis Requisici&oacute;nes</div>
					
					<h3 class='title'>Lista de mis Requisiciones</h3>

					<?
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


				$Req = new catRequests();
				$Det = new catDetails();
				$Com = new catComments();
				$records = $Req->catRequestsShow();
				
			
				
				
				
				$pages->items_total = count($records->fetch_array()) + 1;
				echo  count($records->fetch_array());
				$pages->mid_range = 5;
				$pages->paginate();

				$records2 = $Req->catRequestsShowLimit($pages->limit);

				echo $pages->display_items_per_page();


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
				while ($row = $records2->fetch_object())
					{
						$cont++;
						echo
						'<a href="?req=' . $row->idRequest . '" />
						<div id="valores">
							<div class="code">'.$row->idRequest.'</div>
							<div class="date">'.$row->date.'</div>
							<div class="ident">'.$row->keywords.'</div>
							<div class="valor"><a href="./?ed=' . $row->idRequest .  '"><img src="./img/mod.png"/></a></div>
							<div class="valor"><a href="./?del=' . $row->idRequest .  '" onclick="return confirmar();"><img src="./img/delete.png"/></a></div>';
							if($row->status == 0)
							{
								echo '<div class="valor"><a href="#"><img src="./img/gris.png"/></a></div>';
							}
							else if($row->status == 1)
							{
								echo '<div class="valor"><a href="#"><img src="./img/verde.png"/></a></div>';
							}
							else if($row->status == 2)
							{
								echo '<div class="valor"><a href="#"><img src="./img/naranja.png"/></a></div>';
							}
							else if($row->status == 3)
							{
								echo '<div class="valor"><a href="#"><img src="./img/rojo.png"/></a></div>';
							}

						echo '</div>	
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
					echo '<form method="post">
						<center><label for="search">Ingrese la palabra clave</label>
						<input type="text" name="search"/>
						<input type="submit" name="btnSearch" value="buscar"/></center>
						</form> ';

					
					echo "</article>";
					
					echo $pages->display_pages();
			}
			else
			{
				echo'<script>document.location.href="./";</script>';
			}
?>
					
				
