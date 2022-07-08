<?php

require __DIR__ . '/vendor/autoload.php';


$DB = new app\Models\DB();

try {
	# $DB->connect();
	# $result = $DB->insert('test', ['title' => 'title test', 'date' => time()]);
	$result = $DB->update('test', ['title' => 'update title', 'date' => time()], 'id = 2');
} 

catch(Exception $e) {
	echo $e->getMessage();
}