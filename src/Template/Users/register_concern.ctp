<?php
ob_start();
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper; ?>
 <?php foreach ($individual_registered_user_detail as $individual_registered_user_details): ?>
                       <?php   endforeach; 
 $id=$individual_registered_user_details->id;
$registerConcern= $this->Url->build(['controller' => 'Users', 'action' => 'registerConcern',$id]);?>
 <?php $url_remarkreject= $this->Url->build(['controller' => 'Users', 'action' => 'witns']);
$witness_delete = $this->Url->build(['controller' => 'Users', 'action' => 'witnsdelete']);
$witness_fetch = $this->Url->build(['controller' => 'Users', 'action' => 'witnsFetch']);
?>
 <?php $url_accused= $this->Url->build(['controller' => 'Users', 'action' => 'addAccused']);?>
 <?php $url_sub_category = $this->Url->build(['controller' => 'Users', 'action'=> 'getSubcate']); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Anonymous Complaint | My Voice</title>
    <!-- Bootstrap -->
  <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
/* unvisited link */

</style>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?>
</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg"><a href="#">Profile</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="#">Registered Complaints</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="#">Accusations</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="#">E-Learning</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="<?= $registerConcern ;?>">+ Register Complaint</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, 
                             <?= h($individual_registered_user_details->name) ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php $change_password= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$id]);?>
                        <li><a href="<?= $change_password;?>">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                   <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>

                        <li><a href="<?= $logout; ?>">Sign out</a></li>
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
 
<?php $registerConcern= $this->Url->build(['controller' => 'Users', 'action' => 'registerConcern',$id]);?>

<?php $userProfile= $this->Url->build(['controller' => 'Users', 'action' => 'userprofile',$id]);?>                <ul>
                    <li class="active"><a class="smooth-scroll" href="<?= $userProfile ;?>">Profile</a></li>
                    <!-- <li><a class="smooth-scroll" href="#concerns-summary">Concerns Summary</a></li>
                    <li><a class="smooth-scroll" href="#registered-concerns">Registered Concerns</a></li>
                    <li><a href="e-learning">E-Learning</a></li> -->
                </ul>
                <div class="p-a-10"><a href="<?= $registerConcern?>" class="btn btn-default btn-block btn-square p-a-10">+ Register Complaint</a></div>
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-10">
           
            <!------------- Form OPen -->
           
             <?= $this->Form->create('User', array('url' => array('controller' => 'Users','action' =>'registerConcern',@$id),'enctype'=>'multipart/form-data', 'id' =>'anonymus-formdata')); ?>
            <div class="container-fluid" id="concern-form">
                <div class="concern-form-section active" data-section-order="1">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Basic Details</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_title"></label>
<?php echo $this->Form->control('c_title', ['label' => 'Subject title','type'=>'text','class'=>'form-control','id'=>'subject_title' ]);?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concern_regarding">What is this complaint regarding? <span style="color: red">*</span></label>
                                    <select name="category_concern" class="form-control" id="category_concern">
                                        <?php
                        if(!empty($catdata)){
                            //pr($catdata);die();
                            echo '<option value="" >Choose an option</option>';
                            foreach($catdata as $key=>$value){
                                var_dump($value);
                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
                            }
                        }
                        ?>
                                        
                                    </select>
    
                        
                                <span id="check_concern_regarding"></span>
</div>
                            </div>
                            <div class="col-md-6" id="other">
                                <div class="form-group">
                                    <label for="other_concern">Sub category</label>
                                   <select name="category_concern_sub" class="form-control" id="category_concern_sub">
                                        <?php
                        if(!empty($catdata)){
                            //pr($catdata);die();
                            echo '<option value="" >Choose an option</option>';
                            foreach($data as $key=>$value){
                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
                            }
                        }
                        ?>
                                        
                                    </select>
                             
