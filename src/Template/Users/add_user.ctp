<?php
ob_start();
 use Cake\Routing\Router;
 use Cake\View\Helper\UrlHelper;
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
    <title>Add User | Admin</title>
    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
            <div class="container-fluid" id="concern-form">
                <div class="concern-form-section active">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Add User</h2>
                    </div>
                    <div class="panel-block">
                        
                            <?= $this->Form->create('Users',['url' => ['controller' => 'Users', 'action' => 'addUser']]); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Bussiness unit<span style="color: red">*</span></label>
                                     <select id="bu" name="bu" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="QGS Pvt Ltd">QGS Pvt Ltd</option>
                                        <option value="QBSS Pvt Ltd">QBSS Pvt Ltd</option>
                                        <option value="QMS Pvt Ltd">QMS Pvt Ltd</option>
                                        <option value="QPS Pvt Ltd">QPS Pvt Ltd</option>
                                    </select>
                                    <span id="check_bu"></span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bussiness_unit">Role<span style="color: red">*</span></label>
                                    <select name="role_type[]" class="form-control" id="role_type" multiple="multiple">
                                        <?php
                        if(!empty($catdata)){
                            //pr($catdata);die();
                            echo '<option value="" >Choose an option</option>';
                            foreach($catdata as $key=>$value){
                                var_dump($value);
                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
                            }
                        }
                        ?>
                                        
                                    </select>
                                    <span id="check_role"></span>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Work Location<span style="color: red">*</span></label>
                                    <select id="work_location" name="work_location" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="Gurgaon">Gurgaon</option>
                                        <option value="Thane">Thane</option>
                                        <option value="Chennai">Chennai</option>
                                        
                                    </select>
                                    <span id="check_work_location"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                   <label for="subcategory">Client code</label>
                                    <input type="text" id="client_code" name="client_code" class="form-control">
                                    <span id="check_client_code"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Password<span style="color: red">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    <span id="check_password"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">City<span style="color: red">*</span></label>
                                    <select id="city" name="city" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="Gurgaon">Gurgaon</option>
                                        <option value="Thane">Thane</option>
                                        <option value="Chennai">Chennai</option>
                                        
                                    </select>
                                <span id="check_city"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Position</label>
                                    <input type="text" id="position" name="position" class="form-control">
                                    <span id="check_position"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Name<span style="color: red">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    <span id="check_name"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Employee ID</label>
                                    <input type="text" id="empid" name="empid" class="form-control">
                                    <span id="check_empid"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Email<span style="color: red">*</span></label>
                                    <input type="text" id="email" name="email" class="form-control">
                                    <span id="check_email"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Mobile</label>
                                    <input type="text" id="mobile_no" name="mobile" class="form-control">
                                    <span id="check_mobile_no"></span>
                                </div>
                            </div>
                           
                        </div>
                      
                        
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                   <?php $addclient=$this->Url->build(['controller'=>'Users','action'=>'view_user']); ?>
                            <a href="<?= $addclient;?>" class="btn btn-dark p-a-10">Cancel</a>
                                    <button class="btn btn-dark p-a-10" id="btn-addclient"> Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
    $('document').ready(function(){
       $('#btn-addclient').click(function(){
         var valid = true;
     if($('#work_location').val()=="")
     {
        $('#work_location').css('border','1px solid red');
        $('#check_work_location').text('Please choose an option ');
        $('#check_work_location').addClass('error_label');
        valid = false;
        $('#work_location').focus();
     }
     else
     {
        $('#work_location').css('border','1px solid #cccccc');   
        $('#check_work_location').text('');
    }

    if($('#role_type').val()=="")
    {
        $('#role_type').css('border','1px solid red');
        $('#check_role').text('Please choose an option ');
        $('#check_role').addClass('error_label');
        valid = false;
        $('#role_type').focus();

    }
    else
    {
        $('#role_type').css('border','1px solid #cccccc');   
        $('#check_role').text('');

    }
    if($('#bu').val()=="")
    {
        $('#bu').css('border','1px solid red');
        $('#check_bu').text('Please enter business unit ');
        $('#check_bu').addClass('error_label');
        valid = false;
        $('#bu').focus();

    }
    else
    {
        $('#bu').css('border','1px solid #cccccc');   
        $('#check_bu').text('');

    }
    if($('#password').val()=="")
    {
        $('#password').css('border','1px solid red');
        $('#check_password').text('Please enter password');
        $('#check_password').addClass('error_label');
        valid = false;
        $('#password').focus();

    }
    else
    {
        $('#password').css('border','1px solid #cccccc');   
        $('#check_password').text('');

    }
    // if($('#client_code').val()=="")
    // {
    //     $('#client_code').css('border','1px solid red');
    //     $('#check_client_code').text('Please enter client code');
    //     $('#check_client_code').addClass('error_label');
    //     valid = false;
    //     $('#cat_status').focus();

    // }
    // else
    // {
    //     $('#client_code').css('border','1px solid #cccccc');   
    //     $('#check_client_code').text('');

    // }
    //  if($('#position').val()=="")
    // {
    //     $('#position').css('border','1px solid red');
    //     $('#check_position').text('Please enter position');
    //     $('#check_position').addClass('error_label');
    //     valid = false;
    //     $('#position').focus();

    // }
    // else
    // {
    //     $('#position').css('border','1px solid #cccccc');   
    //     $('#check_position').text('');

    // }
    if($('#name').val()=="")
    {
        $('#name').css('border','1px solid red');
        $('#check_name').text('Please enter name');
        $('#check_name').addClass('error_label');
        valid = false;
        $('#name').focus();

    }
    else
    {
        $('#name').css('border','1px solid #cccccc');   
        $('#check_name').text('');

    }
    // if($('#empid').val()=="")
    // {
    //     $('#empid').css('border','1px solid red');
    //     $('#check_empid').text('Please enter employee id');
    //     $('#check_empid').addClass('error_label');
    //     valid = false;
    //     $('#empid').focus();

    // }
    // else
    // {
    //     $('#empid').css('border','1px solid #cccccc');   
    //     $('#check_empid').text('');

    // }
    if($('#state').val()=="")
    {
        $('#state').css('border','1px solid red');
        $('#check_state').text('Please enter state');
        $('#check_state').addClass('error_label');
        valid = false;
        $('#state').focus();

    }
    else
    {
        $('#state').css('border','1px solid #cccccc');   
        $('#check_state').text('');

    }
    
  
    if($('#email').val()=="")
    {
        $('#email').css('border','1px solid red');
        $('#check_email').text('Please enter email id');
        $('#check_email').addClass('error_label');
        valid = false;
        $('#email').focus();

    }
    else
    {
        $('#email').css('border','1px solid #cccccc');   
        $('#check_email').text('');

    }
    
    
    // if($('#mobile_no').val()=="")
    // {
    //     $('#mobile_no').css('border','1px solid red');
    //     $('#check_mobile_no').text('Please enter mobile no');
    //     $('#check_mobile_no').addClass('error_label');
    //     valid = false;
    //     $('#mobile_no').focus();

    // }
    // else
    // {
    //     $('#mobile_no').css('border','1px solid #cccccc');   
    //     $('#check_mobile_no').text('');

    // }
    
    if($('#description').val()=="")
    {
        $('#description').css('border','1px solid red');
        $('#check_description').text('Please enter description');
        $('#check_description').addClass('error_label');
        valid = false;
        $('#description').focus();

    }
    
    if($('#city').val()=="")
    {
        $('#city').css('border','1px solid red');
        $('#check_city').text('Please choose an option');
        $('#check_city').addClass('error_label');
        valid = false;
        $('#city').focus();

    }
    else
    {
        $('#city').css('border','1px solid #cccccc');   
        $('#check_city').text('');

    }
    
    if(valid == false)
    {
        return false;
    }
    else
    {
        alert("User added succesfully");
        return true;
        
    }


       }); 

    });

</script>

</body>
</html>
