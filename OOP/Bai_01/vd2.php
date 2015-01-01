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
echo $a->getName();
