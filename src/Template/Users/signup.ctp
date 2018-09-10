<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | My Voice</title>
    <!-- Bootstrap -->
  <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
			 <?= $this->Html->image('logo.png') ?>
			</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="container-fluid p-a-20 m-t-30">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-block">
                <div class="form-group text-center">
                    <h4>Sign Up</h4>
                </div>
                <hr/>
				  <?= $this->Form->create($user,['url' => ['controller' => 'Users', 'action' => 'signup']]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name">
                            <span id="check_name"></span>

                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id">Employee ID<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="empid" id="employee_id">
                            <span id="check_id"></span>               
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email<span style="color: red">*</span></label>
                            <input type="email" class="form-control" name="email" id="email">
                            <span id="check_email"></span>
							<span style="color:red;"><?php echo @$email_error; ?></span>
                                                   </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile<span style="color: red">*</span></label>
                            <input type="" class="form-control" name="mobile" id="mobile" maxlength="10">
                             <span id="check_mobile"></span>
                                                   </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="business_unit">Business Unit</label>
                            <input type="text" class="form-control" name="bu" id="business_unit">
                            <span id="check_unit"></span>                      
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="city" id="city">
                            <span id="check_city"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_location">Work Location<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="work_location" id="work_location">
                            <span id="check_location"></span>
                           
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-center">
                    <div class="p-b-10">
                        <small class="text-muted">On successful sign up, you shall receive a mail with your username and password</small>
                    </div>
					
						<?php echo $this->Form->control('first_access', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>$time]); ?>
	
	<?php  echo $this->Form->control('confirmed', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1']); ?>
	

<?php echo $this->Form->control('user_type', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'Reg_user']); ?>
<?php echo $this->Form->control('username', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'username']); ?>
<?php echo $this->Form->control('role', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'Accuser']); ?>
<?php $a = (string) microtime();
$password = "P".substr($a, 2, 8);?>
<?php echo $this->Form->control('password', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>$password ]); ?>
<?php echo $this->Form->control('pass', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>$password ]); ?>
					
					
					<?= $this->Form->button('Sign Up <i class="fa fa-paper-plane p-l-20"></i>',
 ['escape' => false,'value'=>'Sign Up','type' => 'submit','class'=>'btn btn-dark p-a-10','id'=>'submit-button','Sign in']) ?>
 
				<?php $login=$this->Url->build(['controller'=>'Users','action'=>'login']); ?>
                    <div class="text-center p-t-20">
                        <small class="text-muted"><a href="<?= $login; ?>">Sign In</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	


 <?= $this->Form->end() ?>

</div>



<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>


<script type="text/javascript">
    $('#mobile').keypress(function(e) {
    var a = [];
    var k = e.which;
    
    for (i = 48; i < 58; i++)
        a.push(i);
    
    if (!(a.indexOf(k)>=0))
        e.preventDefault();
});

    function checkEmail(mail) {
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return regex.test(mail);
    }
   
    function checkNumber(phNum) {
    var pattern = new RegExp(/^[6789]\d{9}$/);
    return pattern.test(phNum);
   }
    $(document).ready(function(){
        $('#submit-button').click(function(){
            var valid = true;


            if($('#name').val() =='') 
            {
                $('#name').css('border','1px solid red');
                $('#check_name').text('Please enter Name');
                $('#check_name').addClass('error_label');
                valid = false;
                $('#name').focus();
            }
            else
            {
                 $('#name').css('border','1px solid #cccccc');   
                 $('#check_name').text('');
            }
             if($('#employee_id').val() =='') 
            {
                $('#employee_id').css('border','1px solid red');
                $('#check_id').text('Please enter Employee ID');
                $('#check_id').addClass('error_label');
                valid = false;
                $('#employee_id').focus();
            }
            else
            {
                 $('#employee_id').css('border','1px solid #cccccc');   
                 $('#check_id').text('');
            }
           
            if($('#city').val() =='') 
            {
                $('#city').css('border','1px solid red');
                $('#check_city').text('Please enter City');
                $('#check_city').addClass('error_label');
                valid = false;
                $('#city').focus();
            }
            else
            {
                 $('#city').css('border','1px solid #cccccc');   
                 $('#check_city').text('');
            }
            if($('#work_location').val() =='') 
            {
                $('#work_location').css('border','1px solid red');
                $('#check_location').text('Please enter Work Location');
                $('#check_location').addClass('error_label');
                valid = false;
                $('#work_location').focus();
            }
            else
            {
                 $('#work_location').css('border','1px solid #cccccc');   
                 $('#check_location').text('');
            }
            if($('#email').val() == "") {
                $('#email').css('border','1px solid red');
                $('#check_email').text('Please enter an email');
                $('#check_email').addClass('error_label');
                valid = false;
                $('#email').focus();
            }
            else if(!checkEmail($('#email').val())) {
                $('#email').css('border','1px solid red');
                $('#check_email').text('Invalid email address');
                $('#check_email').addClass('error_label');
                valid = false;
            }
            else {
                $('#email').css('border','1px solid #cccccc');
                $('#check_email').text('');
            }
             
            if($('#mobile').val() == "") {
                $('#mobile').css('border','1px solid red');
                $('#check_mobile').text('Please enter Mobile No.');
                $('#check_mobile').addClass('error_label');
                valid = false;
                $('#mobile').focus();
            }
            else if(!checkNumber($('#mobile').val())) {
                $('#mobile').css('border','1px solid red');
                $('#check_mobile').text('Please enter correct Mobile No.');
                $('#check_mobile').addClass('error_label');
                valid = false;
                
            }
           
            else {
                $('#mobile').css('border','1px solid #cccccc');
                $('#check_mobile').text('');
            }

           if(valid == true)
           {
          
           }
           else
           {
            return false;
           }
        });

    });
</script>

<script>
$(document).ready(function(){
   
$('#email').keyup(function(){
    $('#username').val(this.value);
});
  });
</script>
</body>
</html>