<span id="check_other_concern"></span>                                
</div>
                            </div>
                        </div>
                         <!-- Other section starts here-->
               <div class="row" >
                            <div class="col-md-6" id="others_categorys" >
                                <div class="form-group">
                                    <label for="other_category">Category<span style="color: red">*</span></label>
                                        
                                    <input type="text" id="other_category" name="other_category" class="form-control">
                                <span id="check_other_category"></span>
                            </div>
                            </div>

                            <div class="col-md-6" id="others_subcategorys">
                                <div class="form-group">
                                    <label for="other_subcategory">Sub category</label><span style="color: red">*</span></label>
                                  <input type="text" id="other_subcategory" name="other_subcategory" class="form-control">
                             <span id="check_other_subcategory"></span>
                            </div>
                            </div>
                 </div>
              <!-- Other section ends here-->          
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colleague_complaint">Are you registering this complaint on behalf of your colleague? <span style="color:red;" >*</span></label>
                                  <?php $colleague_complaint=array("Yes"=>"Yes","No"=>"No");
echo $this->Form->select('c_option',$colleague_complaint,['class'=>'form-control','id'=>'colleague_complaint','label' => 'Are You Registering This Complaint On Behalf Of Your Colleague? *','empty'=>'Choose an option']); ?> 
<span id="check_colleague_complaint"></span>                                
</div>
                            </div>
                            <div class="col-md-6" id="resolve">
                                <div class="form-group">
                                    <label for="resolve_complaint">Have you tried to tesolve this issue on your own? <span style="color:red;" >*</span></label>
                                   <?php $resolve_complaint=array("Yes"=>"Yes","No"=>"No"); 
echo $this->Form->select('c_tried_r_own',$resolve_complaint,['class'=>'form-control','id'=>'resolve_complaint','label' => 'Have You Tried To Resolve This Issue On Your Own? *','empty'=>'Choose an option']);?>  
<span id="check_resolve_complaint"></span>                                
</div>
                            </div>
                            <div class="col-md-6" id="resolve1">
                                <div class="form-group">
                                    <label for="written_concent">Do you have written consent from your colleague to file this case<span style="color: red">*</span></label>
                                   <?php $resolve_complaint=array("Yes"=>"Yes","No"=>"No"); 
