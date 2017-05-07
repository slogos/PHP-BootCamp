<?php
if($_POST['submit'] === 'OK')
{
	if($_POST['item'] === "" || $_POST['price'] === "")
	{
		header("Location: admin.html");
		exit("Error\n");
	}
	@mkdir("private");
	if (!(file_exists("private/items")))
		$items = array();
	else
		$items = unserialize(file_get_contents("private/items"));
	$items[$_POST['item']] = array('item' => $_POST['item'], 'price' => $_POST['price']);
	file_put_contents("private/items", serialize($items));
	header("Location: admin.html");
	exit("OK\n");
}
?>
