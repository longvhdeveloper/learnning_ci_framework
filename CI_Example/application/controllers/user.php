<?php
class User extends CI_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->data['controller'] = 'user';
    }

    public function index()
    {
        $this->data['action'] = 'index';
        $this->load->view('user/index_view', $this->data);
    }

    public function add()
    {
        $this->data['action'] = 'add';
        $this->load->view('user/add_view', $this->data);
    }

    public function edit()
    {
        $this->data['action'] = 'edit';
        $this->load->view('user/edit_view', $this->data);
    }

    public function delete()
    {
        $this->data['action'] = 'delete';
        $this->load->view('user/delete_view', $this->data);
    }
}