<div class="col-sm-10">
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20 p-b-20">
<!--        <p>You have been assigned as the supervisor in charge for this case</p>-->
        <div class="panel-divider"></div>
    </div>
    <div class="container-fluid">
        <div class="panel-block bg-transparent">
            <h3 class="panel-block-title">Meeting details / Attachments.</h3>
        </div>
        <div class="panel-block" <?php if (!empty($meetingData) && (count($meetingData) > 1)) { ?>style="background:none; max-height:500px;overflow-y:scroll;" <?php } ?>>
            <?php
            if (!empty($meetingData)) {

                foreach ($meetingData as $key => $mtdata) {
                    // pr($mtdata);die;
                    if ($key != 0) {
                        ?>
                        <div class="panel-divider"></div>
                        <?php
                    }
                    ?>                    
                    <h4 class="panel-block-title" style="text-align:center;">Meeting <?= ($key + 1) ?></h4>
                    <div class="row p-t-20">
                        <div class="col-xs-12">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Meeting date</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?php if (!empty($mtdata['meeting_date'])) echo $mtdata['meeting_date']; ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Attendance</label></div>
                        <div class="col-md-7">
                            <p class="panel-block-label">
                                <?php
                                if (!empty($mtdata['attendees'])) {
                                    $atxt = "";
                                    foreach ($mtdata['attendees'] as $matd) {
                                        if ($matd['attend'] == true) {
                                            $atText1 = 'Attended';
                                        } else {
                                            $atText1 = 'Not attended';
                                        }
                                        $atxt = $atxt . '<div class="row"><div class="col-md-6"><label>' . $matd['name'] . '(' . $matd['empid'] . ') </label> : </div><div class="col-md-6">' . $atText1 . '</div></div>';
                                    }
                                }
                                echo $atxt;
                                ?>
                            </p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Note</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= $mtdata['note']; ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>

                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Attachments</label></div>
                        <div class="col-md-7">
                            <?php
                            $link = "";
                            $root = $this->Url->build('/');
                            if (!empty($mtdata['attachments'])) {
                                foreach ($mtdata['attachments'] as $k => $file) {
                                    if (!empty($file)) {
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
                                        $link = '<a target="_blank" href="' . $root . 'upload/scribe/' . $file . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                        echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                    }
                                }
                            }
                            ?>

                        </div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>

                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Next meeting</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= $mtdata['next_meeting'] ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Recommendation / Next step</label></div>
                        <div class="col-md-7">
                            <p class="panel-block-label">
                                <?php
                                if (!empty($mtdata['recommendation'])) {
                                    echo $mtdata['recommendation'];
                                }
                                ?>  

                            </p>
                        </div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-10"><h4 class="panel-block-label">No meeting details found. </h4></div>
                </div>
            <?php }
            ?>
        </div>             
    </div>
    <div class="p-t-20 p-b-20">
        <div class="panel-divider">            
        </div>

    </div>
    <div class="container-fluid">
        <?php
        if ($cur_panel['i_status'] == 0) {
            echo $this->Form->create('', ['type' => 'file']);
            ?>
            <div class="panel-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="personal_notes">Notes</label>
                            <textarea class="form-control" name="note" id="personal_notes" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-xs-6">
                        <h4 class="m-t-7">Attachments</h4>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="button" class="btn btn-dark p-a-10" id="add_files" data-input-next="0">+ Choose File</button>
                        <input class="hidden hidden_file" id="chooseFile0" name="scribe_file0" type="file">
                    </div>
                </div>
                <div class="row " id="list">
                    <div class="col-xs-12">
                        <ul class="list-group files_info">
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h5>File type .jpg,.png,.gif,.docx,.xls,.pdf,.wav,.mp3,.wmv files are allowed to upload (File size must be < 10 mb)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <button class="btn btn-dark" type="submit">&nbsp;Submit &nbsp;</button>
                    </div>                    
                </div>
                <div class="row panel-block-row" style="border-bottom:1px solid #dedede;">
                    <div class="col-md-12">&nbsp;</p></div>
                </div>
            </div>
            <?php
            echo $this->Form->end();
            if ($allow_close) {
                ?>
                <div class="panel-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>You had been asked to close complaint. Please close the complaint ,So scribe will assign to HR for action.</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php
                            echo $this->Html->link('<button class="btn btn-dark p-a-10" type="button">Close Complaint</button>', ['controller' => 'scribe', 'action' => 'closePanel', $complaint_id], ['escape' => false]);
                            ?>
                        </div> 
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="row p-b-15 p-l-20">
                <div class="col-md-12">
                    <div class="panel-title">
                        <h4 class="panel-block-title">You have closed complaint.</h4>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
