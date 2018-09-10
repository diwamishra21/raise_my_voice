<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Records | Supervisor</title>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>
        <?php $url= $this->Url->build(['controller' => 'Hrs', 'action' => 'dashboard']);?>
    <?php $url1= $this->Url->build(['controller' => 'Hrs', 'action' => 'statics']);?>
    <?php $url2= $this->Url->build(['controller' => 'Hrs', 'action' => 'reports']);?>
    <?php $url3= $this->Url->build(['controller' => 'Hrs', 'action' => 'employee_records']);?>
    <?php $url4= $this->Url->build(['controller' => 'Hrs', 'action' => 'profile']);?>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url ?>">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url1 ?>">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url2 ?>">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url3 ?>">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url4 ?>">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"> Kiritika Jain<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="change-password.html">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                <ul>
                    <li><a href="<?= $url ?>">Dashboard</a></li>
                    <li><a href="<?= $url1 ?>">Statistics</a></li>
                    <li><a href="<?= $url2 ?>">Reports</a></li>
                    <li class="active"><a href="<?= $url3 ?>">Employee Records</a></li>
                    <li><a href="<?= $url4 ?>">Profile</a></li>
                </ul>

                <div class="company-logo">
                    <div class="p-b-10">
                        <small class="text-muted">Developed By</small>
                    </div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid" id="concern-form">
                <div class="concern-form-section active">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Employee Records</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_name">Name</label>
                                    <input type="text" id="subject_name" name="subject_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Contact Number</label>
                                    <input type="text" id="number" name="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">City</label>
                                    <input type="text" id="subject_city" name="subject_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Business Unit</label>
                                    <input type="text" id="other_Business_Unit" name="other_Business_Unit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Work_Location">Work Location</label>
                                    <input type="text" id="other_Work_Location" name="other_Work_Location" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Employee_Id">Employee Id</label>
                                    <input type="text" id="other_Employee_Id" name="other_Employee_Id" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Job_Title">Job Title</label>
                                    <input type="text" id="other_Job_Title" name="other_Job_Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Email_Id">Email Id</label>
                                    <input type="text" id="other_Email_Id" name="other_Email_Id" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <a href="employee-records-search.html" class="btn btn-dark p-a-10" id="btn-proceed"><i class="fa fa-search p-r-10"></i> Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>


</body>
</html>