<?php
include("auth.php");
session_start();
if (!$_POST['login'] || !$_POST['passwd']) {
	echo ("ERROR missing values"."\n");
	exit(0);
} else {
	$passwd = $_POST['passwd'];
	$login = $_POST['login'];
}
if (auth($login, $passwd)) {
	$_SESSION['loggued_on_user'] = $login;
	echo '<iframe name="chat" src="chat.php" width="100%" height="550px">
			</iframe><iframe src="speak.php" width="100%" height="50px"></iframe>';
} else {
	$_SESSION['loggued_on_user'] = "";
	echo ("ERROR login doesn't exist or password if false"."\n");
}
?>