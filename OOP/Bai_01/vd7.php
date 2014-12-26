<?php
class ABC
{
	const RED = 'Do';
	const BLUE = 'Xanh';
	
	public function test()
	{
		return self::RED;
	}
}

echo ABC::RED . '<br />';