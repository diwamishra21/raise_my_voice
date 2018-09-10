<?php
ob_start();

use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;
?>
<?php
$session = $this->request->session();
$session_data = $session->read();
$user_role = $session_data["Auth"]["User"]["role"];
?>
<?php echo $this->element('header-backend'); ?>
<?php echo $this->element('header-top-backend'); ?>
<div class="container-fluid margin-top-60">
    <div class="row">
        <?php
        if ($user_role === '1') {
            echo $this->element('admin_sidebar');
        } else {
            echo $this->element('sidebar');
        }
        ?>
        <?php echo $this->fetch('content'); ?>
    </div>
</div>

<?php echo $this->element('footer'); ?>