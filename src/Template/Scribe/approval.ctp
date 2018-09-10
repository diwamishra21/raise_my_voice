<div class="col-sm-10">
    <?php echo $this->element('myvoice/complaint_summary'); ?>
    <div class="p-t-20 p-b-20">
<!--        <p>You have been assigned as the supervisor in charge for this case</p>-->
        <div class="panel-divider"></div>
    </div>
    <?php
    if (!empty($type)) {
        if ($type == 'panel') {
            $tText = "Panelist";
            $action = "selectionPanel";
        } else {
            $tText = ucfirst($type);
            $action = "selection";
        }
    }
    ?>


    <div class="row">
        <div class="col-md-12">
            <div class="panel-title p-l-15">
                <h4 class="panel-block-title">You have been added as "<?= $tText; ?>" for this complaint.</h4>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-2">
                <?php
                echo $this->Html->link('<button class="btn btn-dark p-a-10" type="button">Accept</button>', ['controller' => 'scribe', 'action' => $action, $complaint_id, 1], ['escape' => false]);
                ?>
            </div>
            <div class="col-md-2">
                <?php
                echo $this->Html->link('<button class="btn btn-dark p-a-10" type="button">Reject</button>', ['controller' => 'scribe', 'action' => $action, $complaint_id, 0], ['escape' => false]);
                ?>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <hr>

    <div class="row m-t-20 p-t-20">
        <div class="col-xs-12">
            &nbsp;
        </div>
    </div>
</div>
