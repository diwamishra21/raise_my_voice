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
    <title>Add Client | Admin</title>
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
                        <h2 class="panel-block-title">Add Client</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                      <form action="" method="post" enctype="multipart/form-data">
                                    <label for="subject_name">Client type<span style="color: red">*</span></label>
                                   <select id="client_type" name="client_type" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="External">External</option>
                                        <option value="Internal">Internal</option>
                                    </select>
                                    <span id="check_client_type"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Bussiness unit<span style="color: red">*</span></label>
                                    <input type="text" id="bu" name="bu" class="form-control">
                                    <span id="check_bu"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">Industry Name<span style="color: red">*</span></label>
                                    <input type="text" id="industry_id" name="industry_id" class="form-control">
                                <span id="check_industry_id"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Client code<span style="color: red">*</span></label>
                                    <input type="text" id="client_code" name="client_code" class="form-control">
                                    <span id="check_client_code"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Client name<span style="color: red">*</span></label>
                                    <input type="text" id="client_name" name="client_name" class="form-control">
                                    <span id="check_client_name"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Address1</label>
                                    <input type="text" id="address1" name="address1" class="form-control">
                                    <span id="check_address1"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">Address 2</label>
                                    <input type="text" id="address2" name="address2" class="form-control">
                                <span id="check_address2"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">City<span style="color: red">*</span></label>
                                    <input type="text" id="city" name="city" class="form-control">
                                    <span id="check_city"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">State<span style="color: red">*</span></label>
                                    <input type="text" id="state" name="state" class="form-control">
                                    <span id="check_state"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Country<span style="color: red">*</span></label>
                                    <input type="text" id="country" name="country" class="form-control">
                                    <span id="check_country"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">Zip</label>
                                    <input type="text" id="zip" name="zip" class="form-control">
                                <span id="check_zip"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Email</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                    <span id="check_email"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Phone </label>
                                    <input type="text" id="phone_no" name="phone_no" class="form-control">
                                    <span id="check_phone_no"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Mobile</label>
                                    <input type="text" id="mobile_no" name="mobile_no" class="form-control">
                                    <span id="check_mobile_no"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">Fax</label>
                                    <input type="text" id="fax" name="fax" class="form-control">
                                <span id="check_fax"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Website</label>
                                    <input type="text" id="website" name="website" class="form-control">
                                    <span id="check_website"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Description</label>
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                    <span id="check_description"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Logo<span style="color: red">*</span></label>
                                    <input type="file" id="logo" name="logo" accept='image/*'>
                                    <span id="check_logo"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">Contact person name</label>
                                    <input type="text" id="cp_name" name="cp_name" class="form-control">
                                <span id="check_cp_name"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Contact person email</label>
                                    <input type="text" id="cp_email" name="cp_email" class="form-control">
                                    <span id="check_cp_email"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Contact person mobile</label>
                                    <input type="text" id="cp_mobile" name="cp_mobile" class="form-control">
                                    <span id="check_cp_mobile"></span>
                                </div>
                            </div>

                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Created by<span style="color: red">*</span></label>
                                    <input type="text" id="created" name="created" value="<?php echo $user_name; ?>" class="form-control" disabled>
                                     <input type="hidden"created_by" name="created_by" value="<?php echo $user_id; ?>" class="form-control">
                                    <span id="check_created_by"></span>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Activation date<span style="color: red">*</span></label>
                                    <input type="date" id="activation" name="activation" class="form-control">
                                    <span id="check_activation"></span>
                                </div>
                            </div>
                           
                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Deactivation date<span style="color: red">*</span></label>
                                    <input type="date" id="deactivation" name="deactivation" class="form-control">
                                    <span id="check_deactivation"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Status<span style="color: red">*</span></label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="1" selected="selected">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span id="check_cat_status"></span>
                                    <span id="check_status"></span>
                                </div>

                            </div>

                          
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                   <?php $addclient=$this->Url->build(['controller'=>'Users','action'=>'viewClient']); ?>
                            <a href="<?= $addclient;?>" class="btn btn-dark p-a-10">Cancel</a>
                                    <button class="btn btn-dark p-a-10" id="btn-addclient"> Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
    $('document').ready(function(){
       $('#btn-addclient').click(function(){
         var valid = true;
     if($('#client_type').val()=="")
     {
        $('#client_type').css('border','1px solid red');
        $('#check_client_type').text('Please choose an option ');
        $('#check_client_type').addClass('error_label');
        valid = false;
        $('#client_type').focus();
     }
     else
     {
        $('#client_type').css('border','1px solid #cccccc');   
        $('#check_client_type').text('');
    }

    if($('#client_name').val()=="")
    {
        $('#client_name').css('border','1px solid red');
        $('#check_client_name').text('Please enter client name ');
        $('#check_client_name').addClass('error_label');
        valid = false;
        $('#client_name').focus();

    }
    else
    {
        $('#client_name').css('border','1px solid #cccccc');   
        $('#check_client_name').text('');

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
    if($('#industry_id').val()=="")
    {
        $('#industry_id').css('border','1px solid red');
        $('#check_industry_id').text('Please enter industry name');
        $('#check_industry_id').addClass('error_label');
        valid = false;
        $('#industry_id').focus();

    }
    else
    {
        $('#industry_id').css('border','1px solid #cccccc');   
        $('#check_industry_id').text('');

    }
    if($('#client_code').val()=="")
    {
        $('#client_code').css('border','1px solid red');
        $('#check_client_code').text('Please enter client code');
        $('#check_client_code').addClass('error_label');
        valid = false;
        $('#cat_status').focus();

    }
    else
    {
        $('#client_code').css('border','1px solid #cccccc');   
        $('#check_client_code').text('');

    }
    //  if($('#address1').val()=="")
    // {
    //     $('#address1').css('border','1px solid red');
    //     $('#check_address1').text('Please enter address');
    //     $('#check_address1').addClass('error_label');
    //     valid = false;
    //     $('#address1').focus();

    // }
    // else
    // {
    //     $('#address1').css('border','1px solid #cccccc');   
    //     $('#check_address1').text('');

    // }
    // if($('#address2').val()=="")
    // {
    //     $('#address2').css('border','1px solid red');
    //     $('#check_address2').text('Please enter address');
    //     $('#check_address2').addClass('error_label');
    //     valid = false;
    //     $('#address2').focus();

    // }
    // else
    // {
    //     $('#address2').css('border','1px solid #cccccc');   
    //     $('#check_address2').text('');

    // }
    if($('#city').val()=="")
    {
        $('#city').css('border','1px solid red');
        $('#check_city').text('Please enter city');
        $('#check_city').addClass('error_label');
        valid = false;
        $('#city').focus();

    }
    else
    {
        $('#city').css('border','1px solid #cccccc');   
        $('#check_city').text('');

    }
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
    if($('#country').val()=="")
    {
        $('#country').css('border','1px solid red');
        $('#check_country').text('Please enter country');
        $('#check_country').addClass('error_label');
        valid = false;
        $('#country').focus();

    }
    else
    {
        $('#country').css('border','1px solid #cccccc');   
        $('#check_country').text('');

    }
    //  if($('#zip').val()=="")
    // {
    //     $('#zip').css('border','1px solid red');
    //     $('#check_zip').text('Please enter zip');
    //     $('#check_zip').addClass('error_label');
    //     valid = false;
    //     $('#zip').focus();

    // }
    // else
    // {
    //     $('#zip').css('border','1px solid #cccccc');   
    //     $('#check_zip').text('');

    // }
    // if($('#email').val()=="")
    // {
    //     $('#email').css('border','1px solid red');
    //     $('#check_email').text('Please enter email id');
    //     $('#check_email').addClass('error_label');
    //     valid = false;
    //     $('#email').focus();

    // }
    // else
    // {
    //     $('#email').css('border','1px solid #cccccc');   
    //     $('#check_email').text('');

    // }
    if($('#logo').val()=="")
    {
        $('#logo').css('border','1px solid red');
        $('#check_logo').text('Please upload logo');
        $('#check_logo').addClass('error_label');
        valid = false;
        $('#logo').focus();

    }
    else
    {
        $('#logo').css('border','1px solid #cccccc');   
        $('#check_logo').text('');

    }
    // if($('#phone_no').val()=="")
    // {
    //     $('#phone_no').css('border','1px solid red');
    //     $('#check_phone_no').text('Please enter phone no');
    //     $('#check_phone_no').addClass('error_label');
    //     valid = false;
    //     $('#phone_no').focus();

    // }
    // else
    // {
    //     $('#phone_no').css('border','1px solid #cccccc');   
    //     $('#check_phone_no').text('');

    // }
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
    // if($('#fax').val()=="")
    // {
    //     $('#fax').css('border','1px solid red');
    //     $('#check_fax').text('Please enter fax no');
    //     $('#check_fax').addClass('error_label');
    //     valid = false;
    //     $('#fax').focus();

    // }
    // else
    // {
    //     $('#fax').css('border','1px solid #cccccc');   
    //     $('#check_fax').text('');

    // }
    // if($('#website').val()=="")
    // {
    //     $('#website').css('border','1px solid red');
    //     $('#check_website').text('Please enter website');
    //     $('#check_website').addClass('error_label');
    //     valid = false;
    //     $('#website').focus();

    // }
    // else
    // {
    //     $('#website').css('border','1px solid #cccccc');   
    //     $('#check_website').text('');

    // }
    // if($('#description').val()=="")
    // {
    //     $('#description').css('border','1px solid red');
    //     $('#check_description').text('Please enter description');
    //     $('#check_description').addClass('error_label');
    //     valid = false;
    //     $('#description').focus();

    // }
    // else
    // {
    //     $('#description').css('border','1px solid #cccccc');   
    //     $('#check_description').text('');

    // }
    // if($('#cp_name').val()=="")
    // {
    //     $('#cp_name').css('border','1px solid red');
    //     $('#check_cp_name').text('Please enter contact person name');
    //     $('#check_cp_name').addClass('error_label');
    //     valid = false;
    //     $('#cp_name').focus();

    // }
    // else
    // {
    //     $('#cp_name').css('border','1px solid #cccccc');   
    //     $('#check_cp_name').text('');

    // }
    // if($('#cp_email').val()=="")
    // {
    //     $('#cp_email').css('border','1px solid red');
    //     $('#check_cp_email').text('Please enter contact person email id');
    //     $('#check_cp_email').addClass('error_label');
    //     valid = false;
    //     $('#cp_email').focus();

    // }
    // else
    // {
    //     $('#cp_email').css('border','1px solid #cccccc');   
    //     $('#check_cp_email').text('');

    // }
    // if($('#cp_mobile').val()=="")
    // {
    //     $('#cp_mobile').css('border','1px solid red');
    //     $('#check_cp_mobile').text('Please enter contact person mobile no');
    //     $('#check_cp_mobile').addClass('error_label');
    //     valid = false;
    //     $('#cp_mobile').focus();

    // }
    // else
    // {
    //     $('#cp_mobile').css('border','1px solid #cccccc');   
    //     $('#check_cp_mobile').text('');

    // }
    if($('#activation').val()=="")
    {
        $('#activation').css('border','1px solid red');
        $('#check_activation').text('Please enter actiivation date');
        $('#check_activation').addClass('error_label');
        valid = false;
        $('#activation').focus();

    }
    else
    {
        $('#activation').css('border','1px solid #cccccc');   
        $('#check_activation').text('');

    }
    if($('#status').val()=="")
    {
        $('#status').css('border','1px solid red');
        $('#check_status').text('Please choose an option');
        $('#check_status').addClass('error_label');
        valid = false;
        $('#status').focus();

    }
    else
    {
        $('#status').css('border','1px solid #cccccc');   
        $('#check_status').text('');

    }
    // if($('#cp_name').val()=="")
    // {
    //     $('#cp_name').css('border','1px solid red');
    //     $('#check_cp_name').text('Please enter contact person name');
    //     $('#check_cp_name').addClass('error_label');
    //     valid = false;
    //     $('#cp_name').focus();

    // }
    // else
    // {
    //     $('#cp_name').css('border','1px solid #cccccc');   
    //     $('#check_cp_name').text('');

    // }
     if($('#deactivation').val()=="")
    {
        $('#deactivation').css('border','1px solid red');
        $('#check_deactivation').text('Please enter deactivation date');
        $('#check_deactivation').addClass('error_label');
        valid = false;
        $('#deactivation').focus();

    }
    else
    {
        $('#deactivation').css('border','1px solid #cccccc');   
        $('#check_deactivation').text('');

    }

    if(valid == false)
    {
        return false;
    }
    else
    {
        alert("Client added succesfully");
        return true;
        
    }


       }); 

    });

</script>

</body>
</html>
