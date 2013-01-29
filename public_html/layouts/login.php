<?
$usr = new catUsers();

if(isset($_POST['log']))
{
	$_POST = $Op->cleanPosts($_POST, 'safest');
	if(!isset($_POST['empty']))
	{
		$usr->user = $_POST['txtUser'];
		$usr->pass = $_POST['txtPass'];
		
		$log = $usr->catUsersLogin();

		if($log != '')
		{
			$_SESSION['user'] = $log['who'];
			$_SESSION['charge'] = $log['charge'];
			
			

		}
		echo '<script>document.location.href=\'./\';</script>';
	}
}

if(isset($_SESSION['user']))
{
	include('userHome.php');
}
else
{

	?>
	<article style="padding-left: 10%; padding-top: 50px;">
		<form method="post">
			<table style="margin: 0 auto">
				<tr>
					<td><label for="user">Usuario</label></td>
					<td><input type="text" name="txtUser"/></td>
				</tr>

				<tr>
					<td><label for="contraseña">Contrase&ntilde;a</label></td>
					<td><input type="password" name="txtPass"/></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="log" value="Login"/></td>
				</tr>
			</table>
		</form>

	</article>
<?
}
?>