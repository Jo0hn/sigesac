<?
$Acs = new ctrAccess();

if(isset($_POST['log']))
{
	$_POST = $Op->cleanPosts($_POST, 'safest');
	if(!isset($_POST['empty']))
	{
		$Acs->user = $_POST['txtUser'];
		$Acs->pass = $_POST['txtPass'];
		
		$log = $Acs->ctrAccessLogin();

		if($log != '')
		{
			$_SESSION['admin'] = $log['who'];
		}
		echo '<script>document.location.href=\'./\';</script>';
	}
}

if(isset($_SESSION['admin']))
{
	include('home.php');
}
else
{
?>

<form method="POST">
	<div>
		<br/>
		<center><img src='../img/logo.jpg' width='180' height='190'/></center> <br/>
		<table id='table'>
			<tr>
				<th colspan='2'>Sistema de Autenticaci&oacute;n</th>
			</tr>
			<tr>
				<td>Usuario</td><td><input type='text' name='txtUser' class='box' maxlength='35' size='35'/> </td>
			</tr>
			<tr>
				<td>Contrase&ntilde;a</td><td><input type='password' name='txtPass' maxlength='35' size='35' class='box'/> </td>
			</tr>
			<tr>
				<td colspan='2' align="center"><input type='submit' name='log' value='Ingresar'/></td>
			</tr>
		</table>
	</div>
</form>
<?
}
?>