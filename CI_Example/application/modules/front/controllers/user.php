<?php
class User extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'Module : front - controller : user - action : index<br/>';
        $test = 'Test Menu';
        echo modules::run('menu/left/index', $test);
    }
}