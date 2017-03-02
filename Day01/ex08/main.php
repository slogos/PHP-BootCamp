#!/usr/bin/php
<?php
	include("ft_is_sort.php");
	$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
	$tab[] = "What are we doing now ?";
	// sort($tab);
	if (ft_is_sort($tab))
		echo "The array is sorted\n";
	else
		echo "The array is not sorted\n";
?>