<?php
class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('url');
    }
    
    public function  insert()
    {
        $product = array(
            'id' => 1,
            'name' => 'PHP Basic',
            'qty' => 1,
            'price' => 100,
            'options' => array('author' => 'JS James')
        );
        
        $this->cart->insert($product);
        
        echo 'done';
    }
    
    public function show()
    {
        $data = $this->cart->contents();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    public function update()
    {
        $rowid  = '785aad02ed64cc6945946e84129036f2';
        $data = array(
            'rowid' => $rowid,
            'qty' => 5
        ); 
        
        $this->cart->update($data);
        echo 'done';
    }
}