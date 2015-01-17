<?php
class User extends MX_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['content'] = 'user/index_view';
        $this->data['title'] = 'User - Backend';
        $this->load->view('template', $this->data);
    }
}