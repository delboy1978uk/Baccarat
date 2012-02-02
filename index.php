<?php

require 'shoe.php';
require 'player.php';
require 'banker.php';
require 'table.php';
require 'game.php';
require 'outcome.php';
require 'pattern.php';
require 'gamer.php';

$pattern = new Pattern('01101001');
$gamer   = new Gamer($pattern);
$game    = new Game('0100101011010010010101000000101001110010010010010011100101101100011001111110011');

var_dump($game->play($gamer));