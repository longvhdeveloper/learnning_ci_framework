<?php
class ABC
{
	public $name;
	
	public function setName($ten)
	{
		$this->name = $ten;
	}
	
	public function getName()
	{
		return $this->name;
	}
}

$a = new ABC();
$a->setName('Jackie');

$b = clone $a;
$b->setName('Long');

echo $a->getName();