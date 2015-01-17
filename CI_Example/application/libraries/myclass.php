<?php
class Myclass
{
    public function __construct($param)
    {
        echo $param['title'];
    }
    public function test() 
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        echo base_url();        
    }
}