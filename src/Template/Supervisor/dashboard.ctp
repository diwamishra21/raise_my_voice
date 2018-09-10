
<div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">My Dashboard</h2>
                </div>
                <div class="decorate-filter" style="background: #f1f1f1; padding: 10px; color: #222222;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="complaint_id">Complaint Id</label>
                                <input type="text" id="complaint_id" name="complaint_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" onchange="return filterSelected();"  name="category" class="form-control">
                                <option value="">-- Select Category --</option>
                                <?php foreach($data as $data){ ?>
                                <option value="<?php echo $data['category_id']; ?>"><?php echo $data['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sub category">Sub Category</label>
                                <select id="subCategory" name="category" class="form-control">
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="severity">Severity</label>
                                <select id="severity" name="severity" class="form-control">
                                <option value="">-- Select Severity --</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">City</label>
                                <select class="form-control" id="city">
                                <option value="">--Select City--</option>
                                <?php foreach($city as $city){ ?>
                                <option value="<?= $city['city'] ?>"><?php echo ucfirst($city['city']); ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date range">Pick Date From</label>
                                <input type="text" class="form-control" id="from_date" name="from" value="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date range">Pick Date To</label>
                                <input type="text" class="form-control" id="to_date" name="from" value="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="button" id="apply_filter" style="margin-top:29px;" class="btn btn-primary" onclick="return getFilterDashboard();" name="apply_filter">Apply Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="first_table">
                    <div id="report_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="report_table" role="grid" aria-describedby="report_table_info">
                    <thead>
                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 66px;" aria-label="Case ID: activate to sort column ascending">Case ID</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 353px;" aria-label="Title: activate to sort column ascending">Title</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 85px;" aria-label="Filed On: activate to sort column ascending">Filed On</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 116px;" aria-label="Category: activate to sort column ascending">Category</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 87px;" aria-label="Accuser: activate to sort column ascending">Accuser</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 87px;" aria-label="Accused: activate to sort column ascending">Accused</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 95px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="report_table" rowspan="1" colspan="1" style="width: 69px;" aria-label="Severity: activate to sort column ascending">Severity</th></tr>
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
<?php $category= $user_detail['c_subject'] ;?>
<?php if($status == 'Case Valid')  { ?>       
         <tr role="row" class="odd">

                       
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['c_title'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['complaint_id_genrate_date'] ?></a></td>
                 <td><a href="<?= $complaintDetailsaccuser ; ?>"><?=  @$string ; ?></a></td>

                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['name'] ?></a></td>
                        <td></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['status'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['severity'] ?></a></td>
                    </tr>
                    <?php $i++; }
elseif($status == 'Case Not Valid') { ?>
<tr role="row" class="odd">
                   
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['c_title'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $user_detail['complaint_id_genrate_date'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?=  @$string ; ?></a></td>
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
                        <td><a href="<?= $complaintDetails ; ?>"><?= $user_detail['complaint_id_genrate_date'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?=  @$string ; ?></a></td>
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
                <div>
               
            </div>
</div>

<div id="search_data" style="display:none">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Case Id</th>
                <th>Title</th>
                <th>Field On</th>
                <th>Category</th>
                <th>Accuser</th>
                <th>Accused</th>
                <th>Status</th>
                <th>Severity</th>
            </tr>
        </thead>
        
    </table>
</div>
 

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
    $( "#from_date" ).datepicker();
    $( "#to_date" ).datepicker();
  } );

</script>
<script>
$('table.table').DataTable();


</script>

<!-- code for fetching sub category based on category selection on dashboard file for supervisor -->

<script>
    function  filterSelected(){
        var sel=$('#category').val();
        $.ajax({
            url:'getSubcate',
            data:{'sel':sel},
            method:'POST',
            success:function(data){
                var d=$.parseJSON(data);
                $('#subCategory').html(d.html);
            }
        });
    }
    function getFilterDashboard(){
        var complaintId = $('#complaint_id').val();
        var category    = $('#category').val();
        var subcategory = $('#subCategory').val();
        var severity    = $('#severity').val();
        var city        = $('#city').val();
       // var from_date   = $('#from_date').val();
       // var to_date     = $('#to_date').val();

       $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/myvoicev2/Supervisor/getFilterDashboard/",
            "type": "POST",
            "data":{'complaintId':complaintId,
                   'category':category,
                   'subcategory':subcategory,
                   'severity':severity,
                   'city':city},

            success: function(data){
                    $('#first_table').hide();
                    //$('#fetch_result').html(data);
                    $('#search_data').show();
                   
                }       
        },
        "columns": [
            { data: "complaint_id" },
            { data: "c_title" },
            { data: "complaint_id_genrate_date" },
            { data: "office" },
            { data: "name" },
            { data: "status" },
            { data: "severity" }
        ]
    } );

/*
        $.ajax({
            url: '/myvoicev2/Supervisor/getFilterDashboard/',
            type: 'POST',
            data: {'complaintId':complaintId,
                   'category':category,
                   'subcategory':subcategory,
                   'severity':severity,
                   'city':city},

            success: function(data){
                    $('#first_table').hide();
                    $('#fetch_result').html(data);
                    $('#search_data').show();
                }
         })
*/
    }
</script>