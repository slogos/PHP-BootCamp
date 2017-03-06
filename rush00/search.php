<?php
if ($_GET['item'] !== '')
{
	if (file_exists("private/items"))
	{
		$items = unserialize(file_get_contents("private/items"));
		$item = $items[$_GET['item']];
		if (!empty($item))
		{
			echo "<h3>".$item['item']." - $".$item['price']."</h3>";
			// echo $item['item'];
			// echo " - ";
			// echo $item['price'];
		}
		else
			echo "No Item Found\n";
	}
}
else
{
	echo "Error\n";
}
exit();
?>
