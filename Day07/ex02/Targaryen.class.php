<?php

Class Targaryen
{
	public static $flag = 0;
	public function getBurned()
	{
		if (self::$flag == 0)
		{
			self::$flag++;
			return 'burns alive';
		}
		else if (self::$flag == 1)
		{
			return 'emerges naked but unharmed';	
		}
	}
}

?>