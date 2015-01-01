<?php
class ABC
{
    public $abc = 'a';
    protected $bcd = 'b';
    private $cde = 'c';

    public function test()
    {
        echo $this->abc;
        echo $this->bcd;
        echo $this->cde;
    }
}

class BCD extends ABC
{
    public $def = 'd';
    public function test2()
    {
        $this->test();
        echo $this->def;
    }
}

$a = new BCD();
$a->test2();
