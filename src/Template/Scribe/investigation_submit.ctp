<div class="col-sm-10">
    <?php
    $allowedByAll = true;
    ?>
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20 p-b-20">
<!--        <p>You have been assigned as the supervisor in charge for this case</p>-->
        <div class="panel-divider"></div>
    </div>

    <div class="container-fluid">
        <div class="bg-transparent margin-bottom-30">
            <h3 class="panel-block-label">Panelist</h3>
        </div>
        <?php if (!empty($panelData)) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Employee Id</th>
                        <th>Email</th>
                        <th>Status</th>
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
                                if ($value['i_status']) {
                                    echo 'Closed';
                                } else {
                                    $allowedByAll = false;
                                    echo 'Open';
                                }
                                ?>
                            </td>
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

    <?php if (!$allow_close) { ?>
        <div class="container-fluid">
            <div class="panel-block">
                <?php echo $this->Form->create('', ['action' => 'allowClose/' . $complaint_id]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ask the panelists to close complaint.</label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-dark p-a-10">&nbsp;Yes &nbsp;</button>
                    </div>
                </div>
                <div class="row">

                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        if ($allowedByAll) {
            ?>  
            <div class="container-fluid">
                <?php
                if (!in_array($complain_info['status'], [1, 16, 10, 15])) {
                    ?>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>All panel members have closed investigation. Now you can assign to HR.</label>
                                </div>
                            </div>
                        </div>    
                        <?php
                        echo $this->Form->create('', ['id' => 'submit_complain']);
                        ?>
                        <?php
                        echo $this->Form->input('', ['type' => 'hidden', 'id' => 'complaint_id', 'value' => $cateGory]);
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role">
                                        <option value="0">Please select</option>
                                        <?php
                                        //pr($rolesData);die;
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="personal_notes">Notes</label>
                                    <textarea class="form-control" id="personal_notes" name="notes" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12  text-right">
                                <button class="btn btn-dark p-a-10" type="submit">&nbsp;Submit &nbsp;</button>
                            </div>
                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                    <?php
                } else if (in_array($complain_info['status'], [10])) {

                    if ($uploaded_report != false) {
                        ?>  
                        <div class="panel-block">
                            <div class="bg-transparent margin-bottom-30">
                                <h3 class="panel-block-label">Uploaded Report</h3>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>File</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $link = "";
                                    $root = $this->Url->build('/');
                                    if (!empty($uploaded_report['investigation_report'])) {
                                        $file = $uploaded_report['investigation_report'];
                                        $fileNameTmp = explode('.', $file);
                                        $ext = $fileNameTmp[count($fileNameTmp) - 1];
                                        $ext = strtolower($ext);
                                        if (in_array($ext, ['doc', 'jpg', 'mp3', 'mp4', 'pdf', 'png', 'ppt', 'rar', 'txt', 'wav', 'xls', 'xlsx', 'zip'])) {
                                            $icon = $this->Html->image('file-icon/' . $ext . '.png');
                                            //$icon = '<i class="fa fa-picture-o fa-2x" ></i>';
                                        } else {
                                            $icon = $this->Html->image('file-icon/blank.png');
                                            //$icon = '<i class="fa fa-file-o fa-2x" ></i>';
                                        }
                                        $link = '<a target="_blank" href="' . $root . 'upload/' . $file . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php if (!empty($uploaded_report['investigation_report'])) echo $uploaded_report['investigation_report']; ?></td>
                                        <td><?php if (!empty($link)) echo "<p>" . $link . "</p>"; ?></td>
                                        <td><?php if (!empty($uploaded_report['modified'])) echo date('d F Y', strtotime($uploaded_report['modified'])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    <?php } else {
                        ?>
                        <div class="panel-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload final investigation report :</label>
                                    </div>
                                </div>
                            </div>    
                            <?php
                            echo $this->Form->create('', ['action' => 'uploadIreport/' . $complaint_id, 'type' => 'file']);
                            ?>
                            <div class="row">
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-dark p-a-10" id="add_files" data-input-next="0">+ Choose File</button>
                                    <input class="hidden hidden_file" id="chooseFile0" name="scribe_file0" type="file">
                                </div>                            
                                <div class="col-xs-6">
                                    <button class="btn btn-dark" type="submit">&nbsp;Submit &nbsp;</button>
                                </div>
                            </div>
                            <div class="row m-t-20" id="list">
                                <div class="col-xs-12">
                                    <ul class="list-group files_info">
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h5>File type .jpg,.png,.gif,.doc,.docx,.xls,.pdf,.wav,.mp3,.mpg,.wmv files are allowed to upload (File size must be &lt; 10 mb)</h5>
                                </div>
                            </div>

                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        <?php } else {
            ?> 
            <div class="container-fluid">
                <div class="panel-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Complaint not closed by all panel members.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    <?php } ?>
</div>