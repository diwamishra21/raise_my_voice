<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | My Voice</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

     <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
   
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="login-wrapper">
    <div class="login-outer-container">
        <div class="login-inner-container">
            <div class="centered-content">
                <div class="login-logo">
                  <?= $this->Html->image('logo.png') ?>
                </div>
                <div class="login-form m-t-30">
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group p-t-10">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group p-t-10">
                        <a href="" class="btn btn-default btn-dark btn-block">Sign In</a>
                    </div>
                    <div class="form-group text-center">
                        <p>- OR -</p>
                    </div>
                    <div class="form-group">
                        <a href="anonymous-confirmation.html" class="btn btn-default btn-dark btn-block">Go Anonymous</a>
                    </div>
                    <div class="form-group login-quatrro-logo">
                        <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                        <div><img src="images/logo-quatrro.png" alt="Quatrro Logo"></div>
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
