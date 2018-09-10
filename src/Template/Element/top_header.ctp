<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?php echo $this->Html->image('logo.png'); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="dashboard.html">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="statistics.html">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="reports.html">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="employee-records.html">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="profile.html">Profile</a></li>
                <li class="dropdown">
                <?php 
                $session = $this->request->session();
                $session_data =  $session->read();
                $user_name = $session_data["Auth"]["User"]["name"];
 $userid = $session_data["Auth"]["User"]["id"];
                ?>
<?php $change_password= $this->Url->build(['controller' => 'Users', 'action' => 'userprofile']);?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $user_name ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       
 <?php $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$userid ]);?>
                        <li><a href="<?= $changepassword ?>">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>
                        <li><a href="<?= $logout; ?>">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>