<?php

Abstract Class Example_A
{

}

class Example_B extends Example_A
{
	public function __construct()
	{
		print('Constructor Example_B called'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor Example_B called'.PHP_EOL);
		return;
	}

}

// $instanceA = new Example_A();
$instanceB = new Example_B();

?>