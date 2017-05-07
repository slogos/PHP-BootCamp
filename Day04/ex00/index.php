<?PHP
	session_start();
	if ($_GET['submit'] == "OK")
	{
		$_SESSION['login'] = $_GET["login"];
		$_SESSION['passwd'] = $_GET["passwd"];
	}
?>


<html>
<body>
	<form>
		Username:
			<input name="login" value="<?PHP echo $_SESSION['login']; ?>"/>
			<br />
		Password:
			<input name="passwd" value="<?PHP echo $_SESSION['passwd']; ?>"/>
			<br />
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
</html>