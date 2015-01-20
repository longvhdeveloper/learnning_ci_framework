<?php
class MainController extends MY_Controller
{
    protected $_data;
    public function __construct()
    {
        parent::__construct();
        //$this->_data['module'] = $this->uri->segment(1);
        $this->_data['module'] = $this->router->fetch_module();
        $this->_data['path'] = $this->_data['module'] . DIRECTORY_SEPARATOR .'template';

        $this->load->model('Mcategories');

        $this->load->library('menu');
        $this->menu->setOpen('<ul>');
        $this->menu->setClose('</ul>');
        $this->menu->setBaseurl(base_url().'default/news/viewcate');
        $this->menu->setData($this->Mcategories->listAll());
        $this->_data['menu'] = $this->menu->callMenu();
    }
}