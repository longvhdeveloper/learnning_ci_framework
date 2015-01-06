<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'title' => 'CodeIgniter Framework',
            'author' => 'N/A'
        );
        $data['data_info'] = array(
            'name' => 'Jackie',
            'level' => 2,
            'email' => 'vohoanglong07@gmail.com',
            'website' => 'google.com'
        );
        $this->load->view('index_view', $data);
    }

    public function demo()
    {
        echo '<h1>Demo</h1>';
    }

    public function data($id)
    {
        echo 'data : ' . $id;
    }

    public function index2()
    {
        $data['title'] = 'Hello CI view';
        $this->load->view('home/index_view.php', $data);
    }
}