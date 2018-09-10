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
                            <div class="col-md-6">
                            <?php $case_details = $this->Url->build(['controller' => 'Hr', 'action' => 'caseDetails']); ?>
                                <a href="<?= $case_details ?>" class="case-details-block">
                                    <div class="panel-block">
                                    <div class="row">
                                        <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                        <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                    </div>
                                    <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                    <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                    <div class="row m-t-20 supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Category</p></div>
                                        <div class="col-md-6"><label>Harassment</label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Accuser</p></div>
                                        <div class="col-md-6"><label>David Smith</label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Accused</p></div>
                                        <div class="col-md-6"><label>Joe Getto</label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Status</p></div>
                                        <div class="col-md-6"><label>Not Reviewed</label></div>
                                    </div>
                                    <div class="row supervisor-panel-block-row">
                                        <div class="col-md-6"><p>Severity</p></div>
                                        <div class="col-md-6"><label>High</label></div>
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
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
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
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
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
                            <div class="col-md-6">
                                <a href="case-details.html" class="case-details-block">
                                    <div class="panel-block">
                                        <div class="row">
                                            <div class="col-xs-8"><p>Case Id : 123AF00978</p></div>
                                            <div class="col-xs-4 text-right"><i class="fa fa-external-link"></i></div>
                                        </div>
                                        <div class="row m-t-20"><div class="col-md-12"><label>Inappropriate lorem ipsum lorem ipsum lorem ipsum</label></div></div>
                                        <div class="row m-t-20"><div class="col-md-12"><p>Filed On: <strong>21 July, 2017</strong></p></div></div>
                                        <div class="row m-t-20 supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Category</p></div>
                                            <div class="col-md-6"><label>Harassment</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accuser</p></div>
                                            <div class="col-md-6"><label>David Smith</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Accused</p></div>
                                            <div class="col-md-6"><label>Joe Getto</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Status</p></div>
                                            <div class="col-md-6"><label>Not Reviewed</label></div>
                                        </div>
                                        <div class="row supervisor-panel-block-row">
                                            <div class="col-md-6"><p>Severity</p></div>
                                            <div class="col-md-6"><label>High</label></div>
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
                        </div>
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
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
                                <div class="col-md-3"><div style="margin:8px 0 0 0; background: #8ac9ff;height: 6px;vertical-align: middle;"></div></div>
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