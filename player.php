<?php

class Player {

	public  $id   = 0;
	public  $name = 'Player';

	protected static $instance;

	public static function enter()
	{
		static::$instance === null and static::$instance = new static();
		return static::$instance;
	}

	private function __construct() {}

	public function __toString()
	{
		return $this->name;
	}
}
