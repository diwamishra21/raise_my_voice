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
    $user_role = $session_data["Auth"]["User"]["role"]; ?>
<?php $id= h(@$individual_accuser_details->id) ?>
                   <div class="col-sm-10">
            <?php echo $this->element('myvoice/complaint_summary'); ?>
            <div class="p-t-20 p-b-20">
               
                <div class="panel-divider"></div>
            </div>
            <div class="container-fluid">
                <div class="bg-transparent margin-bottom-30">
                    <h3 class="panel-block-label">Offender Details</h3>
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
<?php foreach ($accused_detail as $accused_details): ?>
                    <tr>
                       
                        <td><?= h(@$accused_details->accused_name) ?></td>
                        <td><?= h(@$accused_details->accused_bu) ?></td>
                        <td><?= h(@$accused_details->accused_empid) ?></td>
                        <td><?= h(@$accused_details->accused_email) ?></td>
                    </tr>
                    <?php   endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>