<?php

class Game {

	protected $results = array();
	protected $shoe    = 0;
	protected $length  = 0;
	protected $player;
	protected $banker;
	protected $gamer;

	public function __construct($results)
	{
		$this->restart($results);
	}

	public function restart($results)
	{
		$this->results = str_split($results);
		$this->length  = count($this->results);
	}

	public function play(Gamer $gamer)
	{
		$this->player === null and $this->player = Player::enter();
		$this->banker === null and $this->banker = Banker::enter();
		$this->gamer  = $gamer;
		$outcome      = array();

		foreach($this->results as $winner)
		{
			$shoe      = new Shoe($winner);
			$win       = (bool) $shoe->winner == $gamer->position;
			$depth     = $gamer->pattern->depth;
			$outcome []= new Outcome($win, $depth);

			$this->gamer->decide_move($shoe);
		}

		return $outcome;
	}
}