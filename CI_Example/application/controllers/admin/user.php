<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('Muser');

        $config['base_url'] = base_url() . 'index.php/admin/user/index';
        $config['total_rows'] = $this->Muser->countAll();
        $config['per_page'] = 3;
        //set start to get parameter from uri
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = true;

        $this->load->library('pagination', $config);

        $start = $this->uri->segment(4);
        $data['users'] = $this->Muser->listUser2($config['per_page'], $start);

        $this->load->view('admin/user/index_view', $data);
    }
}