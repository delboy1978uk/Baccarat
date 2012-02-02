<?php

class Pattern {

	const MOVE_STAY   = 0;
	const MOVE_SWITCH = 1;

	public $pattern  = array();
	public $length   = 0;
	public $position = 0;
	public $depth    = 1;

	public function __construct($pattern)
	{
		$this->pattern = str_split($pattern);
		$this->length  = count($this->pattern);
	}

	public function reset()
	{
		debug('  Reset pattern');
		$this->position = 0;
		$this->depth    = 1;
	}

	public function current()
	{
		// Reset pattern if maximum is reached????
		if(!isset($this->pattern[$this->position]))
		{
			$this->position = 0;
		}

		return (int) $this->pattern[$this->position];
	}

	public function advance()
	{
		debug('  Advance pattern');
		$return = $this->current();
		++$this->position;
		++$this->depth;
		return $return;
		
	}
}