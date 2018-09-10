<div class="container-fluid">
    <div class="panel-block bg-transparent">
        <h3 class="panel-block-title">
            <?php
            //pr($complain_info);die;
            if (!empty($complain_info['c_title'])) {
                echo $complain_info['c_title'];
            }
            ?>
        </h3>
    </div>
    <div class="panel-block" style="background:none;">
        <div class="row panel-block-row panel-block-row-link">
            <div class="col-md-3"><label class="panel-block-label">Complaint Id</label></div>
            <div class="col-md-7">
                <p class="panel-block-label">
                    <?php
                    if (!empty($complain_info['complaint_id']))
                        echo $complain_info['complaint_id'];
                    ?>
                </p>
            </div>
            <div class="col-md-2"><p class="panel-block-label"></p></div>
        </div>
        <div class="row panel-block-row panel-block-row-link">
            <div class="col-md-3"><label class="panel-block-label">Category / Subcategory</label></div>
            <div class="col-md-7">
                <p class="panel-block-label">
                    <?php
                    $cat_name = "";
                    if (!empty($complain_info['c_subject_name']) && (!empty($complain_info['other_issue_name']))) {
                        $cat_name = $complain_info['c_subject_name'] . " / " . $complain_info['other_issue_name'];
                    }
                    echo $cat_name;
                    ?>
                </p>
            </div>
            <div class="col-md-2"><p class="panel-block-label"></p></div>
        </div>
        <div class="row panel-block-row panel-block-row-link">
            <div class="col-md-3"><label class="panel-block-label">Filed On</label></div>
            <div class="col-md-7">
                <p class="panel-block-label">
                    <?php
                    if (!empty($complain_info['complaint_id_genrate_date']))
                        echo date('d/m/Y', strtotime($complain_info['complaint_id_genrate_date']));
                    ?>
                </p>
            </div>
            <div class="col-md-2"><p class="panel-block-label"></p></div>
        </div>
        <div class="row panel-block-row panel-block-row-link">
            <div class="col-md-3"><label class="panel-block-label">Current Status</label></div>
            <div class="col-md-7">
                <p class="panel-block-label">
                    <?php
                    if (!empty($case_status))
                        echo $case_status;
                    ?>
                </p>
            </div>
            <div class="col-md-2"><p class="panel-block-label"></p></div>
        </div>
    </div>
    <?php
    if (empty($hide_report)) {
        ?>
        <div class="row panel-block">
            <div class="col-xs-12 panel-group margin-bottom-0" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-custom">
                    <div class="panel-heading" role="tab" id="headingOne" style="border-bottom:1px solid #ccc;">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-title pointer" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-block-title">Complaint Report</h4>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel-title pointer text-right" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="detail_report" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row p-t-20 margin-bottom-30">
                                <div class="col-xs-12">
                                    <h3 class="panel-block-title">Issue</h3>
                                    <ul class="emp-report-list" style="margin: 10px 0 0 0px;">
                                        <li> Employee has categorized the issue as <?= $cat_name; ?>.</li>
                                        <?php
                                        $selfT = $complain_info['c_option'];
                                        if ($selfT == 'No') {
                                            $self = 'self.';
                                        } else {
                                            $self = 'colleague.';
                                        }
                                        ?>
                                        <li> Employee is filling the report on behalf of <?= $self; ?></li>
                                        <?php
                                        $tried_own = $complain_info['c_tried_r_own'];
                                        ?>
                                        <li> Employee has tried to resolve this issue prior to filling the report, <?= $tried_own; ?>.  </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row p-t-20 margin-bottom-30">
                                <div class="col-xs-12">
                                    <h3 class="panel-block-title">Context</h3>
                                    <div class="row panel-block-row p-t-20">
                                        <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                        <div class="col-md-8">
                                            <p class="panel-block-label">
                                                <?php if (!empty($complain_info['name'])) echo $complain_info['name']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row panel-block-row">
                                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                        <div class="col-md-8">
                                            <p class="panel-block-label"><?php if (!empty($complain_info['city'])) echo $complain_info['city']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row panel-block-row">
                                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                        <div class="col-md-8">
                                            <p class="panel-block-label">
                                                <?php if (!empty($complain_info['work_location'])) echo $complain_info['work_location']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row panel-block-row">
                                        <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                        <div class="col-md-8">
                                            <p class="panel-block-label"><?php if (!empty($complain_info['bu'])) echo $complain_info['bu']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row panel-block-row">
                                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                        <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($complain_info['empid'])) echo $complain_info['empid']; ?></p></div>
                                    </div>
                                    <div class="row panel-block-row">
                                        <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                        <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($complain_info['email'])) echo $complain_info['email']; ?></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20 margin-bottom-30">
                                <div class="col-xs-12">
                                    <h3 class="panel-block-title">Statement</h3>
                                    <div class="p-t-20">
                                        <p><?php if (!empty($complain_info['concern_details'])) echo $complain_info['concern_details']; ?></p>
                                        <div class="p-t-20">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 p-t-20">
                                    <h4 class="panel-block-title">Attachments by complainant</h4>
                                    <div class="row m-t-20">
                                        <div class="col-md-12">                                        
                                            <?php
                                            // pr($added_files);die;
                                            $root = $this->Url->build('/') . 'upload/';
                                            $link = "";
                                            if (!empty($added_files)) {
                                                foreach ($added_files as $k => $file) {
                                                    $fileName = $file['image'];
                                                    $fileNameTmp = explode('.', $fileName);
                                                    $ext = $fileNameTmp[count($fileNameTmp) - 1];
                                                    $ext = strtolower($ext);
                                                    if (in_array($ext, ['doc', 'jpg', 'mp3', 'mp4', 'pdf', 'png', 'ppt', 'rar', 'txt', 'wav', 'xls', 'xlsx', 'zip'])) {
                                                        $icon = $this->Html->image('file-icon/' . $ext . '.png');
                                                        //$icon = '<i class="fa fa-picture-o fa-2x" ></i>';
                                                    } else {
                                                        $icon = $this->Html->image('file-icon/blank.png');
                                                        //$icon = '<i class="fa fa-file-o fa-2x" ></i>';
                                                    }
                                                    $link = '<a target="_blank" href="' . $root . $fileName . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                                    echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20 margin-bottom-30">
                                <div class="col-xs-12">
                                    <h3 class="panel-block-title">Witnesses</h3>
                                    <div class="panel-block" <?php if (!empty($witness) && (count($witness) > 1)) { ?>style="background:none; max-height:500px;overflow-y:scroll;" <?php } ?>>
                                        <?php
                                        if (!empty($witness)) {

                                            foreach ($witness as $key => $wtdata) {
                                                ?>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label" style="font-size:16px;">Witness <?= ($key + 1); ?></label></div>
                                                </div>
                                                <div class="row panel-block-row p-t-20">
                                                    <div class="col-md-3">
                                                        <label class="panel-block-label">Witness name</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['wi_name'])) echo ucfirst($wtdata['wi_name']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['wi_city'])) echo ucfirst($wtdata['wi_city']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['wi_location'])) echo ucfirst($wtdata['wi_location']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['wi_bu'])) echo ucfirst($wtdata['wi_bu']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['wi_empid'])) echo ucfirst($wtdata['wi_empid']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['wi_email_id'])) echo ucfirst($wtdata['wi_email_id']); ?></p></div>
                                                </div>
                                                <?php
                                            }
                                        }else {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-2">&nbsp;</div>
                                                <div class="col-md-10"><h4 class="panel-block-label">No Witnesses added. </h4></div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20 margin-bottom-30">
                                <div class="col-xs-12">
                                    <h3 class="panel-block-title">Offender</h3>
                                    <div class="panel-block" <?php if (!empty($accuseds) && (count($accuseds) > 1)) { ?>style="background:none; max-height:500px;overflow-y:scroll;" <?php } ?>>
                                        <?php
                                        if (!empty($accuseds)) {

                                            foreach ($accuseds as $key => $wtdata) {
                                                ?>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label" style="font-size:16px;">Offender <?= ($key + 1); ?></label></div>
                                                </div>
                                                <div class="row panel-block-row p-t-20">
                                                    <div class="col-md-3">
                                                        <label class="panel-block-label">Offender name</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['accused_name'])) echo ucfirst($wtdata['accused_name']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['accused_city'])) echo ucfirst($wtdata['accused_city']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['accused_location'])) echo ucfirst($wtdata['accused_location']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['accused_bu'])) echo ucfirst($wtdata['accused_bu']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['accused_empid'])) echo ucfirst($wtdata['accused_empid']); ?></p></div>
                                                </div>
                                                <div class="row panel-block-row">
                                                    <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                    <div class="col-md-8"><p class="panel-block-label"><?php if (!empty($wtdata['accused_email'])) echo ucfirst($wtdata['accused_email']); ?></p></div>
                                                </div>
                                                <?php
                                            }
                                        }else {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-2">&nbsp;</div>
                                                <div class="col-md-10"><h4 class="panel-block-label">No Offender added. </h4></div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!empty($cdData) || (!empty($complainData))) {
                        ?>
                        <div class="panel-heading" role="tab" id="headingTwo" style="border-bottom:1px solid #ccc;">
                            <div class="p-t-3">
                                &nbsp;
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="panel-title pointer" data-toggle="collapse" data-parent="#accordion" href="#detail_history" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="panel-block-title">History</h4>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="panel-title pointer text-right" data-toggle="collapse" data-parent="#accordion" href="#detail_history" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="detail_history" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <?php
                                if (!empty($cdData)) {
                                    //pr($cdData);die;
                                    foreach ($cdData as $cd) {
                                        $cDate = "";
                                        if (!empty($cd['created'])) {
                                            $cDate = date('d F Y', strtotime($cd['created']));
                                        }
                                        ?>
                                        <div class="row p-b-20">
                                            <div class="col-md-2">
                                                <p class="p-t-5"><?= $cDate; ?></p>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                                    <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="row supervisor-panel-block-row p-b-10">
                                                            <?php
                                                            $emp = "";
                                                            if (!empty($cd['user']['name']) && (!empty($cd['user']['empid']))) {
                                                                $emp = $cd['user']['name'] . " (" . $cd['user']['empid'] . ") ";
                                                            }else{
                                                                $emp = $cd['user']['name'];
                                                            }
                                                            ?>
                                                            <div class="col-md-12"><label><?= $emp; ?></label></div>
                                                        </div>
                                                        <div class="row supervisor-panel-block-row">
                                                            <div class="col-md-2 p-t-3">Note :</div>
                                                            <?php
                                                            $enote = "";
                                                            if (!empty($cd['note'])) {
                                                                $enote = $cd['note'];
                                                            }
                                                            ?>
                                                            <div class="col-md-10"><p><?= $enote; ?></p></div>
                                                        </div>
                                                        <?php
                                                        if (!empty($cd['image'])) {
                                                            ?>
                                                            <div class="row supervisor-panel-block-row">
                                                                <div class="col-md-2 p-t-3">Files :</div>
                                                                <div class="col-md-10">
                                                                    <?php
                                                                    $link = "";
                                                                    $root = $this->Url->build('/');

                                                                    $images = explode(',', $cd['image']);
                                                                    foreach ($images as $k => $file) {
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
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }

                                if (!empty($complainData)) {
                                    $cd = $complainData;
                                    if (!empty($cd['investigation_report'])) {
                                        $cDate = "";
                                        if (!empty($cd['modified'])) {
                                            $cDate = date('d F Y', strtotime($cd['modified']));
                                        }
                                        ?>
                                        <div class="row p-b-20">
                                            <div class="col-md-2">
                                                <p class="p-t-5"><?= $cDate; ?></p>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                                    <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="row supervisor-panel-block-row">
                                                            <div class="col-md-4 p-t-3"><label>Investigation Report</label></div>
                                                            <div class="col-md-8">
                                                                <?php
                                                                $link = "";
                                                                $root = $this->Url->build('/');

                                                                $file = $cd['investigation_report'];
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
                                                                echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>