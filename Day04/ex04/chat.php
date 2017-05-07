<?php
if (file_exists("../private/chat"))
{
	date_default_timezone_set("Europe/Paris");
	$tab = unserialize(file_get_contents("../private/chat"));
	foreach ($tab as $key =>$elem)
		echo date("[H:i]", $elem['time'])." <b>".$elem['login']."</b>: ".$elem['msg']."<br />".PHP_EOL;
}
?>