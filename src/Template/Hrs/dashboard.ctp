<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Supervisor</title>
    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" rel="stylesheet">

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
                    <li class="active"><a href="<?= $url ?>">Dashboard</a></li>
                    <li><a href="<?= $url1 ?>">Statistics</a></li>
                    <li><a href="<?= $url2 ?>">Reports</a></li>
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
                    <h2 class="panel-block-title">Dashboard</h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group search_input_wrapper">
                                <input type="search" name="" class="form-control search_input">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-secondary btn-block sort-btn" data-toggle="modal" data-target="#filterModal">Sort / Filter</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="panel-block">
                            <div class="row">
                                <div class="col-md-3"><label class="panel-block-label2">CATEGORY</label></div>
                                <div class="col-md-8"><p class="panel-block-desc12"></p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Harassment</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #d4bea2;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Business Ethics</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #8ac9ff;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Disciplinary</p></div>
                            </div>
                        </div>
                        <div class="panel-block">
                            <div class="row">
                                <div class="col-md-3"><label class="panel-block-label2">STATUS</label></div>
                                <div class="col-md-8"><p class="panel-block-desc12"></p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">On Going</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #c8d52c;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Closed/ Resolved</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #e13b16;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Retracted</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sort / Filter</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 text-center margin-bottom-30">
                        <h4>Filter</h4>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Severity</label></div>
                            <select id="severity" multiple="multiple">
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Last Action Taken</label></div>
                            <select id="last_action" multiple="multiple">
                                <option value=">15 days">>15 Days</option>
                                <option value="12 - 15 Days">12 - 15 Days</option>
                                <option value="8 - 11 Days">8 - 11 Days</option>
                                <option value="5 - 7 Days">5 - 7 Days</option>
                                <option value="<5 Days"><5 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Filed On</label></div>
                            <select id="filed_on" multiple="multiple">
                                <option value=">15 days">>15 Days</option>
                                <option value="12 - 15 Days">12 - 15 Days</option>
                                <option value="8 - 11 Days">8 - 11 Days</option>
                                <option value="5 - 7 Days">5 - 7 Days</option>
                                <option value="<5 Days"><5 Days</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Location</label></div>
                            <select id="location" multiple="multiple">
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Lucknow">Lucknow</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Business Unit</label></div>
                            <select id="business_unit" multiple="multiple">
                                <option value="Production">Production</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Finance">Finance</option>
                                <option value="Communication">Communication</option>
                                <option value="Purchasing">Purchasing</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Category</label></div>
                            <select id="category" multiple="multiple">
                                <option value="Harassment">Harassment</option>
                                <option value="Business Ethics">Business Ethics</option>
                                <option value="Disciplinary">Disciplinary</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-xs-12 text-center margin-bottom-30">
                        <h4>Sort</h4>
                    </div>
                    <div class="col-md-4 col-md-offset-2 text-center">
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked>Date Added</label>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="radio">
                            <label><input type="radio" name="optradio">Last Action Taken</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#severity').multiselect();
        $("#last_action").multiselect();
        $("#filed_on").multiselect();
        $("#location").multiselect();
        $("#business_unit").multiselect();
        $("#category").multiselect();
    });
</script>

</body>
</html>