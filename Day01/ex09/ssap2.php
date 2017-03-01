#!/usr/bin/php
<?php
	$stack_alpha = [];
	$stack_numbers = [];
	$stack_rest = [];
	for ($i = 1; $i < $argc; $i++)
	{
		$exploded = explode(" ", $argv[$i]);
			foreach ($exploded as $value)
			{
				if (is_numeric($value))
					array_push($stack_numbers, intval($value));
				else if (ctype_alpha($value))
					array_push($stack_alpha, $value);
				else 
					array_push($stack_rest, $value);
			}
	}
	rsort($stack_numbers);
	natcasesort($stack_alpha);
	sort($stack_rest);
	foreach ($stack_alpha as $value)
		echo $value."\n";
	foreach ($stack_numbers as $value)
		echo $value."\n";
	foreach ($stack_rest as $value)
		echo $value."\n";
?>