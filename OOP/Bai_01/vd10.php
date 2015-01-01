<?php
function __autoload($url)
{
	require $url . '.php';
}

$a = new ABC();
$a->test();