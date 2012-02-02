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
		debug('Resetting game');
		$this->results = str_split($results);
		$this->length  = count($this->results);
	}

	public function play(Gamer $gamer)
	{
		debug('Start Game');
		$this->player === null and $this->player = Player::enter();
		$this->banker === null and $this->banker = Banker::enter();
		$this->gamer  = $gamer;
		$outcome      = array();

		foreach($this->results as $s => $winner)
		{
			debug('Shoe ['.($s+1).'] start');
			$shoe      = new Shoe($winner);
			$win       = (bool) $shoe->winner == $gamer->position;
			$depth     = $gamer->pattern->depth;
			$outcome []= new Outcome($win, $depth, $shoe->winner);

			debug('  Gamer ' . ($win ? 'wins' : 'loses'));

			$this->gamer->decide_move($shoe);
		}

		debug('End Game');

		return $outcome;
	}
}