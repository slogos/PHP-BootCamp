<?php
if ($_POST['submit'] != "OK" || !$_POST['newpw'] || !$_POST['login'] || !$_POST['oldpw'])
	echo "ERROR missing values\n";
else if ($_POST['login'] && $_POST['newpw'] && $_POST['oldpw'] && $_POST['submit'] == 'OK')
{
	$_POST['oldpw'] = hash('whirlpool', $_POST['oldpw']);
	$newtab['login'] = $_POST['login'];
	$newtab['oldpw'] = $_POST['oldpw'];
	$newtab['newpw'] = $_POST['newpw'];
	if (file_exists("../private/passwd"))
	{
		$tab = unserialize(file_get_contents("../private/passwd"));
		foreach($tab as $key => $elem)
		{
			if ($elem['login'] == $newtab['login'])
			{
				if ($elem['passwd'] == $newtab['oldpw'])
				{
					$elem['passwd'] = hash('whirlpool', $_POST['newpw']);
					$tab[$key] = $elem;
					file_put_contents("../private/passwd", serialize($tab));
					header('Location: index.html');
					echo "OK\n";
					exit(0);
				}
			}
		}
		echo ("ERROR login not found"."\n");
	}
}
?>