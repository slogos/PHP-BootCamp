<?php

Class Example3
{
	private $_att = 0;

	public function getAtt()
	{
		return $this->_att;
	}

	public function setAtt($v)
	{
		if ($this->_att + $v > 50)
			$this->_att = 50;
		else 
			$this->_att = $v;
		return;
	}

	public function __get($att)
	{
		print('Attempt to acces \''.$att.'\' attribute, this script should die'.PHP_EOL);
		return 'arrrg';
	}

	public function __set($att, $value)
	{
		print('Attemp to set \''.$att.'\' attribute to \''.$value.'\', this script should die', PHP_EOL);
		return;
	}

	public function __construct(array $kwargs)
	{
		print('Constructor called'.PHP_EOL);
		$this->setAtt($kwargs['arg']);
		print('$this->getAtt(): '.$this->getAtt().PHP_EOL);
		return;
	}

	public function __destruct()
	{
		print('Destructor called'.PHP_EOL);
		return;
	}
}

$instance = new Example3(array('arg' => 42));

print('$instance->foo: '.$instance->foo.PHP_EOL);
print('$instance->_att: '.$instance->_att.PHP_EOL);
$instance->foo = 21;
$instance->_att = 84;

?>