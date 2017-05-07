#!/usr/bin/php
<?php

function calculate($string, $c) 
{
	$exploded = explode($c, $string);
	$n = trim($exploded[0]);
	$m = trim($exploded[1]);
	if (is_numeric($n) && is_numeric($m))
	{
		$n = intval($n);
		$m = intval($m);
		switch ($c)
		{
			case '+':
				$total = $n + $m;
				echo $total."\n";
				break;
			case '-':
				$total = $n - $m;
				echo $total."\n";
				break;
			case '*':
				$total = $n * $m;
				echo $total."\n";
				break;
			case '/':
				$total = $n / $m;
				echo $total."\n";
				break;
			case '%':
				$total = $n % $m;
				echo $total."\n";
				break;
		}
	}
	else 
		echo "Syntax Error\n";
}

	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		exit (1);
	}
	$string = trim($argv[1]);
	$n1 = substr_count($string, '+');
	$n2 = substr_count($string, '-');
	$n3 = substr_count($string, '*');
	$n4 = substr_count($string, '/');
	$n5 = substr_count($string, '%');
	if ($n1 + $n2 + $n3 + $n4 + $n5 == 1)
	{
		switch(1)
		{
    		case $n1:
        		calculate($string, '+');
        		break;
   			 case $n2:
        		calculate($string, '-');
       			 break;
    		case $n3:
        		calculate($string, '*');
       			break;
    		case $n4:
       			calculate($string, '/');
        		break;
    		case $n5:
        		calculate($string, '%');
        		break;
		}
	}
	else 
		echo "Syntax Error\n";
?>