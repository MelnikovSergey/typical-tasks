<?php

# https://api.telegram.org/bot�����/setwebhook?url=URL
# https://www.domain.ru/project/telegram_bot/index.php


# ��������� ������
$data = json_decode(file_get_contents('php://input'), TRUE);
file_put_contents(__DIR__ . 'logs.txt', '$data: ' . print_r($data, 1)."\n", FILE_APPEND);

# �����
$token = '...';

# ������������ �������
$message = $data['message']['text'];

# ��������� ������ ��� �������� � ��������
$params = [
	'chat_id' => $data['message']['chat']['id'],
	'text' => $message
];

# ���������� ������ � ��������
file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($params));