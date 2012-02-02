<?php

class Gamer {

	public $pattern;
	public $position;

	public function __construct(Pattern $pattern, $side = Table::PLAYER_SIDE)
	{
		$this->pattern  = $pattern;
		$this->position = $side;
	}

	public function decide_move(Shoe $shoe)
	{
		if($this->position === $shoe->winner)
		{
			$this->pattern->reset();
			return $this->move_stay();
		}

		$decision = $this->pattern->advance();

		if($decision === Pattern::MOVE_SWITCH)
		{
			return $this->move_switch();
		}

		return $this->move_stay();
	}

	public function move_stay()
	{
		debug('  Stay on this side');
		return $this->position;
	}

	public function move_switch()
	{
		$this->position = ($this->position === Table::PLAYER_SIDE)
			? Table::BANKER_SIDE
			: Table::PLAYER_SIDE;

		debug('  Switch to ['.($this->position === Table::PLAYER_SIDE ? 'player' : 'banker').'] side.');

		return $this->position;
	}
}