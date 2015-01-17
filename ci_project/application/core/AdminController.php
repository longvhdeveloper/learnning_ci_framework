<?php
class AdminController extends MY_Controller
{
    protected $_data;
    public function __construct()
    {
        parent::__construct();
        $this->_data['module'] = $this->uri->segment(1);
        $this->_data['path'] = $this->_data['module'] . DIRECTORY_SEPARATOR .'template';

        if ($this->session->userdata('level') != 2 && $this->uri->segment(2) != 'verify') {
            redirect(base_url().'admin/verify/login');
        }
    }
}