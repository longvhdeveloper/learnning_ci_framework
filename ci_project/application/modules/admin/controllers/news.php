<?php
class News extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $_SESSION['KCFINDER']['disabled'] = false;
    }

    public function index()
    {

    }

    public function add()
    {
        $this->load->helper('menu');
        $this->load->model('Mcategories');
        $this->_data['categories'] = $this->Mcategories->listAll();

        $this->_data['content'] = 'News/add_view';
        $this->_data['title'] = 'Admin area &raquo Add news';
        $this->load->view($this->_data['path'], $this->_data);
    }
}