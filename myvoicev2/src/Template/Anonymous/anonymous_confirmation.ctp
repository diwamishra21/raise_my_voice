
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | My Voice</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>

    
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png')?></a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="container-fluid p-a-20 text-center m-t-30">
        <div class="col-md-6 col-md-offset-3">
            <p>Hello <strong>Anonymous User,</strong></p>
            <p class="text-justify">We see that you have chosen not to use the username and password provided to you.</p>
            <p class="text-justify">We’d like to assure you that any and all communication done through this site is strictly confidential and your appeal will be reviewed by a panel of third party individuals not related to any employee at your place of work.</p>
            <p class="text-justify">If you still wish to remain anonymous, you may continue as a guest user, or sign in using your employee username and password.</p>
            <hr/>




<div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group margin-bottom-30">
                        <?php $url= $this->Url->build(['controller' => 'Users', 'action' => 'login']);?>
                <a href="<?= $url ?>" class="btn btn-default p-a-10">Sign In</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group margin-bottom-30">
<?php $url2= $this->Url->build(['controller' => 'Users', 'action' => 'signup']);?>
                <a href="<?= $url2 ?>" class="btn btn-default p-a-10">Sign Up</a>
                        
                    </div>
                </div>
            </div>
         


            <div class="form-control" style="border:none;">
			<?php $url3= $this->Url->build(['controller' => 'Anonymous', 'action' => 'anonymousConcern']);?>
                <a href="<?= $url3 ?>" class="btn btn-dark p-a-10">Stay Anonymous</a>
            </div>
        </div>
    </div>


</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>
</body>
</html>
