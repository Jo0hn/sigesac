	<? 
		$emp = new imagen();
		if(isset($_POST['add']))
		{
		
		$emp->File = $_FILES['size'];
		
		$emp->imagenUpload();
		}
	?>
<article>
	<form method="post" enctype='multipart/form-data'>
		<input type='file' class='box' name='size'/>
		<input type='submit' value='Agregar' name='add'/>
		</form>
</article>