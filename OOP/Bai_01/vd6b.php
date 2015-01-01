<?php
class ABC
{
	static $name = 'ABCD';
	public function test()
	{
		return self::$name;
	}
}

echo ABC::$name . '<br/>';