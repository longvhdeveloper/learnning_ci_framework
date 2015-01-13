<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Muser');
        $this->output->cache(3);
        $data['users'] = $this->Muser->listUsers();
        $this->load->view('user/index_view', $data);
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('Muser');

        $config['base_url'] = base_url() . 'index.php/user/view/';
        $config['total_rows'] = $this->Muser->countAll();
        $config['per_page'] = 5;

        $this->load->library('pagination', $config);

        //get parameter form url == $_GET
        $start = $this->uri->segment(3);

        $data['users'] = $this->Muser->listUser2($config['per_page'], $start);


        $this->load->view('user/list_view', $data);
    }

    public function login()
    {
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Muser');

        $data = array();

        $this->form_validation->set_rules('fusername', 'Username', 'required');
        $this->form_validation->set_rules('fpassword', 'Password', 'required');
        $pass = true;

        if ($this->form_validation->run() == false) {
            $pass = false;
        } else {
            if ($this->input->post('fsubmit')) {
                $username = (string)$this->input->post('fusername');
                $password = (string)$this->input->post('fpassword');

                $user = $this->Muser->getUser($username);

                if (!empty($user)) {
                    if ($user['password'] != $password) {
                        $pass = false;
                        $data['errors'] = 'Username or password not correct.';
                    }
                } else {
                    $pass = false;
                }
            }
        }
        if ($pass) {
             $data = array(
                'id' => $user['user_id'],
                'username' => $user['username'],
                'level' => $user['level']
            );
            $this->session->set_userdata($data);
            redirect(base_url() . 'index.php/user/profile');
        } else {
           $this->load->view('user/login_view', $data);
        }
    }

    public function profile()
    {
        $data = array();
        $this->load->library('session');
        $this->load->helper('url');

        if ($this->session->userdata('id') > 0) {
            $data['user']['username'] = $this->session->userdata('username');

            $this->load->view('user/profile_view', $data);
        } else {
            $this->session->set_flashdata('flash_login', 'Please login to user this function');
            redirect(base_url() . 'index.php/user/login');
        }
    }

    public function logout()
    {
        $this->load->library('session');
        $this->load->helper('url');

        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/user/login');
    }

    public function index10()
    {
        $id = $this->uri->segment(3);
        echo $id;
    }
}
