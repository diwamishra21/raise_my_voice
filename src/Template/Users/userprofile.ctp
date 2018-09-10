<div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
  <?php foreach ($user_deatil as $user_deatils): 
					    endforeach;
$id=$user_deatils->id
 ?>
<?php $registerConcern= $this->Url->build(['controller' => 'Users', 'action' => 'registerConcern',$id]);?>
<?php $userprofiles= $this->Url->build(['controller' => 'Users', 'action' => 'userComplaintDetails']);?>
                <ul>
                    <li class="active"><a class="smooth-scroll" href="#profile">Profile</a></li>
                    
                    <li><a class="smooth-scroll" href="#registered-concerns">Registered Complaint</a></li>
                    <!-- <li><a href="e-learning">E-Learning</a></li> -->
                </ul>
                <div class="p-a-10"><a href="<?= $registerConcern?>" class="btn btn-default btn-block btn-square p-a-10">+ Register Complaint</a></div>
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="profile">
                    <h2 class="panel-block-title"> 
 
					
                             <?= h($user_deatils->name) ?>
					</h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_deatils->bu) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_deatils->city) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_deatils->work_location) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_deatils->empid ) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_deatils->email) ?></p></div>
                    </div>
                </div>
               
                <div class="panel-block margin-bottom-30" id="registered-concerns">

<?php foreach ($user_complaint_deatil as $user_complaint_deatils):     

$cstatus = $user_complaint_deatils['status'];

 @$cstatusTxt=$cstatusData[$cstatus];

//pr($user_complaint_deatils);
$sts_cls="label-success";
if(!empty($cstatus)){
    $cstatusTxt=$cstatusData[$cstatus];
}else{
    $cstatusTxt="";
}

if($cstatus == 1){
    $cstatus=$cstatusData[$cstatus];
    //$cstatus = 'Complaint File';
    $sts_cls="label-default";
    
}
if($cstatus == 2){
    //$cstatus = 'Complaint Valid';
    $sts_cls="label-success";
}
if($cstatus == 15){
   // $cstatus = 'Complaint Closed';
    $sts_cls="label-success";
}
if($cstatus == 3){
    //$cstatus = 'Complaint Not Valid';
    $sts_cls="label-danger";
}
if($cstatus == 16){
    //$cstatus = 'Rejected';
    $sts_cls="label-danger";
}
$cstatus=$cstatusTxt;
?>





<?php $userid= $user_complaint_deatils['id'] ?>
<?php $userprofiles= $this->Url->build(['controller' => 'Users', 'action' => 'userComplaintDetails',$userid]);?>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label"><?= date('d/m/Y',strtotime($user_complaint_deatils['complaint_id_genrate_date'])) ; ?></label></div>
                        <div class="col-md-2"><p class="panel-block-label"><?= $user_complaint_deatils['complaint_id']  ?></p></div>

                        <div class="col-md-3"><p class="panel-block-label"><?= h($user_complaint_deatils['accused_name']) ?></p></div>

                        <div class="col-md-3"><p class="panel-block-label status-active"><span class="label <?=$sts_cls;?>">
						
						<?php echo $cstatus; ?>
						
                                </span></p></div>
 <div class="col-sm-1"> 
<a  href="<?= $userprofiles ?>" class="text-blue" title ="view detail"><i class="fa fa-eye"></i></a></label>  
<input type="hidden" id="complaint_user_detail_id" value="<?= $userid ;?>">
  </div>
                    </div>
<?php endforeach; ?>

                    
                </div>
            </div>
        </div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?= $this->Html->script('bootstrap.min.js') ?>

<script>  
function Complaintdetail(id)
{
     $.ajax({
             type: "POST",
            url: "<?= $userprofiles ?>",
            data: {'id':id},
                 success: function (text){
                obj = JSON.parse(text);
document.getElementById("demo").innerHTML =obj.data.name;
document.getElementById("city").innerHTML =obj.data.city;

document.getElementById("work_location").innerHTML =obj.data.work_location;
document.getElementById("bu").innerHTML =obj.data.bu;

document.getElementById("empid").innerHTML =obj.data.empid;

document.getElementById("email").innerHTML =obj.data.email;
document.getElementById("c_subject").innerHTML =obj.data.c_subject;
document.getElementById("c_option").innerHTML =obj.data.c_option;
document.getElementById("c_tried_r_own").innerHTML =obj.data.c_tried_r_own;
document.getElementById("wi_name").innerHTML =obj.data.wi_name;

document.getElementById("wi_city").innerHTML =obj.data.wi_city;
document.getElementById("wi_location").innerHTML =obj.data.wi_location;
document.getElementById("wi_bu").innerHTML =obj.data.wi_bu;
document.getElementById("wi_empid").innerHTML =obj.data.wi_empid;
document.getElementById("wi_email_id").innerHTML =obj.data.wi_email_id;
           
               }
        });
}
</script>  


</body>
</html>



<div class="modal fade" id="profile_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Complaints Details</h4>
            </div>
            <div class="modal-body bg-light">
                           <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="profile">
                    <h2 class="panel-block-title" > 			                          
					</h2>
                </div>
                
                 <div class="row panel-block">
                    <div class="col-xs-12 panel-group margin-bottom-0" >
                        <div class="panel panel-custom">
                            
                            <div>
                                <div class="panel-body">
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Issue</h3>
                                             <ul class="emp-report-list" style="margin: 10px 0 0 0px;">

                                                <li id=""> Employee has categorized the issue as <span id="c_subject"></span>.</li>
                                                <li> Employee is filling the report on behalf of Colleague <span id="c_option"></span>.

</li>                                      <li> Employee has tried to resolve this issue prior to filling the report, <span id="c_tried_r_own"></span>.  </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title"> Context</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id ="demo">  </p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id ="city"> </p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label" >Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="work_location"> </p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="bu"> </p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="empid"></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="email"> </p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title"> Statement</h3>
                                            <div class="p-t-20">
                                                <p></p>
                                                <div class="p-t-20">
                                                    <!-- <img src="images/audio.png"> -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title"> Witnesses</h3>

                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Witness </label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="wi_name"></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="wi_city"></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="wi_location"></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="wi_bu"></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="wi_empid"></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label" id="wi_email_id"></p></div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
        </div>
    </div>
</div>