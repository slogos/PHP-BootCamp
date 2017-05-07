#!/usr/bin/php
<?php

	date_default_timezone_set('Europe/paris');
	$name1 = get_current_user();
	$content = file_get_contents("/var/run/utmpx");
	$s = substr($content, 1256);
	$n = array();
	$typedef   = 'a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad';
	while ($s != NULL) {
		$array = unpack($typedef, $s);
		if (strcmp(trim($array[user]), $name1) == 0 && $array[type] == 7)
		{
			$date = date("M  j H:i", $array["time1"]);
			$line = trim($array[line]);
			$line = $line . "  ";
			$name2 = trim($array[user]);
			$name2 = $name2 . "  ";
			$tab = array($name2.$line.$date);
			$n = array_merge($n, $tab);
		}
		$s = substr($s, 628);		
	}
	sort($n);
	foreach ($n as $output) {
		echo $output;
		echo "\n";
	}

?>