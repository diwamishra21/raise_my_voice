<div class="col-sm-10">
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20 p-b-20">
        <!--        <p>You have been assigned as the supervisor in charge for this case</p>-->
        <div class="panel-divider"></div>
    </div>
    <div class="container-fluid">
        <div class="bg-transparent margin-bottom-30">
            <h3 class="panel-block-label">Panelist Detail</h3>
        </div>
        <?php if (!empty($panelData)) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Employee Id</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($panelData as $key => $value) {
                        ?>
                        <tr>
                            <td><?= ($key + 1) ?></td>
                            <td><?= ucfirst($value['user']['name']); ?></td>
                            <td><?= $value['user']['empid']; ?></td>
                            <td><?= $value['user']['email']; ?></td>
                            <td>
                                <?php
                                if ($value['is_scribe']) {
                                    echo 'Scribe';
                                } else {
                                    echo 'Panelist';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $icon = "";
                                if ($value['is_accepted'] == 0) {
                                    $icon = '<i class="fa fa-trash-o fa-lg pointer" style="color:#f04e58"></i>';
                                    echo 'Pending';
                                } else if ($value['is_accepted'] == 1) {
                                    echo 'Accepted';
                                } else if ($value['is_accepted'] == 2) {
                                    $icon = '<i class="fa fa-trash-o fa-lg pointer" style="color:#f04e58"></i>';
                                    echo 'Rejected';
                                }
                                if ($icon != "") {
                                    $link = $this->Html->link($icon, ['action' => 'removeRequest', $value['id']], ['escape' => false]);
                                } else {
                                    $link = "";
                                }
                                ?>
                            </td>
                            <td><?= $link; ?></td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-10"><h4 class="panel-block-label">No panelist added. </h4></div>
            </div>
        <?php }
        ?>

    </div>
    <div class="container-fluid">
        <div class="panel-block">
            <div class="row">
                <div class="col-md-6 p-t-20 margin-bottom-30">
                    <h4 class="panel-block-title">Add Panel Member</h4>
                </div>
            </div>    
            <?php echo $this->Form->create('', ['id' => 'add-p-form']); ?>
            <?php
            echo $this->Form->input('',['type'=>'hidden','id'=>'complaint_id','value'=>$cateGory]);
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role">
                            <option value="0">Please select</option>
                            <?php
                            if (!empty($rolesData)) {
                                foreach ($rolesData as $id => $name) {
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">User</label>
                        <select class="form-control" id="role_user" name="role_user">
                            <option value="0">Please select</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email Id</label>
                        <input id="email" disabled class="form-control" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="empid">Employee Id</label>
                        <input id="empid" disabled class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="scribe">Scribe</label>
                        <select class="form-control" id="scribe" name="is_scribe">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disposition">Disposition</label>
                        <select id="" name="status"  class="form-control">
                            <?php if (!empty($cstatusData)){ 
                             echo '<option value="0">Choose an option</option>';
                             foreach($cstatusData as  $key=>$value){
                               echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                           }
                       }
                       ?>
                   </select>
               </div>
           </div>
       </div>
       <div class="row">
        <div class="col-xs-12 text-right">
            <button type="submit"  class="btn btn-dark p-l-20 p-r-20">Add</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <div class="row">
        <div class="col-xs-12 text-right">
            &nbsp;
        </div>
    </div>
</div>
</div>
</div>
