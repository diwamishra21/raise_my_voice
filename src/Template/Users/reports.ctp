<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports | Supervisor</title>
    <!-- Bootstrap -->
     <?= $this->Html->css('bootstrap-report.css'); ?>
    <?= $this->Html->css('style-backend.css'); ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

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
            <a class="navbar-brand" href="#"> <?= $this->Html->image('logo.png'); ?></a>
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
<?php $reports= $this->Url->build(['controller' => 'Users', 'action' => 'reports']);?>
<?php $profiles= $this->Url->build(['controller' => 'Users', 'action' => 'profiles']);?> 
                   <li class="active">
<a class="smooth-scroll" href="<?= $reports ;?>">Reports</a></li>
                    <li><a class="smooth-scroll" href="#statistics">Statistics</a></li>
                    <li class="active"><a href="<?= $profiles ;?>">Profile</a></li>
                </ul>
                
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div>
<?= $this->Html->image('logo-quatrro.png'); ?>
</div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">Reports</h2>
                </div>
                
                <div class="col-sm-search_11">
                
                <div class="panel-block top_report_search_bar" id="panel-block_id">
                    <div class="row panel-block-row" style="margin:-16px 0 0 0;">
                        <div class="col-search-3">
                         <?= $this->Form->create('Users',['url' => ['controller' => 'Users', 'action' => 'reports']]); ?>
 <?php  echo $this->Form->control('search', ['label' =>false,'type'=>'text','class'=>'search_inpt','id'=>'search_record']); ?>
     
<?= $this->Html->image('search_btn.png'); ?>
                    
                       <?= $this->Form->end() ?>
                        
                        </div>
                    </div>
                </div>
                
                
            
                <!-- <img src="images/below-bar.png" style="">-->
                
                
                <div class="col-sm-12" id="record" >
<?php foreach ($user_detail as $user_deatils): ?>
                <div class="col-sm-6">
                <div class="panel-block" id="" >
                    <div class="row panel-block-row" id="row-case">
                        <div class="col-md-33"><label class="report-block-label">Complaint Id: </label></div>
                        <div class="col-md-8"><p class="report-block-label"><?= h($user_deatils->complaint_id) ?></p></div>
                    </div>
                    <div class="row panel-block-row" id="report-det">
                        <div class="col-md-88"><p class="panel-block-label" style="text-decoration:none;"><?= $this->Html->link($user_deatils->c_title, ['controller' => 'Users', 'action' => 'employeeReportDetail', $user_deatils->id]) ?></p></div>
                    </div>
                    
                    <div class="row panel-block-row" id="row-case">
                        <div class="col-md-33"><label class="report-block-label">Filed On: </label></div>
                        <div class="col-md-8"><p class="report-block-label"><?= h($user_deatils->first_access) ?></p></div>
                    </div>
                    
                    
                    <div class="row panel-block-row">
                        <div class="col-md-38"><label class="panel-block-label2">ACCUSER</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12"><?= h($user_deatils->name) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-38"><label class="panel-block-label2">COMPLAINANT</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Lorem Ipsum</p></div>
                    </div>
                     <div class="row panel-block-row">
                        <div class="col-md-38"><label class="panel-block-label2">LAST ACTION TAKEN</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Lorem Ipsum</p></div>
                    </div>
                   
                    
                   
                     </div>
<?php  $concern_subject=h($user_deatils->c_subject) ?>
<?php if($concern_subject == 'Harassment') { ?>
                <div class="col-md-4">
<div style=" margin:8px 0 0 0; background: #a46e63;height: 6px;vertical-align: middle;"></div>
</div>
                        <div class="col-md-8"><p class="panel-block-desc12">Harassment</p></div>
<?php } elseif($concern_subject == 'Business Ethics') { ?>
<div class="col-md-4">
<div style=" margin:8px 0 0 0; background: #f5a623;height: 6px;vertical-align: middle;"></div>
</div>
                        <div class="col-md-8"><p class="panel-block-desc12">Business Ethics</p></div>
<?php } elseif($concern_subject == 'Disiplinary') { ?>
<div class="col-md-4">
<div style=" margin:8px 0 0 0; background: #f5a623;height: 6px;vertical-align: middle;"></div>
</div>
                        <div class="col-md-8"><p class="panel-block-desc12">Disiplinary</p></div>
<?php } elseif($concern_subject == 'Others') { ?>
<div class="col-md-4">
<div style="">Others</div>
</div>
                        <div class="col-md-8"><p class="panel-block-desc12"><?= h($user_deatils->other_issue) ?></p></div>
<?php } else {} ?>




 <div class="col-md-4">
