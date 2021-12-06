<?php

include_once 'config/db.php';
include_once 'libs/simple_html_dom.php';

# print_r($_SERVER);

# Получаем страницу
function curlGetPage($url, $referer = 'https://google.com') {

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozzila 5.0 и т.д.');
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $referer);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$response = curl_exec($ch);
	curl_close($ch);

	return $response;
}

# Тест
echo curlGetPage('https://www.domain.ru');

$page = curlGetPage('https://www.domain.ru');
$html = str_get_html($page);