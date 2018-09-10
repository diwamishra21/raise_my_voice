<?php
ob_start();
 use Cake\Routing\Router;
 use Cake\View\Helper\UrlHelper;
 $url_userdetail = $this->Url->build(['controller' => 'Users', 'action' => 'viewuser']);
 $url_userdetail1 = $this->Url->build(['controller' => 'Users', 'action' => 'viewuser1']);
 $url_userdetails = $this->Url->build(['controller' => 'Users', 'action' => 'updateuserdetails']);
 $url_deleteuser = $this->Url->build(['controller' => 'Users', 'action' => 'deleteuser']);
 $url_enableuser = $this->Url->build(['controller' => 'Users', 'action' => 'enableuser']);
 $url_disableuser = $this->Url->build(['controller' => 'Users', 'action' => 'disableuser']);
$session = $this->request->session();
                $session_data =  $session->read(); 
 $user_name = $session_data["Auth"]["User"]["name"]; 
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Users | Admin </title>
    <!-- Bootstrap -->
        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('style.css') ?>
     

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                            <h2 class="panel-block-title">Manage Users</h2>
                        </div>
                        <div class="col-xs-4 text-right">
                            <?php $adduser1=$this->Url->build(['controller'=>'Users','action'=>'team']); ?>
                            
                            <?php $adduser=$this->Url->build(['controller'=>'Users','action'=>'add_user']); ?>
                            <a href="<?= $adduser;?>" class="btn btn-dark p-a-10"><i class="fa fa-plus p-r-10"></i> Add User</a>
                            <a href="<?= $adduser1;?>" class="btn btn-dark p-a-10">Assign Role</a>
                            <!-- <button class="btn btn-dark"><a href="<?= $adduser;?>">Add User </a></button> -->
                        </div>
                    </div>
                </div>
                <hr/>
                <table class="table table-striped" id="report_table">
                    <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Work Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                         
                    <?php foreach ($user_detail as $user_detail):
                         $role = $user_detail['role'];
                              $string = '';
                            if (empty($role)) {
                                $string = 'Accuser';
                            }else{
                                $string = $role ;
                            }

                            ?>
                  <td><?= $user_detail['empid']?></td>
                  <td><?= $user_detail['name']?></td>
                  <td><?= $user_detail['email']?></td>
                  <td><?= $user_detail['work_location']?></td>
                  <td >
                    <i class="fa fa-edit" data-toggle="modal" data-target="#edituser" title="Edit User"  onclick="return editData('<?php echo $user_detail['id']?>')"></i>
                  <!-- <button type="button"  data-toggle="modal" data-target="#edituser" title="Edit Client" onclick="return editData('<?php echo $client_detail['client_id']?>')"><i class="fa fa-edit"></i></button> -->
                  <i class="fa fa-eye" data-toggle="modal" data-target="#viewuser" title="View User"  onclick="return openPrompt('<?php echo $user_detail['id']?>');"></i>
                  <?php if($user_detail['confirmed'] == 1){?>
                    <i class="fa fa-toggle-on" title="Disable User"  onclick="return disableuser('<?php echo $user_detail['id']?>');"></i>
                  <?php } else{?>
                  <i class="fa fa-toggle-off" title="Enable User"  onclick="return enableuser('<?php echo $user_detail['id']?>');"></i>
                  <?php } ?>
                  <i class="fa fa-times" style="color:red" title="Delete User"  onclick="return deleteuser('<?php echo $user_detail['id']?>');"></i>
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
                <h4 class="modal-title" id="myModalLabel">User Detail</h4>
            </div>
     
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_bu">Bussiness Unit: </label>
                           <span id="report_bu"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_clientcode">Client Code:</label>
                            <span id="report_clientcode"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_name">Name: </label>
                           <span id="report_name"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_empID">Employee ID:</label>
                            <span id="report_empID"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_email">Email ID:</label>
                            <span id="report_email"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_mobile">Mobile No:</label>
                            <span id="report_mobile"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_role">Role:</label>
                            <span id="report_role"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_loc">Work Location:</label>
                            <span id="report_loc"></span>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_city">City:</label>
                            <span id="report_city"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_position">Position:</label>
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
                <h4 class="modal-title" id="myModalLabel">Update User</h4>
            </div>
            <div class="modal-body">
                <!-- <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="report_up_name">Business unit<span style="color: red">*</span></label>
                            <select id="report_up_bu" name="report_up_bu" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="QGS Pvt Ltd">QGS Pvt Ltd</option>
                                        <option value="QBSS Pvt Ltd">QBSS Pvt Ltd</option>
                                        <option value="QMS Pvt Ltd">QMS Pvt Ltd</option>
                                        <option value="QPS Pvt Ltd">QPS Pvt Ltd</option>
                                    </select>
                        </div>
                    </div>
                    </div> -->
                   
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_name">Name<span style="color: red">*</span></label>
                            <input id="report_up_name" name="report_up_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_empID">Employee ID<span style="color: red">*</span></label>
                            <input id="report_up_empID" name="report_up_empID" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_email">Email ID</label>
                            <input id="report_up_email" name="report_up_email" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_mobile">Mobile No.</label>
                            <input id="report_up_mobile" name="report_up_mobile" class="form-control"/>
                            <input type="hidden" id="report_up_id" name="report_up_id" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <div class="form-group">
                            <label for="report_up_name">Business unit<span style="color: red">*</span></label>
                            <select id="report_up_bu" name="report_up_bu" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="QGS Pvt Ltd">QGS Pvt Ltd</option>
                                        <option value="QBSS Pvt Ltd">QBSS Pvt Ltd</option>
                                        <option value="QMS Pvt Ltd">QMS Pvt Ltd</option>
                                        <option value="QPS Pvt Ltd">QPS Pvt Ltd</option>
                                    </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_loc">Work Location<span style="color: red">*</span></label>
                            <select id="report_up_loc" name="report_up_loc" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="Gurgaon">Gurgaon</option>
                                        <option value="Thane">Thane</option>
                                        <option value="Chennai">Chennai</option>
                                    </select>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_city">City</label>
                             <select id="report_up_city" name="report_up_city" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="Gurgaon">Gurgaon</option>
                                        <option value="Thane">Thane</option>
                                        <option value="Chennai">Chennai</option>
                                    </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="report_up_position">Position</label>
                            <input id="report_up_position" name="report_up_position" class="form-control"/>
                        </div>
                    </div>
                   
                </div>
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
        "aaSorting": [],
        "columns": [
            {"width": "15%"},
            {"width": "18%"},
            {"width": "25%"},
            {"width": "13%"},
            {"width": "10%"},
            
        ],
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



