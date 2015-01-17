<?php
class User extends MX_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->data['content'] = 'user/index_view';
        $this->data['title'] = 'User page';
        $this->load->view('template', $this->data);
    }
}