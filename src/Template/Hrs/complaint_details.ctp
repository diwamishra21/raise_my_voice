<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Case Details | My Voice</title>
    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

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
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url ?>">Go Back</a></li>
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
                <div class="p-a-10"><a href="<?= $url ?>" class="btn btn-default btn-block p-a-10"><i class="fa fa-long-arrow-left"></i> Go Back</a></div>

                <div class="company-logo">
                    <div class="p-b-10">
                        <small class="text-muted">Developed By</small>
                    </div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?>></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h3 class="panel-block-title">Reporting Inproper behavior by inapropriate text messages and
                        photos.</h3>
                </div>
                <div class="panel-block" style="background:none;">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Case Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label">12ADGF78900</p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Filed On</label></div>
                        <div class="col-md-7"><p class="panel-block-label">July 10,2017</p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Current Status</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Re-Opened</p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Last Updated By You</label></div>
                        <div class="col-md-7"><p class="panel-block-label">July 25, 2017</p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>

                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Last Received</label></div>
                        <div class="col-md-7"><p class="panel-block-label">August 3, 2017</p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                </div>
                <div class="row panel-block">
                    <div class="col-xs-12 panel-group margin-bottom-0" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-custom">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="panel-title pointer" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="panel-block-title">Employee Report</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="panel-title pointer text-right" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="detail_report" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">01. Issue</h3>
                                            <ul class="emp-report-list">
                                                <li> Employee has categorized the issue as sexual harassment.</li>
                                                <li> Employee is filling the report on behalf of self.</li>
                                                <li> Employee has tried to resolve this issue prior to filling the report.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">02. Context</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Pooja Shah</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Ahmedabad</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Naveda</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">---</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">PSRT0089</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">pooja@gmail.com</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">03. Statement</h3>
                                            <div class="p-t-20">
                                                <p>July 21, 2017</p>
                                                <p>To the Department of Human Resource,</p>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                                <div class="p-t-20">
                                                    <img src="images/audio.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 p-t-20">
                                            <h4 class="panel-block-title">Attachments</h4>
                                            <div class="row m-t-20">
                                                <div class="col-xs-12">
                                                    <ul class="list-group">
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5">File 001</div>
                                                                <div class="col-md-6 p-t-5">Uploaded on 15th May</div>
                                                                <div class="col-md-3"><button class="btn btn-default status-active">View</button></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5">File 001</div>
                                                                <div class="col-md-6 p-t-5">Uploaded on 15th May</div>
                                                                <div class="col-md-3"><button class="btn btn-default status-active">View</button></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">04. Witnesses</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Witness 1</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Pooja Shah</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Ahmedabad</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Naveda</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">---</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">PSRT0089</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">pooja@gmail.com</p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row panel-block">
                    <div class="col-xs-12 panel-group margin-bottom-0" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-custom">
                            <div class="panel-heading" role="tab">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="panel-title pointer" data-toggle="collapse" data-parent="#accordion" href="#supervisor_report" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="panel-block-title">Supervisor's Report</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="panel-title pointer text-right" data-toggle="collapse" data-parent="#accordion" href="#supervisor_report" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="supervisor_report" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <div class="bg-transparent margin-bottom-30">
                                                <h3 class="panel-block-title">01. Accuser Details</h3>
                                            </div>
                                            <table class="table table-striped table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Business Unit</th>
                                                    <th>Employee Id</th>
                                                    <th>Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pooja Shah</td>
                                                    <td>---</td>
                                                    <td>PSRT0089</td>
                                                    <td>pooja@gmail.com</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <div class="bg-transparent margin-bottom-30">
                                                <h3 class="panel-block-title">02. Accused Details</h3>
                                            </div>
                                            <table class="table table-striped table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Business Unit</th>
                                                    <th>Employee Id</th>
                                                    <th>Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>John Doe</td>
                                                    <td>Marketing</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>John Doe</td>
                                                    <td>Marketing</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>John Doe</td>
                                                    <td>Marketing</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <div class="bg-transparent margin-bottom-30">
                                                <h3 class="panel-block-title">03. Witness Details</h3>
                                            </div>
                                            <table class="table table-striped table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Business Unit</th>
                                                    <th>Employee Id</th>
                                                    <th>Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>John Doe</td>
                                                    <td>Marketing</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>John Doe</td>
                                                    <td>Marketing</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>John Doe</td>
                                                    <td>Marketing</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">04. Nature of Accusation</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Category</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">Harassment</p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Severity</label></div>
                                                <div class="col-md-8"><p class="panel-block-label">High</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">05. Notes / Attachments</h3>
                                            <div class="p-t-20">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                                            </div>
                                            <h5 class="p-t-20 panel-block-label">Attachments</h5>
                                            <div class="row m-t-20">
                                                <div class="col-xs-12">
                                                    <ul class="list-group">
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5">File 001</div>
                                                                <div class="col-md-6 p-t-5">Uploaded on 15th May</div>
                                                                <div class="col-md-3"><button class="btn btn-default status-active">View</button></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5">File 001</div>
                                                                <div class="col-md-6 p-t-5">Uploaded on 15th May</div>
                                                                <div class="col-md-3"><button class="btn btn-default status-active">View</button></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <div class="bg-transparent margin-bottom-30">
                                                <h3 class="panel-block-title">06. Panelist Members</h3>
                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Employee Id</th>
                                                    <th>Email</th>
                                                    <th>Scribe</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>John Doe</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>John Doe</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>John Doe</td>
                                                    <td>8841923</td>
                                                    <td>john@gmail.com</td>
                                                    <td>Yes</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-divider"></div>
                <div class="panel-block">
                    <div class="row p-b-20">
                        <div class="col-md-2">
                            <p class="p-t-5">July 21, 2017</p>
                        </div>
                        <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                        </div>
                        <div class="col-md-9">
                            <h4 class="m-t-5">Report Filed</h4>
                            <p>We have filed your report. In the coming days, your report will be reviewed by one of our supervisors and you will be notified through the process.</p>
                            <p>You will be allowed to add additional details and produce witnesses to support your claim anytime during the process.</p>
                        </div>
                    </div>
                    <div class="row p-b-20">
                        <div class="col-md-2">
                            <p class="p-t-5">July 21, 2017</p>
                        </div>
                        <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                        </div>
                        <div class="col-md-9">
                            <h4 class="m-t-5">Report Filed</h4>
                            <p>We have filed your report. In the coming days, your report will be reviewed by one of our supervisors and you will be notified through the process.</p>
                            <p>You will be allowed to add additional details and produce witnesses to support your claim anytime during the process.</p>
                        </div>
                    </div>
                    <div class="row p-b-20">
                        <div class="col-md-2">
                            <p class="p-t-5">July 24, 2017</p>
                        </div>
                        <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                        </div>
                        <div class="col-md-9">
                            <h4 class="m-t-5">Report Reviewed by Supervisor</h4>
                            <p>Our supervisor has reviewed your report. You will be notified as the process moves forward.</p>
                        </div>
                    </div>
                    <div class="row p-b-20">
                        <div class="col-md-2">
                            <p class="p-t-5">July 21, 2017</p>
                        </div>
                        <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                        </div>
                        <div class="col-md-9">
                            <h4 class="m-t-5">Additional Details Added</h4>
                            <p>You have successfully<br>
                                - attached two additional files<br>
                                - given additional details in a written statement<br>
                                - produced 1 additional witness<br><br>
                                These details will be reviewed along with your report filed.</p>
                        </div>
                    </div>
                    <div class="row p-b-20">
                        <div class="col-md-2">
                            <p class="p-t-5">August 3, 2017</p>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-circle fa-2x"></i>
                        </div>
                        <div class="col-md-9">
                            <h4 class="m-t-5">Comments Added</h4>
                            <p>Manish Pandey added the comment regarding the case yesterday</p>
                        </div>
                    </div>
                </div>
                <div class="panel-divider"></div>
                <div class="panel-block bg-transparent">
                    <h3 class="panel-block-title">Comments</h3>
                </div>
                <div class="panel-block">
                    <textarea class="form-control" rows="10"></textarea>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-6">
                            <h4 class="m-t-7">Attachments</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button class="btn btn-dark p-a-10" onclick="$('#chooseFile').click()">+ Choose File</button>
                            <input type="file" class="hidden" id="chooseFile">
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group">
                                <li class="list-group-item border-none p-a-20">
                                    <div class="row">
                                        <div class="col-md-3 p-t-5">File 001</div>
                                        <div class="col-md-6 p-t-5">Uploaded on 15th May</div>
                                        <div class="col-md-3"><button class="btn btn-default status-active">View</button><button class="btn btn-default status-retracted">Delete</button></div>
                                    </div>
                                </li>
                                <li class="list-group-item border-none p-a-20">
                                    <div class="row">
                                        <div class="col-md-3 p-t-5">File 001</div>
                                        <div class="col-md-6 p-t-5">Uploaded on 15th May</div>
                                        <div class="col-md-3"><button class="btn btn-default status-active">View</button><button class="btn btn-default status-retracted">Delete</button></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label for="panelist_member">Notify Panelist</label>
                                 <select class="form-control" id="panelist_member">
                                     <option value="">Choose Panelist</option>
                                     <option value="Manish Pandey">Manish Pandey</option>
                                     <option value="Ashish Nehra">Ashish Nehra</option>
                                 </select>
                             </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <a href="dashboard.html" class="btn btn-dark">Submit</a>
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