<?php
if($_POST['submit'] === 'OK')
{
	if($_POST['item'] === "" || $_POST['price'] === "" || $_POST['price'] === "")
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	@mkdir("private");
	if (!(file_exists("private/groups")))
	{
		header("Location: verify_group.html");
		exit("Error\n");
	}
	$group = unserialize(file_get_contents("private/groups"));
	$n = count($group);
	$m = 0;
	foreach($group as $key => $value)
	{
		if ($key == $_POST['group'])
		{
			array_push($group[$_POST['group']], $_POST['item']);
			file_put_contents("private/groups", serialize($group));
			if (!(file_exists("private/items")))
			{
				$items = array();
				file_put_contents("private/items", serialize($items));
			}
			$items = unserialize(file_get_contents("private/items"));
			$items[$_POST['item']] = array('item' => $_POST['item'], 'price' => $_POST['price']);
			file_put_contents("private/items", serialize($items));
			header("Location: item_successfull.html");
		break;
		}
		$m++;
	}
	if ($n == $m)
	{
		header("Location: verify_group.html");
		exit("Error\n");
	}
}
else if($_POST['submit'] === 'Remove')
{
	if($_POST['item'] === "" || $_POST['group'] === "" || !(file_exists("private/items")))
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	$items = unserialize(file_get_contents("private/items"));
	$group = unserialize(file_get_contents("private/groups"));
	$n = count($group);
	$m = 0;
	foreach($group[$_POST['group']] as $value)
	{
		if ($value == $_POST['item'])
		{
			echo $value;
			unset($items[$_POST['item']]);
			file_put_contents("private/items", serialize($items));
			unset($group[$_POST['group'][$_POST['item']]);
			file_put_contents("private/groups", serialize($group));
			exit();
		}
		$m++;
	}
	foreach($items as $value)
	{
		if ($_POST['item'] == $value['item'])
		{
			foreach($group[$_POST['group']] as $value)
			{
				if ($elem == $_POST['item'])
				{
					echo "yeee\n";
					unset($elem);
					// echo $group[$key[$elem]];
					exit();
				}
			}
		}
			// header("Location: added_element.html");
		exit("OK\n");
	}
	header("Location: verify_element.html");
}
?>
