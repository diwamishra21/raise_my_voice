<script  src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="  crossorigin="anonymous"></script>           
<div class="col-sm-2 hidden-xs">
    <div class="fixed-side-pane">
        <?php
        foreach ($user_complaint_deatil as $user_complaint_partculer_deatils):
        endforeach;
        $id = $user_complaint_partculer_deatils->id
        ?>
        <?php $registerConcern = $this->Url->build(['controller' => 'Users', 'action' => 'registerConcern', $user_complaint_partculer_deatils->user_id]); ?>

        <?php $userprofile = $this->Url->build(['controller' => 'Users', 'action' => 'userprofile', $user_complaint_partculer_deatils->user_id]); ?>
<?php $userprofiles = $this->Url->build(['controller' => 'Users', 'action' => 'userComplaintDetails']); ?>
        <ul>
            <li class="active"><a class="smooth-scroll" href="<?= $userprofile ?>#profile">Profile</a></li>

            <li><a class="smooth-scroll" href="<?= $userprofile; ?>#registered-concerns">Registered Concerns</a></li>
            <!-- <li><a href="e-learning">E-Learning</a></li> -->
        </ul>
        <div class="p-a-10"><a href="<?= $registerConcern ?>" class="btn btn-default btn-block btn-square p-a-10">+ Register Concern</a></div>
        <div class="company-logo">
            <div class="p-b-10"><small class="text-muted">Developed By</small></div>
            <div><?= $this->Html->image('logo-quatrro.png') ?></div>
        </div>
    </div>
</div>

<div class="col-sm-10">
    <div class="container-fluid">
<?php echo $this->element('myvoice/complaint_summary'); ?>               
   