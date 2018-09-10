<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password | My Voice</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="container-fluid p-a-20 m-t-30">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-block">
                <div class="form-group text-center">
                <?php //$this->Flash->render('auth');?>
				<?php echo $this->Flash->render(); ?>    
				<?php echo $this->Form->create(); ?>
                    <h4>Forgot Password</h4>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <?php echo $this->Form->input('username',["label"=>false,'type'=>'text','id'=>'username','placeholder'=>'Username','class'=>'form-control']);?>
                    <span id="check_username"></span>
                    <small class="text-muted">You shall receive a link on your email to reset your password</small>

                </div>
                <div class="form-group text-center">
                    <button type="button" id="submit-button" class="btn btn-dark p-a-10">Submit <i class="fa fa-paper-plane p-l-20"></i></button>
                    <div class="text-center p-t-20">
                    <?php $url3= $this->Url->build(['controller' => 'Users', 'action' => 'login']);?>
                        <a href="<?= $url3 ;?>"<small class="text-muted">Remember Password?</small></a>
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
             if($('#username').val()=='')
            {
                $('#username').css('border','1px solid red');
                $('#check_username').text('Please enter Username !');
                $('#check_username').addClass('error_label');
                valid = false;
            }
            else {
                $('#username').css('border','1px solid #cccccc');
                $('#check_username').text('');
            }
            if(valid==true)
            {
                alert("Password Details Sent to your registerd Email ID");
            }
      });
    });
</script>
</body>
</html>