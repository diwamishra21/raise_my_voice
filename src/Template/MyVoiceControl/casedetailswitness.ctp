<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Case Details | My Voice</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet"/>
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="case-details-accuser.html">Accuser</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="case-details-accused.html">Accused</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="case-details-witness.html">Witnesses</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="case-details-accusation-nature.html">Nature of Accusation</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="case-details-personal-notes.html">Personal Notes</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="case-details-submit-form.html">Submit Form</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="dashboard.html">Go Back</a></li>
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

<div class="container-fluid margin-top-60 margin-bottom-30">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                <ul>
                    <li><a href="case-details-accuser.html">Accuser</a></li>
                    <li><a href="case-details-accused.html">Accused</a></li>
                    <li class="active"><a href="case-details-witness.html">Witnesses</a></li>
                    <li><a href="case-details-accusation-nature.html">Nature of Accusation</a></li>
                    <li><a href="case-details-personal-notes.html">Personal Notes</a></li>
                    <li><a href="case-details-panel-formation.html">Panel Formation</a></li>
                    <li><a href="case-details-submit-form.html">Submit Form</a></li>
                </ul>
                <div class="p-a-10"><a href="dashboard.html" class="btn btn-default btn-block p-a-10"><i class="fa fa-long-arrow-left"></i> Go Back</a></div>
                <div class="company-logo">
                    <div class="p-b-10">
                        <small class="text-muted">Developed By</small>
                    </div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent">
                    <h3 class="panel-block-title">Reporting Inproper behavior by inapropriate text messages and photos.</h3>
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
            </div>
            <div class="p-t-20 p-b-20">
                <p>You have been assigned as the supervisor in charge for this case</p>
                <div class="panel-divider"></div>
            </div>
            <div class="container-fluid">
                <div class="bg-transparent margin-bottom-30">
                    <h3 class="panel-block-label">Witness Details</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Business Unit</th>
                        <th>Employee Id</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Marketing</td>
                        <td>8841923</td>
                        <td>john@gmail.com</td>
                        <td><i class="fa fa-trash-o status-retracted fa-lg pointer"></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>John Doe</td>
                        <td>Marketing</td>
                        <td>8841923</td>
                        <td>john@gmail.com</td>
                        <td><i class="fa fa-trash-o status-retracted fa-lg pointer"></i></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>John Doe</td>
                        <td>Marketing</td>
                        <td>8841923</td>
                        <td>john@gmail.com</td>
                        <td><i class="fa fa-trash-o status-retracted fa-lg pointer"></i></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <div class="panel-block">
                    <div class="row">
                        <?= $this->Form->create('Users',['url' => ['controller' => 'Users', 'action' => 'casedetailswitness']]); ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"></label>
                             <?php
          echo $this->Form->control('username', [
    'label' => 'Name','type'=>'text','class'=>'form-control','id'=>'name'
]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile"></label>
                            <?php
            echo $this->Form->control('Mobile',["lable"=>false,'type'=>'text','name'=>'mobile','class'=>'form-control','id'=>'mobile']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city"></label>
                            <?php
            echo $this->Form->control('city',["lable"=>false,'type'=>'text','name'=>'city','class'=>'form-control','id'=>'city']); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="business_unit"></label>
                            <?php
          echo $this->Form->control('bu', [
    'label' => 'Business Unit','type'=>'text','class'=>'form-control','id'=>'business_unit'
]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="work_location"></label>
                            <?php
          echo $this->Form->control('work_location', [
    'label' => 'Work Location','type'=>'text','class'=>'form-control','id'=>'work_location'
]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_id"></label>
                            <?php
          echo $this->Form->control('empid', [
    'label' => 'Employee ID','type'=>'text','class'=>'form-control','id'=>'employee_id'
]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_title"></label>
                            <?php
          echo $this->Form->control('jobtitle', [
    'label' => 'Job Title','type'=>'text','class'=>'form-control','id'=>'job_title'
]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"></label>
                            <?php
            echo $this->Form->control('email',["lable"=>false,'type'=>'text','name'=>'email','class'=>'form-control','id'=>'email']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-dark p-a-10" id="btn-proceed"><i class="fa fa-search p-r-10"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-block margin-bottom-30">
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><h3 class="panel-block-label">01. Pooja Shah</h3></div>
                        <div class="col-md-9 text-right"><button class="btn btn-dark p-a-10">+ Add</button></div>
                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Ahmedabad</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Finance &amp; Accounting</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Navangpura</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Au065tukh</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Job Title</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Senior Manager</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Email Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label">test@gmail.com</p></div>
                    </div>
                </div>
                <div class="panel-block margin-bottom-30">
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><h3 class="panel-block-label">02. Pooja Shah</h3></div>
                        <div class="col-md-9 text-right"><button class="btn btn-dark p-a-10">+ Add</button></div>
                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Ahmedabad</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Finance &amp; Accounting</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Navangpura</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Au065tukh</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Job Title</label></div>
                        <div class="col-md-7"><p class="panel-block-label">Senior Manager</p></div>

                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Email Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label">test@gmail.com</p></div>

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