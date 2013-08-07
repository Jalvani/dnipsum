<?php


$language = $_POST["lan"];
$length = $_POST["length"];


$array = [
	"latin" => [
	"",
	"HoneyBooBoo.",
	"Best television!",	
	"Adverts are cool.",
	"Whatever happened to chipmonks?",
	"Mythbusters is new on TV.",
	"Ice in the arctic is dangerous.",
	"Watch TLC, everyone does it now. Yes!",
	"I find life satisfying in every way always.",
	"Telly, eh. Sit down with a bag of potato chips.",
	"Follow the staff and totally strange merchandise of the store.",
	],
	"cyrillic" => [
	"",
	"HoneyBooBoo.",
	"Лучший телевизионный!",
	"Объявления это круто.",
	"Что случилось с Chipmonks?",
	"Разрушители мифов является новым по телевизору.",
	"Лед в Арктике опасно.",
	"Часы TLC, каждый делает это сейчас. Да!",
	"Я считаю, удовлетворяющей жизни во всех отношениях всегда.",
	"Телли, да. Сядьте с пакетик картофельных чипсов.",
	"Следуй за персонал и очень странно товаров из магазина.",
	],
	"sinotibetan" => 
	["",
	"HoneyBooBoo",
	"最好的電視！",
	"廣告是冷的。",
	"無論發生到chipmonks？",
	"流言終結者是新的電視節目。",
	"在北極的冰是危險的。",
	"手錶TLC，每個人都沒有，現在是！",
	"我覺得生活總是在各方面都滿足。",
	"泰利，誒。坐下來一包薯片。",
	"按照工作人員和完全陌生的商品的商店。",],
	];

$stack = [];

$recursearray = (recurse($length, $stack));

echo (sentence_return($recursearray,$array,$language));


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



function sentence_return($numbers, $sentences, $lan) {
	$string = "";
	$incrementer = 0;

	foreach ($numbers as $value) {
		$string.=$sentences[$lan][$value]." ";
		$incrementer +=1;
	
	if ($incrementer % 15 === 0)
		{$string.="</br></br>";}
	}
	return $string;
}


