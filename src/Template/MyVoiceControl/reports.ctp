
<div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">Reports</h2>
                </div>
               
                <hr>
                <div id="report_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="report_table" role="grid" aria-describedby="report_table_info">
                    <thead>
                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 66px;" aria-label="Case ID: activate to sort column descending">Complaint Id</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 353px;" aria-label="Title: activate to sort column descending">Complaint Title</th>
<th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 116px;" aria-label="Category: activate to sort column descending">Category</th>

<th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 85px;" aria-label="Filed On: activate to sort column descending">Filed On</th>

<th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 87px;" aria-label="Accuser: activate to sort column descending">Complainant</th>
<th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 87px;" aria-label="Accused: activate to sort column descending">
Respondent</th>
<th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 69px;" aria-label="Severity: activate to sort column descending">Severity</th>
<th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 95px;" aria-label="Status: activate to sort column descending">Status</th>
</tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($user_detail as $user_detail){ 

$Harassment=$user_detail['c_subject'];

if($Harassment == 1)
    $string = 'Harassment';
if($Harassment == 2)
    $string = 'Disciplinary';
if($Harassment == 3)
   $string = 'Bussiness Ethics';

?>
    
<?php $complaintDetails= $this->Url->build(['controller' => 'Supervisor', 'action' =>'complaintDetails',$user_detail['id']]);?>
<?php $complaintDetailsaccuser= $this->Url->build(['controller' => 'Supervisor', 'action' => 'complaintDetailsAccuser',$user_detail['id']]);?>
<?php $status=$user_detail['status']; ?>  
<?php $category= $user_detail['c_subject'] ;
?>
<?php if($status == 'Case Valid')  { ?>       
         <tr role="row" class="odd">

                       
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['c_title'] ?></a></td>
  <td><a href="<?= $complaintDetailsaccuser ; ?>"><?=  @$string ; ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>">
<?= date('d/m/Y',strtotime($user_detail['complaint_id_genrate_date'])) ; ?></a></td>
               

                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['name'] ?></a></td>
                        <td>
 <?php foreach ($user_detail->accused as $accuseds): ?>  
    <?=  $accuseds->accused_name.","; ?>  
  <?php endforeach; ?>

 </td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['status'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['severity'] ?></a></td>
                    </tr>
                    <?php $i++; }
elseif($status == 'Case Not Valid') { ?>
<tr role="row" class="odd">
                   
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['c_title'] ?></a></td>
 <td><a href="<?= $complaintDetailsaccuser ; ?>"><?=  @$string ; ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= date('d/m/Y',strtotime($user_detail['complaint_id_genrate_date'])) ; ?></a></td>
                       
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['name'] ?></a></td>
                        <td></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['status'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['severity'] ?></a></td>
                    </tr>
<?php $i++; }
elseif($status == 'Case Filed') { ?>
<tr role="row" class="odd">
                               <td><a href="<?= $complaintDetails ; ?>"><?= $user_detail['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $user_detail['c_title'] ?></a></td>
  <td><a href="<?= $complaintDetails ; ?>"><?=  @$string ; ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= date('d/m/Y',strtotime($user_detail['complaint_id_genrate_date'])) ; ?></a></td>
                      
                        <td><a href="<?= $complaintDetails ; ?>"><?= $user_detail['name'] ?></a></td>
                        <td></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $user_detail['status'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $user_detail['severity'] ?></a></td>
                    </tr>

<?php  } else {

}
$i++;
 } ?>
                    </tbody>
                </table></div></div></div>
            </div>
        </div>



