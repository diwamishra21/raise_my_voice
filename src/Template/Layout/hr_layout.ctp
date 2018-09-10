<?php
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;
?>
<?php echo $this->element('header'); ?>
<?php echo $this->element('top_header'); ?>
<div class="container-fluid margin-top-60">
	<div class="row">
	<?php echo $this->element('hr_sidebar'); ?>
	<?php echo $this->fetch('content'); ?>
	</div>
</div>

<?php echo $this->element('footer'); ?>