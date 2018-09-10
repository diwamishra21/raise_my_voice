<?php
$session = $this->request->session();
$session_data =  $session->read();
$user_name = $session_data["Auth"]["User"]["name"];
$user_id = $session_data["Auth"]["User"]["id"];
$dashboard = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'dashboard']);
$report  = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'report']);
$profile = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'profiles',$user_id]);

$url_harassment = $this->Url->build(['category' => 1,'controller' => 'MyVoiceControl', 'action'=>'report']);
$url_ethics = $this->Url->build(['category' => 4,'controller' => 'MyVoiceControl', 'action'=>'report']);
$url_disciplinary = $this->Url->build(['category' => 7,'controller' => 'MyVoiceControl', 'action'=>'report']);
$url_total = $this->Url->build(['category' => 'all','controller' => 'MyVoiceControl', 'action'=>'report']);
$accepted = $this->Url->build(['case_status' => 2,'controller' => 'MyVoiceControl', 'action'=>'report']);
$rejected = $this->Url->build(['case_status' => 3,'controller' => 'MyVoiceControl', 'action'=>'report']);
$pending = $this->Url->build(['case_status' => 1,'controller' => 'MyVoiceControl', 'action'=>'report']);
$closed = $this->Url->build(['case_status' => 15,'controller' => 'MyVoiceControl', 'action'=>'report']);
$high = $this->Url->build(['severity' => 'High','controller' => 'MyVoiceControl', 'action'=>'report']);
$low = $this->Url->build(['severity' => 'Low','controller' => 'MyVoiceControl', 'action'=>'report']);
$medium = $this->Url->build(['severity' => 'Medium','controller' => 'MyVoiceControl', 'action'=>'report']);
//pr($city);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyVoice | Dashboard</title>
    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?php echo $this->Html->image('logo.png')?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
