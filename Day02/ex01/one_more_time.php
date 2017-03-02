#!/usr/bin/php
<?php

	function wrong_format()
	{
	    echo "Wrong Format\n";
	    exit(1);
	}
	if ($argc != 2)
	    exit(1);
	$s = explode(" ", $argv[1]);
	$s = array_filter($s);
	if (count($s) != 5)
	    wrong_format();
	$string = implode(" ", $s);
	if (preg_match("/[0-9][0-9]:[0-9][0-9]:[0-9][0-9]/", $string) != 1)
	    wrong_format();
	$before = $string;
	$string = preg_replace("/[Jj]anvier/", '01', $string);
	$string = preg_replace('/[Ff]evrier/', '02', $string);
	$string = preg_replace('/[Mm]ars/', '02', $string);
	$string = preg_replace('/[Aa]vril/', '03', $string);
	$string = preg_replace('/[Mm]ai/', '05', $string);
	$string = preg_replace('/[Jj]uin/', '06', $string);
	$string = preg_replace('/[Jj]uillet/', '07', $string);
	$string = preg_replace('/[Aa]out/', '08', $string);
	$string = preg_replace('/[Ss]eptembre/', '09', $string);
	$string = preg_replace('/[Oo]ctobre/', '10', $string);
	$string = preg_replace('/[Nn]ovembre/', '11', $string);
	$string = preg_replace('/[Dd]ecembre/', '12', $string);
	if ($before === $string)
	    wrong_format();
	$before = $string;
	$string = preg_replace('/[Dd]imanche/', '0', $string);
	$string = preg_replace('/[Ll]undi/', '1', $string);
	$string = preg_replace('/[Mm]ardi/', '2', $string);
	$string = preg_replace('/[Mm]ercredi/', '3', $string);
	$string = preg_replace('/[Jj]eudi/', '4', $string);
	$string = preg_replace('/[Vv]endredi/', '5', $string);
	$string = preg_replace('/[Ss]amedi/', '6', $string);
	if ($before === $string)
	    wrong_format();
	$convert = strptime($string, "%w %d %m %Y %H:%M:%S");
	if ($convert === FALSE)
	    wrong_format();
	if (strlen($convert["unparsed"]) > 0)
	    wrong_format();
	unset($s[0]);
	$present = implode(" ", $s);
	$present = preg_replace("/[Jj]anvier/", 'January', $present);
	$present = preg_replace('/[Ff]evrier/', 'February', $present);
	$present = preg_replace('/[Mm]ars/', 'March', $present);
	$present = preg_replace('/[Aa]vril/', 'April', $present);
	$present = preg_replace('/[Mm]ai/', 'May', $present);
	$present = preg_replace('/[Jj]uin/', 'June', $present);
	$present = preg_replace('/[Jj]uillet/', 'July', $present);
	$present = preg_replace('/[Aa]out/', 'August', $present);
	$present = preg_replace('/[Ss]eptembre/', 'September', $present);
	$present = preg_replace('/[Oo]ctobre/', 'October', $present);
	$present = preg_replace('/[Nn]ovembre/', 'November', $present);
	$present = preg_replace('/[Dd]ecembre/', 'December', $present);
	date_default_timezone_set("Europe/Paris");
	$difference = strtotime($present);
	if (strlen($difference) > 0)
	   echo strtotime($present) . "\n";
	else
		wrong_format();

?>