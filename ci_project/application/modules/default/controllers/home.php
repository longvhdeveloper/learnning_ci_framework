<?php
class Home extends MainController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_data['title'] = 'Home page';
        $this->_data['content'] = 'home/index_view';
        $this->load->view($this->_data['path'], $this->_data);
    }
}