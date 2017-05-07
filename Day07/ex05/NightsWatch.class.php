<?php

include_once('IFighter.class.php');

class NightsWatch 
{
	private $_watch = array();
	
	public function __construct() 
	{
		$this->_watch = array();
	}
	
	public function recruit( $person ) 
	{
		if ( $person instanceof IFighter ) 
		{
			array_push($this->_watch, $person);
		}
	}
	
	public function fight() 
	{
		foreach ( $this->_watch as $person ) 
		{
			$person->fight();
		}
	}
}

?>