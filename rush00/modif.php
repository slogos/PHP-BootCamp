<?php
function error($str)
{
	echo "Error: $str\n";
	exit;
}
function get_login($accounts)
{
	$hs_pw = hash("whirlpool", $_POST['old_pw']);
	foreach ($accounts as $key => $elem)
	{
		if ($elem['login'] === $_POST['login'])
		{
			if ($hs_pw === $elem['passwd'])
				return ($key);
			else
				error("Password's Didn't Match");
		}
	}
	error("No matching login");
}
if ($_POST['submit'] !== 'OK')
	error();
if (($_POST['login'] === null) || ($_POST['passwd'] === null) || ($_POST['old_pw']) === null)
	error();
$key_index = 0;
if(file_exists("private/passwd"))
{
	$accounts = unserialize(file_get_contents("private/passwd"));
	$key_index = get_login($accounts);
	$accounts[$key_index ]['passwd'] = hash("whirlpool", $_POST['passwd']);
	@mkdir("private");
	file_put_contents("private/passwd", serialize($accounts));
	echo "OK\n";
}
else
	error("Database file doesn't exist");
?>