<div style=" margin:8px 0 0 0; background: #63f523;height: 6px;vertical-align: middle;"></div>
</div>
                        <div class="col-md-8"><p class="panel-block-desc12">Closed/ Resolved</p></div>


              
  </div>
                <!-- <img src="images/below-bar.png" style="">-->
                   <?php   endforeach; ?>
<div class="paginator text-right">
        <ul class="pagination">
         
            <?= $this->Paginator->prev('' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' ') ?>
            <?= $this->Paginator->last(__('last') . ' ') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
                

            
                
<div class="col-sm-12" id="search" style="display:none;">
<?php foreach ($user_detail_search as $user_detail_searchs): ?>
                <div class="col-sm-6">
                <div class="panel-block" id="" >
                    <div class="row panel-block-row" id="row-case">
                        <div class="col-md-33"><label class="report-block-label">Complaint Id: </label></div>
                        <div class="col-md-8"><p class="report-block-label"><?= h($user_detail_searchs->complaint_id) ?></p></div>
                    </div>
                    <div class="row panel-block-row" id="report-det">
                        <div class="col-md-88"><p class="panel-block-label">Inappropriate lorem ipsum lorem ipsum lorem ipsum</p></div>
                    </div>
                    
                    <div class="row panel-block-row" id="row-case">
                        <div class="col-md-33"><label class="report-block-label">Filed On: </label></div>
                        <div class="col-md-8"><p class="report-block-label"><?= h($user_detail_searchs->first_access) ?></p></div>
                    </div>
                    
                    
                    <div class="row panel-block-row">
                        <div class="col-md-38"><label class="panel-block-label2">ACCUSER</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12"><?= h($user_detail_searchs->name) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-38"><label class="panel-block-label2">COMPLAINANT</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Lorem Ipsum</p></div>
                    </div>
                     <div class="row panel-block-row">
                        <div class="col-md-38"><label class="panel-block-label2">LAST ACTION TAKEN</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Lorem Ipsum</p></div>
                    </div>
                   
                    
                   
                     </div>

<div class="col-md-3"><div style=" margin:8px 0 0 0; background: #a46e63;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Harrasment</p></div>
                </div>



  <?php   endforeach; ?>





</div>
                




                         
      











 

                
                
                </div>
                
                 <div class="col-sm-sidebar_12">
                 <div class="panel-block top_report_search_bar" id="panel-block_id">
                    <div class="row panel-block-row" id="report_sort" >
                        <div class="col-search-3">
                        SORT / FILTER
                        
                        </div>
                    </div>
                </div>
                 
                 
                 <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label2">CATEGORY</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12"></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><div style=" margin:8px 0 0 0; background: #a46e63;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Harrasment</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><div style=" margin:8px 0 0 0; background: #f5a623;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Business Ethics</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><div style=" margin:8px 0 0 0; background: #f5a623;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Disiplinary</p></div>
                    </div>
                    
                </div>
                
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label2">STATUS</label></div>
                        <div class="col-md-8"><p class="panel-block-desc12"></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><div style=" margin:8px 0 0 0; background: #f5a623;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">On Going</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><div style=" margin:8px 0 0 0; background: #63f523;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Closed/ Resolved</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><div style=" margin:8px 0 0 0; background: #f90404;height: 6px;vertical-align: middle;"></div></div>
                        <div class="col-md-8"><p class="panel-block-desc12">Retracted</p></div>
                    </div>
                    
                </div>
                 </div>
                
                
                
               
            </div>
        </div>
    </div>
</div>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(document).ready(function(){
    $("#search_record").click(function(){
        $("#record").hide();

  $("#search").show();
    });
  });
</script>



<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>




</body>
</html>
