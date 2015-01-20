<?php
class Index extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_data['content'] = 'index/index_view';
        $this->_data['title'] = 'Admin area &raquo; Dashboard';
        // $this->_data['message'] = $this->session->flashdata('flash_message');
        $this->load->view($this->_data['path'], $this->_data);
    }
}