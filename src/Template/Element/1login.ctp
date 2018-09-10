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