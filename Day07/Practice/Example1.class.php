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
		print('Function foo from class A'.PHP_EOL);
		return;
	}
}

Class Example_B extends Example_A
{
	public function __construct()
	{
		parent::__construct();
		print('Constructor Example_B called'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor Example_B called'.PHP_EOL);
		parent::__destruct();
	}

	public function foo()
	{
		parent::foo();
		print('Function foo from class B'.PHP_EOL);
		return;
	}
}

$instanceA = new Example_A();
$instanceA->foo();
$instanceB = new Example_B();
$instanceB->foo();

?>