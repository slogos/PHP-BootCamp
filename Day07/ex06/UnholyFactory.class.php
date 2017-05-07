<?php

include_once('Fighter.class.php');
class UnholyFactory {
	private $_absorbed_fighters;
	function __construct() {
		$this->_absorbed_fighters = array();
	}
	
	function absorb($to_absorb) {
		if ( $to_absorb instanceof Fighter ) {
			if ( $this->_hasAbsorbed( $to_absorb ) ) {
				print( '(Factory already absorbed a fighter of type '
					   . $to_absorb . ')' . PHP_EOL );
			} else {
				$this->_absorbed_fighters[] = $to_absorb;
				print( '(Factory absorbed a fighter of type ' . $to_absorb
					   . ')' . PHP_EOL );
			}
		} else {
			print( "(Factory can't absorb this, it's not a fighter)"
				   . PHP_EOL);
		}
	}
	private function _hasAbsorbed($compare_to) {
		foreach ( $this->_absorbed_fighters as $fighter ) {
			if ( $compare_to == $fighter ) {
				return True;
			}
		}
		return False;
	}
	function fabricate($name) {
		foreach ($this->_absorbed_fighters as $fighter) {
			if ($fighter->name === $name) {
				print( "(Factory fabricates a fighter of type " . $fighter
					   . ")" . PHP_EOL );
				return clone $fighter;
			}
		}
		print( "(Factory hasn't absorbed any fighter of type " . $name
			   . ")" . PHP_EOL );
		return null;
	}
}

?>