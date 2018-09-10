


<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                <ul>
<?php $reports= $this->Url->build(['controller' => 'Users', 'action' => 'reports']);?>

<?php $profiles= $this->Url->build(['controller' => 'Users', 'action' => 'profiles']);?>        
            <li class="">
<a class="smooth-scroll" href="<?= $reports ;?>">Reports</a></li>
                   
                    <li class="active"><a href="<?= $profiles ;?>">Profile</a></li>
                </ul>
                
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div>
<?php echo $this->Html->image('logo-quatrro.png');?>
</div>
                </div>
            </div>
        </div>
                <?php foreach ($user_profile_detail as $user_profile_details): 
					    endforeach; ?>
                           

        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="profile">
                    <h2 class="panel-block-title">  <?= h($user_profile_details->username) ?></h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Position</label></div>
                        <div class="col-md-8"><p class="panel-block-label">  <?= h($user_profile_details->position) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->city) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->work_location) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->empid) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->email) ?></p></div>
                    </div>
                </div>
                <div class="panel-block" id="concerns-summary">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Cases Assigned</label></div>
                        <div class="col-md-8"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Cases Resolved</label></div>
                        <div class="col-md-8"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">On Going</label></div>
                        <div class="col-md-8"><p class="panel-block-label"></p></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

