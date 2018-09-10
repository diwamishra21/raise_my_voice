<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports | Supervisor</title>
    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap-report.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />

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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>

         <?php $url= $this->Url->build(['controller' => 'Hrs', 'action' => 'dashboard']);?>
    <?php $url1= $this->Url->build(['controller' => 'Hrs', 'action' => 'statics']);?>
    <?php $url2= $this->Url->build(['controller' => 'Hrs', 'action' => 'reports']);?>
    <?php $url3= $this->Url->build(['controller' => 'Hrs', 'action' => 'employee_records']);?>
    <?php $url4= $this->Url->build(['controller' => 'Hrs', 'action' => 'profile']);?>
    <?php $url5= $this->Url->build(['controller' => 'Hrs', 'action' => 'complaintdetails']);?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url ?>">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url1 ?>">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url2 ?>">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url3 ?>">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url4 ?>">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Kiritika Jain<span class="caret"></span></a>
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
                    <li class="active"><a href="<?= $url2 ?>">Reports</a></li>
                    <li><a href="<?= $url3 ?>">Employee Records</a></li>
                    <li><a href="<?= $url4 ?>">Profile</a></li>
                </ul>

                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <div class="row">
                        <div class="col-xs-8">
                            <h2 class="panel-block-title">Reports</h2>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button class="btn btn-dark" data-toggle="modal" data-target="#downloadReport"><i class="fa fa-download"></i> Download Report</button>
                        </div>
                    </div>
                </div>
                <hr/>
                <table class="table table-striped" id="report_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Case ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Filed On</th>
                        <th>Filed By</th>
                        <th>Severity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>1233123</td>
                        <td>Harassment by John Doe</td>
                        <td>Harassment</td>
                        <td>01/05/2018</td>
                        <td>Anonymous</td>
                        <td>High</td>
                        <td><span class="label label-warning">On Going</span></td>
                        <td><a href="<?=$url5?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>9912312</td>
                        <td>Disciplinary action to be taken against Mr. James</td>
                        <td>Disciplinary</td>
                        <td>15/09/2018</td>
                        <td>Jason</td>
                        <td>Medium</td>
                        <td><span class="label label-default">Not Reviewd</span></td>
                        <td><a href="<?=$url5?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>7781231</td>
                        <td>Violation of company policy by Mrs. Sushma</td>
                        <td>Business Ethics</td>
                        <td>24/11/2018</td>
                        <td>Walton</td>
                        <td>Low</td>
                        <td><span class="label label-success">Closed</span></td>
                        <td><a href="<?=$url5?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>3812012</td>
                        <td>Harassment by my HR</td>
                        <td>Harassment</td>
                        <td>29/11/2018</td>
                        <td>Anonymous</td>
                        <td>Low</td>
                        <td><span class="label label-danger">Retracted</span></td>
                        <td><a href="<?=$url5?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="downloadReport" tabindex="-1" role="dialog" aria-labelledby="downloadReport">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Download Report</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="report_name">Report Name</label>
                            <input id="report_name" name="report_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <label>Choose fields to download in report</label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox1" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox1">Case ID</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox2" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox2">Title</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox3" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox3">Category</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox4" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox4">Filed On</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox5" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox5">Filed By</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox6" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox6">Severity</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox7" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox7">Status</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" id="report_checkbox8" name="report_name" class="checkbox-inline"/>
                            <label for="report_checkbox8">Case Details</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Download Report</button>
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script>
    $('#report_table').DataTable();
</script>
</body>
</html>