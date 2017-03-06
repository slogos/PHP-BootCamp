<?php
function auth($login, $passwd)
{
	if(file_exists("private/passwd"))
	{
		$accounts = unserialize(file_get_contents("private/passwd"));
		$hs_pw = hash("whirlpool", $passwd);
		foreach ($accounts as $key => $elem)
		{
			if (($elem['login'] === $login) && ($hs_pw === $elem['passwd']))
			{
				return (TRUE);
			}
		}
	}
	return (FALSE);
}
?>
