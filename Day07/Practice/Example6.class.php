<?php

abstract Class Example_A
{
	abstract public function foo();

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

	public function foo()
	{
		print('Function foo from class B'.PHP_EOL);
	}
}

$instanceB = new Example_B();
$instanceB->foo();

?>