<?php

Class Example12 
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

$instance1 = new Example12(array('arg' => 42));
$instance2 = new Example12(array('arg' => 53));
$instance1->setAtt(30);
print('$instance1->getAtt(): '.$instance1->getAtt().PHP_EOL);

?>