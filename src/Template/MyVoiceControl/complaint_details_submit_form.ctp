
                <?php foreach ($individual_accuser_detail as $individual_accuser_details): ?>
                       <?php   endforeach; 

$Harassment=$individual_accuser_details->c_subject;
if($Harassment == 1){ 
    $string = 'Harassment';
} elseif($Harassment == 7){
    $string = 'Disciplinary';
 } elseif($Harassment == 4) {
   $string = ' Ethics';
} else {
$string = ' Others';
}
?>
<?php 
    $session=$this->request->session();
    $session_data = $session->read();
    $user_role = $session_data["Auth"]["User"]["role"]; 
	$session_user_id = $session_data["Auth"]["User"]["id"];
	?>
<?php $ComplaintDetailsCloseCase=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsCloseCase',$individual_accuser_details->id]);?>
<?php $id= h(@$individual_accuser_details->id) ?>
                    <div class="col-sm-10">
                        
            <?php  $status=$individual_accuser_details->status ; ?>
                        <?php echo $this->element('myvoice/complaint_summary'); ?>
            <div class="p-t-20 p-b-20">
                <div class="panel-divider"></div>
            </div>
			
			<?php if($status == '17'){ ?>
            <div class="container-fluid">
			<?= $this->Form->create('Complaints',['url'=>['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsSubmitForm',$id]]) ?>
			<?php echo $this->Form->control('complaint_id',['type'=>'hidden','value'=>$id]) ?>
				<?php echo $this->Form->control('assigned_to',['type'=>'hidden','value'=>$session_user_id]) ?>
                <div class="panel-block margin-bottom-30">
                    <p>Final investigation repot submitted.</p>
                    <p>Please review the report and take action after that close the complaint on Myvoice portal.</p>
                    <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="severity">Disposition</label>
                               <select id="" name="status"  class="form-control">
                                    <?php if (!empty($Cstatus)){ 
                           echo '<option value="0">Choose an option</option>';
                            foreach($Cstatus as  $key=>$value){
                             echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
}
}
?>
                                </select>
                            </div>
                        </div> -->
                    <div class="margin-top-60 text-right">
					<?php echo $this->Form->button('Close Complaint',['class'=>'btn btn-dark','type'=>'submit','escape' => false])?>
                   
                    </div>
                </div>
				<?php echo $this->Form->end();?>
		
            </div>
			<?php } else if($status == '15') { ?>
			<div class="container-fluid">
                <div class="panel-block margin-bottom-30">
                    <h3>Investigation is Closed</h3>
                   <br>
                                      
                </div>
            </div>
					
			
			<?php } else { ?>
			<div class="container-fluid">
                <div class="panel-block margin-bottom-30">
                    
                   <br>
                                      
                </div>
            </div>
				
		<?php 	} ?>
			
			
        </div>
   

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>