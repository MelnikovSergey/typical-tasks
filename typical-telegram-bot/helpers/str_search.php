<?php

# Алгоритм поиска наиболее подходящей строки

$search = "маркетплэйс";

$options = [
	"маркетинговая",
	"маркетинговые",
	"маркетолог",
	"маркетинг",
	"маркет",
	"супермаркет",
	"супер маркет",
	"маркетплейс",
	"маркет плейс",
	"маркет плэйс",
	"макет",	
	"маркер",
	"маркетплэйс",
	"макетплэйс"
];


/**
 * Вычисляет расстояние между двуми строками: минимальное кол-во символов для преобразования строки.  
 *
 * @param $string
 * @param $array
*/

function levinshtein($string, $array = []): array 
{

	$result = [];
	$closest = 'null';
	$key_str = 'null';

	# Крачтайшее расстояние не найдено
	$shortest_distance = -1;

	foreach($array as $key => $options_item) {

		echo $key . '<br>';
		echo $options_item . '<br>';
		
		# Вычисляем расстояние между входными данными и элементами массива
		$res = levinshtein($string, $options_item);

		# Проверка на точное совпадение
		if($res == 0) {
			$closest = $options_item;
			$key_str = $key;
			$shortest_distance = $res;
			break;
		}

		# Если расстояние менише ближайшего найденного $shortest_distance или если следующее кратчайшее не найдено
		if($res <= $shortest_distance || $shortest_distance < 0) {
			$closest = $options_item;
			$key_str = $key;
			$shortest_distance = $res;
		}
	}

	$result['shortest_distance'] = $shortest_distance;
	$result['search_string'] = $string;
	$result['string'] = [
		'string' => $closest,
		'id' => $key_str
	];

	return $result;

}


/**
 * Вычисляет процент схожести двух строк между собой.  
 *
 * @param $string
 * @param $array
*/

function similar_strings($string, $array = []): array 
{

	$result = [];
	$closest = 'null';
	$key_str = 'null';

	# Крачтайшее расстояние не найдено
	$similar_str = 0;

	foreach($array as $key => $options_item) {

		echo $key . '<br>';
		echo $options_item . '<br>';
		
		# Вычисляем расстояние между входными данными и элементами массива
		$res = levinshtein($string, $options_item);

		# Проверка на точное совпадение
		if($res == 0) {
			$closest = $options_item;
			$key_str = $key;
			$shortest_distance = $res;
			break;
		}

		# Если расстояние менише ближайшего найденного $shortest_distance или если следующее кратчайшее не найдено
		if($res <= $shortest_distance || $shortest_distance < 0) {
			$closest = $options_item;
			$key_str = $key;
			$shortest_distance = $res;
		}
	}

	$result['shortest_distance'] = $shortest_distance;
	$result['search_string'] = $string;
	$result['string'] = [
		'string' => $closest,
		'id' => $key_str
	];

	return $result;

}

$result = levinshtein($search, $options);

echo '<pre>';
print_r($result);
echo '</pre>';