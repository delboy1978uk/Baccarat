<?php

class Outcome {

	public $win;
	public $count;

	public function __construct($win, $count)
	{
		$this->win   = $win;
		$this->count = $count;
	}
}