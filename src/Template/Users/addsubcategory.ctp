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
    <title>Add Subcategroy | Admin</title>
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
                        <h2 class="panel-block-title">Add Subcategory</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <?php echo $this->Form->create(); ?>
                                    <label for="subject_name">Client type<span style="color: red">*</span></label>
                                   <select id="client_type" onchange="return getClientName();" name="client_type" class="form-control">
                                        <option value="">Choose an option</option>
                                        <option value="External">External</option>
                                        <option value="Internal">Internal</option>
                                    </select>
                                    <span id="check_client_type"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Client name<span style="color: red">*</span></label>
                                     <select name="client_name" class="form-control" id="client_name">
                                        <option value="">Choose an option</option>
                                    <?php
                                    
                                    ?> 
                                    </select>
                                    <span id="check_client_name"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_city">Category<span style="color: red">*</span></label>
                                    <select name="cat_name" class="form-control" id="cat_name">
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
                                <span id="check_cat_name"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Subcategory<span style="color: red">*</span></label>
                                    <input type="text" id="subcat_name" name="subcat_name" class="form-control">
                                    <span id="check_subcat_name"></span>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_Business_Unit">Status<span style="color: red">*</span></label>
                                    <select id="cat_status" name="cat_status" class="form-control">
                                        <option value="1" selected="selected">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span id="check_cat_status"></span>
                                </div>
                            </div>

                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <?php $addsubcategory=$this->Url->build(['controller'=>'Users','action'=>'view_category']); ?>
                                   <a href="<?= $addsubcategory;?>" class="btn btn-dark p-a-10"></i>Cancel</a>
                                    <button class="btn btn-dark p-a-10" id="btn-subcategory"> Add </button>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
  
   function getClientName(){
  var clientName = $('#client_type').val();
  $.ajax({
       url:'<?php echo$this->Url->build('/'); ?>users/clientName',
       data:{'sel':clientName},
       method:'POST',
        success:function(data){
           var d=$.parseJSON(data);
            $('#client_name').html(d.html);
        } 
  })
}
   



    $('document').ready(function(){
       $('#btn-subcategory').click(function(){
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
        $('#check_client_name').text('Please choose an option ');
        $('#check_client_name').addClass('error_label');
        valid = false;
        $('#client_name').focus();

    }
    else
    {
        $('#client_name').css('border','1px solid #cccccc');   
        $('#check_client_name').text('');

    }
    if($('#cat_name').val()=="")
    {
        $('#cat_name').css('border','1px solid red');
        $('#check_cat_name').text('Please choose an option ');
        $('#check_cat_name').addClass('error_label');
        valid = false;
        $('#client_name').focus();

    }
    else
    {
        $('#cat_name').css('border','1px solid #cccccc');   
        $('#check_cat_name').text('');

    }
    if($('#subcat_name').val()=="")
    {
        $('#subcat_name').css('border','1px solid red');
        $('#check_subcat_name').text('Please choose an option ');
        $('#check_subcat_name').addClass('error_label');
        valid = false;
        $('#subcat_name').focus();

    }
    else
    {
        $('#subcat_name').css('border','1px solid #cccccc');   
        $('#check_subcat_name').text('');

    }
    if($('#cat_status').val()=="")
    {
        $('#cat_status').css('border','1px solid red');
        $('#check_cat_status').text('Please choose an option ');
        $('#check_cat_status').addClass('error_label');
        valid = false;
        $('#cat_status').focus();

    }
    else
    {
        $('#cat_status').css('border','1px solid #cccccc');   
        $('#check_cat_status').text('');

    }
    if(valid == false)
    {
        return false;
    }
    else
    {
        alert("Subcategory added succesfully");
        return true;
        
    }


       }); 

    });

</script>

</body>
</html>