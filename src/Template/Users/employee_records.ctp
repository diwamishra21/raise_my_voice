
<body>


<!--page Popup Start-->
<div id="light2" class="white_content2" style="width:100%; height:auto;position: relative;text-align: center;right: 13%;left: 18%;">

  <div id="light" class="white_content">
    <table width="100%" cellspacing="5" cellpadding="0" border="0">
    <tbody>
    <tr>
    <td valign="top" align="center"></td>
    </tr>
    
    <tr>
    <td>
    <a style=" float: right;" href="javascript:void(0)" onclick="close_popup()">
    
    <img src="images/close3.png" style="width: 40px;position: fixed;top: 127px;" >
    
    </a>
   
   <h3>Enter your password to continue search</h3><br/>
        <div class="row2">
        <div class="col-md-12">
        <div class="form-group">
      <form action="employee-reports-3.html" method="post">
        <input type="text" id="subject_name" name="subject_name" class="form-control" style="width:96%; margin:0 15px 0 15px;">
        </form>
        </div>
        </div>
        </div>
   
   
    </td>
    </tr>
    </tbody>
    </table>  


  </div> 

</div>
  
  <div id="fade" class="black_overlay"></div>
  
  <!--page Popup end-->


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
                <li class="hidden-sm hidden-md hidden-lg"><a class="smooth-scroll" href="#statistics">Registered Concerns</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a class="smooth-scroll" href="#messages">Accusations</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="#">E-Learning</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="register-concern.html">+ Register Concern</a></li>
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
                    <li class=""><a class="smooth-scroll" href="reports.html">Reports</a></li>
                    <li><a class="smooth-scroll" href="#statistics">Statistics</a></li>
                    <li><a class="smooth-scroll" href="messages.html">Messages</a></li>
                   <li class="active"><a href="employee-records.html">Employee Records</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
               
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?php echo $this->Html->image('logo-quatrro.png')?>
</div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid" id="concern-form">
                <div class="concern-form-section active" data-section-order="1">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Employee Records</h2>
                    </div>
                    <div class="panel-block">
 <?= $this->Form->create('Users',['url' => ['controller' => 'Users', 'action' => 'employeeReports']]); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_title"></label>
<?php echo $this->Form->control('username', ['label' => 'Name','type'=>'text','class'=>'form-control','id'=>'subject_name']); ?>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concern_regarding"></label>
<?php echo $this->Form->control('city', ['label' => 'City','type'=>'text','class'=>'form-control','id'=>'subject_city']); ?>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_concern"></label>
<?php echo $this->Form->control('bu', ['label' => 'Business Unit','type'=>'text','class'=>'form-control','id'=>'other_Business_Unit']); ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern"></label>
<?php echo $this->Form->control('work_location', ['label' => 'Work Location','type'=>'text','class'=>'form-control','id'=>'other_Work_Location']); ?>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern"></label>
<?php echo $this->Form->control('empid', ['label' => 'Employee Id','type'=>'text','class'=>'form-control','id'=>'other_Employee_Id']); ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern"></label>
<?php echo $this->Form->control('c_subject', ['label' => 'Job Title','type'=>'text','class'=>'form-control','id'=>'other_Job_Title']); ?>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern"></label>
<?php echo $this->Form->control('email', ['label' => 'Email Id','type'=>'text','class'=>'form-control','id'=>'other_Email_Id']); ?>
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="col-md-4 text-center p-t-10" style="float:right;">
                           <!-- <button onClick="open_records()" class="btn btn-dark p-a-10" id="btn-proceed">Search </button>-->
                             <?php echo $this->Form->button('Search', ['label' => false,'type'=>'text','class'=>'btn btn-dark p-a-10']); ?>
                              </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>





