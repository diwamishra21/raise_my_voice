
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
     $session_data=$session->read();
    $user_role = $session_data["Auth"]["User"]["role"]; ?>
<?php $id= h(@$individual_accuser_details->id) ?>
<?php $id= h(@$individual_accuser_details->id) ?>
          
        <div class="col-sm-10">
         <?php echo $this->element('myvoice/complaint_summary'); ?>
            <div class="p-t-20 p-b-20">
                <?php foreach ($individual_accuser_detail as $individual_accuser_details){
				$id=$individual_accuser_details->id;
                                $severity = $individual_accuser_details->severity;
			} ?>
                <div class="panel-divider"></div>
            </div>
            <div class="container-fluid">
                <div class="panel-block">
<h5 style="color:red;"><?php //echo $this->Flash->render(); ?>   </h5>
                  <?= $this->Form->create('Users',['url' => ['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsAccusationNature',$id]]);?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_concern">Category</label>
                                     <select onchange="return filterSelected();" name="category_concern" class="form-control" id="category_concern">
                                        <?php
                        if(!empty($catdata)){
                                 echo '<option value="0" >Select</option>';
                            foreach($catdata as $key=>$value){ ?>
                              
                               <option value="<?= $key ?>" <?php if(!empty($get_category) && $key == $get_category) echo 'selected=selected' ?> ><?= $value['name'] ?></option>
                           <?php }
                        }
                        ?>
                               </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="category_concern_sub">SubCategory</label>
                                <select name="category_concern_sub" class="form-control" id="category_concern_sub">
                                 <?php
//                        if(!empty($catdata)){
//                            //pr($catdata);die();
//                            echo '<option value="0" >Choose an option</option>';
//                            foreach($data as $key=>$value){
//                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
//                            }
//                        }
                        ?> 
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="severity">Severity</label>
                                <select name="severity" id="severity" class="form-control">
                                    <option value="">Select</option>
                                    <option value="High" <?php if(!empty($severity) && $severity === 'High') echo 'selected=selected' ?>>High</option>
                                    <option value="Medium" <?php if(!empty($severity) && $severity === 'Medium') echo 'selected=selected' ?>>Medium</option>
                                    <option value="Low" <?php if(!empty($severity) && $severity === 'Low') echo 'selected=selected' ?>>Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="form-group">
   <?= $this->Form->button('Submit',['escape' => false,'type' => 'submit','class'=>'btn btn-dark']) ?>
                           
                            </div>
                        </div>
                    </div>
                  <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      filterSelected();

      

    });
 function  filterSelected(){
        var sel=$('#category_concern').val();
        var selSub=<?=$get_subcategory;?>;
        $.ajax({
            url:'<?php echo$this->Url->build('/'); ?>MyVoiceControl/getSubcate',
            data:{'sel':sel},
            method:'POST',
            success:function(data){
                var d=$.parseJSON(data);
                $('#category_concern_sub').html(d.html);
                $('#category_concern_sub').val(selSub);
            }
        });
    }
</script>

