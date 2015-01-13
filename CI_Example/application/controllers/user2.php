<?php
class User2 extends CI_Controller
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
        $this->load->view('user2/index_view', $this->data);
    }

    public function add()
    {
        $this->data['action'] = 'add';
        $this->load->view('user2/add_view', $this->data);
    }

    public function edit()
    {
        $this->data['action'] = 'edit';
        $this->load->view('user2/edit_view', $this->data);
    }

    public function delete()
    {
        $this->data['action'] = 'delete';
        $this->load->view('user2/delete_view', $this->data);
    }
}