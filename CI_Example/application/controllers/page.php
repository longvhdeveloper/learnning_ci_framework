<?php
class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('Muser');
        $config['total_rows'] = $this->Muser->countAll();
        $config['base_url'] = base_url() . 'index.php/page/index';
        $config['per_page'] = 3;
        $config['num_link'] = 2;
        //$config['use_page_numbers'] = true;

        $this->load->library('pagination', $config);
        //get parameter form url == $_GET
        $start = $this->uri->segment(3);

        $data['data'] = $this->Muser->listUser2($config['per_page'], $start);

        $this->load->view('page/index_view', $data);
    }
}
