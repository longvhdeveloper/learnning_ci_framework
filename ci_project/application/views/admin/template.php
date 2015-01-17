<?php $this->load->view($module.'/top'); ?>
<?php $this->load->view($module.'/menu'); ?>
<?php
$this->load->view($module.DIRECTORY_SEPARATOR.$content);
?>
<!-- /main -->
<?php $this->load->view($module.'/extra'); ?>
<?php $this->load->view($module.'/bottom'); ?>
