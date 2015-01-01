<?php
class ABC
{
    public function __construct()
    {
        echo 'Hello <br/>';
    }

    public function __destruct()
    {
        echo 'Good bye <br/>';
    }

    public function test()
    {
        echo 'test <br />';
    }
}

echo 'begin <br/>';
$a = new ABC();
$a->test();
echo '123<br/>';
