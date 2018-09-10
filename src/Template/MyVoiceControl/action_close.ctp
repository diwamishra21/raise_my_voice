<div class="col-sm-10">
    <?php
    $complaint_status = $complain_info['status'];
    ?>
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20">
        <div class="panel-divider"></div>
    </div>
    <?php if ($complaint_status == 10) { ?>
        <div class="container-fluid">
            <div class="panel-block">
                <div class="row">
                    <?php
                    echo $this->Form->create('');
                    ?>
                    <div class="col-md-7">
                        <p>Final investigation repot submitted by scibe.</p>
                        <p>Please review the report and take action after that close the complaint on Myvoice portal.</p>

                    </div>
                    <div class="col-md-4">
                        <div class="margin-top-60 text-right ma">
                            <button class="btn btn-dark" type="submit">Action Close</button>                   
                        </div>                       
                    </div>
                    <?php
                    echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
    <?php } else {
        ?>  
        <div class="container-fluid">
            <div class="panel-block">
                <div class="row">                   
                    <div class="col-md-7 p-l-20">
                        
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>
