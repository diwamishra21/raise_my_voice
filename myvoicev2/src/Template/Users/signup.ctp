<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password | My Voice</title>
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
            <a class="navbar-brand" href="index.html">
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
<div class="col-md-12 text-center">
<h5 style="color:red;"><?php echo $this->Flash->render(); ?>   </h5>
</div>
				 <?= $this->Form->create('Users',['url' => ['controller' => 'Users', 'action' => 'signup']]); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"></label>
							 <?php
          echo $this->Form->control('username', [
    'label' => 'Name','type'=>'text','class'=>'form-control','id'=>'name'
]); ?>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id"></label>
							<?php
          echo $this->Form->control('empid', [
    'label' => 'Employee ID','type'=>'text','class'=>'form-control','id'=>'employee_id'
]); ?>
						                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email"></label>
							<?php
            echo $this->Form->control('email',["lable"=>false,'type'=>'text','name'=>'email','class'=>'form-control','id'=>'email']); ?>
                                                   </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile"></label>
							<?php
            echo $this->Form->control('Mobile',["lable"=>false,'type'=>'text','name'=>'mobile','class'=>'form-control','id'=>'mobile']); ?>
                                                   </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="business_unit"></label>
							<?php
          echo $this->Form->control('bu', [
    'label' => 'Business Unit','type'=>'text','class'=>'form-control','id'=>'business_unit'
]); ?>
						                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city"></label>
							<?php
            echo $this->Form->control('city',["lable"=>false,'type'=>'text','name'=>'city','class'=>'form-control','id'=>'city']); ?>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_location"></label>
							<?php
          echo $this->Form->control('work_location', [
    'label' => 'Work Location','type'=>'text','class'=>'form-control','id'=>'work_location'
]); ?>
							
                           
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="form-group text-center">
                    <div class="p-b-10">
                        <small class="text-muted">On successful sign up, you shall receive a mail with your username and password</small>
                    </div>
					
					
					
					
					<?= $this->Form->button('Sign Up <i class="fa fa-paper-plane p-l-20"></i>',
 ['escape' => false,'value'=>'Sign Up','type' => 'submit','class'=>'btn btn-dark p-a-10','id'=>'submit-button','Sign in']) ?>
 
				<?php $login=$this->Url->build(['controller'=>'Users','action'=>'login']); ?>
                    <div class="text-center p-t-20">
                        <small class="text-muted"><a href="<?= $login; ?>">Login?</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php //echo $ip;?>
	
	<?php
          echo $this->Form->control('first_access', [
    'label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>$time
]); ?>
	
	<?php
          echo $this->Form->control('confirmed', [
    'label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1'
]); ?>
	<?php
          echo $this->Form->control('status', [
    'label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1'
]); ?>

<?php echo $this->Form->control('user_type', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'Visitor']); ?>
<?php $a = (string) microtime();
$password = "My".substr($a, 2, 8);?>
<?php echo $this->Form->control('password', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>$password ]); ?>
<?php echo $this->Form->control('pass', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>$password ]); ?>



 <?= $this->Form->end() ?>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>
</body>
</html>