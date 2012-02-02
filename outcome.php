<?php

class Outcome {

	public $w; // Win
	public $c; // Count
	public $s; // Side
	public $a; // Action

	public function __construct($win, $count, $side, $action)
	{
		$this->w = (int) $win;
		$this->c = $count;
		$this->s = $side;
		$this->a = $action;
	}
}