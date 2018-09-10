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
$string = ' Others';}
 ?>
 <?php 
    $session=$this->request->session();
    $session_data =  $this->session->read();
    $user_role = $session_data["Auth"]["User"]["role"]; ?>
<?php $id= h(@$individual_accuser_details->id) ?>
                       <div class="col-sm-10">
            <div class="container-fluid">
            <div class="panel-block bg-transparent">

                    <h3 class="panel-block-title"><?= h(@$individual_accuser_details->c_title) ?></h3>
                </div>
                <div class="panel-block" style="background:none;">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Complaint Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h(@$individual_accuser_details->complaint_id) ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Category / Subcategory</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?php if(empty($category_type)){echo 'No Category Specified';}else{echo $category_type;echo"\r";echo "/"; echo"\r"; echo $subcategory[0]['name'];} ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Filed On</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= date('d/m/Y',strtotime($individual_accuser_details->complaint_id_genrate_date)) ; ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Current Status</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= $users_status ?></p></div>
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
                                            <h4 class="panel-block-title">Complaint Report</h4>
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
                                                <li> Employee has categorized the issue as <?= @$string ?>.</li>
                                                <li> Employee is filling the report on behalf of 
<?php $collegus= @h($individual_accuser_details->c_option) ?>
<?php if($collegus == 'No') {?>
self.
<?php } else { ?>
Colleague.
<?php } ?>
</li>                                      <li> Employee has tried to resolve this issue prior to filling the report, <?= @h($individual_accuser_details->c_tried_r_own ) ?>.  </li>
                                            </ul>
                                        </div>
                                    </div>
                                          <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Context</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->work_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->email) ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Statement</h3>
                                            <div class="p-t-20">
                                                 <p><?= @h($individual_accuser_details->concern_details ) ?></p>  <div class="p-t-20">
                                                    <!-- <img src="images/audio.png"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 p-t-20">
                                            <h4 class="panel-block-title">Attachments</h4>
                                            <div class="row m-t-20">
                                                <div class="col-xs-12">
                                                   <ul class="list-group">
  <?php foreach ($individual_user_detail_images as $individual_user_detail_image):
    $get_image = $individual_user_detail_image->image;
    $path = '/myvoicev2/webroot/upload/'.$get_image;  
    $name = explode("_", $individual_user_detail_image->image);
    $name = $name[1];
    ?>
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5"><?= $name ?></div>
                                                                <div class="col-md-6 p-t-5"></div>
                                                                <div class="col-md-3" >
                                                                <img src="<?php echo $path;?>">

<?php // echo $this->Html->image("../webroot/upload/$image", array('alt' => '', 'style' => 'width:100px')); ?>

</div>
                                                            </div>
                                                        </li>
                                <?php   endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Witnesses</h3>
                                           <?php foreach ($witness_user_detail as $witness_user_details): ?>
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
                                            <h3 class="panel-block-title">Offender</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Offender Name </label></div>
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
            </div>
            <div class="p-t-20 p-b-20">
                 
                <div class="panel-divider"></div>
            </div>
            <div class="container-fluid">
                <div class="bg-transparent margin-bottom-30">
                    <h3 class="panel-block-label">Panelist Details</h3>
                </div>
                <table class="table table-striped">
 <?php foreach ($complaint_panel_user_detail as $complaint_panel_user_details){
$pname=$complaint_panel_user_details->p_name ;
 } if(!empty($pname)){ ?>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Employee Id</th>
                        <th>Email</th>
                        <th>Scribe</th>
                        <th>Action</th>
                    </tr>
                    </thead>
<?php } ?>
                    <tbody>
 
 <?php $i=1; foreach($complaint_panel_user_detail as $complaint_panel_user_details){ ?>  
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= h(@$complaint_panel_user_details->p_name) ?></td>
                        <td><?= h(@$complaint_panel_user_details->p_empid) ?></td>
                        <td><?= h(@$complaint_panel_user_details->p_email) ?></td>
                        <td><?= h(@$complaint_panel_user_details->p_scribe) ?></td>
                        <td>
<?=$this->Form->postLink('<i class="fa fa-trash-o status-retracted fa-lg pointer " data-toggle="tooltip" data-placement="bottom" title="delete"></i>',['controller'=>'MyVoiceControl','action'=>'delete',$complaint_panel_user_details->id,$id], ['escape' => false], ['confirm' => 'Are you sure to delete?'])?>

</td>
                    </tr>
                     <?php     $i++;  } ?>
                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <div class="panel-block">
<?php foreach ($logedin_user_detail as $logedin_user_details): ?>
<?php   endforeach; ?>
 <?= $this->Form->create('Panels',['url' => ['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsPanelFormation']]);?>
                    
<?php echo $this->Form->control('supervisor_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->id]); ?>
<?php echo $this->Form->control('role', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>'panel']); ?> 

<?php echo $this->Form->control('supervisor_name', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$logedin_user_details->username]); ?>
<?php echo $this->Form->control('complaint_user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_accuser_details->id]); ?> 

<div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
<select name="p_name" onchange="return panelinfo();" class="form-control" id="name">
                                        <?php

                        if(!empty($paneldata)){
                            echo '<option value="" >Choose an option</option>';
                            foreach($paneldata as $key=>$value){
                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
                        }
                            
                        }
                        ?>
                                        
                                    </select>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
<?php echo $this->Form->control('', ['label' =>false,'type'=>'text','class'=>'form-control','disabled','id'=>'email']); ?> 
<?php echo $this->Form->control('p_email', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'p_email']); ?>
                               
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Emp Id</label>
<?php echo $this->Form->control('', ['label' =>false,'type'=>'text','class'=>'form-control','disabled','id'=>'empid']); ?> 
<?php echo $this->Form->control('p_empid', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'p_empid']); ?>
                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="scribe">Scribe</label>

 <?php $corn_regarding=array('Yes'=>'Yes','No'=>'No'); 
echo $this->Form->select('p_scribe',$corn_regarding,['class'=>'form-control','id'=>'concern_regarding','label' =>false]); ?>    
                                
                            </div>
                        </div>

<div class="col-md-6">
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
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
<?= $this->Form->button('+ Add Panelist',['escape' => false,'type' => 'submit','class'=>'btn btn-dark ']) ?>
                         
                        </div>
                    </div>
 <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">

 function panelinfo()
 { 
     var sel = $('#name').val(); 
      $.ajax({
        type:"POST",
        url: "<?php echo$this->Url->build('/'); ?>MyVoiceControl/getpanelinfo/",
        data:{'sel':sel},

        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller

           data = JSON.parse(data);
           //alert(data);

           $('#p_email').val(data[0].email);
           $('#p_empid').val(data[0].empid);
           $('#email').val(data[0].email);
           $('#empid').val(data[0].empid);
        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
        
        });
 }

</script>