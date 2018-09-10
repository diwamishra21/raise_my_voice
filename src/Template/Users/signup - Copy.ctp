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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id">Employee ID</label>
                            <input type="text" class="form-control" name="employee_id" id="employee_id">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="number" class="form-control" name="mobile" id="mobile">
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="business_unit">Business Unit</label>
                            <input type="text" class="form-control" name="business_unit" id="business_unit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_location">Work Location</label>
                            <input type="text" class="form-control" name="work_location" id="work_location">
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="form-group text-center">
                    <div class="p-b-10">
                        <small class="text-muted">On successful sign up, you shall receive a mail with your username and password</small>
                    </div>
                    <button type="button" id="submit-button" class="btn btn-dark p-a-10">Sign Up <i class="fa fa-paper-plane p-l-20"></i></button>
                    <div class="text-center p-t-20">
                        <small class="text-muted"><a href="">Login?</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>
</body>
</html>