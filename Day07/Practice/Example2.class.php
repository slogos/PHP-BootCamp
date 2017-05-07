<?php

Class Example_A 
{
	public 		$publicAtt = 21;
	protected 	$_protectedAtt = 84;
	private 	$_privateAtt = 42;

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

	public function publicFoo()
	{
		print('Function publicFoo from class A'.PHP_EOL);
		return;
	}

	protected function _protectedFoo()
	{
		print('Function _protectedFoo from class A'.PHP_EOL);
		return;
	}

	private function _privateFoo()
	{
		print('Function _privateFoo from class A'.PHP_EOL);
		return;
	}

	public function test()
	{
		print('$this->publicAtt is '.$this->publicAtt.PHP_EOL);
		print('$this->_protectedAtt is '.$this->_protectedAtt.PHP_EOL);
		print('$this->privateAtt is '.$this->_privateAtt.PHP_EOL);
		$this->publicFoo();
		$this->_protectedFoo();
		$this->_privateFoo();
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

	public function test()
	{
		print('$this->publicAtt is '.$this->publicAtt.PHP_EOL);
		print('$this->_protectedAtt is '.$this->_protectedAtt.PHP_EOL);
		$this->publicFoo();
		$this->_protectedFoo();
		return;
	}
}

print("\n".'---- From inside A ----'.PHP_EOL);
$instanceA = new Example_A();
$instanceA->test();

print("\n".'---- From inside B ----'.PHP_EOL);
$instanceB = new Example_B();
$instanceB->test();

print("\n".'---- From outside ----'.PHP_EOL);
print('$instanceB->publicAtt is '.$instanceB->publicAtt.PHP_EOL);
$instanceB->publicFoo();
$instanceB->_privateFoo();

print("\n".'---- End ----'.PHP_EOL);

?>