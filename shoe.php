<?php

class Shoe {

	const PLAYER     = 'Player';
	const BANKER     = 'Banker';
	const PLAYER_WIN = 0;
	const BANKER_WIN = 1;

	public    $winner;
	protected $winner_name;

	public function __construct($result)
	{
		$result = (int) $result;

		switch($result)
		{
			case Shoe::BANKER_WIN :
				$this->winner_name = Shoe::BANKER;
			break;

			case Shoe::PLAYER_WIN :
				$this->winner_name = Shoe::PLAYER;
			break;

			default :
				throw new Exception('Invalid shoe input, must be binary.');
		}

		$this->winner = $result;
	}

	public function __toString()
	{
		return $this->winner_name;
	}
}