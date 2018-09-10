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

<div class="container-fluid margin-top-60" >
    <div class="container-fluid p-a-20 m-t-30">
        <div class="col-md-6 col-md-offset-3" >
            <form method="post" id="forgotpassword">
            <div class="panel-block">
                <div class="form-group text-center">
                <?php //$this->Flash->render('auth');?>
				    
				
                    <h4>Forgot Password?</h4>
                </div>
                 <span style="color:red;"><?php echo @$email_error; ?></span>
                 <span class="text-muted success""><?php echo @$email_success; ?></span>
                <div class="form-group" id="forgot">
                    <label for="username">Email </label>
                    <?php echo $this->Form->input('email',["label"=>false,'type'=>'text','id'=>'username','placeholder'=>'Enter E-mail Id','class'=>'form-control']);?>
                    
                    <small class="text-muted">Just enter your email address and we'll send a password,remember this has to be email address you Signup with</small><br><span id="check_username"></span>
                   

                </div>
                
                <div class="form-group text-center"id="forgot1">
                    <button type="button" id="submit-button" class="btn btn-dark p-a-10">Send me a password <i class="fa fa-paper-plane p-l-20"></i></button>
                    
                    <div class="text-center p-t-20" id="forgot2">
                    <?php $url3= $this->Url->build(['controller' => 'Users', 'action' => 'login']);?>
                        <a href="<?= $url3 ;?>"<small class="text-muted">&larr;Back to MyVoice</small></a>
                    </div>
                </div>
               </div>
            </form>
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
                $('#check_username').text('Please enter email');
                $('#check_username').addClass('error_label');
                valid = false;
            }
            else {
                $('#username').css('border','1px solid #cccccc');
                $('#check_username').text('');
            }
            if(valid==true)
            {
                $('#forgotpassword').submit();
               // $('#success').show();
            }
      });
    });
</script>
</body>
</html>