<?php
	if ($_GET["action"] === "set")
		setcookie($_GET["name"], $_GET["value"], time() + (86400 * 30));
	else if ($_GET["action"] === "get")
	{	
		if ($_GET["name"] != FALSE)
			echo $_GET["value"]."\n";
	}
	else if ($_GET["action"] === "del")
		setcookie($_GET["name"], "delete", 1);
?>