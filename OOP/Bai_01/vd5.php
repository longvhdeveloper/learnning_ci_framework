<?php
class ABC
{
    public $name = 'jackie';
    final public function test()
    {
        echo $this->name;
    }
}

class BCD extends ABC
{
    public $job = 'developer';
    public function test()
    {
        parent::test();
        echo $this->job;
    }
}

$a = new BCD();
$a->test();
