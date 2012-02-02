<?php

class Outcome {

	public $win;
	public $count;
	public $side;

	public function __construct($win, $count, $side)
	{
		$this->win   = (bool) $win;
		$this->count = $count;
		$this->side  = $side;
	}

	public function __toString()
	{
		return (bool) $this->win ? 'winner' : 'loser';
	}
}