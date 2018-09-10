

<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
<?php $dashboard= $this->Url->build(['controller' => 'Supervisor', 'action' => 'dashboard']);?>
                <div class="p-a-10"><a href="<?= $dashboard;?>" class="btn btn-default btn-block p-a-10"><i class="fa fa-long-arrow-left"></i> Go Back</a></div>

                <div class="company-logo">
                    <div class="p-b-10">
                        <small class="text-muted">Developed By</small>
                    </div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">


 <?php foreach ($individual_user_detail as $individual_user_details): ?>
                       <?php   endforeach;
$Harassment=$individual_user_details->c_subject;
if($Harassment == 1)
    $string = 'Harassment';
if($Harassment == 2)
    $string = 'Disciplinary';
if($Harassment == 3)
   $string = 'Bussiness Ethics';



 ?>
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h3 class="panel-block-title"><?= h($individual_user_details->c_title) ?></h3>
                </div>
                <div class="panel-block" style="background:none;">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Complaint Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h(@$individual_user_details->complaint_id) ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Filed On</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?php echo  date('d/m/Y',strtotime($individual_user_details->complaint_id_genrate_date)) ;?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Current Status</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?php echo $status= h(@$individual_user_details->status) ?>

</p></div>
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
                                            <h3 class="panel-block-title">Issue</h3>
                                             <ul class="emp-report-list" style="margin: 10px 0 0 0px;">

                                                <li> Employee has categorized the issue as <?= @$string ; ?>.</li>
                                                <li> Employee is filling the report on behalf of 
<?php $collegus= @h($individual_user_details->c_option) ?>
<?php if($collegus == 'No') {?>
self.
<?php } else { ?>
Colleague.
<?php } ?>
</li>                                      <li> Employee has tried to resolve this issue prior to filling the report, <?= @h($individual_user_details->c_tried_r_own ) ?>.  </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Context</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_user_details->name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_user_details->city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_user_details->work_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_user_details->bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_user_details->empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_user_details->email) ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Statement</h3>
                                            <div class="p-t-20">
                                                <p><?= @h($individual_user_details->concern_details) ?></p>
                                                <div class="p-t-20">
                                                    <!-- <img src="images/audio.png"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 p-t-20">
                                            <h4 class="panel-block-title">Attachments</h4>
                                            <div class="row m-t-20">
                                                <div class="col-xs-12">
                                                    <ul class="list-group">
  <?php foreach ($individual_user_detail_images as $individual_user_detail_image): ?>
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5"><?= $image=h(@$individual_user_detail_image->image) ?></div>
                                                                <div class="col-md-6 p-t-5"></div>
                                                                <div class="col-md-3" >

<?php echo $this->Html->image("../webroot/upload/$image", array('alt' => '', 'style' => 'width:100px')); ?>

</div>
                                                            </div>
                                                        </li>
                                <?php   endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
  <?php foreach ($witness_user_detail as $witness_user_details): ?>
                      
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Witnesses</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Witness </label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_email_id) ?></p></div>
                                            </div>
                                        </div>
 <?php   endforeach; ?>


<?php foreach ($accused_detail as $accused_details): ?>
                      
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Respondent</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Accused Name </label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_email) ?></p></div>
                                            </div>
                                        </div>
 <?php   endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-block bg-transparent">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-2">
<?php $id=$individual_user_details->id ; ?>
<?php foreach ($logedin_user_detail as $logedin_user_details): ?>
<?php   endforeach; ?>
<?php //$time = Time::now(); ?>
   <?= $this->Form->create('Complaints',['url' => ['controller' => 'Supervisor', 'action' => 'complaintDetails',$id]]);?>
 <?php echo $this->Form->control('user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->id]); ?>
<?php echo $this->Form->control('emp_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->empid]); ?> 

<?php echo $this->Form->control('user_type', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->user_type]); ?>
<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_user_details->id]); ?>
<?php echo $this->Form->control('superwisor_complaint_accept_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$time]); ?>  


<?php echo $this->Form->control('status', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>'Case Valid']); ?>




<?= $this->Form->button('Accept',['escape' => false,'type' => 'submit','class'=>'btn btn-dark p-a-10']) ?>
     <?= $this->Form->end() ?>
</div>
                        <div class="col-md-10"><p>You will be assigned as the supervisor in charge for the above case</div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-2"><button type="button" class="btn btn-dark p-a-10" data-toggle="modal" data-target="#rejected_case">Reject</button></div>
                        <div class="col-md-10"><p>The case will be rejected</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejected_case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reject Case</h4>
            </div>
            <div class="modal-body">

<?= $this->Form->create('Complaints',['url' => ['controller' => 'Supervisor', 'action' => 'complaintIdReject',$id]]);?>
 <?php echo $this->Form->control('user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->id]); ?>
<?php echo $this->Form->control('emp_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->empid]); ?> 

<?php echo $this->Form->control('user_type', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->user_type]); ?>
<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_user_details->id]); ?>
<?php echo $this->Form->control('superwisor_complaint_accept_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$time]); ?>  


<?php echo $this->Form->control('status', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>'Case Not Valid']); ?>





                <div class="form-group">
                    <label for="rejection_reason">Reason for Rejection*</label>
<?php echo $this->Form->textarea('notes', ['label' =>false,'rows'=>'6','id'=>'rejection_reason','class'=>'form-control','required']); ?>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?= $this->Form->button('Reject Case',['escape' => false,'type' => 'submit','class'=>'btn btn-dark']) ?>
               
            </div>
 <?= $this->Form->end() ?>

        </div>
    </div>
</div>


