<?php
class ABC
{
    public $name = 'Jackie';
    public function test() {
        return $this->name;
    }
}

$a = new ABC();
echo $a->test();
