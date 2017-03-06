<?php
if($_POST['submit'] === 'OK' || !(file_exists("private/groups")))
{
	if ($_POST['group'] === "")
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	$groups = unserialize(file_get_contents("private/groups"));
	$n = count($groups);
	$m = 0;
	foreach($groups as $key => $value)
	{
		if ($_POST['group'] == $key)
		{
			echo "The list of item in group ".$_POST['group']." is: "; 
			foreach($groups[$key] as $elem)
				echo " ".$elem." ";
			exit();
		}
		$m++;
	}
	if ($n == $m)
	{
		header("Location: verify_group.html");
		exit("Error\n");
	}
}
// 	exit("Error\n");
// if ($_POST['group'] === "" || !file_exists("private/groups"))
// 	exit("Error\n");
// $group = unserialize(file_get_contents("private/groups"));
// $group = $groups[$_POST['group']];
// echo "<h1>".$_POST['group']."</h1>";
// foreach ($group as $item)
// 	echo $item['item']." - ".$item['price']."<br>";
?>
