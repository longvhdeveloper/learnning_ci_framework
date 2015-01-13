<?php
class Session extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'id' => 1,
            'username' => 'longheartfree',
            'email' => 'vohoanglong07@gmail.com',
            'level' => '2'
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('flash_created', 'Tao phien lam viec thanh cong');
        redirect(base_url(). 'index.php/session/index2');
    }

    public function index2()
    {
        echo $this->session->flashdata('flash_created');
        $user = $this->session->userdata('username');
        $level = $this->session->userdata('level');
        $email = $this->session->userdata('email');

        echo "username : $user, emai: $email, level: $level";

        $dataAll = $this->session->all_userdata();
        echo '<pre>';
        print_r($dataAll);
        echo '</pre>';

    }

    public function index3()
    {
        $this->session->sess_destroy();
        echo 'Done';
    }
}