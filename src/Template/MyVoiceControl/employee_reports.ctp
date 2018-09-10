


<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
               
               <ul>
                    <li class=""><a class="smooth-scroll" href="reports.html">Reports</a></li>
                    <li><a class="smooth-scroll" href="#statistics">Statistics</a></li>
                    <li><a class="smooth-scroll" href="messages.html">Messages</a></li>
                   <li class="active"><a href="employee-records.html">Employee Records</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
               
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid" id="concern-form">
                <div class="concern-form-section active" data-section-order="1">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Employee Records</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_title">Name</label>
                                    <input type="text" id="subject_name" name="subject_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concern_regarding">City</label>
                                    <input type="text" id="subject_city" name="subject_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_concern">Business Unit</label>
                                    <input type="text" id="other_Business_Unit" name="other_Business_Unit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern">Work Location</label>
                                    <input type="text" id="other_Work_Location" name="other_Work_Location" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern">Employee Id</label>
                                    <input type="text" id="other_Employee_Id" name="other_Employee_Id" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern">Job Title</label>
                                    <input type="text" id="other_Job_Title" name="other_Job_Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="other_concern">Email Id</label>
                                    <input type="text" id="other_Email_Id" name="other_Email_Id" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="col-md-4 text-center p-t-10" style="float:right;">
                            <button class="btn btn-dark p-a-10" id="btn-proceed">Search </button>
                            
                        </div>
                                </div>
                            </div>
                        </div>
                        
                        
                         <?php foreach ($user_detail as $user_deatils): ?>
                        
                        
                        <div class="panel-block margin-bottom-30 bg-details" id="registered-concerns">
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label"><?= h($user_deatils->id) ?>.<?= h($user_deatils->username) ?></label></div>
                        <div class="col-md-7"><p class="panel-block-label"></p></div>
                        <div class="col-md-2"><a href="concern-details2222.html"><p class="panel-block-label status-active"><button class="btn btn-dark p-a-10" id="btn-proceed">View </button></p></a></div>
                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">City</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->city) ?></p></div>
                        
                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->bu) ?></p></div>
                        
                    </div>
                    <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->work_location) ?></p></div>
                        
                    </div>
                     <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->empid) ?></p></div>
                        
                    </div>
                     <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Job Title</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->c_subject) ?></p></div>
                        
                    </div>
                      <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Email Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->email) ?></p></div>
                        
                    </div>
                    
                </div>
                
                		  <?php   endforeach; ?>
                        
                        
                        
                        
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>





