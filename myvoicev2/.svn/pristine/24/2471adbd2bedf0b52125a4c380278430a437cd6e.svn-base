<body class="login-wrapper">
    <div class="login-outer-container">
        <div class="login-inner-container">
            <div class="centered-content">
                <div class="login-logo">
                     <?= $this->Html->image('logo.png') ?>
                </div>
                <div class="login-form m-t-30">
				<?php //$this->Flash->render('auth');?>
				<?php echo $this->Flash->render(); ?>    
				<?php echo $this->Form->create(); ?>
                    <div class="form-group">
					<?php echo $this->Form->input('username',["label"=>false,'type'=>'text','id'=>'username','placeholder'=>'Username','class'=>'form-control']);?>
 <span id="check_username" style="color:red"></span>                                          
</div>
                    <div class="form-group p-t-10">
					<?php echo $this->Form->input('password',["label"=>false,'type'=>'password','id'=>'password','placeholder'=>'Password','class'=>'form-control']);?>
 <span id="check_password" style="color:red"></span>                                         
 </div>
					
					<div class="form-group p-t-10">
                       <?php echo $this->Form->input('Sign In',['type'=>'submit','id'=>'btn-login','placeholder'=>'','class'=>'btn btn-default btn-dark btn-block']);?>
                     
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="p-t-5">
                                    <small class="text-muted"><a href="forgot-password.html">Forgot Password?</a></small>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="text-right p-t-5">
								<?php $url3= $this->Url->build(['controller' => 'Users', 'action' => 'signup']);?>
                                    <small class="text-muted"><a href="<?= $url3 ?>">Sign Up</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
					
							
					
					
					<?php echo $this->Form->end();?>
					
					
                    <div class="form-group text-center">
                        <p>- OR -</p>
                    </div>
                    <div class="form-group">
					<?php $url2= $this->Url->build(['controller' => 'Anonymous', 'action' => 'anonymousConfirmation']);?>
                        <a href="<?= $url2 ;?>" class="btn btn-default btn-dark btn-block">Go Anonymous</a>
                    </div>
                    <div class="form-group login-quatrro-logo">
                        <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                        <div>
						<?= $this->Html->image('logo-quatrro.png') ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
    /*    $('#username').change(function() {
            if($('#username').val() != "") {
                
                $('#username').css('border','1px solid #1c9626');
            }
            else {
                
                $('#username').css('border','1px solid #e21616');   
            }
        });
        $('#password').change(function() {
            if($('#password').val() != "") {
                
                $('#password').css('border','1px solid #1c9626');
            }
            else {
                
                $('#password').css('border','1px solid #e21616');   
            }
        }); */

        $('#btn-login').click(function(){
            var valid = true;
            if($('#username').val()=='')
            {
                $('#username').css('border','1px solid #e21616');
                $('#check_username').addClass('error_label');
                $('#check_username').text('Please enter the username !');
               valid = false;
               $('#username').focus();
            }
            else {
                $('#username').css('border','1px solid #1c9626');
                $('#check_username').text('');

            }
            if($('#password').val()=='')
            {
                 $('#password').css('border','1px solid #e21616');
                $('#check_password').addClass('error_label');
                $('#check_password').text('Please enter the Password !');
                valid = false;
                $('#password').focus();
            }
            else {
                $('#password').css('border','1px solid #1c9626');
                $('#check_password').text('');
            }

            if(valid == true)
            {
                
            }

        });
</script>
