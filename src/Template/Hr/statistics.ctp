
<div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">My Dashboard</h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Total Cases</label></div>
                        <div class="col-md-9"><p class="panel-block-label"><?= $totalCase ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label harassment"><span class="circle"></span>Harassment</label></div>
                        <div class="col-md-9"><p class="panel-block-label harassment"><?= $totalHarassment ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label business-ethics"><span class="circle"></span>Business Ethics</label></div>
                        <div class="col-md-9"><p class="panel-block-label business-ethics"><?= $totalBusinessEthics ?></p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label disciplinary"><span class="circle"></span>Disciplinary</label></div>
                        <div class="col-md-9"><p class="panel-block-label disciplinary"><?= $toatlDisiplinary ?></p></div>
                    </div>
                </div>
                <div class="m-t-30 panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-8"><label class="panel-block-label">Cases</label></div>
                        <div class="col-md-3 text-left" style="margin-left: -18%;margin-top: -19px;"><label class="panel-block-label">Pick Date Range</label>
                        <input type="text" class="form-control" onchange="return cityGraphFilter();" id="date-range" name="daterange" value="" />
                        <!--
                            <select class="form-control" >
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        -->  
                        </div>
                        <div class="col-md-2 text-right">
                            <select class="form-control" id="city">
                                <option value="">--Select City--</option>
                                <?php foreach($city as $city){ ?>
                                <option value="<?= $city['city'] ?>"><?php echo ucfirst($city['city']); ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-1 text-right" style="margin-top:4px;">
                          <button type="button" class="btn btn-primary" onclick="return cityGraphFilter();">Apply</button>  
                        </div>
                    </div>
                    <canvas id="myChart" width="400" height="100"></canvas>
                </div>
              <!--
                <div class="m-t-30 margin-bottom-30 panel-block">
                
                    <div class="row panel-block-row">
                        <div class="col-md-8"><label class="panel-block-label">Timeline</label></div>
                        <div class="col-md-4 text-right">
                            <select class="form-control">
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                       
                    </div>
                    <canvas id="chart2" width="400" height="100"></canvas>
                </div>
-->
            </div>
        </div>


<script>
   function cityGraphFilter(){
            var city = $('#city').val();
            var date = $('#date-range').val();
            var startDate = $('#date-range').val().slice(0,10);
            var endDate  = $('#date-range').val().slice(12,24);
            $.ajax({
                url: '/myvoicev2/Hr/statisticsSearch/',
                type: 'POST',
                data: {'city':city, 'startDate':startDate, 'endDate':endDate},
                success: function(data){
                alert(data);
                }
            })
}

</script>