#!/usr/bin/php
<?PHP
echo "Enter a number: ";
while ($line = fgets(STDIN))
{
	$line = trim($line);
	if (!is_numeric($line))
		echo "'$line' is not a number\n";
	else if ($line % 2 == 0)
		echo "The number $line is even\n";
	else   		
		echo "The number $line is odd\n";
	echo "Enter a number: ";
}
?>