<?php


$language = $_POST["lan"];
$length = $_POST["length"];


$array = [
	"latin" => [
	"HoneyBooBoo -",
	"Best television!",	
	"Adverts are cool.",
	"Whatever happened to chipmonks?",
	"Mythbusters is new on TV",
	"Ice in the arctic is dangerous",
	"Watch TLC, everyone does it now yes.",
	"I find life satisfying in every way always",
	"telly, eh. Sit down with a bag of potato chips",
	"This is number 9",
	],
	"cyrillic" =>
	[],
	"asian" => 
	[]
	];

$stack = [];

$recursearray = (recurse($length, $stack));

echo (sentence_return($recursearray,$array));


function recurse($len, $stack)
	{
		if ($len > 9)
		{
			$len -= $random = (rand(0,9));
			array_push($stack, $random);
			return recurse($len, $stack);
		}
		else
		{ 	
			array_push($stack, $len);
			return $stack;
		}
	}



function sentence_return($numbers, $sentences) {
	$string = "";
	$incremeter = 0;

	if (incrementer = 10)
		{
		foreach ($numbers as $value) {
		$string.=$sentences["latin"][$value]." ";
		$incrementer +=1;
		}
	return $string;
}


