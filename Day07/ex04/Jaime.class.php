<?php

Class Jaime
{
	public function sleepWith($ck_class)
	{
		if ($ck_class instanceof Tyrion)
		{
			print "Not even if I'm drunk !"."\n";

		}
		else if ($ck_class instanceof Sansa)
		{
			print "Let's do this."."\n";

		}
		else if ($ck_class instanceof Cersei)
		{
			print "With pleasure, but only in a tower in Winterfell, then."."\n";

		}
		return;
	}
}

?>