<?php
 $action = $this->Url->build(['controller' => 'Supervisor', 'action'=> 'report']);
?>
<div class="col-sm-10">
    <div class="container-fluid">
        <div class="panel-block bg-transparent" id="reports">
            <h2 class="panel-block-title">Reports</h2>
        </div>
        <form method="POST" action="<?= $action ?>">
            <div class="decorate-filter" style="background: #f1f1f1; padding: 10px; color: #222222;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="complaint_id">Complaint Id</label>
                                <input type="text" id="complaint_id" value="<?php if(!empty($complaintId)) echo $complaintId; ?>" name="complaint_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" onchange="return filterSelected();"  name="category" class="form-control">
                                <option value="">Select</option>
                                <option value="">All</option>
                                <?php foreach($data as $data){ ?>
                                <option value="<?php echo $data['category_id']; ?>"<?php if(!empty($category) && $data['category_id'] == $category) echo 'selected=selected'; ?>><?php echo $data['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sub category">Sub Category</label>
                                <select id="subCategory" name="subCategory"  class="form-control">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="severity">Severity</label>
                                <select id="severity" name="severity" class="form-control">
                                <option value="">Select</option>
                                <option value="">All</option>
                                <option value="High" <?php if(!empty($severity) && 'High' == $severity) echo 'selected=selected'; ?>>High</option>
                                <option value="Medium" <?php if(!empty($severity) && 'Medium' == $severity) echo 'selected=selected'; ?>>Medium</option>
                                <option value="Low" <?php if(!empty($severity) && 'Low' == $severity) echo 'selected=selected'; ?>>Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">City</label>
                                <select class="form-control" name="city" id="city">
                                <option value="">Select</option>
                                <option value="">All</option>
                                <?php foreach($city as $city){ ?>
                                <option value="<?= $city['city'] ?>" <?php if(!empty($sahar) && $city['city'] == $sahar) echo 'selected=selected'; ?>><?php echo ucfirst($city['city']); ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date range">Pick Date From</label>
                                <input type="text" class="form-control" id="from_date" value="<?php if(!empty($from)) echo $from ?>" name="from" value="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date range">Pick Date To</label>
                                <input type="text" class="form-control" id="to_date" name="to_date" value="<?php if(!empty($to)) echo $to ?>" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button  id="apply_filter" style="margin-top:29px;" class="btn btn-primary" name="apply_filter">Apply Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <hr>
        <div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Case Id</th>
                        <th>Title</th>
                        <th>Filled On</th>
                        <th>Category</th>
                        <th>Complainant</th>
                        <th>Respodent</th>
                        <th>Status</th>
                        <th>Severity</th>  
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($result as $result){
                    $Harassment=$result['c_subject'];
//                    $status=$result['complaint_id_status'];
//                    if($status == 1){
//                        $status = 'Complaint Generated';
//                    }    
//                    if($status == '0'){
//                        $status = 'Complaint Not Generated';
//                    }
                    
                    if($Harassment == 1){
                    $string = 'Harassment';
                    }
                    if($Harassment == 2){
                    $string = 'Disciplinary';
                    }
                    if($Harassment == 3){
                    $string = 'Bussiness Ethics';
                    }

$complaintDetails= $this->Url->build(['controller' => 'Supervisor', 'action' =>'complaintDetails',$result['id']]);
$complaintDetailsaccuser= $this->Url->build(['controller' => 'Supervisor', 'action' => 'complaintDetailsAccuser',$result['id']]);                                   
$status=$result['status'];
$category= $result['c_subject']; 
?>
<?php if($status == 'Case Valid' || $status == 'Case Not Valid')  { ?>                 
                    <tr>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $result['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $result['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $result['complaint_id_genrate_date'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= @$string ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $result['c_title'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $result['accused_name'] ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $status ?></a></td>
                        <td><a href="<?= $complaintDetailsaccuser ; ?>"><?= $result['severity'] ?></a></td>
                    </tr>
                <?php } ?> 
<?php if($status == 'Case Filed')  { ?>                     
                    <tr>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $result['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $result['complaint_id'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $result['complaint_id_genrate_date'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= @$string ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $result['c_title'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $result['accused_name'] ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $status ?></a></td>
                        <td><a href="<?= $complaintDetails ; ?>"><?= $result['severity'] ?></a></td>
                    </tr>
                <?php } ?> 
<?php } ?>                    
                </tbody>
            </table>
        </div>
        
    </div>
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
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<!-- code for fetching sub category based on category selection on dashboard file for supervisor -->

<script>
    $(document).ready(function(){
        var category = '<?php echo $category; ?>';
        var subcategory = '<?php echo $subcategory; ?>';
        if(category !== ''){
            $.ajax({
                url:'getSubcate',
                data:{'sel':category},
                method:'POST',
                success:function(data){
                    var d=$.parseJSON(data);
                    $('#subCategory').html(d.html);
                        if(subcategory !== ''){
                            $('#subCategory').val(subcategory);
                        }
                }
            });
        }
    });
    
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
</script>   


<style>
    #example {
    /*font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;*/
    border-collapse: collapse;
    width: 100%;
    table-layout: fixed;
}

#example td, #example th {
    border: 1px solid #ddd;
    padding: 8px;
}

#example tr:nth-child(even){background-color: #f2f2f2;}

#example tr:hover {background-color: #ddd;}

#example th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #17bb94;
    color: white;
}
</style>