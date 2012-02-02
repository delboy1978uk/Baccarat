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
		$this->position = 0;
		$this->depth    = 1;
	}

	public function current()
	{
		return (int) $this->pattern[$this->position];
	}

	public function advance()
	{
		++$this->position;
		++$this->depth;
		return $this->current();
	}
}