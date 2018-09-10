<?php
ob_start();
 use Cake\Routing\Router;
 use Cake\View\Helper\UrlHelper;
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
    <title>View Category / Subcategory | Admin </title>
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
                            <h2 class="panel-block-title">Manage Category / Sub category</h2>
                        </div>
                        <div class="col-xs-2 text-right">
                            <?php $addcategory=$this->Url->build(['controller'=>'Users','action'=>'addcategory']); ?>
                           <a href="<?= $addcategory;?>" class="btn btn-dark p-a-10"><i class="fa fa-plus p-r-10"></i>Category</a>
                        </div>
                        <div class="col-xs-2 text-right">
                            <?php $addsubcategory=$this->Url->build(['controller'=>'Users','action'=>'addsubcategory']); ?>
                            <a href="<?= $addsubcategory;?>" class="btn btn-dark p-a-10"><i class="fa fa-plus p-r-10"></i>Subcategory</a>
                        </div>
                    </div>
                </div>
                <hr/>
                <table class="table table-striped" id="report_table">
                    <thead>
                    <tr>
                        <th>Client Type</th>
                        <th>Client Name</th>
                        <th>Category Name</th>
                        <th>Subcategory Name</th>
                        <th>Status</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($data as $key){
                    $voice = '';
                    if($key['sub_cat_id'] === '1'){
                        $voice = 'Harassment';
                    }
                    if($key['sub_cat_id'] === '4'){
                        $voice = 'Ethics';
                    }
                    if($key['sub_cat_id'] === '7'){
                        $voice = 'Diciplinary';
                    }
                    if($key['id'] === '1'){
                        $voice = 'Harassment';
                    }
                    if($key['id'] === '4'){
                        $voice = 'Ethics';
                    }
                    if($key['id'] === '7'){
                        $voice = 'Diciplinary';
                    }
                    ?>
                    <tr>   
                    <td><?php echo $key['type']; ?></td>
                     <td><?php echo $key['client_name']; ?></td> 
                    <td><?php echo $voice; ?></td>   
                    <td><?php echo $key['name']; ?></td>
                    <td>
                    <!--<td><?php // echo $key['status']; ?></td>-->
                    <?php if($key['status'] === '1'){ ?>
                   <i class="fa fa-toggle-on" title="Active" onclick="return openPromptInactive('<?php echo $key['id']?>');"></i>
                 <?php  }else{ ?>
                 <i class="fa fa-toggle-off" title="Inactive" onclick="return openPromptActive('<?php echo $key['id']?>');"></i>
                 <?php } ?>
                    </td>
                </tr> 
                    <?php  }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<?php $url_userdetail = $this->Url->build(['controller' => 'Users', 'action' => 'updatecategory']); ?>
<script type="text/javascript">
    function openPromptInactive(id)
{  var status = 0;
    $.ajax({
        type:"POST",
        url: "<?= $url_userdetail; ?>",
        data:{'id':id,
               'status':status 
              },
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller
//           alert(data);
        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });
    alert('Category Inactivated Sucessfully');
    location. reload(true);
    }
    function openPromptActive(id)
{   var status = 1;
    $.ajax({
        type:"POST",
        url: "<?= $url_userdetail; ?>",
        data:{'id':id,
              'status' :status 
             },
        success : function(data) {
           //alert(data); //value right now is in this variable ... i want to send this variable value to the controller
//           alert(data);
        },
        error : function() {
           alert("Value NOT reaching to controller ");
           //console.log(data);
        }
    });
     alert('Category Activated Sucessfully');
     location. reload(true);
    }
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
</body>
</html>