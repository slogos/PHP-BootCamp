<?php
session_start();
if ($_SESSION['loggued_on_user'] != "")
{
	if($_POST['submit'] === 'OK')
	{
		if($_POST['msg'] === "" || $_POST['msg'] === null)
			exit("Error\n");

		@mkdir("../private");
		if (!(file_exists("../private/chat")))
		{
			$chat = array();
			$chat[] = array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']);
			file_put_contents("../private/chat", serialize($chat));
		}
		else
		{
			$fd = fopen("../private/chat", "c+");
			flock($fd, LOCK_EX | LOCK_SH);
			$chat = unserialize(file_get_contents("../private/chat"));
			$chat[] = array('login' => $_SESSION['loggued_on_user'], 'time' => time(), 'msg' => $_POST['msg']);
			file_put_contents("../private/chat", serialize($chat));
			flock($fd, LOCK_UN);
			fclose($fd);
		}
	}
?>

	<html>
	<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
	<form method="post" action="speak.php">
		Message: <input type="text" name="msg" autofocus />
		<input type="submit" name="submit" value="OK" />
	</form>
	</body></html>

<?php
}
else
	exit("Error\n");
?>
