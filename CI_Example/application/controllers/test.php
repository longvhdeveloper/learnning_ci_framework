<?php
class Test extends CI_Controller
{
    public function __cosntruct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'name' => 'Jackie',
            'email' => 'vohoanglong07@gmail.com',
            'website' => 'yeuflamenco.com'
        );

        $this->load->library('Zend');
        $this->zend->load('Zend_Json');
        $str = $this->Zend_Json->encode($data);
        echo $str;

        $data2 = $this->Zend_Json->decode($str);
        echo '<pre>';
        print_r($data2);
        echo '</pre>';
    }
}