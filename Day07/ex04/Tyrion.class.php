<?php

Class Tyrion
{
	public function sleepWith($ck_class)
	{
		if ($ck_class instanceof Jaime || $ck_class instanceof Cersei)
		{
			print "Not even if I'm drunk !"."\n";
		}
		else if ($ck_class instanceof Sansa)
		{
			print "Let's do this."."\n";

		}
		return;
	}
}

?>