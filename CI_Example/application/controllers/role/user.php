<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'User controller - index action';
    }

    public function add()
    {
        echo 'User controller - add action';
    }

    public function edit()
    {
        echo 'User controller - edit action';
    }

    public function delete()
    {
        echo 'User controller - delete action';
    }
}