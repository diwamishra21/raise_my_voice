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
     
	 <div class="form-group text-center">
                    <div class="p-b-10">
                        <small class="text-muted success">Thank you - Please check your email to get your login details.</small>
                    </div>
<?php $login=$this->Url->build(['controller'=>'Users','action'=>'login']); ?>
                    <div class="text-center p-t-20">
                        <small class="text-muted btn btn-dark"><a href="<?= $login; ?>">Sign In</a></small>
                    </div>


					</div>
	 
    </div>
	

</div>




<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>


<script>
$(document).ready(function(){
   
$('#email').keyup(function(){
    $('#username').val(this.value);
});
  });
</script>


</body>
</html>