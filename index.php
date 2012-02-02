<?php

define('DEBUG', true);

require 'shoe.php';
require 'player.php';
require 'banker.php';
require 'table.php';
require 'game.php';
require 'outcome.php';
require 'pattern.php';
require 'gamer.php';

function debug($message)
{
	echo DEBUG ? "<pre>$message</pre>" : '';
}

function side($outcome)
{
	return $outcome->side === Table::PLAYER_SIDE
		? Player::$name
		: Banker::$name;
}

function gamer($outcome)
{
	return (string) $outcome;
}

$pattern = new Pattern('01101001');
$gamer   = new Gamer($pattern);
$game    = new Game('0100101011010010010101000000101001110010010010010011100101101100011001111110011');

$end = $game->play($gamer);

foreach($end as $k => $o)
{
	//echo side($o) . ' Side Wins: Gamer ' . gamer($o) . '<br>';
}