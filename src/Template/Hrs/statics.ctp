<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistics | Supervisor</title>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>

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
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?></a>
        </div>
        <?php $url= $this->Url->build(['controller' => 'Hrs', 'action' => 'dashboard']);?>
    <?php $url1= $this->Url->build(['controller' => 'Hrs', 'action' => 'statics']);?>
    <?php $url2= $this->Url->build(['controller' => 'Hrs', 'action' => 'reports']);?>
    <?php $url3= $this->Url->build(['controller' => 'Hrs', 'action' => 'employee_records']);?>
    <?php $url4= $this->Url->build(['controller' => 'Hrs', 'action' => 'profile']);?>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url ?>">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url1 ?>">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url2 ?>">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url3 ?>">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="<?= $url4 ?>">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Kiritika Jain<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="change-password.html">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.html">Logout</a></li>
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
                    <li><a href="<?= $url ?>">Dashboard</a></li>
                    <li class="active"><a href="<?= $url1 ?>">Statistics</a></li>
                    <li><a href="<?= $url2 ?>">Reports</a></li>
                    <li><a href="<?= $url3 ?>">Employee Records</a></li>
                    <li><a href="<?= $url4 ?>">Profile</a></li>
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
                    <h2 class="panel-block-title">My Dashboard</h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label">Total Cases</label></div>
                        <div class="col-md-9"><p class="panel-block-label">75</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label harassment"><span class="circle"></span>Harassment</label></div>
                        <div class="col-md-9"><p class="panel-block-label harassment">40</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label business-ethics"><span class="circle"></span>Business Ethics</label></div>
                        <div class="col-md-9"><p class="panel-block-label business-ethics">20</p></div>
                    </div>
                    <div class="row panel-block-row">
                        <div class="col-md-3"><label class="panel-block-label disciplinary"><span class="circle"></span>Disciplinary</label></div>
                        <div class="col-md-9"><p class="panel-block-label disciplinary">15</p></div>
                    </div>
                </div>
                <div class="m-t-30 panel-block">
                    <div class="row panel-block-row">
                        <div class="col-md-8"><label class="panel-block-label">Cases</label></div>
                        <div class="col-md-2 text-right">
                            <select class="form-control">
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="col-md-2 text-right">
                            <select class="form-control">
                                <option value="Ahemedabad">Ahemedabad</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Pune">Pune</option>
                                <option value="Mumbai">Mumbai</option>
                            </select>
                        </div>
                    </div>
                    <canvas id="myChart" width="400" height="100"></canvas>
                </div>
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
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var ctx = document.getElementById("myChart").getContext('2d'),
            chart2 = document.getElementById("chart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["Harassment","Business Ethics","Disciplinary"],
                datasets: [{
                    data: [85, 59, 80],
                    backgroundColor: ["#ad7c72", "#d4bea2", "#ffd064"]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        var chart2js = new Chart(chart2, {
            type: 'line',
            data: {
                labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
                datasets: [{
                    data: [86,114,106,106,107,111,133,221,783,2478],
                    label: "Ahemedabad",
                    borderColor: "#3e95cd",
                    fill: false
                }, {
                    data: [282,350,40,502,635,809,947,1402,750,5267],
                    label: "Mumbai",
                    borderColor: "#8e5ea2",
                    fill: false
                }, {
                    data: [168,170,178,190,203,276,408,547,675,734],
                    label: "Pune",
                    borderColor: "#3cba9f",
                    fill: false
                }, {
                    data: [40,20,10,16,24,38,74,167,508,784],
                    label: "Bangalore",
                    borderColor: "#e8c3b9",
                    fill: false
                }, {
                    data: [6,3,2,2,7,26,82,172,312,433],
                    label: "Delhi",
                    borderColor: "#c45850",
                    fill: false
                }]
            },
            options: {
                title: {
                    display: false
                }
            }
        });
    });
</script>

</body>
</html>