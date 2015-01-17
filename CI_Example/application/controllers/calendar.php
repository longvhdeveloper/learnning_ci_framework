<?php
class Calendar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index()
    {
        $config = array(
            'show_next_prev'  => TRUE,
            'next_prev_url'   => base_url(). 'index.php/calendar/index/'
        );
        $this->load->library('calendar', $config);
        //echo $this->calendar->generate(2009, 07);
        $year = $this->uri->segment(3);
        $month = $this->uri->segment(4);
        $event = array(
            (int)'05' => base_url(). 'index.php/calendar/show/1',
            '15' => base_url(). 'index.php/calendar/show/2',
            '25' => base_url(). 'index.php/calendar/show/3'
        );
        echo $this->calendar->generate($year, $month, $event);
    }
    
    public function show()
    {
        $id = $this->uri->segment(3);
        if ($id == 1) {
            echo 'PHP day';
        } elseif ($id == 2) {
            echo 'Java day';
        } else {
            echo 'Ext day';
        }
    }
}