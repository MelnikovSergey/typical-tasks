<?php

require __DIR__ . '/vendor/autoload.php';


$DB = new app\Models\DB();

try {
	$DB->connect();
} 

catch(Exception $e) {
	echo $e->getMessage();
}