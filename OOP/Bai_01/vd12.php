<?php
interface Animal
{
	function sound();
	function leg();
		
}

interface Other
{
	function good();
}

class initialize
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

class Dog extends initialize implements Animal, Other
{
	public function sound()
	{
		echo 'gau gau<br/>';
	}

	public function leg()
	{
		echo '4 leg<br/>';
	}
	
	public function good()
	{
		echo 'Giu nha<br/>';
	}
}

class Mouse extends initialize implements Animal
{
	public function sound()
	{
		echo 'Chit chit<br/>';
	}
	
	public function leg()
	{
		echo '4 leg<br/>';
	}
}

$a = new Dog();
$a->setName(('Lu lu'));
echo $a->getName() . '<br/>';
$a->sound();
$a->leg();
$a->good();
echo '<hr/>';
$b = new Mouse();
$b->setName('Mickey');
echo $b->getName() . '<br/>';
$b->sound();
$b->leg();