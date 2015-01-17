<?php
class Kiemtra extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        echo 'Kiem tra controller - Index action';
        $config = array(
            'title' => 'test lib'
        );
        $this->load->library('Myclass', $config);
        $this->myclass->test();
        
        echo $this->_leftmenu;
    }
}