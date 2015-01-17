<?php
class Product extends CI_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->data['left_menu'] = 'Left menu';
    }

    public function index()
    {
        $this->data['info'] = array(
            'id' =>10,
            'name' => 'PHP Framework',
            'author' => 'Kenny',
            'website' => 'google.com'
        );

        $this->data['title'] = 'Index page';
        $this->data['content'] = 'product/index_view';
        $this->load->view('template', $this->data);
    }

    public function index2()
    {
        $this->data['info'] = array();
        $this->data['title'] = 'Index2 page';
        $this->data['content'] = 'product/index2_view';
        $this->load->view('template', $this->data);
    }
}