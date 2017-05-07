<?php 
if($_POST['submit'] === 'OK')
{
	if($_POST['group'] === "")
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	@mkdir("private");
	if (!(file_exists("private/groups")))
		$groups = array();
	else
		$groups = unserialize(file_get_contents("private/groups"));
	$groups[$_POST['group']] = array();
	file_put_contents("private/groups", serialize($groups));
	header("Location: group_successfull.html");
	exit("OK\n");
}
else if($_POST['submit'] === 'Remove')
{
	if($_POST['group'] === "" || !(file_exists("private/groups")))
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	$groups = unserialize(file_get_contents("private/groups"));
	foreach($groups as $key => $value)
	{
		if ($_POST['group'] == $key)
		{
			unset($groups[$_POST['group']]);
			file_put_contents("private/groups", serialize($groups));
			header("Location: group_removed.html");
			exit("OK\n");
		}
	}
	// header("Location: verify_element.html");
}
?>