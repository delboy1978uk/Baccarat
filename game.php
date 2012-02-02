<?php

class Game {

	protected $results  = array();
	protected $shoe     = 0;
	protected $length   = 0;
	protected $position = 0;
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
		
		return $this;
	}

	public function setup(Gamer $gamer)
	{
		debug('Start Game');
		$this->player === null and $this->player = Player::enter();
		$this->banker === null and $this->banker = Banker::enter();
		$this->gamer  = $gamer;
		debug('Pattern: ' . $gamer->pattern);
		
		return $this;
	}

	public function play()
	{
		$outcome = array();

		foreach($this->results as $s => $winner)
		{
			debug('Shoe ['.($s+1).'] start');
			$shoe      = new Shoe($winner);
			$win       = $shoe->winner == $this->gamer->position;
			$depth     = $this->gamer->pattern->depth;

			debug('  ' . ($shoe->winner === Table::PLAYER_SIDE ? 'Player' : 'Banker') . ' side wins');
			debug('  Gamer ' . ($win ? 'wins' : 'loses') . ' bet');

			$action    = $this->gamer->decide_move($shoe);
			$outcome []= new Outcome($win, $depth, $shoe->winner, $action);
		}

		debug('End Game');

		return $outcome;
	}
}