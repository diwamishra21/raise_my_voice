<?php
$assigned = false;
$assignedDate="";
$assinedTo="";
if (!empty($complaint)) {
    //pr($complaint);die;
    foreach ($complaint as $cmpl) {
        if (!empty($cmpl['assigned_to'])) {
            $assigned = true;
            $assignedDate=date('d F Y', strtotime($cmpl['superwisor_complaint_accept_date']));
            $assinedTo=$cmpl['assigned_data'];
        }
    }
}

if (!empty($panel_his)) {
    $panelDate = date('d F Y', strtotime($panel_his[0]['created']));
    $pMember = "";
    foreach ($panel_his as $panH) {
        $pMember .= $panH['user']['name'] . "(" . $panH['user']['empid'] . ")</br/>";
//        if ($pMember == "") {
//            $pMember .= $panH['user']['name'] . "(" . $panH['user']['empid'] . ")<br/>";
//        } else {
//            $pMember .= ", " . $panH['user']['name'] . "(" . $panH['user']['empid'] . ")</br/>";
//        }
    }
}
?>  
    <div class="panel-body">
        <?php
        if (($assigned)) {
            ?>
            <div class="row p-b-20">
                <div class="col-md-2">
                    <p class="p-t-5"><?=$assignedDate;?></p>
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
                                <div class="col-md-12"><label><?=$assinedTo;?></label></div>
                            </div>
                            <div class="row supervisor-panel-block-row">
                                <div class="col-md-6">Description :</div>
                                <div class="col-md-6"><p>Complaint assigned</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        if (!empty($panel_his)) {
            ?>
            <div class="row p-b-20">
                <div class="col-md-2">
                    <p class="p-t-5"><?=$panelDate;?></p>
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
                                <div class="col-md-12"><label>Panel created for complaint.</label></div>
                            </div>
                            <div class="row supervisor-panel-block-row">
                                <div class="col-md-6">Panel Members</div>
                                <div class="col-md-6"><p><?= $pMember; ?></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
