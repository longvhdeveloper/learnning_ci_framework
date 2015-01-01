<?php
abstract class Animal
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
	
	abstract function sound();
	abstract function leg();
}

class Dog extends Animal
{
	public function sound()
	{
		echo 'gau gau<br/>';
	}
	
	public function leg()
	{
		echo '4 leg<br/>';
	}
}

class Chicken extends Animal
{
	public function sound()
	{
		echo 'cuc tac<br/>';
	}
	
	public function leg()
	{
		echo '2 leg<br/>';
	}
}

$a = new Dog();
$a->setName('Lucky');

echo $a->getName() . '<br/>';
$a->sound();
$a->leg();

echo '<hr/>';
$b = new Chicken();
$b->setName('Chip chip');
echo $b->getName() . '<br/>';
$b->sound();
$b->leg();