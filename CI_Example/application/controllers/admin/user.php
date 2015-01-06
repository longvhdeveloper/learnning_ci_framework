<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'dir :admin, controller: user, action:index';
    }
}