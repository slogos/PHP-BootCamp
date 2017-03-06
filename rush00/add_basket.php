<?php
if ($_POST['submit'] === "ADD" && $_GET['item'] !== "")
{
	$basket = $_SESSION['basket'];
	$basket[] = $_GET['item'];
	$_SESSION['basket'] = $basket;
	echo $_SESSION['basket'];
}
?>
