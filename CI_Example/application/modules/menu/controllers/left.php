<?php
class Left extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id)
    {
        echo 'leflt';
        echo '<div>'.$id.'</div>';
    }
}