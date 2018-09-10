<?php
$title = "Dashboard | My Voice";
$name = "";
if (!empty($title_for_layout)) {
    $title = $title_for_layout;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title; ?></title>
        <!-- Bootstrap -->
        <?php
        echo $this->Html->css(['bootstrap', 'style']);
        ?>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <![endif]-->
        <script>
<?php echo 'var webroot ="' . $this->Url->build('/') . '"'; ?>
        </script>    
    </head>
    <?php echo $this->element('header-top-backend'); ?>
    <div class="container-fluid margin-top-60 margin-bottom-30">
        <div class="row">
            <?=$this->element('sidebar');?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>
    <?php echo $this->element('myvoice/footer'); ?>