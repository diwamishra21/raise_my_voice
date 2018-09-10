<div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                <ul>
                      <?php $viewclient=$this->Url->build(['controller'=>'Users','action'=>'view_client']); ?>
                 <?php $viewcategory=$this->Url->build(['controller'=>'Users','action'=>'view_category']); ?>
                  <?php $viewuser=$this->Url->build(['controller'=>'Users','action'=>'view_user']); ?>
                     <?php $assignrole=$this->Url->build(['controller'=>'Users','action'=>'team']); ?>
                    <li <?php if($admin_bar == 1){echo 'class="active"';}?> ><a href="<?= $viewclient;?>">Manage Client</a></li>
                     <li <?php if($admin_bar == '2'){echo 'class="active"';}?> ><a href="<?= $viewcategory;?>">Manage Cat / Sub category</a></li>
                      <li <?php if($admin_bar == '3'){echo 'class="active"';}?> ><a href="<?= $viewuser;?>">Manage User</a></li>
                      <li <?php if($admin_bar == '4'){echo 'class="active"';}?>><a href="<?= $assignrole;?>">Assign Role</a></li>
                    <!-- <li><a href="statistics.html">Statistics</a></li>
                    <li><a href="reports.html">Reports</a></li>
                    <li class="active"><a href="employee-records.html">Employee Records</a></li>
                    <li><a href="profile.html">Profile</a></li> -->
                </ul>

                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>