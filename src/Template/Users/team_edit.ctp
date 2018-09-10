<?php
ob_start();
$session = $this->request->session();
$session_data = $session->read();
$user_name = $session_data["Auth"]["User"]["name"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Role | Admin</title>
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
                            <?php
                            $logout = $this->Url->build(['controller' => 'Users', 'action' => 'logout']);
                            $changepassword = $this->Url->build(['controller' => 'Users', 'action' => 'changepassword']);
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
                <div class="col-sm-2 hidden-xs">
                    <div class="fixed-side-pane">
                        <ul>
                            <?php $viewclient = $this->Url->build(['controller' => 'Users', 'action' => 'view_client']); ?>
                            <?php $viewcategory = $this->Url->build(['controller' => 'Users', 'action' => 'view_category']); ?>
                            <?php $viewuser = $this->Url->build(['controller' => 'Users', 'action' => 'view_user']); ?>
                            <?php $assignrole = $this->Url->build(['controller' => 'Users', 'action' => 'team']); ?>

                            <li><a href="<?= $viewclient; ?>">Manage Client</a></li>
                            <li  ><a href="<?= $viewcategory; ?>">Manage Cat / Sub category</a></li>
                            <li><a href="<?= $viewuser; ?>">Manage User</a></li>
                            <li class="active"><a href="<?= $viewuser; ?>">Assign Role</a></li>
                            <!-- <li><a href="statistics.html">Statistics</a></li>
                            <li><a href="reports.html">Reports</a></li>
                            <li class="active"><a href="employee-records.html">Employee Records</a></li>
                            <li><a href="profile.html">Profile</a></li> -->
                        </ul>

                        <div class="company-logo">
                            <div class="p-b-10">
                                <small class="text-muted">Developed By</small>
                            </div>
                            <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="container-fluid" id="concern-form">
                        <div class="concern-form-section active">
                            <div class="panel-block bg-transparent">
                                <h2 class="panel-block-title">Edit Role</h2>
                            </div>
                            <div class="panel-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo $this->Form->create('',['id'=>'team-edit']); ?>
                                            <label for="subject_city">Category<span style="color: red">*</span></label>
                                            <select name="category_id" class="form-control" id="cat_name" onchange="return roles();">
                                                <?php
                                                if (!empty($categoryData)) {
                                                    //pr($categoryData);die();
                                                    echo '<option value="0">Choose an option</option>';
                                                    foreach ($categoryData as $key => $value) {
                                                        $selected="";
                                                        if(!empty($selCategory)&&($selCategory==$value['id'])){
                                                            $selected=" selected";
                                                        }
                                                        echo '<option '.$selected.' value="' . $value['id'] . '" >' . $value['name'] . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                            <span id="check_cat_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Roles<span style="color: red">*</span></label>
                                            <select id="role_id"  name="role_id" class="form-control">
                                                <?php
                                                if (!empty($roleData)) {
                                                    echo '<option value="0">Choose an option</option>';
                                                    foreach ($roleData as $key => $value) {
                                                        $selected="";
                                                        if(!empty($selRole)&&($selRole==$value['id'])){
                                                            $selected=" selected";
                                                        }
                                                        echo '<option '.$selected.' value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span id="check_role_id"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Users<span style="color: red">*</span></label>
                                            <select id="user"  name="user_id[]" class="form-control" multiple="multiple">
                                                <?php
                                                if (!empty($userData)) {
                                                    echo '<option value="0">Choose an option</option>';
                                                    foreach ($userData as $key => $value) {
                                                        $selected="";
                                                        if(!empty($selUsers)&&(in_array($value['id'],$selUsers))){
                                                            $selected=" selected";
                                                        }
                                                        
                                                        echo '<option '.$selected.' value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span id="check_user_id"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <?php $teampage = $this->Url->build(['controller' => 'Users', 'action' => 'team']); ?>
                                        <a href="<?= $teampage; ?>" class="btn btn-dark p-a-10"></i>Cancel</a>
                                        <button class="btn btn-dark p-a-10" type="button" id="btn-subcategory"> Edit </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
     <script type="text/javascript">

       function roles()
       {
        $("#role_id option").show();
        var value = $('#cat_name').val();
       if(value == 1)
       {
        $("#role_id option[value=8]").hide();
        $("#role_id option[value=9]").hide();
        $("#role_id option[value=10]").hide();
        $("#role_id option[value=11]").hide();
        $("#role_id option[value=12]").hide();
        $("#role_id option[value=13]").hide();

       }
        if(value == 4)
       {
        $("#role_id option[value=3]").hide();
        $("#role_id option[value=7]").hide();
        $("#role_id option[value=8]").hide();
        $("#role_id option[value=10]").hide();
        $("#role_id option[value=11]").hide();
        $("#role_id option[value=12]").hide();
       
        
       }
        if(value == 7)
       {
        $("#role_id option[value=3]").hide();
        $("#role_id option[value=7]").hide();
        $("#role_id option[value=9]").hide();
        $("#role_id option[value=10]").hide();
        $("#role_id option[value=11]").hide();
        $("#role_id option[value=13]").hide();
        
       }

       }

        
            $('#btn-subcategory').click(function () {
                var valid = true;
                if($('#cat_name').val() == 0)
                {
                    $('#cat_name').css('border', '1px solid red');
                    $('#check_cat_name').text('Please choose an option ');
                    $('#check_cat_name').addClass('error_label');
                    valid = false;
                    $('#cat_name').focus();
                } else
                {
                    $('#cat_name').css('border', '1px solid #cccccc');
                    $('#check_cat_name').text('');
                }
                if($('#role_id').val()==0)
                 {
                    $('#role_id').css('border','1px solid red');
                    $('#check_role_id').text('Please choose an option ');
                    $('#check_role_id').addClass('error_label');
                    valid = false;
                    $('#role_id').focus();
                 }
                 else
                 {
                    $('#role_id').css('border','1px solid #cccccc');   
                    $('#check_role_id').text('');
                }

                
                if (valid == false)
                {
                    return false;
                }else{
                    $('#team-edit').submit();
                }
            });

    </script>

    <script>
        $(document).ready(function () {
            $('#user').select2();
        });
    </script>
   
</body>
</html>