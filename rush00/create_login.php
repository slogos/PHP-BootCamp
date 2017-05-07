<?php
function error()
{
	echo "Error\n";
	exit;
}
function get_next_key($accounts)
{
	$user_count = 0;
	foreach ($accounts as $key => $elem)
	{
		if ($elem['login'] === $_POST['login'])
			error();
		if ($key >= $user_count)
			$user_count = $key + 1;
	}
	return ($user_count);
}
if ($_POST['submit'] !== 'OK')
	error();
if (($_POST['login'] === '') || ($_POST['passwd'] === ''))
	error();
$key_index = 0;
if(file_exists("private/passwd"))
{
	$accounts = unserialize(file_get_contents("private/passwd"));
	$key_index = get_next_key($accounts);
}
$accounts[$key_index]['login'] = $_POST['login'];
$accounts[$key_index ]['passwd'] = hash("whirlpool", $_POST['passwd']);
@mkdir("private");
file_put_contents("private/passwd", serialize($accounts));
header("Location: index.php");
exit("OK\n");
?>
