<div class="col-sm-10">
    <?php
    echo $this->Html->css(['bootstrap-datetimepicker.min']);
    ?>
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="panel-divider"></div>
    <div class="container-fluid">
        <div class="panel-block bg-transparent"  style="padding-top:0px !important; padding-bottom:0px !important;">
            <h3 class="panel-block-title">Meeting details / Attachments.</h3>
        </div>
        <div class="panel-block"<?php if (!empty($meetingData) && (count($meetingData) > 1)) { ?> style="background:none; max-height:500px;overflow-y:scroll;"<?php } ?>>
            <?php
            if (!empty($meetingData)) {
                //pr($meetingData);die;
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
    <div class="p-t-20">
        <div class="panel-divider">            
        </div>
    </div>
    <?php
    if (!in_array($complain_info['status'], [1,4,10,15,16])) {
        ?>

        <div class="container-fluid">
            <?php
            echo $this->Form->create('', ['type' => 'file']);
            ?>
            <div class="panel-block ">
                <div class="row margin-bottom-30">
                    <h4 class="panel-block-title">Add meeting details.</h4>
                </div>            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meeting_date">Meeting Date</label>
                            <input id="meeting_date" name="meeting_date" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meeting_attendees">Select Attendees</label>
                            <?php
                            if (!empty($panalistData)) {
                                echo '<select class="form-control" id="meeting_attendees" name="meeting_attendees[]" multiple="multiple">';
                                //echo '<option value="0">Select Attendee</option>';
                                foreach ($panalistData as $pusr) {
                                    echo '<option value="' . $pusr['user']['id'] . '">' . ucfirst($pusr['user']['name']) . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="personal_notes">Notes</label>
                            <textarea class="form-control" name="note" id="personal_notes" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="personal_notes">Recommendation / Next step</label>
                            <textarea class="form-control" name="recommendation" id="personal_notes" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="next_meeting">Next Meeting Date</label>
                            <input id="next_meeting" name="next_meeting" class="form-control" type="text">
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
                <div class="row m-t-20" style="border-bottom:1px solid #dedede;">
                    <div class="col-xs-12">
                        <ul class="list-group files_info">
                        </ul>
                    </div>
                </div>
                <div class="row m-t-20 p-t-20">
                    <div class="col-xs-12">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <button class="btn btn-dark p-l-10 p-r-10" type="submit">&nbsp;Submit &nbsp;</button>
                    </div>
                    <?php
                    echo $this->Form->end();
                    ?>
                </div>
                <div class="row m-t-20 p-t-20">
                    <div class="col-xs-12">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />