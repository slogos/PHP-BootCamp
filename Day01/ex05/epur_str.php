#!/usr/bin/php
<?php
	$exploded = explode(" ", $argv[1]); 
	$filtred = array_filter($exploded);
	echo implode(" ", $filtred);
	echo "\n";
?>