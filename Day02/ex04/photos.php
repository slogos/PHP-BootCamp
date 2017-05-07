#!/usr/bin/php
<?php

function pull_info($url) {         
    $s[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
    $s[] = 'Connection: Keep-Alive';         
    $s[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
    $s2 = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';         
    $transform = curl_init($url);         
    curl_setopt($transform, CURLOPT_HTTPHEADER, $s);         
    curl_setopt($transform, CURLOPT_HEADER, 0);         
    curl_setopt($transform, CURLOPT_USERAGENT, $s2);         
    curl_setopt($transform, CURLOPT_TIMEOUT, 30);         
    curl_setopt($transform, CURLOPT_RETURNTRANSFER, 1);         
    curl_setopt($transform, CURLOPT_FOLLOWLOCATION, 1);         
    $out = curl_exec($transform);         
    curl_close($transform);         
    return $out;     
} 
$string = file_get_contents($argv[1]);
preg_match_all('/<img.{0,}src=["|\/|h][[:graph:]]+/', $string, $common);
$n = count($common[0]) ;
$m = 0;
while ($n != $m) 
{
	$content = substr(strstr($common[0][$m], "src="), 5);
	$new_s = str_replace('"', '', $content);
	$new_s = str_replace('>', '', $new_s);
	if ($new_s[0][0] == "/")
		$common[0][$m] = $argv[1] . $new_s;
	else
		$common[0][$m] = $new_s;
	$m++;
}
$content = $argv[1];
if (substr($argv[1], 0, 7) == "http://")
	$content = substr($argv[1], 7);
if (file_exists($content) == FALSE)
	mkdir($content, 0777, true);
foreach ($common[0] as $key) {
	$address = $key;
	$title= basename($address);
	if(file_exists('./$content/'.$title)){continue;} 
	$s4 = pull_info($address); 
	file_put_contents($content.'/'.$title,$s4);
}
curlop
?>