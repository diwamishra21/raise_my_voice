 <div class="col-sm-10">
        
        
        
            <div class="container-fluid">
            
            
                
                  <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">Messages</h2>
                </div>
                
                <div class="row panel-block-row2 panel-block-row-link">
                        <div class="col-md-3 btn-dark inbox-active-btn"><div class="inbox-active-btn1"><strong>Inbox</strong></div></div>
                        
                        <div class="col-md-3 btn-dark inactive-btn"><div class="inactive-btn1"><strong style="color:#344B5A;">Sent</strong></div></div>
                        
                        <div class="col-md-3 btn-dark inactive-btn"><div class="inactive-btn1"><strong style="color:#344B5A;">Draft</strong></div></div>
                    </div>
                
                <div class="panel-block" style="background:none;">
                <?php foreach ($user_detail as $user_deatils): ?>
					  
                            
                    <div class="row panel-block-row panel-block-row-link panel-active-row">
                        <div class="col-md-3"><label class="panel-block-label"> <?= h($user_deatils->username) ?></label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h($user_deatils->c_subject) ?> </p></div>
                        <div class="col-md-2"><p class="panel-block-label"><?= h($user_deatils->first_access) ?> </p></div>
                    </div>
                    
                    <?php   endforeach; ?>
                </div>
                
            </div>
        </div>