echo $this->Form->select('c_tried_r_own',$resolve_complaint,['class'=>'form-control','id'=>'written_concent','label' => 'Have You Tried To Resolve This Issue On Your Own? <span style="color: red">*</span>','empty'=>'Choose an option']);?>  
<span id="check_written_concent"></span>                                
</div>
                            </div>
                        </div>
                        <div class="col-xs-12" id="concent">
                                <input type="checkbox" id="confirm_concent"><b>I understand</b> as per the law, it is imperative that either the person files the complaint for self or provides a written consent to someone else to proceed. We thank you for filing this complaint and bringing it to our notice. We would only be able to proceed further once we receive a written consent as specified by the Law. You can still go ahead and share the details on the next page.<br>
                                <span id="check_confirm_concent" style="color: red"></span>
                            </div>
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="2">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Work Details</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_unit"></label>
                                    <?php echo $this->Form->control('bu', ['label' => 'Business unit','type'=>'text','class'=>'form-control','id'=>'business_unit' ,'value'=>@h($individual_registered_user_details->bu)]);?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"></label>
                                    <?php echo $this->Form->control('city', ['label' => 'City','type'=>'text','class'=>'form-control','id'=>'city','value'=>@h($individual_registered_user_details->city) ]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_location"></label>
                                  <?php echo $this->Form->control('work_location', ['label' => 'Work location','type'=>'text','class'=>'form-control','id'=>'work_location','value'=> @h($individual_registered_user_details->work_location) ]); ?>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emp_name"></label>
                                    <?php echo $this->Form->control('name', ['label' => 'Name','type'=>'text','class'=>'form-control','id'=>'emp_name','value'=> @h($individual_registered_user_details->name) ]); ?>
<span id="check_emp_name"></span>                                
</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_id"></label>
                                    <?php echo $this->Form->control('empid', ['label' => 'Employee ID','type'=>'text','class'=>'form-control','id'=>'employee_id','value'=> @h($individual_registered_user_details->empid) ]); ?>
                                 <span id="check_empid"></span>
</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email<span style="color: red">*</span></label>
                                    <?php echo $this->Form->control('empid', ['label' => '','type'=>'text','class'=>'form-control','disabled','id'=>'email','value'=> @h($individual_registered_user_details->email) ]); ?>
                                    <?php echo $this->Form->control('email', ['label' => '','type'=>'hidden','class'=>'form-control','value'=> @h($individual_registered_user_details->email) ]); ?>
                          <span id="check_email"></span>                                
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number"></label>
                                 <?php echo $this->Form->control('mobile', ['label' => 'Phone number','type'=>'text','class'=>'form-control','id'=>'phone_number','value'=>@h($individual_registered_user_details->mobile)]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_notes">Additional Notes</label>
                                   <?php echo $this->Form->textarea('notes', ['label' => 'Additional Notes','class'=>'form-control','id'=>'additional_notes']); ?>
                                    <small class="text-muted">If you would like to, please share some of the details about your job description, your colleagues, etc, to give us some context of your work environment.</small>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="3">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Complaint</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p for="concern_details">Please explain your complaint to us. Know that anything you say is completely confidential so please feel free to be specific about your complaint and elaborate the issue. This will help us during the investigation. You may also attach any relevant documents/audio/video files that you feel we should read/hear/see.</p>
                                   <?php echo $this->Form->textarea('concern_details', ['label' => false,'class'=>'form-control','id'=>'concern_details']); ?>
<span id="check_concern_details"></span>                                
</div>
                            </div>
                        </div>


                                  <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <!--div class="col-md-1 text-center">
                                            <div class="recording-icon">
                                                
 <?php // $this->Html->image('mic.svg') ?>

                                            </div>
                                        </div>
                                        <div class="col-md-8 text-center">
                                            <div class="recording-icon">

                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <div class="recording-icon inline-block">
                                                
<?php //$this->Html->image('pause%201.svg') ?>

                                            </div>
                                            <div class="recording-icon inline-block">
                                                
<?php // $this->Html->image('play%201.svg') ?>
                                            </div>
                                            <div class="recording-icon inline-block">
                                                
<?php // $this->Html->image('stop%201.svg') ?>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <!---- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <div class="recording-icon">
                                            <?php //$this->Html->image('mic.svg') ?>
                                                 </div>
                                        </div>
                                        <div class="col-md-8 text-center">
                                            <div class="recording-icon">

                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <div class="recording-icon inline-block">
                                                <?php //$this->Html->image('pause%201.svg') ?>
                                                     </div>
                                            <div class="recording-icon inline-block">
                                             <?php //$this->Html->image('play%201.svg') ?>
                                                </div>
                                            <div class="recording-icon inline-block">
                                             <?php //$this->Html->image('stop%201.svg') ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <hr/>
                       <div class="row">
                            <div class="col-xs-6">
                                <h4 class="m-t-7">Attachments</h4>
                            </div>
                            <div class="col-xs-6 text-right">
<label class="btn btn-dark p-a-10" id="label-click_0" onclick="$('#chooseFile_0').click()">+ Choose File</label>
                               <input type="file" name="image[]"  onclick="return showImageList(0);" multiple="multiple" class="hidden" id="chooseFile_0" >
                             <?php //echo// $this->Form->input('file_name[]',['lable'=>false,'type' => 'file','multiple'=>'multiple','class'=>'hidden','id'=>'chooseFile']); ?>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="fileview">
                                                                    
                                </ul>
                            </div>
                        </div>
                        <div class="row m-t-20 p-t-20">
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <h5>File type .jpg,.png,.gif,.docx,.xls,.pdf,.wav,.mp3,.wmv files are allowed to upload (File size must be < 10 mb)</h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Accused starts section here -->
                <div class="concern-form-section hidden" data-section-order="4">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Offender</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Please list the details of people(s) below against whom you want to raise a complaint.</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-dark" onclick="return accusedReset();" data-toggle="modal" data-target="#myModal12">+ Add Offender</button>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="accused">
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accused section ends here -->
                
                <div class="concern-form-section hidden" data-section-order="5">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Witnesses</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Please add the details of people(s) below who witnessed the incident and can support you.</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-dark" onclick="return witnessReset();" id="witnessbutton" data-toggle="modal" data-target="#myModal" style="color:#fff;">+ Add Witness</button>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="witness">
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="6">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Confirm</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-3">
                             <label for="captcha"></label>
                             <input type="text" name="CaptchaInput" id="CaptchaDiv" size="15" style="font: bold 25px verdana, arial" onchange="return ValidCaptcha();" class="form-control" width="48" height="48" disabled="disabled">
                            </div>
                            <div class="col-md-9">
                               
                                <label for="captcha">Enter the captcha code</label>
                                <input type="hidden" id="txtCaptcha">
                                <input type="text" name="CaptchaInput" id="CaptchaInput" onchange="ValidCaptcha()" class="form-control">
                                <span id="check_captcha" style="color: red"></span>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-xs-12">
                                <label><input type="checkbox" id="confirm_check"> I confirm that I have carefully read and accepted the <a data-toggle="modal" href="#myModal3" style="color: #4770d1">terms & conditions</a> for this action</label><br>
                                 <span id="check_confirm_check" style="color: red"></span>
                            </div>
                        </div>
<?php $a = (string) microtime();
?>
  <?php $complaint_id = "Mv" . substr($a, 2, 4);?>
  <?php echo $this->Form->control('complaint_id', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>$complaint_id]); ?>
<?php echo $this->Form->control('complaint_id_genrate_date', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>$time]); ?>
<?php echo $this->Form->control('complaint_id_status', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1']); ?>  
 <?php echo $this->Form->control('user_id', ['label' => 'Email *','type'=>'hidden','class'=>'form-control','id'=>'','value'=> @h($individual_registered_user_details->id) ]); ?>

    <?php echo $this->Form->control('status', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1']); ?>
  <div class="row">                         
      <div class="col-xs-10 text-right" >
    
                              <!--  <?= $this->Form->button('Submit',['escape' => false,'type' => 'submit','class'=>'btn btn-dark ','id'=>'btnsubmit','onclick' =>"return ValidCaptcha();"]) ?> -->
                            </div>                
  </div>
                    </div>
                </div>
                   <div class="panel-block form-navigation margin-bottom-30 bg-transparent">
                    <div class="row">
                        <div class="col-md-4 text-center p-t-10">
                            <button type="button" class="btn btn-dark p-a-10 hidden" id="btn-previous"><i class="fa fa-angle-left fa-lg p-r-20"></i> Step Back</button>
                        </div>
                        <div class="col-md-4 text-center p-t-10">
                        
                            <!-- <button  type="button" class="btn btn-dark p-a-10 hidden" id="btn-download"><i class="fa fa-file-pdf-o fa-lg p-r-20"></i> Download PDF</button> -->
                        </div>
                        <div class="col-md-4 text-center p-t-10">
                            <button  type="button" class="btn btn-dark p-a-10" id="btn-proceed">Proceed <i class="fa fa-angle-right fa-lg p-l-20"></i> </button>
                           <!--  <a href="user-profile.html" class="btn btn-dark p-a-10 hidden" id="btn-concerns"><i class="fa fa-file-o fa-lg p-r-20"></i> Show Concerns</a> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?= $this->Form->end() ?>

         <!------------- Form end -->
        
        
    </div>
</div>

    
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Witness</h4>
            </div>
            
            <div class="modal-body bg-light">
        <?= $this->Form->create("Witns", ['id'=>'wit_form','url' => ['controller' => 'Users', 'action' => 'witns',$id]]); ?>
               
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_name"></label>
<?php echo $this->Form->input('user_complaint_id',['label' => 'Name','id'=>'witness_id','type'=>'hidden','class'=>'form-control' ,'value'=>$id]);  ?> 
 <?php echo $this->Form->input('user_concern_details', ['label' => false,'class'=>'form-control','type'=>'hidden','id'=>'user_concern_details']); ?>    

<?php echo $this->Form->input('wi_name[]',['label' => 'Name','id'=>'witness_name','type'=>'text','class'=>'form-control']);  ?> 
<span id="check_witness_name"></span>                          
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_bu"></label>
            <?php echo $this->Form->input('wi_bu[]',['label' => 'Business unit','name'=>'wi_bu','type'=>'text','id'=>'witness_bu','class'=>'form-control']); ?>

                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_city"></label>
        <?php  echo $this->Form->input('wi_city[]',['label' => 'City','type'=>'text','id'=>'witness_city','class'=>'form-control']); ?>

                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_work"></label>
                               <?php  echo $this->Form->input('wi_location[]',['label' => 'Work location','type'=>'text','id'=>'witness_work','class'=>'form-control']); ?>
                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_emp_id"></label>
                                <?php
          echo $this->Form->input('wi_empid[]',['label' => 'Employee ID','type'=>'text','id'=>'witness_emp_id','class'=>'form-control']); ?>
 <?php
          echo $this->Form->input('a_useremail[]',['label' =>false,'type'=>'hidden','id'=>'a_useremail','class'=>'form-control','value'=> @h($individual_registered_user_details->email)]); ?>
                            </div>
                        </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_email"></label>
<?php
          echo $this->Form->input('wi_email_id[]',['label' => 'Email','name'=>'wi_email_id','type'=>'text','id'=>'witness_email','class'=>'form-control']); ?>
                                
                            </div>
                        </div>
                        
                         </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="witness phone">Phone</label>
                                    <input type="" id="phone" name="phone[]" class="form-control" maxlength="10">
                                </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                
<label for="witness_relation"></label>
                                
                                <?php
          echo $this->Form->input('relationship[]',['label' => 'Relationship','id'=>'witness_relation','type'=>'text','class'=>'form-control']); ?>
                            </div>
                        </div>
                    </div>
                <div class="row">
                        
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="Remark">Remark</label>
                                <textarea id="remark" name="remark[]" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= $this->Form->button('Add Witness',['escape' => false,'type' => 'button', 'class'=>'btn btn-dark wit_fetch ','id'=>'wit','data-dismiss'=>'modal','style' => 'color:#fff;']) ?>
                
            </div>
             <?= $this->Form->end() ?>
        </div>
         
    </div>
</div>
    



<div class="modal fade" id="email_verification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Email Verification</h4>
            </div>
            <div class="modal-body bg-light">
                <form id="email_form">
                    <p>In order to save / submit your application as Anonymous, we will need to verify your email id. Please click on the verification link sent to your entered email id in order to complete the action.</p>
                    <p>You will also be provided with a temporary username and password for you to return to, or track the progress of your application</p>
                    <hr/>
                    <div class="form-group">
                        <label for="email_address">Email Address*</label>
                        <input type="email" class="form-control" id="email_address" name="email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Proceed</button>
            </div>
        </div>
    </div>
</div>
    
<!-- Accused modal starts here -->

<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Offender</h4>
            </div>
            <div class="modal-body bg-light">
                <form id="accused_form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_name">Name<span style="color: red">*</span></label>
                                <input type="text" id="accused_name" name="accused_name" class="form-control">
                                <span id="check_accused_name"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_bu">Business unit</label>
                                <input type="text" id="accused_bu" name="accused_bu[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_city">City</label>
                                <input type="text" id="accused_city" name="accused_city[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_work">Work location</label>
                                <input type="text" id="accused_work" name="accused_work[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_emp_id">Employee ID</label>
                                <input type="text" id="accused_emp_id" name="accused_emp_id[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_email">Email</label>
                                <input type="text" id="accused_email" name="accused_email[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="accused_dept">Dept/Process<span style="color: red">*</span></label>
                                <input type="text" id="accused_dept" name="accused_dept[]" class="form-control">
                                <span id="check_accused_dept"></span>
                            </div>
                    </div>
                    </div>    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="accused-btn" class="btn btn-dark" data-dismiss="modal">Add Offender</button>
            </div>
        </div>
    </div>
</div>
<!-- Accused modal ends here -->    


<!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms and conditions</h4>
        </div>
        <div class="modal-body">
          <p>Terms and condition goes here...</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  




<!-- Terms and Condition Model start-->







<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?= $this->Html->script('bootstrap.min.js') ?>

<script type="text/javascript">
  //query for generating listing of selceted image for uploading  
 var counter = 1;
    function showImageList(stid){
        var i = $('#fileview li').size() + 1;
        console.log(stid);
        $('#chooseFile_'+stid).change(function(e){
            var fileName = e.target.files[0].name;
            var filesize1 = e.target.files[0].size;
            var filesize = (filesize1/1024).toFixed(2);
            var month = new Array();
            month[0] = "January";
            month[1] = "February";
            month[2] = "March";
            month[3] = "April";
            month[4] = "May";
            month[5] = "June";
            month[6] = "July";
            month[7] = "August";
            month[8] = "September";
            month[9] = "October";
            month[10] = "November";
            month[11] = "December";
            var d = new Date();
            var n = month[d.getMonth()];
            var cdate = d.getDate();
                var html = '<div class="removeRow_'+stid+'" ><li class="list-group-item border-none p-a-20" id="row_'+stid+'">'+
               '<div class="row" name="_' + i +'">'+
               '<div class="col-md-3 p-t-5">'+ fileName +'</div>'+
               '<div class="col-md-3 p-t-5">'+ filesize +'kb' + '</div>'+
               '<div class="col-md-3">'+
               '<button type="button" class="btn btn-default status-retracted" id="" onclick="remove('+stid+')">Remove</button>'+
               '</div>'+
               '<div class="col-md-3"><label class="btn btn-dark p-a-10" id="label-click_'+counter+'" onclick="$(chooseFile_'+counter+').click()">+ Choose File</label>'+
               '<input type="file"  name="image[]" onclick="return showImageList('+counter+');" multiple="multiple" class="hidden" id="chooseFile_'+counter+'" ></div>'+
               '</div>'+
               '</li></div>';
       
            jQuery('ul#fileview').append(html); 
            $('#label-click_'+stid).hide();
            i++;
            counter++;
            return false;   
            
        });    
    }
    
    function remove(removeid){
//        if(!'.removeRow_'+removeid+:last){
        $('.removeRow_'+removeid).remove();
//    }
        
    }

</script>
<?= $this->Html->script('custom.js') ?>
<script>
  var increment = 1;
   //query for generating list of witness
    function dispalyWitnessListing(){
        var witnessName = $('#witness_name').val();
        var witnessBusiness = $('#witness_bu').val();
        var witnessCity = $('#witness_city').val();
        var witnessLocation = $('#witness_work').val();
        var witnessEmpid = $('#witness_emp_id').val();
        var witnessEmailid = $('#witness_email').val();
        var witnessRelation = $('#witness_relation').val();
        var witnessPhone    = $('#phone').val();
        var witnessremark  = $('#remark').val();
        
        var html = '<div class="witnessRow_'+increment+'">'+
                   '<li class="list-group-item border-none p-a-20">'+
                   '<div class="row">'+
                   '<div class="col-md-2 p-t-5">'+witnessName.substr(0,40)+'<input type="text" class="hidden" name="wi_name[]" value="'+witnessName+'"></div>'+
                   '<div class="col-md-2 p-t-5">'+witnessEmpid.substr(0,15)+'<input type="text" class="hidden" name="wi_empid[]" value="'+witnessEmpid+'"></div>'+
                   '<div class="col-md-2 p-t-5">'+witnessRelation.substr(0,15)+'<input type="text" class="hidden" name="relationship[]" value="'+witnessRelation+'"></div>'+
                   '<div class="col-md-2 p-t-5">'+witnessCity.substr(0,20)+'<input type="text" class="hidden" name="wi_city[]" value="'+witnessCity+'"></div>'+
                   '<input type="text" class="hidden" name="wi_bu[]" value="'+witnessBusiness+'">'+
                   '<input type="text" class="hidden" name="wi_location[]" value="'+witnessLocation+'">'+
                   '<input type="text" class="hidden" name="wi_email_id[]" value="'+witnessEmailid+'">'+
                   '<input type="text" class="hidden" name="phone[]" value="'+witnessPhone+'">'+
                   '<textarea class="hidden" name="remark[]" value="'+witnessremark+'"></textarea>'+
                   '<div class="col-md-3"><button type="button" onclick="removeWitness('+increment+')" class="btn btn-default status-retracted">Remove</button></div>'+
                   '</div>'+
                   '</div>';
        
        $('ul#witness').append(html);
        increment++;
    }
    
    
     //query for generating list of accused
    function dispalyAccusedListing(){
        var accusedName = $('#accused_name').val();
        var accusedBusiness = $('#accused_bu').val();
        var accusedCity = $('#accused_city').val();
        var accusedLocation = $('#accused_work').val();
        var accusedEmpid = $('#accused_emp_id').val();
        var accusedEmailid = $('#accused_email').val();
        var accusedDept = $('#accused_dept').val();
       
        var html = '<div class="accusedRow_'+increment+'">'+
                   '<li class="list-group-item border-none p-a-20">'+
                   '<div class="row">'+
                   '<div class="col-md-2 p-t-5">'+accusedName.substr(0,40)+'<input type="text" class="hidden" name="accused_name[]" value="'+accusedName+'"></div>'+
                   '<div class="col-md-2 p-t-5">'+accusedEmpid.substr(0,15)+'<input type="text" class="hidden" name="accused_empid[]" value="'+accusedEmpid+'"></div>'+
                   '<div class="col-md-2 p-t-5">'+accusedDept.substr(0,25)+'<input type="text" class="hidden" name="accused_dept[]" value="'+accusedDept+'"></div>'+
                   '<div class="col-md-2 p-t-5">'+accusedCity.substr(0,20)+'<input type="text" class="hidden" name="accused_city[]" value="'+accusedCity+'"></div>'+
                   '<input type="text" class="hidden" name="accused_bu[]" value="'+accusedBusiness+'">'+
                   '<input type="text" class="hidden" name="accused_location[]" value="'+accusedLocation+'">'+
                   '<input type="text" class="hidden" name="accused_email_id[]" value="'+accusedEmailid+'">'+
                   '<div class="col-md-3"><button type="button" onclick="removeAccused('+increment+')" class="btn btn-default status-retracted">Remove</button></div>'+
                   '</div>'+
                   '</div>';
        
        $('ul#accused').append(html);
        increment++;
    }
    
    //query removing witness li data
    function removeWitness(witness){
        if(witness != ''){
            $(".witnessRow_"+witness).remove();
        }
    }
    
    //query removing accused li data
    function removeAccused(accused){
        if(accused != ''){
            $(".accusedRow_"+accused).remove();
        }
    }
    
     //query for removing default data from accused form
    function accusedReset() {
        document.getElementById("accused_form").reset();
    }
   

    $('#accused-btn').click(function(){
    var valid = true;
    if($('#accused_name').val()=='')
      {
        $('#accused_name').css('border','1px solid red');
        $('#check_accused_name').text('Please enter name ');
        $('#check_accused_name').addClass('error_label');
        valid = false;
        $('#accused_name').focus();
      }
     else
      {
        $('#accused_name').css('border','1px solid #cccccc');   
        $('#check_accused_name').text('');
       }
       if($('#accused_dept').val()=='')
        {
        $('#accused_dept').css('border','1px solid red');
        $('#check_accused_dept').text('Please enter department ');
        $('#check_accused_dept').addClass('error_label');
        valid = false;
        $('#category_concern_sub').focus();
      }
     else
      {
        $('#accused_dept').css('border','1px solid #cccccc');   
        $('#check_accused_dept').text('');
       }
       if(valid == true)
            {
               dispalyAccusedListing();
            }
            else
            {
                return false;
            }

    });

$('#wit').click(function(){
    var valid = true;
    if($('#witness_name').val()=='')
    {
        $('#witness_name').css('border','1px solid red');
        $('#check_witness_name').text('Please enter name ');
        $('#check_witness_name').addClass('error_label');
        valid = false;
        $('#accused_name').focus();
      }
     else
      {
        $('#witness_name').css('border','1px solid #cccccc');   
        $('#check_witness_name').text('');
       }


       if(valid == true)
        {
           dispalyWitnessListing();
        }
        else
        {
            return false;
        }

    });   





</script>
 
<script>
$('#category_concern').change(function(){
var sel=$(this).val();
$('#other').show();
$.ajax({
     url:'<?= $url_sub_category ?>',
    data:{'sel':sel},
    method:'POST',
    success:function(data){
        var d=$.parseJSON(data);
        console.log(d);
        /*var html='';
        $(d).each(function(i,u){
            $(u).each(function(j,k){
                console.log(j);
                console.log(k);
                html+='<option value="'+j+'" >'+k+'</option>';
            });
            
        });*/
        $('#category_concern_sub').html(d.html);
        $('#other').show();


    }
});

var text = $("#category_concern option:selected").text();

if($("#category_concern option:selected").text()=='Other')
{
    $('#others_categorys').show();
}
else
{
    $('#others_categorys').hide();
}

});
$('#category_concern_sub').change(function(){
    var text1 = $("#category_concern_sub option:selected").text();
if($("#category_concern_sub option:selected").text()=='Other')
{
    $('#others_subcategorys').show();
}
else
{
    $('#others_subcategorys').hide();
}

});

</script> 


<script>
$(document).ready(function(){
   
$('#concern_details').keyup(function(){
    $('#user_concern_details').val(this.value);
});

  });

    //query for removing default data from form
    function witnessReset() {
        document.getElementById("wit_form").reset();
    }

</script>
<script>

$(document).ready(function(){
     $("#btnsubmit").on("click", function () {
// alert("hi");

   var isChecked = $('#confirm_check').is(':checked');
            if(isChecked)
            {
                $('#confirm_check').css('border','1px solid #cccccc');
                $('#check_confirm_check').text('');
            }
            else
            {
                $('#confirm_check').css('border','1px solid red');
                $('#check_confirm_check').text('Please accept terms and conditions ');
                $('#check_confirm_check').addClass('error_label');
                return false;
            }
        
   });
   
$('#email').keyup(function(){
    $('#a_useremail').val(this.value);
});
  });
</script>
 
<script type="text/javascript">
    $('#phone_number').keypress(function(e) {
    var a = [];
    var k = e.which;
    
    for (i = 48; i < 58; i++)
        a.push(i);
    
    if (!(a.indexOf(k)>=0))
        e.preventDefault();
});
$('#phone').keypress(function(e) {
    var a = [];
    var k = e.which;
    
    for (i = 48; i < 58; i++)
        a.push(i);
    
    if (!(a.indexOf(k)>=0))
        e.preventDefault();
});
var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';
var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("CaptchaDiv").value = code;

// Validate input against the generated number

function ValidCaptcha(){
    // alert('hello');
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
if($('#CaptchaInput').val()=='')
{
                $('#captcha').css('border','1px solid red');
                $('#check_captcha').text('Please enter the captcha ');
                 return false;
}
else{
    if (str1 != str2){
                $('#check_captcha').text('Invalid Captcha');
                $('#check_captcha').addClass('error_label');
        return false;   
    }
    else
    {
             $('#check_captcha').text('');
    }
}
}


// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}

// function confirmCheck(){
//     alert('hi');
//     return false;
// }
</script>

</body>
</html>
