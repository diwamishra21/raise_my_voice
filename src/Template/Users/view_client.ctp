<?php
ob_start();
 use Cake\Routing\Router;
 use Cake\View\Helper\UrlHelper;
 $url_clientdetail = $this->Url->build(['controller' => 'Users', 'action' => 'viewClient']);
 $url_uupdateclientdetails = $this->Url->build(['controller' => 'Users', 'action' => 'updateclientdetails']);
 $session = $this->request->session();
                $session_data =  $session->read();
 $user_name = $session_data["Auth"]["User"]["name"]; 
 $user_id = $session_data["Auth"]["User"]["id"]; 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Clients | Admin </title>
    <!-- Bootstrap -->
        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('style.css') ?>
       <!--  <?= $this->Html->js('custom.js') ?> -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="dashboard.html">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="statistics.html">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="reports.html">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="employee-records.html">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="profile.html">Profile</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="profile.html">Add User</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="profile.html">View User</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user_name; ?><span class="caret"></span></a>
                   <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);
                     $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword']);
                   ?>
                    <ul class="dropdown-menu">
                        <li><a href='<?= $changepassword; ?>'>Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href='<?= $logout; ?>'>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="row">
        <?php echo $this->element('admin_sidebar'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <div class="row">
                        <div class="col-xs-8">
                            <h2 class="panel-block-title">Manage Clients</h2>
                        </div>
                        <div class="col-xs-4 text-right">
                            <?php $adduser=$this->Url->build(['controller'=>'Users','action'=>'add_client']); ?>
                            <a href="<?= $adduser;?>" class="btn btn-dark p-a-10"><i class="fa fa-plus p-r-10"></i> Add Client</a>
                            <!-- <button class="btn btn-dark"><a href="<?= $adduser;?>">Add User </a></button> -->
                        </div>
                    </div>
                </div>
                <hr/>
                <table class="table table-striped" id="report_table">
                    <thead>
                    <tr>
                        
                        <th>Client Type</th>
                        <th>Client Name</th>
                        <th>Mobile no</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($query as $client_detail):?> 
                
                  <td><?= $client_detail['client_type']?></td>
                  <td><?= $client_detail['client_name']?>   (<?= $client_detail['client_id']?>)</td>
                  <td><?= $client_detail['mobile']?></td>
                  <td> 
                    <?php $image=$client_detail['logo'];
echo $this->Html->image("../webroot/upload/$image", array('alt' => '', 'style' => 'width:100px')); ?>                  </td>
                  <td>
                    <i class="fa fa-edit" title="Edit client details"  data-toggle="modal" data-target="#edituser"  onclick="return editData('<?php echo $client_detail['client_id']?>')"></i>
                  <!-- <button type="button"  data-toggle="modal" data-target="#edituser" title="Edit Client" onclick="return editData('<?php echo $client_detail['client_id']?>')"><i class="fa fa-edit"></i></button> -->
                  <i class="fa fa-eye" data-toggle="modal" data-target="#viewuser" title="View client details"  onclick="return openPrompt('<?php echo $client_detail['client_id']?>');"></i>
                  <!-- <button type="button"  data-toggle="modal" data-target="#viewuser" title="View Client" onclick="return openPrompt('<?php echo $client_detail['client_id']?>');"><i class="fa fa-eye"></i></button> -->
                  </td>
                  </tr>
                  <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewuser" tabindex="-1" role="dialog" aria-labelledby="viewuser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Client Detail</h4>
            </div>
     
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_bu">Client Type: </label>
                           <span id="report_name"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_clientcode">Client code:</label>
                            <span id="report_clientcode"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_name">Client Name: </label>
                           <span id="report_name"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_email">Email ID:</label>
                            <span id="report_email"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                         <div class="form-group">
                            <label for="report_mobile">Mobile</label>
                            <span id="report_mobile"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_role">Website:</label>
                            <span id="report_role"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_loc">Address:</label>
                            <span id="report_loc"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_city">City:</label>
                            <span id="report_city"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_position">State:</label>
                            <span id="report_position"></span>
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

<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="edituser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_name">Client type<span style="color: red">*</span></label>
                            <input id="report_up_name" name="report_up_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_empID">Client name<span style="color: red">*</span></label>
                            <input id="report_up_empID" name="report_up_empID" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_email">Email ID<span style="color: red">*</span></label>
                            <input id="report_up_email" name="report_up_email" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_mobile">Mobile No.</label>
                            <input id="report_up_mobile" name="report_up_mobile" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_role">Website<span style="color: red">*</span></label>
                            <input id="report_up_role" name="report_up_role" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_loc">Work Location</label>
                            <input id="report_up_loc" name="report_up_loc" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_city">City</label>
                            <input id="report_up_city" name="report_up_city" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_position">State<span style="color: red">*</span></label>
                            <input id="report_up_position" name="report_up_position" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
                
                            <input type="hidden" id="report_clientid" name="report_clientid" class="form-control" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal" id="btnUpdate">Update</button>
                 
            </div>
        </div>
    </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script>
    $('#report_table').DataTable({
         "language": {
           "emptyTable": "No records found"
    }
    

    });
</script>
<style>
    #report_table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
    }

    #report_table td, #report_table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #report_table tr:nth-child(even){background-color: #f2f2f2;}

    #report_table tr:hover {background-color: #ddd;}

    #report_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #17bb94;
        color: white;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
 
 function openPrompt(client_id)
 {
    $.ajax({
        type:"POST",
        url: "<?= $url_clientdetail; ?>",
        data:{'client_id':client_id},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller

           data = JSON.parse(data);
           $('#report_name').html(data[0].client_type);
           $('#report_clientcode').html(data[0].client_code);
           $('#report_empID').html(data[0].client_name);
           $('#report_email').html(data[0].email_id);
           $('#report_mobile').html(data[0].mobile);
           $('#report_role').html(data[0].website);
           $('#report_loc').html(data[0].address1);
           $('#report_city').html(data[0].city);
           $('#report_position').html(data[0].state);
           $('#report_bu').html(data[0].country);
           $('#report_logo').text(data[0].logo);

        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }


    });
 }   


 function editData(client_id)
 {
     $.ajax({
        type:"POST",
        url: "<?= $url_clientdetail; ?>",
        data:{'client_id':client_id},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller

           data = JSON.parse(data);
           $('#report_up_name').val(data[0].client_type);
           $('#report_up_empID').val(data[0].client_name);
           $('#report_up_email').val(data[0].email_id);
           $('#report_up_mobile').val(data[0].mobile);
           $('#report_up_role').val(data[0].website);
           $('#report_up_loc').val(data[0].address1);
           $('#report_up_city').val(data[0].city);
           $('#report_up_position').val(data[0].state);
           $('#report_clientcode').val(data[0].country);
           $('#report_clientid').val(data[0].client_id);



        },

        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }


    });

 }

 $('#btnUpdate').click(function(event) {
          alert("User details updated");
           var clienttype = $('#report_up_name').val();
           var clientname =  $('#report_up_empID').val();
           var clientemail = $('#report_up_email').val();
           var clientaddress = $('#report_up_loc').val();
           var clientcity = $('#report_up_city').val();
           var clientid = $('#report_clientid').val();
  

         $.ajax({
        type:"POST",
        url: "<?= $url_uupdateclientdetails; ?>",
        data: {
             clienttype : clienttype,
             clientname : clientname,
             clientemail : clientemail,
           
            clientaddress : clientaddress,
            clientcity : clientcity,
            clientid : clientid
        },



       success : function(data) {
          alert("Details Updated");
        
         // alert(data);
        },
        error : function() {
           //alert("Value NOT reaching to controller ");
           
        } 
    }); 
 
});
    





</script>
</body>
</html>