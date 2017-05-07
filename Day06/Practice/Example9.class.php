<?php

Class Example9
{
	public static $nbInstances = 0;

	public function __construct()
	{
		print('Constructor called'.PHP_EOL);
		self::$nbInstances++;
		return;
	}

	public function __destruct()
	{
		print('Destructor called'.PHP_EOL);
		self::$nbInstances--;
		print('nb instances: '.Example9::$nbInstances.PHP_EOL);
		return;
	}
}

print('nb instances: '.Example9::$nbInstances.PHP_EOL);
$instance1 = new Example9();
print('nb instances: '.Example9::$nbInstances.PHP_EOL);
$instance2 = new Example9();
print('nb instances: '.Example9::$nbInstances.PHP_EOL);
$instance3 = new Example9();
print('nb instances: '.Example9::$nbInstances.PHP_EOL);