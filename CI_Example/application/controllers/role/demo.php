<?php
class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'Demo controller - index action';
    }

    public function error()
    {
        echo 'Demo controller - error action';
    }
}