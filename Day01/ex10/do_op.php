#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		return (0);
	}
	$n = trim($argv[1]);
	$m = trim($argv[3]);
	if (!is_numeric($n) || !is_numeric($m))
	{
		echo "Incorrect Parameters\n";
		return (0);
	}
	$n = intval($n);
	$m = intval($m);
	$sign = trim($argv[2]);
	if (!strcmp($sign, "+"))
	{
		$total = $n + $m;
		echo $total."\n";
	}
	else if (!strcmp($sign, "-"))
	{
		$total = $n - $m;
		echo $total."\n";
	}
	else if (!strcmp($sign, "*"))
	{
		$total = $n * $m;
		echo $total."\n";
	}
	else if (!strcmp($sign, "/"))
	{
		$total = $n / $m;
		echo $total."\n";
	}
	else if (!strcmp($sign, "%"))
	{
		$total = $n % $m;
		echo $total."\n";
	}
?>