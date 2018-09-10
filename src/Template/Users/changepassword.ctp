
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('style.css') ?>

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <?php
$session = $this->request->session();
                $session_data =  $session->read();
  ?>
                   
                <?php $user_name = $session_data["Auth"]["User"]["name"]; ?>
 <?php $userid = $session_data["Auth"]["User"]["id"]; ?>
 <?php $user_role = $session_data["Auth"]["User"]["role"]; ?>
 <?php $user_type = $session_data["Auth"]["User"]["user_type"]; ?>

<?php if($user_role == '3' || $user_role == '4' || $user_role == '5' || $user_role == '6' || $user_role == '7' || $user_role == '8' || $user_role == '9' || $user_role == '10') { ?>

<?php $profile= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'profiles',$userid])?>
<?php } ?>


<?php if($user_type == 'Reg_user') { ?>
<?php $profile= $this->Url->build(['controller' => 'Users', 'action' => 'userprofile',$userid])?>
<?php }?>

<?php if($user_role == '1' || $user_role == '2' ) { ?>
<?php $profile= $this->Url->build(['controller' => 'Users', 'action' => 'viewClient',$userid])?>
<?php }?>


          <ul class="nav navbar-nav navbar-right">
               
                <li><a href="<?= $profile ?>">Profile</a></li>
                <li class="dropdown">
                   
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user_name ?>, <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>

                        <li><a href="<?= $logout; ?>">Logout</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="container-fluid p-a-20 m-t-30">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-block">
                <div class="form-group text-center">
                    <h4>Change Password</h4>
                </div>
                <?php //$this->Flash->render('auth');?>
              
                <?php echo $this->Form->create(); ?>
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <?php echo $this->Form->input('curernt_password',["label"=>false,'type'=>'password','id'=>'curernt_password','placeholder'=>'Current Password','class'=>'form-control']);?>
                    <span id="check_current_password" style="color: red"></span>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <?php echo $this->Form->input('new_password',["label"=>false,'type'=>'password','id'=>'new_password','placeholder'=>'New Password','class'=>'form-control']);?>
                    <span id="check_new_password" style="color: red"></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <?php echo $this->Form->input('confirm_password',["label"=>false,'type'=>'password','id'=>'confirm_password','placeholder'=>'Confirm Password','class'=>'form-control']);?>
                    <span id="check_confirm_password" style="color: red"></span>
                </div>
                <div class="form-group text-center">
                    <div class="text-center p-t-20">
                        <!-- <?= $this->Form->button('Submit',['escape' => false,'type' => 'submit','class'=>'btn btn-dark ']) ?> -->
                    <!-- <button type="button" id="submit-button" class="btn btn-dark p-a-10">Change Password <i class="fa fa-paper-plane p-l-20"></i></button> -->
                    <?php echo $this->Form->button('Change Password<i class="fa fa-paper-plane p-l-20"></i>', ['label' => false,'type'=>'text','id'=>'submit-button','class'=>'btn btn-dark p-a-10']); ?>
                    
                </div>
                </div>
            </div>
           

   
            <?php echo $this->Form->end();?>
        </div>
    </div>

</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#submit-button').click(function(){
            var valid = true;
            if($('#curernt_password').val()=='')
            {
                $('#curernt_password').css('border','1px solid red');
                $('#check_current_password').text('Please enter current Password !');
                $('#check_current_password').addClass('error_label');
                valid = false;
            }
            else {
                $('#curernt_password').css('border','1px solid #cccccc');
                $('#check_current_password').text('');
            }

            if($('#new_password').val()=='')
            {
                 $('#new_password').css('border','1px solid red');
                $('#check_new_password').text('Please enter new Password !');
                $('#check_new_password').addClass('error_label');
                valid = false;
            }
            else {
                $('#new_password').css('border','1px solid #cccccc');
                $('#check_new_password').text('');
            }

            if($('#confirm_password').val()=='')
            {
                $('#confirm_password').css('border','1px solid red');
                $('#check_confirm_password').text('Please enter confirm Password !');
                $('#check_confirm_password').addClass('error_label');
                valid = false;
            }
            else {
                $('#confirm_password').css('border','1px solid #cccccc');
                $('#check_confirm_password').text('');
            }

            if(($('#new_password').val()!= '' && $('#confirm_password').val()!='') && ($('#new_password').val() != $('#confirm_password').val()))
            {
                
                $('#check_confirm_password').text('Password Mismatch!');
                $('#check_confirm_password').addClass('error_label');
                $('#check_new_password').text('Password Mismatch!');
                $('#check_new_password').addClass('error_label');
                valid = false;
            }
            else
            {   
                
            }

            if(valid == true)
            {
                alert("Password Changed Sucessfully");
            }
            else
            {
            return false;
            }
        });
    });
</script>
</body>
</html>
