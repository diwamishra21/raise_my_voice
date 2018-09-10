<div class="col-sm-10">
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20 p-b-20">
        <div class="panel-divider"></div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
            <?php
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
            ?>
        </div>

    </div>
</div>