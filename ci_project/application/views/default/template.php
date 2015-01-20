<?php
$this->load->view($module . '/top');
$this->load->view($module . '/menu');
$this->load->view($module . '/' . $content);
$this->load->view($module . '/bottom');
?>