<?PHP
if ($_POST['login'] && $_POST['passwd']) 
{
	if ($_POST['submit'] == "OK")
	{
		$password = hash('whirlpool', $_POST['passwd']);
		if (!file_exists("../private"))
			mkdir("../private", 0777, true);
		if (!file_exists("../private/passwd"))
		{
			$string = array(array('login'=>$_POST['login'], 'passwd'=>$password));
			$convert = serialize($string);
			file_put_contents("../private/passwd", $convert);
			echo "OK\n";
		}
		else
		{
			$present = FALSE;
			$string = file_get_contents("../private/passwd");
			$verify = unserialize($string);
			foreach ($verify as $value) {
				if ($value['login'] == $_POST['login'])
					$present = TRUE;
		}
		if ($present == FALSE)
		{
			$verify[] = array('login'=>$_POST['login'], 'passwd'=>$password);
			$output = serialize($verify);
			file_put_contents("../private/passwd", $output);
			echo "OK\n";
		}
		else
			echo "ERROR\n";
		}
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>