<?php
class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('cart');
    }
    
    public function index()
    {
        $this->load->model('Mbook');
        $data['books'] = $this->Mbook->listAll();
        $this->load->view('book/list_view', $data);
    }
    
    public function insert()
    {
        $id = $this->uri->segment(3);
        $this->load->model('Mbook');
        $book = $this->Mbook->getBookById($id);
        
        $cart = $this->cart->contents();
        $qty = 1;
        foreach ($cart as $item) {
            if ($item['id'] == $book['id']) {
                $qty = $item['qty'] +1;
                break;
            }
        }
        
        $shop = array(
            'id' => $book['id'],
            'name' => $book['name'],
            'qty' => $qty,
            'price' => $book['price']
        );
        
        $this->cart->insert($shop);
        redirect(base_url() . 'index.php/book/viewcart');
    }
    
    public function viewcart()
    {
        $data['shop'] = $this->cart->contents();
        
        $this->load->view('book/cart_view',$data);
    }
    
    public function destroy()
    {
        $this->cart->destroy();
    }
    
    public function update()
    {
        for($i = 1; $i <= $this->cart->total_items(); $i++) {
            $data = $this->input->post($i);
            $this->cart->update($data);
        }
        
        redirect(base_url() . 'index.php/book/viewcart');
    }
    
    public function deleteone()
    {
        $id = $this->uri->segment(3);
        $shop = $this->cart->contents();
        
        foreach($shop as $item) {
            if ($item['id'] == $id) {
                $data['rowid'] = $item['rowid'];
                $data['qty'] = 0;
                $this->cart->update($data);
                break;
            }
        }
        
        redirect(base_url() . 'index.php/book/viewcart');
    }
}