<?php
$session_data =   $this->request->session();
$user = $session_data->read('Auth.User');
$user_role = $user['role'];        
?> 

<div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
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
<?php $id= h(@$individual_accuser_details->id) ?>
                <ul>
<?php $accuser_url=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsAccuser',$id]);?>
<?php $dashboard=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'report']);?>
<?php $accusation_url=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsAccusationNature',$id]);?> 
<?php $witness_url=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsWitness',$id]);?> 
<?php $ComplaintDetailsPersonalNote=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsPersonalNote',$id]);?>

<?php $assign_url=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsAssign',$id]);?> 
<?php $ComplaintDetailsPanelFormation=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'panel',$id]);?>
<?php $ComplaintDetailsSubmitForm=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsSubmitForm',$id]);?>
<?php $ComplaintDetailsRespondent=$this->Url->build(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsRespondent',$id]);?>
  
                    <li class=""><a  href="<?= $accuser_url;?>">Complainant</a></li>
                    <li><a href="<?= $ComplaintDetailsRespondent ;?>">Offender</a></li>
                    <?php
                   // pr($individual_accuser_details);die;
                    if(($individual_accuser_details->status!=3)){
                    ?>
                    <li><a href="<?php echo $witness_url ;?>">Witnesses</a></li>
                    <li ><a href="<?php echo $accusation_url; ?>">Nature of Complaint</a></li>
                     <li><a href="<?= $assign_url; ?>">Assign Complaint</a></li>
                     <?php 
                    }
                     if($user_role === '3' || $user_role === '12' || $user_role === '13'){  ?>
                     <li>
                         <?php
                         echo $this->Html->link('Notes / Enquiry',['controller'=>'Complaint','action'=>'notes',$id]);
                         ?>
                     </li>
                     <div style="display:none;">
                     <li><a href="<?= $ComplaintDetailsPanelFormation; ?>">Panel Formation</a></li>
                     
                     <li><a href="<?= $ComplaintDetailsSubmitForm ; ?>">Close Complaint</a></li>
                     </div>
                    <?php } ?>
                    <?php if($user_role === '7' || $user_role === '8' || $user_role === '9' || $user_role === '10' || (!empty($user['multi_role']))){ ?>
                     <li><a href="<?= $ComplaintDetailsPanelFormation; ?>">Panel Formation</a></li>
                     <li><a href="<?= $ComplaintDetailsPersonalNote; ?>">Notes / Enquiry</a></li>
                    <?php } ?>
                    <?php if($user_role === '4'){ ?>
                     <li><a href="<?= $ComplaintDetailsPersonalNote; ?>">Notes / Enquiry</a></li>
                     <li><a href="<?= $ComplaintDetailsSubmitForm ; ?>">Close Complaint</a></li>
                    <?php } ?>
                </ul>
                <div class="p-a-10"><a href="<?= $dashboard ;?>" class="btn btn-default btn-block p-a-10"><i class="fa fa-long-arrow-left"></i> Go Back</a></div>
                <div class="company-logo">
                    <div class="p-b-10">
                        <small class="text-muted">Developed By</small>
                    </div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>