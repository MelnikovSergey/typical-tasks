<?php header("Content-Type: text/html; charset=utf-8"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php

function synth_text() {
	$arr = func_get_args();
	$index = array_rand($arr, 1);
	echo $arr[$index];
}
