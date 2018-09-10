
<?php
// pr($maillist);exit;
foreach ($individual_accuser_detail as $individual_accuser_details):
    $Harassment = $individual_accuser_details->c_subject;
    if ($Harassment == 1) {
        $string = 'Harassment';
    } elseif ($Harassment == 7) {
        $string = 'Disciplinary';
    } elseif ($Harassment == 4) {
        $string = ' Ethics';
    } else {
        $string = ' Others';
    }
    ?>
<?php endforeach; ?>
<?php
$session = $this->request->session();
$session_data = $session->read();
$session_user_id = $session_data["Auth"]["User"]["id"];
$user_role = $session_data["Auth"]["User"]["role"];
?>
<?php $id = h(@$individual_accuser_details->id) ?>

<?php $ComplaintDetailsAssignUser = $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsAssignUser']); ?>

<div class="col-sm-10">
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20 p-b-20">
        <div class="panel-divider"></div>
    </div>
    <?php
    foreach ($individual_accuser_detail as $individual_accuser_details) {
        $id = $individual_accuser_details->id;
    }
    ?>
    <!--<div class="container-fluid">
<div class="bg-transparent margin-bottom-30">
<h3 class="panel-block-label">Assign User Details</h3>
            
                            
    
    
</div>
<table class="table table-striped">
<thead>
<tr>

    <th>Name</th>
    <th>Business Unit</th>
    <th>Employee Id</th>
    <th>Email</th>
                             <th>status</th>
</tr>
</thead>
<tbody>

        <tr>
            <td style="color:black;"><?= @$assign_complaint_usersss->name ?></td>
    <td><?= @$assign_complaint_usersss['bu'] ?></td>
    <td><?= @$assign_complaint_usersss['empid'] ?></td>
    <td><?= @$assign_complaint_usersss['email'] ?></td>
                             <td></td>
</tr>

</tbody>
</table>
</div>-->


    <div class="container-fluid">
        <div class="panel-block">
            <!-- listin for assigned to starts here -->

<?php if (!empty($assign_userexist)) { ?>
                <div class="row">
                    <div class="bg-transparent margin-bottom-30">
                        <h3 class="panel-block-label">Assigned User Detail</h3>
                    </div>
                    <div class="col-md-12">
                        <table id="example" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>EmpId</th>
                                    <th>Email</th>
                                    <th>Businnes Unit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($fetchassigned_details as $assigned_details) {
                                    $status = '';
                                    $status = $assigned_details['assign_status'];
                                    if ($status == '1') {
                                        $status = 'Accepted';
                                    } elseif ($status == '1') {
                                        $status = 'Rejected';
                                    } else {
                                        $status = 'Pending';
                                    }
                                    ?>       
                                    <tr>
                                        <td><?= $assigned_details['name'] ?></td>
                                        <td><?= $assigned_details['empid'] ?></td>
                                        <td><?= $assigned_details['email'] ?></td>
                                        <td><?= $assigned_details['bu'] ?></td>
                                        <td><?= $status ?></td>
                                    </tr>
                                    <?php }
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            <?php }  ?>
            <!-- lisiting for assigned to ends here -->	
            <?php echo $this->Form->create('Complaints', ['Controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsAssign', $id,'id'=>'po-assign-form']); ?>

            <?php echo $this->Form->input('complaint_id', ['label' => false, 'id' => '', 'type' => 'hidden', 'class' => 'form-control', 'value' => $id]); ?> 
<?php echo $this->Form->input('user_id', ['label' => false, 'id' => '', 'type' => 'hidden', 'class' => 'form-control', 'value' => $session_user_id]); ?> 



<?php echo $this->Form->input('superwisor_complaint_accept_date', ['label' => false, 'id' => '', 'type' => 'hidden', 'class' => 'form-control', 'value' => $time]); ?>   
            <?php
            $roleData=[];
            $roleUserData=[];
           // pr($user_roles);die;
            if(!empty($user_roles)){
                foreach($user_roles as $ur){
                    if(empty($roleData[$ur['role_id']])){
                        $roleData[$ur['role_id']]=$ur['role']['name'];
                    }
                    $roleUserData[$ur['user']['id']]=$ur['user']['name'];
                }
            }
           // pr($roleData);die;
           // pr($roleUserData);die;
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Assign To</label>
                        <select id="role"  name="assigned_role" class="form-control">
                            <?php
                            if (!empty($roleData)) {
                                echo '<option valuse="0">Choose an option</option>';
                                foreach ($roleData as $key => $value) {
                                    echo '<option value="' . $key . '">' . $value. '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="severity">Select User</label>
                        <select id="user_sub" name="assigned_to" class="form-control">
                            <?php
                            if (!empty($roleUserData)) {
                                //pr($roleUserData);die;
                                echo '<option value="0">Choose an option</option>';
                                foreach ($roleUserData as $key => $value) {
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Send Additional Email To</label>
                        <select id="assign_email"  name="assign_email[]" class="form-control" multiple="multiple">
                            <?php
                            if (!empty($maillist)) {
                                echo '<option value="0">Choose an option</option>';
                                foreach ($maillist as $key => $value) {
                                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="severity">Disposition</label>
                        <select id="" name="status"  class="form-control">
                            <?php
                            if (!empty($Cstatus)) {
                                echo '<option value="0">Choose an option</option>';
                                foreach ($Cstatus as $key => $value) {
                                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
<?php echo $this->Form->button('Submit', ['class' => 'btn btn-dark']); ?>
                    </div>
                </div>
            </div>
        </div>
<?php echo $this->Form->end(); ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#assign_email').select2();
        $('#po-assign-form').submit(function(){
            if($('#role').val()=="0"){
                alert('Please select role !');
                return  false;               
            }
             if($('#user_sub').val()=="0"){
                alert('Please select user !');
                return  false;               
            }
        })
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
