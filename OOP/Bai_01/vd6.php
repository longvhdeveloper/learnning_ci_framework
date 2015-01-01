<?php
class ABC
{
	public $name = 'ABCD';
	public function test()
	{
		return $this->name;
	}
}

$a = new ABC();
echo $a->test() . '<br/>';
echo $a->name . '<br/>';