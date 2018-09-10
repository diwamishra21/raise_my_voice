<body>
<?php foreach ($user_deatil as $user_deatils): 
    endforeach; ?>
 <?php $registerConcern= $this->Url->build(['controller' => 'Users', 'action' => 'registerConcern',$user_deatils->id]);?>
 
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"> <?php echo $this->Html->image('logo.png')?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="#">Profile</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="#">Registered Complaint</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="#">Accusations</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="#">E-Learning</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="<?= $registerConcern?>">+ Register Complaint</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, 
                             <?= h($user_deatils->name) ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php $change_password= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$user_deatils->id ]);?>
                        <li><a href="<?= $change_password;?>">Change Password</a></li>
                        <li role="separator" class="divider"></li>
<?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>

                        <li><a href="<?= $logout; ?>">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>