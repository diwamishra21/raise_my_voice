<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#">
 <?= $this->Html->image('logo.png') ?>
</>        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="index.html"><i class="fa fa-floppy-o"></i> Save Draft</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="index.html"><i class="fa fa-trash"></i> Delete Report</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, Anonymous<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.html">Exit</a></li>
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
                <div class="p-a-10"><a href="#" class="btn btn-default btn-block p-a-10" data-toggle="modal" data-target="#email_verification"><i class="fa fa-floppy-o"></i> Save Draft</a></div>
                <div class="p-a-10"><a href="" class="btn btn-default btn-block p-a-10"><i class="fa fa-trash"></i> Delete Report</a></div>
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div> <?= $this->Html->image('logo-quatrro.png') ?>
                       </div>
                </div>
            </div>
        </div>
		
		