<?php

interface IExample
{
	function foo();
}

class Example implements IExample
{
	public function __construct()
	{
		print('Constructor Example called'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor Example called'.PHP_EOL);
		return;
	}

	public function foo()
	{
		print('Function foo'.PHP_EOL);
		return;
	}
}

$instance = new Example();
$instance->foo();

?>