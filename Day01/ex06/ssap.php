#!/usr/bin/php
<?php
	$stack = [];
	for ($i = 1; $i < $argc; $i++)
	{
		$exploded = explode(" ", $argv[$i]);
			foreach ($exploded as $value)
				array_push($stack, $value);
	}
	$filtered = array_filter($stack);
	sort($filtered);
	foreach ($filtered as $value)
		echo $value."\n";
?>