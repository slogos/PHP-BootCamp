<?php

Class Example7
{
	const CST1 = 1;
	const CST2 = 2;

	public function __construct(array $kwargs)
	{
		print('Constructor called'.PHP_EOL);

		if ($kwargs['arg'] == self::CST1)
			print('arg is CST1'.PHP_EOL);
		else if ($kwargs['arg'] == self::CST2)
			print('arg is CST2'.PHP_EOL);
		else
			print('arg is not a class constant'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor called'.PHP_EOL);
		return;
	}
}

$instance1 = new Example7(array('arg' => Example7::CST1));
$instance2 = new Example7(array('arg' => Example7::CST2));
$instance1 = new Example7(array('arg' => 42));
