               <?php foreach ($individual_accuser_detail as $individual_accuser_details): ?>
                       <?php   endforeach;
$Harassment=$individual_accuser_details->c_subject;
if($Harassment == 1){ 
    $string = 'Harassment';
} elseif($Harassment == 7){
    $string = 'Disciplinary';
 } elseif($Harassment == 4) {
   $string = ' Ethics';
} else {
$string = ' Others';
}


 ?>
<?php $id= h(@$individual_accuser_details->id) ?>
                       <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent">
                    <h3 class="panel-block-title"><?= h(@$individual_accuser_details->c_title) ?></h3>
                </div>
               <div class="panel-block" style="background:none;">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Complaint Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h(@$individual_accuser_details->complaint_id) ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                <div class="col-md-3"><label class="panel-block-label">Category / Subcategory</label></div>
                <div class="col-md-7"><p class="panel-block-label"><?php if(empty($category_type)){echo 'No Category Specified';}else{echo $category_type;} ?></p></div>
                <div class="col-md-2"><p class="panel-block-label"></p></div>
            </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Filed On</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= date('d/m/Y',strtotime($individual_accuser_details->complaint_id_genrate_date)) ; ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Current Status</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= $users_status ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                   
                </div>
                <div class="row panel-block">
                    <div class="col-xs-12 panel-group margin-bottom-0" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-custom">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="panel-title pointer" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="panel-block-title">Employee Report</h4>
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
                                                <li> Employee has categorized the issue as <?= @$string ?>.</li>
                                                <li> Employee is filling the report on behalf of 
<?php $collegus= @h($individual_accuser_details->c_option) ?>
<?php if($collegus == 'No') {?>
self.
<?php } else { ?>
Colleague.
<?php } ?>
</li>                                      <li> Employee has tried to resolve this issue prior to filling the report, <?= @h($individual_accuser_details->c_tried_r_own ) ?>.  </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Context</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->work_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->email) ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Statement</h3>
                                            <div class="p-t-20">
                                                 <p><?= @h($individual_accuser_details->concern_details ) ?></p> <div class="p-t-20">
                                                    <!-- <img src="images/audio.png"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 p-t-20">
                                            <h4 class="panel-block-title">Attachments</h4>
                                            <div class="row m-t-20">
                                                <div class="col-xs-12">
                                                   <ul class="list-group">
  <?php foreach ($individual_user_detail_images as $individual_user_detail_image): ?>
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5"><?= $image=h(@$individual_user_detail_image->image) ?></div>
                                                                <div class="col-md-6 p-t-5"></div>
                                                                <div class="col-md-3" >

<?php echo $this->Html->image("../webroot/upload/$image", array('alt' => '', 'style' => 'width:100px')); ?>

</div>
                                                            </div>
                                                        </li>
                                <?php   endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Witnesses</h3>
                                           <?php foreach ($witness_user_detail as $witness_user_details): ?>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Witness </label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_email_id) ?></p></div>
                                            </div>
                                        </div>
 <?php   endforeach; ?>
<?php foreach ($accused_detail as $accused_details): ?>
                      
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">Offender</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Offender Name </label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_email) ?></p></div>
                                            </div>
                                        </div>
 <?php   endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="panel-block">
                <div class="row p-b-20">
                    <div class="col-md-2">
                        <p class="p-t-5">July 21, 2017</p>
                    </div>
                    <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                    </div>
                    <div class="col-md-9">
                        <h4 class="m-t-5">Report Filed</h4>
                        <p>We have filed your report. In the coming days, your report will be reviewed by one of our My Voice Manager and you will be notified through the process.</p>
                        <p>You will be allowed to add additional details and produce witnesses to support your claim anytime during the process.</p>
                    </div>
                </div>
                <div class="row p-b-20">
                    <div class="col-md-2">
                        <p class="p-t-5">July 21, 2017</p>
                    </div>
                    <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                    </div>
                    <div class="col-md-9">
                        <h4 class="m-t-5">Report Filed</h4>
                        <p>We have filed your report. In the coming days, your report will be reviewed by one of our My Voice Manager and you will be notified through the process.</p>
                        <p>You will be allowed to add additional details and produce witnesses to support your claim anytime during the process.</p>
                    </div>
                </div>
                <div class="row p-b-20">
                    <div class="col-md-2">
                        <p class="p-t-5">July 24, 2017</p>
                    </div>
                    <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                    </div>
                    <div class="col-md-9">
                        <h4 class="m-t-5">Report Reviewed by My Voice Manager</h4>
                        <p>Our My Voice Manager has reviewed your report. You will be notified as the process moves forward.</p>
                    </div>
                </div>
                <div class="row p-b-20">
                    <div class="col-md-2">
                        <p class="p-t-5">July 21, 2017</p>
                    </div>
                    <div class="col-md-1">
                            <span class="fa-stack">
                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                            </span>
                    </div>
                    <div class="col-md-9">
                        <h4 class="m-t-5">Additional Details Added</h4>
                        <p>You have successfully<br>
                            - attached two additional files<br>
                            - given additional details in a written statement<br>
                            - produced 1 additional witness<br><br>
                            These details will be reviewed along with your report filed.</p>
                    </div>
                </div>
                <div class="row p-b-20">
                    <div class="col-md-2">
                        <p class="p-t-5">August 3, 2017</p>
                    </div>
                    <div class="col-md-1">
                        <i class="fa fa-circle fa-2x"></i>
                    </div>
                    <div class="col-md-9">
                        <h4 class="m-t-5">Comments Added</h4>
                        <p>Manish Pandey added the comment regarding the case yesterday</p>
                    </div>
                </div>
            </div>
            <div class="panel-divider"></div>
            <div class="container-fluid">
                <div class="panel-block margin-bottom-30">
                    <p>You can close the case once all the panelist members have reviewed the case and a decision has been finalised.</p>
                    <div class="margin-top-60 text-right">
                        <a href="" class="btn btn-dark">Close Case</a>
                    </div>
                </div>
            </div>
        </div>
   

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>