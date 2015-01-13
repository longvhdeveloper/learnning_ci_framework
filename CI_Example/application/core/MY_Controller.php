<?php
class MY_Controller extends CI_Controller
{
    protected $_leftmenu;
    
    public function __construct()
    {
        parent::__construct();
        $this->_leftmenu = 'Main menu';
    }
}