<script type="text/javascript">

// $(document).ready(function(){
// $('#report_up_role').select2();
// });

    
    function openPrompt(id)
{
    $.ajax({
        type:"POST",
        url: "<?= $url_userdetail1; ?>",
        data:{'id':id},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller

           data = JSON.parse(data);
           //alert(data);

          $('#report_name').html(data[0].name);
           $('#report_empID').html(data[0].empid);
           $('#report_email').html(data[0].email);
           $('#report_mobile').html(data[0].mobile);
           $('#report_role').html(data[0].role);
           $('#report_loc').html(data[0].work_location);
           $('#report_city').html(data[0].city);
           $('#report_position').html(data[0].position);
           $('#report_bu').html(data[0].bu);



        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });
    }

    function editData(id)
{
    $.ajax({
        type:"POST",
        url: "<?= $url_userdetail; ?>",
        data:{'id':id},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller

           data = JSON.parse(data);
           //alert(data);

           $('#report_up_name').val(data[0].name);
           $('#report_up_empID').val(data[0].empid);
           $('#report_up_email').val(data[0].email);
           $('#report_up_mobile').val(data[0].mobile);
           $('#report_up_role').val(data[0].role);
           $('#report_up_loc').val(data[0].work_location);
           $('#report_up_city').val(data[0].city);
           $('#report_up_position').val(data[0].position);
           $('#report_up_bu').val(data[0].bu);
            $('#report_up_id').val(data[0].id);
           
           //$('#report_clientcode').val(data[0].position);



        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });

    }


    function deleteuser(id)
    {
         $.ajax({
        type:"POST",
        url: "<?= $url_deleteuser; ?>",
        data:{'id':id},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller
           alert("User deleted sucessfully");
           location.reload();
        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });
     
    }

    function enableuser(id)
    {
        var confirmed = 1;
         $.ajax({
        type:"POST",
        url: "<?= $url_enableuser; ?>",
        data:{'id':id,'confirmed':confirmed},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller
           alert("User active sucessfully");
           location.reload();
        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });

    }

    function disableuser(id)
    {
         var confirmed = 0;
         $.ajax({
        type:"POST",
        url: "<?= $url_disableuser; ?>",
        data:{'id':id,'confirmed':confirmed},
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller
           alert("User deactive sucessfully");
           location.reload();
        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });

    }

    $('#btnUpdate').click(function(event) {
          
           var report_up_name = $('#report_up_name').val();
           var report_up_empID =  $('#report_up_empID').val();
           var report_up_email = $('#report_up_email').val();
           var report_up_loc = $('#report_up_loc').val();
           var report_up_city = $('#report_up_city').val();
           var report_up_position = $('#report_up_position').val();
           var report_up_bu = $('#report_up_bu').val();
           var report_up_mobile = $('#report_up_mobile').val();
           var report_up_id = $('#report_up_id').val();
           

  

         $.ajax({
        type:"POST",
        url: "<?= $url_userdetails; ?>",
        data: {
                 report_up_name : report_up_name,
                 report_up_empID : report_up_empID,
                 report_up_email : report_up_email,
                 report_up_mobile : report_up_mobile,
                 report_up_bu : report_up_bu,
                 report_up_loc : report_up_loc,
                 report_up_city : report_up_city,
                 report_up_id : report_up_id,
                 report_up_position : report_up_position
        },



       success : function(data) {
          alert("Details Updated");
          location.reload();
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