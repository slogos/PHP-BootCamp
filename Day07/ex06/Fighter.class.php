<?php


abstract class Fighter {
	public $name;
	
	public function __construct($name) {
		$this->name = $name;
	}
	public abstract function fight($target);
	public function __toString() {
		return $this->name;
	}
}
?>