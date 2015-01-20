<?php
class Verify extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->_data['content'] = 'verify/login_view';
        $this->_data['title'] = 'Login page';
        $this->_data['message'] = '';

        if ($this->input->post('fsubmit')) {
            $username = (string) $this->input->post('fusername');
            $password = md5((string) $this->input->post('fpassword'));

            $this->load->model('Muser');
            $user = $this->Muser->checkLogin($username, $password);
            if (!$user) {
                $this->_data['message'] = 'Wrong username or password';
            } else {
                $session = array(
                    'username' => $user['username'],
                    'id' => $user['id'],
                    'level' => $user['level']
                );
                $this->session->set_userdata($session);
                $this->session->set_flashdata('flash_message', 'Login success');
                redirect(base_url().'admin/index');
            }
        }

        $this->load->view($this->_data['path'], $this->_data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        session_start();
        session_destroy();
        redirect(base_url(). 'admin/verify/login');
    }
}
