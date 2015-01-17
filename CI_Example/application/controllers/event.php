<?php
class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $config = array(
            'show_next_prev'  => TRUE,
            'next_prev_url'   => base_url().'index.php/event/index'
        );
        $this->load->library('calendar', $config);
    }
    
    public function index()
    {
        $data = array();
        $this->load->model('Mevent');
        $data['year'] = $this->uri->segment(3);
        $data['month'] = $this->uri->segment(4);
        if ($data['year'] == '' && $data['month'] == '') {
            $data['year'] = date('Y');
            $data['month'] = date('m');
        }
        $data['events'] = $this->Mevent->getEvents($data['year'], $data['month']);

        
        $this->load->view('event/index_view', $data);
    }
    
    public function show()
    {
        $data = array();
        $id = (int)$this->uri->segment(3);
        $this->load->model('Mevent');  
              
        $data['event'] = $this->Mevent->getEvent($id);
        
        $this->load->view('event/show_view', $data);
    }
    
    public function add()
    {
        $data = array();
        
        if ($this->input->post('fsubmit')) {
            $this->load->model('Mevent');
            $date = $this->input->post('fdate');
            $info = $this->input->post('finfo');
            $event = array(
                'date' => $date,
                'info'=> $info
            );
            if ($this->Mevent->checkEvent($date)) {
                $this->Mevent->addEvent($event);
                redirect(base_url().'index.php/event/index');
            } else {
                $data['error'] = 'Ngay nay da co su kien';
            }
        }
        
        $this->load->view('event/add_view', $data);
    }
}