<?php

define('START',   microtime(true));
define('DEBUG',   isset($_GET['debug']));

require 'functions.php';
require 'shoe.php';
require 'player.php';
require 'banker.php';
require 'table.php';
require 'game.php';
require 'outcome.php';
require 'pattern.php';
require 'gamer.php';


$games = array(
	'0000111101010010110101000000101001110010010010010011100101101100011001101001011',
	'1001010101011101001010100101001011110010010010010011100101101100011001111011010',
	'1001010100101010010010101010010010101001001011101111100101101100011001100110011',
	'1010010100101010011111100100100100000010101001001110110110110100011001000110010',
	'0010101001010100010111110010101000110101001010111010100101011010100100100110011',
);

$pattern = new Pattern('01101001');
$gamer   = new Gamer($pattern);
$data    = array();

foreach($games as $g)
{
	$game   = new Game('');
	$data []= $game->restart($g)->setup($gamer)->play();
}

var_dump(json_encode($data));

die('page rendered in: ' . (microtime(true) - START));