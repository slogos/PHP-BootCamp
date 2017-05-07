<?php
session_start();
if ($_SESSION['loggued_on_user'] != "") {
	if ($_POST['msg'] != "") {
		if (file_exists("../private") == FALSE)
			mkdir("../private");
		//flock("../private/chat", LOCKE_EX);
		if (file_exists("../private/chat")) 
			$tab = unserialize(file_get_contents("../private/chat"));
		$new['login'] = $_SESSION['loggued_on_user'];
		$new['time'] = time();
		$new['msg'] = $_POST['msg'];
		$tab[] = $new;
			//flock("../private/chat", LOCK_UN);	
		file_put_contents("../private/chat", serialize($tab));
	}
}
else
	echo "ERROR"."\n";
?>

<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form method="POST" action='speak.php'>
			<input type='text' name='msg'>
			<input type='submit' name='submit' value='OK'>
		</form>
	</body>
</html>