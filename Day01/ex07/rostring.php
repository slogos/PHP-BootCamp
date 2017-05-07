#!/usr/bin/php
<?php

	$exploded = explode(" ", $argv[1]);
	$filtered = array_filter($exploded);
	$sliced = array_slice($filtered, 0, 1);
	$filtered = array_splice($filtered, 1);
	foreach ($filtered as $value)
		echo $value." ";
	echo $sliced[0]."\n";
?>