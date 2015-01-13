<?php
class Multiupload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
    {
        $data['error'] = '';
        $this->load->view('multi_upload/index_view', $data);
    }
    
    public function upload()
    {
        if ($this->input->post('fsubmit')) {
            $number = (int)$this->input->post('fnumber');
            
            if ($number <= 0) {
                $data['error'] = 'So luong hinh khong hop le';
                $this->load->view('multi_upload/index_view', $data);
            } else {
                $data['number'] = $number;
                $this->load->view('multi_upload/upload_view', $data);
            }
        }
    }
    
    public function doupload()
    {
        if ($this->input->post('fsubmit')) {
            $config = array();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '900';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            
            $this->load->library('upload', $config);
            
            $number = $this->input->post('number');
            $count = 0;
            for ($i = 0; $i < $number; $i++) {
                if ($this->upload->do_upload('fimage' . $i)) {
                    $data = $this->upload->data();
                    echo '<pre>';
                    print_r($data);
                    echo '</pre>';
                    $count++;
                }
            }

           
            
            echo 'So luong hinh upload la :' . $count . '<br/>';
            
            if ($count == 0) {
                echo $this->upload->display_errors();
            }
            
        }
    }
}