#!/usr/bin/php
<?php
function split_it($string)
{
    $exploded = explode(" ", $string);
    $filtered = array_filter($exploded);
    return array_slice($filtered, 0);
}
function get_ascii($char)
{
	$ascii = ord($char);
	if ($ascii == 0)
		return $ascii;
	if (($ascii < 48) || ($ascii >= 91 && $ascii <= 96) || ($ascii >= 123))
		$ascii += 1000;
	else if (is_numeric($char))
		$ascii += 100;
	else if (ctype_upper($char))
		$ascii += 32;
	return $ascii;
}
function ord_compare($string1, $string2)
{
	if ($string1 == $string2)
		return 0;
	$split_s1 = str_split($string1, 1);
	$split_s2 = str_split($string2, 1);
	$split_s1_length = strlen($string1);
	$split_s2_length = strlen($string2);
	$i = 0;
	while ($i < $split_s1_length && $i < $split_s2_length)
	{
		$ascii_s1 = get_ascii($split_s1[$i]);
		$ascii_s2 = get_ascii($split_s2[$i]);
		if ($ascii_s1 != $ascii_s2)
			return ($ascii_s1 < $ascii_s2) ? -1 : 1;
		$i += 1;
	}
	if ($i == $split_s1_length && $i == $split_s1_length)
		return (0);
	if ($i == $split_s1_length)
		return (-1);
	return 1;
}
if ($argc < 2)
{
    exit (1);
}
unset($argv[0]);
$fused = array();
foreach ($argv as $element)
{
    $splitted = split_it($element);
    $fused = array_merge($fused, $splitted);
}
usort($fused, "ord_compare");
foreach ($fused as $element)
{
    echo $element."\n";
}
?>
