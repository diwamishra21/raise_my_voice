
<?php 
    $session=$this->request->session();
    $session_data = $session->read();
    $user_role = $session_data["Auth"]["User"]["role"];?>
<?php foreach ($individual_accuser_detail as $individual_accuser_details): 
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

                       <?php   endforeach; ?>
<?php $id= h(@$individual_accuser_details->id) ?>
          <div class="col-sm-10">
           <?php echo $this->element('myvoice/complaint_summary'); ?>
            <div class="p-t-20 p-b-20">
              
                <div class="panel-divider"></div>
            </div>
            <div class="container-fluid">
                <div class="bg-transparent margin-bottom-30">
                    <h3 class="panel-block-label">Witness Details</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Business Unit</th>
                        <th>Employee Id</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
<?php foreach ($witness_user_detail as $witness_user_details): ?>
                    <tr>
                       
                        <td><?= h(@$witness_user_details->wi_name) ?></td>
                        <td><?= h(@$witness_user_details->wi_bu) ?></td>
                        <td><?= h(@$witness_user_details->wi_empid) ?></td>
                        <td><?= h(@$witness_user_details->wi_email_id) ?></td>
                    </tr>
                    <?php   endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="row">
                            <div class="col-md-6">
                               
                            </div>
                            <div class="col-md-6 text-right">
                               <?php if($user_role === '7' || $user_role === '6'){ ?>
                                 <button type="button" class="btn btn-dark" onclick="return witnessReset();" id="witnessbutton" data-toggle="modal" data-target="#myModal" style="color:#fff;">+ Add Witness</button>
                                 

                                 <?php } ?>  
                                
                            </div>
                        </div>
        </div>
    </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Witness</h4>
            </div>
            
            <div class="modal-body bg-light">
        <?= $this->Form->create("Witns", ['id'=>'wit_form','url' => ['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsWitness',$id]]); ?>
               
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_name">Name<span style="color: red">*</span></label>
<?php echo $this->Form->input('user_complaint_id',['label' => 'Name','id'=>'witness_id','type'=>'hidden','class'=>'form-control' ,'value'=>$id]);  ?> 
<input type="text" name="wi_name" id="witness_name" class="form-control">

<span id="check_witness_name"></span>                          
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_bu">Business unit</label>
                                <input type="text" name="wi_bu" id="wi_bu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_city">City</label>
                            <input type="text" name="wi_city" id="wi_bu" class="form-control">
        

                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_work">Work location</label>
                                <input type="text" name="wi_location" id="wi_bu" class="form-control">
                              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_emp_id">Employee ID</label>
                                <input type="text" name="wi_empid" id="wi_bu" class="form-control">
                               
                            </div>
                        </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_email">Email ID</label>
                                 <input type="text" name="wi_email_id" id="wi_bu" class="form-control">
                                
                            </div>
                        </div>
                        
                         </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="witness phone">Phone</label>
                                    <input type="" id="phone" name="phone" class="form-control">
                                </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                
<label for="witness_relation">Relationship</label>
            <input type="text" id="phone" name="relationship" class="form-control">
                                
                            </div>
                        </div>
                    </div>
                <div class="row">
                        
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="Remark">Remark</label>
                                <textarea id="remark" name="remark" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= $this->Form->button('Add Witness',['escape' => false,'type' => 'submit', 'class'=>'btn btn-dark wit_fetch ','id'=>'wit','style' => 'color:#fff;']) ?>
                
            </div>
             <?= $this->Form->end() ?>
        </div>
         
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
     function removeWitness(witness){
        if(witness != ''){
            $(".witnessRow_"+witness).remove();
        }
    }
    $('#wit').click(function(){
    var valid = true;
    if($('#witness_name').val()=='')
    {
        $('#witness_name').css('border','1px solid red');
        $('#check_witness_name').text('Please enter name ');
        $('#check_witness_name').addClass('error_label');
        valid = false;
        $('#accused_name').focus();
      }
     else
      {
        $('#witness_name').css('border','1px solid #cccccc');   
        $('#check_witness_name').text('');
       }


       if(valid == true)
        {
           alert("Witness added sucessfully");
        }
        else
        {
            return false;
        }

    });   

</script>