<!--                <li class="hidden-sm hidden-md hidden-lg"><a href="dashboard.html">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="statistics.html">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="reports.html">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="employee-records.html">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="profile.html">Profile</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $user_name; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$user_id]);?>

                        <?php $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$user_id ]);?>
                        <?php $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$user_id ]);?>
                        <li><a href="<?= $changepassword ?>">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>
                        <li><a href="<?= $logout; ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                <ul>
                    <li><a href="<?= $dashboard ?>">Dashboard</a></li>
                    <li><a href="<?= $report ?>">Complaints</a></li>
                    <li><a href="<?= $profile ?>">Profile</a></li>
                </ul>

                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">Dashboard</h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <a href="<?= $url_total ?>">
                        <div class="col-md-2"><label class="panel-block-label totalharss"><span class="circle"></span>Complaints</label></div>
                        <div class="col-md-2"><p class="panel-block-label totalharss"><?= $totalCase ?></p></div>
                        </a>
                        <a href="<?= $accepted ?>">
                        <div class="col-md-2"><label class="panel-block-label totalharss"><span class="circle"></span>Accepted</label></div>
                        <div class="col-md-2"><p class="panel-block-label totalharss"><?= $totalAccepted ?></p></div>
                        </a>
                        <a href="<?= $high ?>">
                        <div class="col-md-2"><label class="panel-block-label totalharss"><span class="circle"></span>High</label></div>
                        <div class="col-md-2"><p class="panel-block-label totalharss"><?= $highSeverity ?></p></div>
                        </a>
                    </div>
                    <div class="row panel-block-row">
                        <a href="<?= $url_harassment ?>">
                        <div class="col-md-2"><label class="panel-block-label harss"><span class="circle"></span>Harassment</label></div>
                        <div class="col-md-2"><p class="panel-block-label harss"><?= $totalHarassment ?></p></div>
                        </a>
                        <a href="<?= $rejected ?>">
                        <div class="col-md-2"><label class="panel-block-label harss"><span class="circle"></span>Rejected</label></div>
                        <div class="col-md-2"><p class="panel-block-label harss"><?= $totalRejected ?></p></div>
                        </a>
                        <a href="<?= $medium ?>">
                        <div class="col-md-2"><label class="panel-block-label harss"><span class="circle"></span>Medium</label></div>
                        <div class="col-md-2"><p class="panel-block-label harss"><?= $mediumSeverity ?></p></div>
                        </a>
                    </div>
                    <div class="row panel-block-row">
                        <a href="<?= $url_ethics ?>">
                        <div class="col-md-2"><label class="panel-block-label etchic"><span class="circle"></span>Business Ethics</label></div>
                        <div class="col-md-2"><p class="panel-block-label etchic"><?= $totalBusinessEthics ?></p></div>
                        </a>
                        <a href="<?= $pending ?>">
                        <div class="col-md-2"><label class="panel-block-label etchic"><span class="circle"></span>Pending</label></div>
                        <div class="col-md-2"><p class="panel-block-label etchic"><?= $totalPending ?></p></div>
                        </a>
                        <a href="<?= $low ?>">
                        <div class="col-md-2"><label class="panel-block-label etchic"><span class="circle"></span>Low</label></div>
                        <div class="col-md-2"><p class="panel-block-label etchic"><?= $lowSeverity ?></p></div>
                        </a>
                    </div>
                    <div class="row panel-block-row">
                        <a href="<?= $url_disciplinary ?>">
                        <div class="col-md-2"><label class="panel-block-label disp"><span class="circle"></span>Disciplinary</label></div>
                        <div class="col-md-2"><p class="panel-block-label disp"><?= $toatlDisiplinary ?></p></div>
                        </a>
                        <a href="<?= $closed ?>">
                        <div class="col-md-2"><label class="panel-block-label disp"><span class="circle"></span>Closed</label></div>
                        <div class="col-md-2"><p class="panel-block-label disp"><?= $totalClosed ?></p></div>
                        </a>
                    </div>
                </div>
                <div class="m-t-30 panel-block" style="background: #f1f1f1; padding: 10px;  color: #222222;">
                    <form method="POST" action="<?= $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'dashboard']); ?>">
                        <div class="row panel-block-row">
                            <div class="col-md-3 text-center" >
                                <!--<label class="panel-block-label">Select Year</label>-->
                                <select class="form-control" name="yearpicker" id="yearpicker">
                                    <option value="">Select year</option>
                                    <option value="all" <?php if(empty($year)) echo 'selected=selected' ?>>All</option>
                                    <?php // if($year){ ?>
                                    <!--<option value="<?= $year ?>" <?php if(!empty($year) && $year === $year)echo 'selected=selected' ?>><?= $year ?></option>-->
                                    <?php //} ?> 
                                </select>
                            </div>
                        </div>    
                    </form>   
                </div>

                <div class="m-t-30 panel-block" >
                    <canvas id="trendChart" width="400" height="200"></canvas>
                </div>
                <div class="m-t-30 panel-block" >
                    <div class="col-md-4">
                        <div id="chart2"></div>
                    </div>
                    <div class="col-md-4">
                        <div id="chart3"></div>	
                    </div> 
                    <div class="col-md-4">
                        <div id="chart4"></div>	
                    </div>
                </div>
                <div class="m-t-30 panel-block" >
                    <div></div>
                </div>    
                </div>
                <div class="m-t-30 panel-block" >
                    <div><h5 id="title5">Status Vs Complaint</h5></div>
                        <div id="chart5"></div>
                </div> 
                <div class="m-t-30 panel-block" >
                    <div><h5 id="title5">Category Vs Location</h5></div>
                        <div id="chart6"></div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?= $this->Html->script('bootstrap.min.js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/gauge.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<!--<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>-->
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<?= $this->Html->script('custom.js') ?>
<script type="text/javascript">
    $(document).ready(function() {
        //query for generating years
        var year = '<?= $year ?>';
        for (i = new Date().getFullYear(); i > 2017; i--)
        {
            var option = '<option value="'+i+'" >'+i+'</option>';
//            $('#yearpicker').append($('<option />').val(i).html(i));
            $('#yearpicker').append(option);
        }
        if(year !== ''){
            $('#yearpicker').val(year);
        }
        $('#yearpicker').on('change', function(){
            this.form.submit();
        });
        
        var catid = '';
        var getcategory = <?= $category_id ?>;
        var severity = <?= $severity ?>;
        

        var harassment_month = <?= $harss_month ?>;
        var ethics_month = <?= $ethic_month ?>;
        var displinary_month = <?= $displ_month ?>;
        var other_month = <?= $other_month ?>;
                /*script for first graph complaints trend */
        var trend = document.getElementById("trendChart").getContext('2d');
        Chart.defaults.global.defaultFontColor = 'black';
//        Chart.defaults.global.defaultFontSize = 16;
        var trendChart = new Chart(trend, {
            type: 'line',
            data : {
                labels: ['January', 'February','March', 'April','May', 'June', 'July', 'August', 'September', 'Octuber', 'November','December'],
                datasets: [{
                        label: 'Harassment',
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#e23d40",
                        borderColor: "#e23d40",
                        borderCapStyle: 'square',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "black",
                        pointBackgroundColor: "white",
                        pointBorderWidth: 1,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: "yellow",
                        pointHoverBorderColor: "brown",
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 10,
                        data:  harassment_month,
                        spanGaps: true
                    },{
                        label: 'Ethics',
                        fill: false,
                        lineTension: 0,  
                        backgroundColor: "#006600",
                        borderColor: "#006600",
                        borderCapStyle: 'square',
                        borderDash: [0],
                        borderDashOffset: 0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "black",
                        pointBackgroundColor: "white",
                        pointBorderWidth: 1,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: "yellow",
                        pointHoverBorderColor: "brown",
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 10,
                        data: ethics_month,  
                        spanGaps: true
                    }, {
                        label: 'Disciplinary',
                        fill: false,
                        lineTension: 0,  
                        backgroundColor: "#ff9900",
                        borderColor: "#ff9900",
                        borderCapStyle: 'square',
                        borderDash: [0],
                        borderDashOffset: 0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "black",
                        pointBackgroundColor: "white",
                        pointBorderWidth: 1,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: "yellow",
                        pointHoverBorderColor: "brown",
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 10,
                        data: displinary_month,  
                        spanGaps: true  
                    },{
                        label: 'Other',
                        fill: false,
                        lineTension: 0,  
                        backgroundColor: "#17bb94",
                        borderColor: "#17bb94",
                        borderCapStyle: 'square',
                        borderDash: [0],
                        borderDashOffset: 0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "black",
                        pointBackgroundColor: "white",
                        pointBorderWidth: 1,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: "yellow",
                        pointHoverBorderColor: "brown",
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 10,
                        data: other_month,  
                        spanGaps: true  
                    }
                    
                ]
            },
            options: {
                legend: {
                    display: true,
                    legendText: 'Harassment'
                },
                scales: {
                    xAxes: [{
                        ticks:{
                            beginAtZero:true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Months',
                            fontweight: 'bold',
                            fontSize: 15,
                            color: 'black'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                    scaleLabel: {
                            display: true,
                            labelString: 'Number of Complaints',
                            fontSize: 15
                        }    
                    }]
                },
                title:{
                display: true,
                text: "Complaints Trend",
                fontStyle: "normal",
                fontSize: '15'
		}
            }
        });
        
            /*script for sceond graph*/
            var gaugeChart = AmCharts.makeChart("chart2", {
                "type": "gauge",
                "theme": "light",
                "axes": [{
                  "axisAlpha": 0,
                  "tickAlpha": 0,
                  "labelsEnabled": false,
                  "startValue": 0,
                  "endValue": 100,
                  "startAngle": 0,
                  "endAngle": 270,
                  "listeners": [{
                    "event": "clickBand",
                    "method": function(ev) {
                        var id = ev.dataItem.id;
                        var query = '?category='+id;
                        window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
                    }
                  }],
                  "bands": [{
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "100%",
                    "innerRadius": "85%"
                  }, {
                    "id": 7,
                    "color": "#006600",
                    "startValue": 0,
                    "endValue": 80,
                    "radius": "100%",
                    "innerRadius": "85%",
                    "balloonText": "<?= $toatlDisiplinary ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "80%",
                    "innerRadius": "65%"
                  }, {
                    "id": 1,
                    "color": "#e23d40",
                    "startValue": 0,
                    "endValue": 35,
                    "radius": "80%",
                    "innerRadius": "65%",
                    "balloonText": "<?= $totalHarassment ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "60%",
                    "innerRadius": "45%"
                  }, {
                    "id": 4,  
                    "color": "#ff9900",
                    "startValue": 0,
                    "endValue": 92,
                    "radius": "60%",
                    "innerRadius": "45%",
                    "balloonText": "<?= $totalBusinessEthics ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "40%",
                    "innerRadius": "25%"
                  }, {
                    "id": 20,  
                    "color": "#17bb94",
                    "startValue": 0,
                    "endValue": 68,
                    "radius": "40%",
                    "innerRadius": "25%",
                    "balloonText": "<?= $countOthers ?>"
                  }]
                }],
                "allLabels": [{
                  "text": "Disciplinary",
                  "x": "49%",
                  "y": "5%",
                  "size": 15,
                  "bold": true,
                  "color": "#006600",
                  "align": "right"
                }, {
                  "text": "Harassment",
                  "x": "49%",
                  "y": "14%",
                  "size": 15,
                  "bold": true,
                  "color": "#e23d40",
                  "align": "right"
                }, {
                  "text": "Business Ethics",
                  "x": "49%",
                  "y": "23%",
                  "size": 15,
                  "bold": true,
                  "color": "#ff9900",
                  "align": "right"
                }, {
                  "text": "Others",
                  "x": "49%",
                  "y": "32%",
                  "size": 15,
                  "bold": true,
                  "color": "#17bb94",
                  "align": "right"
                }]
            });
            
            /*script for third graph*/
            var gaugeChart = AmCharts.makeChart("chart3", {
                "type": "gauge",
                "theme": "light",
                "axes": [{
                  "axisAlpha": 0,
                  "tickAlpha": 0,
                  "labelsEnabled": false,
                  "startValue": 0,
                  "endValue": 100,
                  "startAngle": 0,
                  "endAngle": 270,
                  "listeners": [{
                    "event": "clickBand",
                    "method": function(ev) {
                        var serverity = ev.dataItem.serverity;
                        var query = '?severity='+serverity;
                        window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
                    }
                  }],
                  "bands": [{
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "100%",
                    "innerRadius": "85%"
                  }, {
                    "serverity": 'High',
                    "color": "#006600",
                    "startValue": 0,
                    "endValue": 80,
                    "radius": "100%",
                    "innerRadius": "85%",
                    "balloonText": "<?= $highSeverity ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "80%",
                    "innerRadius": "65%"
                  }, {
                    "serverity": 'Low',  
                    "color": "#e23d40",
                    "startValue": 0,
                    "endValue": 35,
                    "radius": "80%",
                    "innerRadius": "65%",
                    "balloonText": "<?= $lowSeverity ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "60%",
                    "innerRadius": "45%"
                  }, {
                    "serverity": 'Medium', 
                    "color": "#ff9900",
                    "startValue": 0,
                    "endValue": 92,
                    "radius": "60%",
                    "innerRadius": "45%",
                    "balloonText": "<?= $mediumSeverity ?>"
                  }]
                }],
                "allLabels": [{
                  "text": "High",
                  "x": "49%",
                  "y": "6%",
                  "size": 15,
                  "bold": true,
                  "color": "#006600",
                  "align": "right"
                }, {
                  "text": "Low",
                  "x": "49%",
                  "y": "14%",
                  "size": 15,
                  "bold": true,
                  "color": "#e23d40",
                  "align": "right"
                }, {
                  "text": "Medium",
                  "x": "49%",
                  "y": "23%",
                  "size": 15,
                  "bold": true,
                  "color": "#ff9900",
                  "align": "right"
                }]
            });
            
            
            
            /*script for fourth graph*/
            var gaugeChart = AmCharts.makeChart("chart4", {
                "type": "gauge",
                "theme": "light",
                "axes": [{
                  "axisAlpha": 0,
                  "tickAlpha": 0,
                  "labelsEnabled": false,
                  "startValue": 0,
                  "endValue": 100,
                  "startAngle": 0,
                  "endAngle": 270,
                  "listeners": [{
                    "event": "clickBand",
                    "method": function(ev) {
                        var status = ev.dataItem.status;
                        var query = '?case_status='+status;
                        window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
                    }
                  }],
                  "bands": [{
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "100%",
                    "innerRadius": "85%"
                  }, {
                    "status": 2,
                    "color": "#006600",
                    "startValue": 0,
                    "endValue": 80,
                    "radius": "100%",
                    "innerRadius": "85%",
                    "balloonText": "<?= $totalAccepted ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "80%",
                    "innerRadius": "65%"
                  }, {
                    "status": 3,  
                    "color": "#e23d40",
                    "startValue": 0,
                    "endValue": 35,
                    "radius": "80%",
                    "innerRadius": "65%",
                    "balloonText": "<?= $totalRejected ?>"
                  }, {
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "60%",
                    "innerRadius": "45%"
                  }, {
                    "status": 1,  
                    "color": "#ff9900",
                    "startValue": 0,
                    "endValue": 92,
                    "radius": "60%",
                    "innerRadius": "45%",
                    "balloonText": "<?= $totalPending ?>"
                  },{
                    "color": "#eee",
                    "startValue": 0,
                    "endValue": 100,
                    "radius": "40%",
                    "innerRadius": "25%"
                  }, {
                    "status": 15,  
                    "color": "#17bb94",
                    "startValue": 0,
                    "endValue": 68,
                    "radius": "40%",
                    "innerRadius": "25%",
                    "balloonText": "<?= $totalClosed ?>"
                  }]
                }],
                "allLabels": [{
                  "text": "Accepted",
                  "x": "49%",
                  "y": "6%",
                  "size": 15,
                  "bold": true,
                  "color": "#006600",
                  "align": "right"
                }, {
                  "text": "Rejected",
                  "x": "49%",
                  "y": "15%",
                  "size": 15,
                  "bold": true,
                  "color": "#e23d40",
                  "align": "right"
                }, {
                  "text": "Pending",
                  "x": "49%",
                  "y": "23%",
                  "size": 15,
                  "bold": true,
                  "color": "#ff9900",
                  "align": "right"
                }, {
                  "text": "Closed",
                  "x": "49%",
                  "y": "32%",
                  "size": 15,
                  "bold": true,
                  "color": "#17bb94",
                  "align": "right"
                }]
            });
            
           /*script for fifth garph status*/ 
           
           var chart = AmCharts.makeChart( "chart5", {
                "type": "serial",
                "theme": "light",
                "categoryField": "status",
                "rotate": true,
                "startDuration": 1,
                "categoryAxis": {
                  "gridPosition": "start",
                  "position": "left",
                  "gridThickness": false
//                  "gridThickness":0
                },
                "listeners": [{
                    "event": "clickGraphItem",
                    "method": function(event) {
                    var case_status = event.item.category;
                    var category = event.item.graph.id;
                    var case_status_id = event.item.dataContext.case_staus;
                    var query = '?category='+category+'&case_status='+case_status_id;
                    window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
                    }
                  }],
                "legend": {
                    "useGraphSettings": true,
                    "position": "top",
                    "equalWidths": false,
                     "labelWidth": 90,
                     "valueWidth": 40
                  },
                "columnSpacing": 8,
                "columnWidth": 0.8,
                "graphs": [ {
                  "newStack": true,
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Harassment",
                  "type": "column",
                  "valueField": "Harassment",
                  "fillColors": "#e23",
                  "id": "1"
                },{
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Disciplinary",
                  "type": "column",
                  "valueField": "Disciplinary",
                  "fillColors": "#006600",
                  "id": "7"
                }, {
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Business Ethics",
                  "type": "column",
                  "valueField": "Business Ethics",
                  "fillColors": "#ff9900",
                  "id": "4"
                }, {
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Others",
                  "type": "column",
                  "valueField": "Others",
                  "fillColors": "#17bb94",
                  "id": "0"
                } ],
                "depth3D": 20,
                "angle": 30,
                "rotate": true,
                "valueAxes": [ {
                  "stackType": "regular",
//                  "position": "top",
                  "axisAlpha": 0,
                  "labelsEnabled": false,
//                  "gridThickness":0
                } ],
                "allLabels": [{
                "text": "Complaints",
                "x": "!300",
                "y": "!19",
                "width": "40%",
                "size": 15,
//                "bold": true,
                "align": "right"
//                "gridDashType": "dot"
              }, {
                "text": "Status",
                "rotation": 270,
                "x": "15",
                "y": "150",
                "width": "10%",
                "size": 15,
//                "bold": true,
                "align": "right"
              }],
                "dataProvider": [ {
                  "case_staus": "1",
                  "status": '<?= $filed ?>',
                  "Harassment": '<?= $getHarassFiledCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryFiledCase ?>',
                  "Business Ethics": '<?= $getEthicFiledCase ?>',
                  "Others": '<?= $getOtherFiledCase ?>'
                }, {
                   "case_staus": "2", 
                  "status": '<?= $caseaccepted ?>',
                  "Harassment": '<?= $getHarassAcceptedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryAcceptedCase  ?>',
                  "Business Ethics": '<?= $getEthicAcceptedCase ?>',
                  "Others": '<?= $getOtherAcceptedCase ?>'
                }, {
                  "case_staus": "3",  
                  "status": '<?= $caserejected ?>',
                  "Harassment": '<?= $getHarassRejectedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryRejectedCase ?>',
                  "Business Ethics": '<?= $getEthicRejectedCase ?>',
                  "Others": '<?= $getOtherRejectedCase ?>'
                }, {
                  "case_staus": "4",  
                  "status": '<?= $notApplicable ?>',
                  "Harassment": '<?= $getHarassNotApplicableCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryNotApplicableCase ?>',
                  "Business Ethics": '<?= $getEthicNotApplicableCase ?>',
                  "Others": '<?= $getOtherNotApplicableCase ?>'
                }, {
                  "case_staus": "5",  
                  "status": '<?= $panelAssigned ?>',
                  "Harassment": '<?= $getHarassPanelAssignedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryPanelAssignedCase ?>',
                  "Business Ethics": '<?= $getEthicPanelAssignedCase ?>',
                  "Others": '<?= $getOtherPanelAssignedCase ?>'
                }, {
                  "case_staus": "6",  
                  "status": '<?= $inqLettIssued ?>',
                  "Harassment": '<?= $getHarassInqLettIssuedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryInqLettIssuedCase  ?>',
                  "Business Ethics": '<?= $getEthicInqLettIssuedCase ?>',
                  "Others": '<?= $getOtherInqLettIssuedCase ?>'
                }, {
                  "case_staus": "7",  
                  "status": '<?= $respondentpending ?>',
                  "Harassment": '<?= $getHarassRRPendingCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryRRPendingCase ?>',
                  "Business Ethics": '<?= $getEthicRRPendingCase ?>',
                  "Others": '<?= $getOtherRRPendingCase ?>'
                }, {
                  "case_staus": "8",  
                  "status": '<?= $respondentreceived ?>',
                  "Harassment": '<?= $getHarassRRReceivedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryRRReceivedCase ?>',
                  "Business Ethics": '<?= $getEthicRRReceivedCase ?>',
                  "Others": '<?= $getOtherRRReceivedCase ?>'
                }, {
                  "case_staus": "9",  
                  "status": '<?= $investigationProgress ?>',
                  "Harassment": '<?= $getHarassIIProgressCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryIIProgressCase ?>',
                  "Business Ethics": '<?= $getEthicIIProgressCase ?>',
                  "Others": '<?= $getOtherIIProgressCase ?>'
                }, {
                  "case_staus": "10",  
                  "status": '<?= $investigationClosed ?>',
                  "Harassment": '<?= $getHarassICloseCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryICloseCase ?>',
                  "Business Ethics": '<?= $getEthicICloseCase ?>',
                  "Others": '<?= $getOtherCloseCase ?>'
                }, {
                  "case_staus": "11",  
                  "status": '<?= $inqReportProgress ?>',
                  "Harassment": '<?= $getHarassIRIProgressCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryIRIProgressCase ?>',
                  "Business Ethics": '<?= $getEthicIRIProgressCase ?>',
                  "Others": '<?= $getOtherIRIProgressCase ?>'
                }, {
                  "case_staus": "12",  
                  "status": '<?= $inqReportClosed ?>',
                  "Harassment": '<?= $getHarassIRClosedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryIRClosedCase ?>',
                  "Business Ethics": '<?= $getEthicIRClosedCase ?>',
                  "Others": '<?= $getOtherIRClosedCase ?>'
                }, {
                  "case_staus": "13",  
                  "status": '<?= $implRecomProgress ?>',
                  "Harassment": '<?= $getHarassIORIProgressCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryIORIProgressCase ?>',
                  "Business Ethics": '<?= $getEthicIORIProgressCase ?>',
                  "Others": '<?= $getOtherIORIProgressCase ?>'
                }, {
                  "case_staus": "14",  
                  "status": '<?= $implRecomClosed ?>',
                  "Harassment": '<?= $getHarassIORIClosedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryIORIClosedCase ?>',
                  "Business Ethics": '<?= $getEthicIORIClosedCase ?>',
                  "Others": '<?= $getOtherIORIClosedCase ?>'
                }, {
                  "case_staus": "15",  
                  "status": '<?= $Closed ?>',
                  "Harassment": '<?= $getHarassClosedCase ?>',
                  "Disciplinary": '<?= $getDiscplinaryClosedCase ?>',
                  "Business Ethics": '<?= $getEthicClosedCase ?>',
                  "Others": '<?= $getOtherClosedCase ?>'
                } ]

              } );
              
              
               /*script for sixth garph category vs location*/ 
           
           var chart6 = AmCharts.makeChart( "chart6", {
                "type": "serial",
                "theme": "light",
                "categoryField": "Location",
                "rotate": true,
                "startDuration": 1,
                "categoryAxis": {
                  "gridPosition": "start",
                  "position": "left",
                  "gridThickness": false,
//                  "left":150
//                  "gridThickness":0
                },
                "listeners": [{
                    "event": "clickGraphItem",
                    "method": function(event) {
                    var case_status = event.item.category;
                    var category = event.item.graph.id;
                    var location = event.item.dataContext.Location;
                    var query = '?category='+category+'&location='+location;
                    window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
                    }
                  }],
                "legend": {
                    "useGraphSettings": true,
                    "position": "top",
                    "equalWidths": false,
                     "labelWidth": 90,
                     "valueWidth": 40
                  },
                "columnSpacing": 8,
                "columnWidth": 0.8,
                "graphs": [ {
                  "newStack": true,
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Harassment",
                  "type": "column",
                  "valueField": "Harassment",
                  "fillColors": "#e23",
                  "id": "1"
                },{
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Disciplinary",
                  "type": "column",
                  "valueField": "Disciplinary",
                  "fillColors": "#006600",
                  "id": "7"
                }, {
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Business Ethics",
                  "type": "column",
                  "valueField": "Business Ethics",
                  "fillColors": "#ff9900",
                  "id": "4"
                }, {
                  "balloonText": "[[title]]:[[value]]",
                  "labelText": "[[value]]",
                  "labelPosition": "inside",
                  "color": "#fff",
                  "fillAlphas": 0.8,
                  "lineAlpha": 0.2,
                  "title": "Others",
                  "type": "column",
                  "valueField": "Others",
                  "fillColors": "#17bb94",
                  "id": "20"
                } ],
                "depth3D": 20,
                "angle": 30,
                "rotate": true,
                "valueAxes": [ {
                  "stackType": "regular",
//                  "position": "top",
                  "axisAlpha": 0,
                  "labelsEnabled": false
//                  "gridThickness":0
                } ],
                "allLabels": [{
                "text": "Complaints",
                "x": "!450",
                "y": "!18",
                "width": "40%",
                "size": 15,
//                "bold": true,
                "align": "right"
//                "gridDashType": "dot"
              }, {
                "text": "Location",
                "rotation": 270,
                "x": "5",
                "y": "45",
                "width": "10%",
                "size": 15,
//                "bold": true,
                "align": "right"
              }],
                "dataProvider": [{
                  "Location": "Gurgaon",
                  "Harassment": '<?= $harassGurgaon ?>',
                  "Disciplinary": '<?= $displinaryGurgaon ?>',
                  "Business Ethics": '<?= $ethicGurgaon ?>',
                  "Others": '<?= $otherGurgaon ?>'
                }, {
                  "Location": "Thane",
                  "Harassment": '<?= $harassThane ?>',
                  "Disciplinary": '<?= $ethicThane  ?>',
                  "Business Ethics": '<?= $displinaryThane ?>',
                  "Others": '<?= $otherThane ?>'
                }, {
                  "Location": "Chennai",
                  "Harassment": '<?= $harassChennai ?>',
                  "Disciplinary": '<?= $ethicChennai ?>',
                  "Business Ethics": '<?= $displinaryChennai ?>',
                  "Others": '<?= $otherChennai ?>'
                }, {
                  "Location": "USA",
                  "Harassment": '<?= $harassUSA ?>',
                  "Disciplinary": '<?= $ethicUSA ?>',
                  "Business Ethics": '<?= $displinaryUSA ?>',
                  "Others": '<?= $otherUSA ?>'
                }]

              } );
           
    });
</script>

</body>
</html>

<style>
    .totalharss {
        color : #e23d40 !important;
        font-size: 13px;
    }
    .totalharss .circle {
        background-color: #e23d40;
    }
    .harss {
        color : #17bb94 !important;
        font-size: 13px;
    }
    .harss .circle {
        background-color: #17bb94;
    }
    .etchic {
        color : #ff9900  !important;
        font-size: 13px;
    }
    .etchic .circle {
        background-color:  #ff9900;
    }
    .disp {
        color : #006600  !important;
        font-size: 13px;
    }
    .disp .circle {
        background-color:  #006600;
    }
/*    #trendChart {
        background-color: #ebecec;
        border-top: 5px solid;
        color:#00aebb;
        border-left: 1px solid;
        border-right: 1px solid;
        border-bottom: 1px solid;
        background-color:whitesmoke;
    }*/
    #chart2, #chart3, #chart4{
        width: 100%;
        height: 300px;
        margin: auto;
    }
    
    #chart5 {
        width : 100%;
	height : 500px;
	font-size : 11px;   
    }
    
    #title5 {
        text-align: center;
        font-weight: normal;
        font-size: 14px;
        width:100%
    }
    #chart6{
        width : 100%;
	height : 200px;
	font-size : 11px;
    }
    
