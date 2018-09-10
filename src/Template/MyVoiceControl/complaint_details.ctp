<?php $session=$this->request->session();
$session_data=$session->read();
$session_user_role=$session_data['Auth']['User']['role'];
  $session_user_id = $session_data["Auth"]["User"]["id"];

?>
<?php
                  if($session_user_role == 4)
                    {
                     $value = "The case will be accepted";
                    }
                    if($session_user_role == 3)
                    {
                     $value = "The case will be accepted";
                    }
                    if($session_user_role == 5)
                    {
                     $value = "The case will be accepted";
                    }
                    if($session_user_role == 6)
                    {
                     $value = "The case will be accepted";
                    }
 if($session_user_role == 7)
                    {
                     $value = "The case will be accepted";
                    }
if($session_user_role == 8)
                    {
                     $value = "The case will be accepted";
                    }if($session_user_role == 9)
                    {
                     $value = "The case will be accepted";
                    }if($session_user_role == 10)
                    {
                     $value = "The case will be accepted";
                    }
                    if($session_user_role == 12)
                    {
                     $value = "The case will be accepted";
                    }
                    if($session_user_role == 13)
                    {
                     $value = "The case will be accepted";
                    }
                ?>
<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
<?php $dashboard= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']);?>
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
                       <?php   endforeach; ?>
 
            <div class="container-fluid">
                  <?php echo $this->element('myvoice/complaint_summary'); ?>
			
          
				
				 				
				<?php 
                        if($session_user_role == '3' || $session_user_role == '12' || $session_user_role == '13')   {    ?>
									
                <div class="panel-block bg-transparent">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-2">

<?php  $id=$individual_user_details->id ; ?>
<?php foreach ($logedin_user_detail as $logedin_user_details): ?>
<?php   endforeach; ?>
<?php //$time = Time::now(); ?>
   <?= $this->Form->create('Complaints',['url' => ['controller' => 'MyVoiceControl', 'action' => 'complaintDetails',$id]]);?>
 <?php echo $this->Form->control('user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_id]); ?>
<?php echo $this->Form->control('assigned_role', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_role]); ?>

<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_user_details->id]); ?>
<?php echo $this->Form->control('superwisor_complaint_accept_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$time]); ?>  


<?php echo $this->Form->control('status', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>'2']); ?>




<?= $this->Form->button('Accept',['escape' => false,'type' => 'submit','class'=>'btn btn-dark p-a-10']) ?>
     <?= $this->Form->end() ?>
</div>

                        <div class="col-md-10"><p><?php echo @$value; ?></p> </div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-2"><button type="button" class="btn btn-dark p-a-10" data-toggle="modal" data-target="#rejected_case">Reject</button></div>
                        <div class="col-md-10"><p>The case will be rejected</p></div>
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

<?= $this->Form->create('Complaints',['url' => ['controller' => 'MyVoiceControl', 'action' => 'complaintIdReject',$id]]);?>
 <?php echo $this->Form->control('user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_id]); ?>
<?php echo $this->Form->control('assigned_role', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_role]); ?>
<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_user_details->id]); ?>
<?php echo $this->Form->control('superwisor_complaint_accept_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$time]); ?>  
<?php echo $this->Form->control('status', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>'3']); ?>

                <div class="form-group">
                    <label for="rejection_reason">Reason for Rejection<span style="color: red">*</span></label>
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
			
			
			<?php } elseif($session_user_role == '7' || $session_user_role == '4' || $session_user_role == '8' || $session_user_role == '9' || $session_user_role == '10'){ ?>
			
			 <div class="panel-block bg-transparent">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-2">

<?php  $id=$individual_user_details->id ; ?>
<?php foreach ($logedin_user_detail as $logedin_user_details): ?>
<?php   endforeach; ?>
<?php //$time = Time::now(); ?>
   <?= $this->Form->create('Complaints',['url' => ['controller' => 'MyVoiceControl', 'action' => 'complaintDetails',$id]]);?>
 <?php echo $this->Form->control('assigned_to', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_id]); ?>
<?php echo $this->Form->control('assigned_role', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_role]); ?>

<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_user_details->id]); ?>
<?php echo $this->Form->control('superwisor_complaint_accept_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$time]); ?>  

<?= $this->Form->button('Accept',['escape' => false,'type' => 'submit','class'=>'btn btn-dark p-a-10']) ?>
     <?= $this->Form->end() ?>
</div>
                        <div class="col-md-10"><p><?php echo $value ?></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-2"><button type="button" class="btn btn-dark p-a-10" data-toggle="modal" data-target="#hrrejected_case">Reject</button></div>
                        <div class="col-md-10"><p>The case will be rejected</p></div>
                    </div>
                </div>
            </div>
			
			<div class="modal fade" id="hrrejected_case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reject Case</h4>
            </div>
            <div class="modal-body">

<?= $this->Form->create('Complaints',['url' => ['controller' => 'MyVoiceControl', 'action' => 'hrcomplaintIdReject',$id]]);?>

<?php echo $this->Form->control('assigned_to', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_user_id]); ?>
<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_user_details->id]); ?>
<?php echo $this->Form->control('superwisor_complaint_accept_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$time]); ?>  
<?php echo $this->Form->control('assign_status', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>'2']); ?>

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
		<?php } else {} ?>	
        </div>
    </div>
</div>




<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
