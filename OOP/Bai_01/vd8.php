<?php
class ABC
{
	public $ab = '1000';
}

$a = new ABC();
$b = clone $a;

$b->ab = '500';

echo $a->ab . '<br/>';