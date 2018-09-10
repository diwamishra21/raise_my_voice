

<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                 <ul>
<?php $reports= $this->Url->build(['controller' => 'Users', 'action' => 'reports']);?>
<?php $profiles= $this->Url->build(['controller' => 'Users', 'action' => 'profiles']);?> 
                   <li class="active">
<a class="smooth-scroll" href="<?= $reports ;?>">Reports</a></li>
                    <li><a class="smooth-scroll" href="#statistics">Statistics</a></li>
                    <li class=""><a href="<?= $profiles ;?>">Profile</a></li>
                </ul>
                
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div>
<?= $this->Html->image('logo-quatrro.png'); ?>
</div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">Dashboard</h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group search_input_wrapper">
                                <input type="search" name="" class="form-control search_input">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-secondary btn-block sort-btn" data-toggle="modal" data-target="#filterModal">Sort / Filter</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                       <div class="row">
<?php foreach ($user_detail as $user_deatils): ?>
                            <div class="col-md-6">
<?php $complaintDetails= $this->Url->build(['controller' => 'Supervisor', 'action' => 'complaintDetails',$user_deatils->id]);?>
                                <a href="<?= $complaintDetails ; ?>">
                                    <div class="panel-block">
                                    <div class="row">
                                        <div class="col-xs-8"><p>Complain Id : <?= h($user_deatils->complaint_id) ?></p></div>
                                        <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                    </div>
                                    <div class="row m-t-20"><div class="col-md-12"><label><?= h($user_deatils->c_title) ?></label></div></div>
                                    <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong><?= h($user_deatils->first_access) ?></strong></p></div></div>
                                    <div class="row m-t-20 supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Category</p></div>
                                        <div class="col-md-6"><label><?= h($user_deatils->c_subject) ?></label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Accuser</p></div>
                                        <div class="col-md-6"><label><?= h($user_deatils->name) ?></label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Accused</p></div>
                                        <div class="col-md-6"><label></label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Status</p></div>
                                        <div class="col-md-6"><label></label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Severity</p></div>
                                        <div class="col-md-6"><label></label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                          
                       

 <?php   endforeach; ?>
 </div>

                        <nav aria-label="Page navigation" class=" paginator text-center">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><?= $this->Paginator->prev('' . __('previous')) ?></li>
                                <li><?= $this->Paginator->numbers() ?></li>
                                <li>    <?= $this->Paginator->next(__('next') . ' ') ?></li>
                                <li> <?= $this->Paginator->last(__('last') . ' ') ?></li>
                            
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="panel-block">
                            <div class="row">
                                <div class="col-md-3"><label class="panel-block-label2">CATEGORY</label></div>
                                <div class="col-md-8"><p class="panel-block-desc12"></p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #ad7c72;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Harassment</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #d4bea2;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Business Ethics</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #ffd064;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Disciplinary</p></div>
                            </div>
                        </div>
                        <div class="panel-block">
                            <div class="row">
                                <div class="col-md-3"><label class="panel-block-label2">STATUS</label></div>
                                <div class="col-md-8"><p class="panel-block-desc12"></p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #f7a70a;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">On Going</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #c8d52c;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Closed/ Resolved</p></div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #e13b16;height: 6px;vertical-align: middle;"></div></div>
                                <div class="col-md-8"><p class="panel-block-desc12">Retracted</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sort / Filter</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 text-center margin-bottom-30">
                        <h4>Filter</h4>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Severity</label></div>
                            <select id="severity" multiple="multiple">
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Last Action Taken</label></div>
                            <select id="last_action" multiple="multiple">
                                <option value=">15 days">>15 Days</option>
                                <option value="12 - 15 Days">12 - 15 Days</option>
                                <option value="8 - 11 Days">8 - 11 Days</option>
                                <option value="5 - 7 Days">5 - 7 Days</option>
                                <option value="<5 Days"><5 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Filed On</label></div>
                            <select id="filed_on" multiple="multiple">
                                <option value=">15 days">>15 Days</option>
                                <option value="12 - 15 Days">12 - 15 Days</option>
                                <option value="8 - 11 Days">8 - 11 Days</option>
                                <option value="5 - 7 Days">5 - 7 Days</option>
                                <option value="<5 Days"><5 Days</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Location</label></div>
                            <select id="location" multiple="multiple">
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Lucknow">Lucknow</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Business Unit</label></div>
                            <select id="business_unit" multiple="multiple">
                                <option value="Production">Production</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Finance">Finance</option>
                                <option value="Communication">Communication</option>
                                <option value="Purchasing">Purchasing</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <div><label>Category</label></div>
                            <select id="category" multiple="multiple">
                                <option value="Harassment">Harassment</option>
                                <option value="Business Ethics">Business Ethics</option>
                                <option value="Disciplinary">Disciplinary</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-xs-12 text-center margin-bottom-30">
                        <h4>Sort</h4>
                    </div>
                    <div class="col-md-4 col-md-offset-2 text-center">
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked>Date Added</label>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="radio">
                            <label><input type="radio" name="optradio">Last Action Taken</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php echo $this->Html->script('bootstrap.min.js');?>
<?php echo $this->Html->script('custom.js');?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#severity').multiselect();
        $("#last_action").multiselect();
        $("#filed_on").multiselect();
        $("#location").multiselect();
        $("#business_unit").multiselect();
        $("#category").multiselect();
    });
</script>

</body>
</html>