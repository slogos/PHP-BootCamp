<?php
function auth($login, $passwd)
{
	$rename = FALSE;
	$password = hash("whirlpool", $passwd);
	$string = file_get_contents("../private/passwd");
	$verify = unserialize($string);
	foreach ($verify as $value) 
	{
		if ($value['login'] === $login && $password === $value['passwd'])
			$rename = TRUE;
	}
	if ($rename == FALSE)
		return (FALSE);
	else
		return (TRUE);
}
?>