<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?php echo $this->Html->image('logo.png')?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a class="smooth-scroll" href="#reports">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a class="smooth-scroll" href="#statistics">Registered Complaints</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a class="smooth-scroll" href="#messages">Accusations</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="#">E-Learning</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="#">+ Register Complaint</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<?php 
                $session = $this->request->session();
                $session_data =  $session->read();
                $user_name = $session_data["Auth"]["User"]["name"];
 $user_id = $session_data["Auth"]["User"]["id"];
                ?>
 <?php echo $user_name ;?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
 <?php $change_password= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$user_id]);?>
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