/*    .amcharts-legend-balloon {
        position: fixed;
        pointer-events: none;
        opacity: 0;
        -webkit-transition: opacity 0.3s 0.04s;
        transition: opacity 0.3s 0.04s;
        visibility: hidden;
    }

    .amcharts-legend-balloon > div {
        position: relative;
        background-color: #fff;
        background-color: rgba(255, 255, 255, .9);
        border: 2px solid #000;
        padding: 4px 8px;
        left: -50%;
    }

    .amcharts-legend-balloon > div:after,
    .amcharts-legend-balloon > div:before {
        top: 100%;
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .amcharts-legend-balloon > div:after {
        border-color: rgba(0, 0, 0, 0);
        border-top-color: #fff;
        border-width: 6px;
        margin-left: -6px;
    }

    .amcharts-legend-balloon > div:before {
        border-color: rgba(0, 0, 0, 0);
        border-top-color: inherit;
        border-width: 9px;
        margin-left: -9px;
    }
     ACTIVE STATE 

    .amcharts-legend-balloon.active {
        opacity: 1;
        -webkit-transition: opacity 0s 0s;
        transition: opacity 0s 0s;
        visibility: visible;
    }*/
    
    .amcharts-chart-div a {display:none !important;}
/*    #piChart {
        
    }*/
</style>
