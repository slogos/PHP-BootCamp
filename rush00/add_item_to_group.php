<?php
if($_POST['submit'] === 'OK')
{
	if($_POST['group'] === "" || $_POST['item'] === "")
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	if (!file_exists("private/groups") || !file_exists("private/items"))
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	$groups = unserialize(file_get_contents("private/groups"));
	$item = unserialize(file_get_contents("private/items"));
	$groups[$_POST['group']][$_POST['item']] =  $item[$_POST['item']];
	file_put_contents("private/groups", serialize($groups));
	header("Location: admin.html");
	exit("OK\n");
}
?>
