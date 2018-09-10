
                <?php foreach ($user_profile_detail as $user_profile_details): 
					    endforeach; ?>
                           

        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="profile">
                    <h2 class="panel-block-title">  <?= h($user_profile_details->name) ?></h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Position</label></div>
                        <div class="col-md-8"><p class="panel-block-label">  <?= h($user_profile_details->position) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->city) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->work_location) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->empid) ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                        <div class="col-md-8"><p class="panel-block-label"><?= h($user_profile_details->email) ?></p></div>
                    </div>
                </div>
                <!-- <div class="panel-block" id="concerns-summary">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Cases Assigned</label></div>
                        <div class="col-md-8"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Cases Resolved</label></div>
                        <div class="col-md-8"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">On Going</label></div>
                        <div class="col-md-8"><p class="panel-block-label"></p></div>
                    </div>
                </div> -->
                
            </div>
        </div>
    </div>
</div>

