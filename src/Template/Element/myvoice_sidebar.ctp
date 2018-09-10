<?php
$session_data =   $this->request->session();
$user = $session_data->read('Auth.User');
$user_role = $user['role'];        
?> 
<div class="col-sm-2 hidden-xs">
    <div class="fixed-side-pane">
        <ul>
<?php $report=$this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'report']);?>
<?php $profile=$this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'profiles']);?>

    <?php if($user_role === '3' || $user_role === '12'|| $user_role === '13'){ ?>
         <li class="<?php if(!empty($active)){ echo '';}?>"><a href="<?= $dashboard = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'dashboard']); ?>">Dashboard</a></li>

            <li class="<?php if(empty($active)){ echo 'active';}?>"><a href="<?= $report ?>">Complaints</a></li>   
            <li class="<?php if(!empty($active)){ echo 'active';}?>"><a href="<?= $profile ;?>">Profile</a></li>
                    
    <?php } ?>
    <?php if($user_role === '5' || $user_role === '6' || $user_role === '7' || $user_role === '8' || $user_role === '9' || $user_role === '10' || $user_role === '4' ){ ?>
        <li style="display:none;" class="<?php if(!empty($active)){ echo 'active';}?>"><a href="<?= $dashboard = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'dashboard']); ?>">Dashboard</a></li>

            <li class="<?php if(empty($active)){ echo 'active';}?>"><a href="<?= $report ?>">Complaints</a></li>   
            <li class="<?php if(!empty($active)){ echo 'active';}?>"><a href="<?= $profile ;?>">Profile</a></li>
                    
    <?php } ?>

           
        </ul>

        <div class="company-logo">
            <div class="p-b-10"><small class="text-muted">Developed By</small></div>
            <div>
<?php echo $this->Html->image('logo-quatrro.png');?>
            </div>
        </div>
    </div>
</div>