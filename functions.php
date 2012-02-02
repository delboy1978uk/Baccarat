<?php

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