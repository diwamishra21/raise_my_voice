<?php
ob_start();
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;?>
 <?php echo $this->element('header'); ?>

 <?php echo $this->element('left-sidebar'); ?>
 <div class="container-fluid margin-top-60">
    <div class="row">
 <?php echo $this->fetch('content'); ?>
 
 </div>
 </div>
 <?php echo $this->element('footer'); ?>
