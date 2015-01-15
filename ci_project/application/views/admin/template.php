<?php $this->load->view($module.'/top'); ?>
<?php $this->load->view($module.'/menu'); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        <?php
        $this->load->view($module.DIRECTORY_SEPARATOR.$content);
        ?>
        </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /main-inner -->
</div>
<!-- /main -->
<?php $this->load->view($module.'/extra'); ?>
<?php $this->load->view($module.'/bottom'); ?>
