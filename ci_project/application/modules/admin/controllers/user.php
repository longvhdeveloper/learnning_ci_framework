<?php
class User extends AdminController
{
    public function ___construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Muser');
        $config['base_url'] = base_url() . 'admin/user/index';
        $config['total_rows'] = $this->Muser->countAll();
        $config['per_page'] = 3;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;

        $this->load->library('pagination', $config);
        $this->_data['page_link'] = $this->pagination->create_links();

        $start = (int) $this->uri->segment(4);
        $start = ($start == 0) ? $start : ($start - 1) * $config['per_page'];
        $this->_data['users'] = $this->Muser->getUsers($config['per_page'], $start);
        $this->_data['content'] = 'user/index_view';
        $this->_data['title'] = 'Admin area &raquo; User';
        $this->_data['message'] = $this->session->flashdata('flash_message');
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function add()
    {

        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;

        $this->form_validation->set_rules('fusername', 'Username', 'required|min_length[4]|callback_checkUser');
        $this->form_validation->set_rules('fpassword', 'Password', 'required|matches[fpassword2]');
        $this->form_validation->set_rules('femail', 'Email', 'required|valid_email|callback_checkEmail');

        if ($this->form_validation->run()) {
            $data = array(
                'username' => $this->input->post('fusername'),
                'password' => $this->input->post('fpassword'),
                'email' => $this->input->post('femail'),
                'level' => $this->input->post('flevel'),
                'datecreated' => time(),
                'datemodified' => 0
            );

            $this->load->model('Muser');
            $this->Muser->addUser($data);
            $this->session->set_flashdata('flash_message', 'Add user info sucess');
            redirect(base_url() . 'admin/user/index');
        } else {
            $this->_data['content'] = 'user/add_view';
            $this->_data['title'] = 'Admin area &raquo Add user';
            $this->load->view($this->_data['path'], $this->_data);
        }
    }

    public function checkUser($user)
    {
        $this->load->model('Muser');
        $id = (int)$this->uri->segment(4);
        if (!$this->Muser->checkUser($user, $id)) {
            $this->form_validation->set_message('checkUser', 'You username is exist');
            return false;
        } else {
            return true;
        }
    }

    public function checkEmail($email)
    {
        $this->load->model('Muser');
        $id = (int)$this->uri->segment(4);
        if (!$this->Muser->checkEmail($email, $id)) {
            $this->form_validation->set_message('checkEmail', 'Your email is exist');
            return false;
        } else {
            return true;
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->load->model('Muser');
        $this->Muser->deleteUser($id);

        $this->session->set_flashdata('flash_message', 'User has been deleted');
        redirect(base_url() . 'admin/user/index');
    }

    public function edit()
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;

        $id = $this->uri->segment(4);

        $this->load->model('Muser');
        $this->_data['user'] = $this->Muser->getUser($id);

        $this->form_validation->set_rules('fusername', 'Username', 'required|min_length[4]|callback_checkUser');
        $this->form_validation->set_rules('fpassword', 'Password', 'matches[fpassword2]');
        $this->form_validation->set_rules('femail', 'Email', 'required|valid_email|callback_checkEmail');

        if ($this->form_validation->run()) {
            $data = array(
                'username' => $this->input->post('fusername'),
                'level' => $this->input->post('flevel'),
                'email' => $this->input->post('femail'),
            );

            if ($this->input->post('fpassword') != '') {
                $data['password'] = $this->input->post('fpassword');
            }

            $this->Muser->updateUser($data, $id);

            $this->session->set_flashdata('flash_message', 'Edit user info sucess');
            redirect(base_url() . 'admin/user/index');
        }

        $this->_data['content'] = 'user/edit_view';
        $this->_data['title'] = 'Admin area &raquo Edit user';
        $this->load->view($this->_data['path'], $this->_data);
    }
}