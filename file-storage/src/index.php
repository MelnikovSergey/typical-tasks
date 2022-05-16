<?php

require_once('FileStorage.php');

$fs1 = new FileStorage('cache');
$fs2 = new FileStorage('user_cache');

$fs1->set('test','Test storage');
$fs1->set('test/second***','Test storage!!!');
$fs1->set('***level***','Test update storage');

echo $fs1->has('test');
echo $fs1->has('noname');

$fs1->get('test');

var_dump($fs1->get('test'));
var_dump($fs1->get('test/second***'));
var_dump($fs1->get('***level***'));

$fs1->delete('test');





