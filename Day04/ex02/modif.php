<?php
	if ($_POST["submit"] === "OK")
	{
		if ($_POST["newpw"] === "")
			echo "ERROR\n";
		else
		{
			$rename = FALSE;
			$password = hash('whirlpool', $_POST['newpw']);
			$old_password = hash("whirlpool", $_POST['oldpw']);
			$string = file_get_contents("../private/passwd");
			$verify = unserialize($string);
			$i = 0;
			foreach ($verify as $value) 
			{
				if ($value['login'] === $_POST['login'] && $old_password === $value['passwd'])
				{
					$verify[$i]['passwd'] = $password;
					$rename = TRUE;
				}
				$i++;	
			}
			if ($rename == TRUE)
			{
				$enchript = serialize($verify);
				file_put_contents("../private/passwd", $enchript);
				echo "OK\n";
			}
			else
				echo "ERROR\n";
		}
	}
?>