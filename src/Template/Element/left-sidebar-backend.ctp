<div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
               
               <ul>
<?php $reports= $this->Url->build(['controller' => 'Supervisor', 'action' => 'dashboard']);?>

<?php $profiles= $this->Url->build(['controller' => 'Supervisor', 'action' => 'profiles']);?> 
                    <li class="active">
<a class="smooth-scroll" href="<?= $reports ;?>">Reports</a></li>
                                       <li ><a href="<?= $profiles ;?>">Profile</a></li>
                </ul>
               
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div> <?= $this->Html->image('logo-quatrro.png');?></div>
                </div>
            </div>
        </div>