<?php
class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->load->database();
        //$this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[6]|callback_checkUser');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[6]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('form/index_view');
        }
    }

    public function index2()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Book name', 'required|min_length[6]');
        $this->form_validation->set_rules('fisbn', 'ISBN', 'required|max_length[11]|callback_checkISBN');
        $this->form_validation->set_rules('fprice', 'Book Price', 'required|number');

        if ($this->form_validation->run() == false) {
            $this->load->view('form/index2_view');
        }
    }

    public function checkUser($username)
    {
        $this->load->model('mUser');
        if ($this->mUser->checkUsername($username) == false) {
            $this->form_validation->set_message('checkUser', 'Your username is exist');
            return false;
        } else {
            return true;
        }
    }

    public function checkISBN($isbn)
    {
        $this->load->model('mBook');
        if ($this->mBook->checkISBN($isbn) == false) {
            $this->form_validation->set_message('checkISBN','ISBN is exist , please try again !');
            return false;
        } else {
            return true;
        }
    }
}