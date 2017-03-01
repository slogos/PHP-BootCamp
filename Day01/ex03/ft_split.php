<?php
function ft_split($string)
{
    $exploded = explode(" ", $string);
    $filtered = array_filter($exploded);
    $sliced = array_slice($filtered, 0);
    sort($sliced);
    return $sliced;
}
?>