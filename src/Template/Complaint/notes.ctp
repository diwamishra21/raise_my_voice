<div class="col-sm-10">
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="panel-divider"></div>
    <?php
    if (!in_array($complain_info['status'], [1,15,16])) {
        ?>

        <div class="container-fluid">
            <?php
            echo $this->Form->create('', ['type' => 'file']);
            ?>
            <div class="panel-block ">
                <div class="row margin-bottom-30">
                    <h4 class="panel-block-title">Add Notes</h4>
                </div>            
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="personal_notes">Notes</label>
                            <textarea class="form-control" name="note" id="personal_notes" rows="4"></textarea>
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
                <div class="row m-t-20" >
                    <div class="col-xs-12">
                        <ul class="list-group files_info">
                        </ul>
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