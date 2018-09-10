<?php
ob_start();
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;?>
 <?php echo $this->element('header-backend'); ?>
  <?php echo $this->element('header-top-backend'); ?>
 
 <div class="container-fluid margin-top-60">
    <div class="row">
 <?php echo $this->fetch('content'); ?>
 
 </div>
 </div>
 
 <?php echo $this->element('footer'); ?>