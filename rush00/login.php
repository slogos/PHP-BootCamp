<?php
include("auth.php");
session_start();
if ($_POST['submit'] === 'OK')
{
	$_SESSION['login'] = $_POST['login'];
}
if (auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_SESSION['login'];
	if ($_SESSION['login'] === "admin")
	{
		header("Location: admin.html");
		exit("OK\n");
	}
	header("Location: index.php");
	echo "<iframe src='chat.php' height='550' width='75%'></iframe>";
	echo "<br>";
	echo "<iframe src='speak.php' height='50' width='75%'></iframe>";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	exit("Error L\n");
}
?>
