<?php

Class Example8
{
	public static function doc()
	{
		return 'This is a sample class with no real purpose.';
	}

	public function __construct()
	{
		print('Constructor called'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor called'.PHP_EOL);
		return;
	}
}

print('Example doc: '.Example8::doc().PH');

?>