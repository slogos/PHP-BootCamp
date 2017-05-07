<?php

Class Example_A
{
	public function __construct()
	{
		print('Constructor Example_A called'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor Example_A called'.PHP_EOL);
		return;
	}

	public function foo()
	{
		print('Funcion foo from class A'.PHP_EOL);
	}

	public function test()
	{
		static::foo();
		return;
	}
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

$instanceA = new Example_A();
$instanceB = new Example_B();

$instanceA->foo();
$instanceB->foo();

$instanceA->test();
$instanceB->test();

?>