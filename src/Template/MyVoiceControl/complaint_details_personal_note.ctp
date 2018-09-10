

<?php $session=$this->request->session();
$session_data=$session->read();
$session_user_role=$session_data['Auth']['User']['role'];
$session_id=$session_data['Auth']['User']['id'];?>
<?php
                  if($session_user_role == 4)
                    {
                     $value = "You have been assigned as  My Voice BHRSpoc";
                    }
                    if($session_user_role == 3)
                    {
                     $value = "You have been assigned as  My Voice Manager";
                    }
                    if($session_user_role == 5)
                    {
                     $value = "You have been assigned as  My Voice Pnael Member";
                    }
                    if($session_user_role == 6)
                    {
                     $value = "You have been assigned as  My Voice Scribe";
                    }
if($session_user_role == 7)
                    {
                     $value = "You have been assigned as  Preciding Officer";
                    }

                ?>



                     <div class="col-sm-10">

                         <?php echo $this->element('myvoice/complaint_summary'); ?>


            <div class="p-t-20 p-b-20">

                <div class="panel-divider"></div>
            </div>
			<?php foreach ($individual_accuser_detail as $individual_accuser_details){
				$id=$individual_accuser_details->id;
			} ?>

          
                                        

			<?php if($session_user_role== '3' ) { ?>


            <div class="container-fluid">
                <div class="panel-block">


<h5 style="color:red;"><?php //echo $this->Flash->render(); ?>   </h5>
 <?= $this->Form->create('User', array('url' => array('controller' => 'MyVoiceControl','action' =>'ComplaintDetailsPersonalNote',$id),'enctype'=>'multipart/form-data')); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="personal_notes">Notes</label>
<?php  echo $this->Form->control('complaint_id_rejection', ['label' =>false,'rows'=>'10','class'=>'form-control','id'=>'personal_notes','value'=>@$individual_accuser_details->complaint_id_rejection]); ?>
<?php echo $this->Form->control('id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_accuser_details->id]); ?>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label class="m-t-7">Enquiry Letter</label>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" class="btn btn-dark p-a-10" onclick="$('#chooseFile_0').click()">Upload File</button>
                            <input type="file" name="enquiry_letter" onclick="return showEnquiryList(0);"  class="hidden" id="chooseFile_0">
                        </div>
                    </div>

<!--                    <div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group" id="">
                                <?php foreach ($complaint_file as $complaint_file){
                                $get_enquiry = $complaint_file->enquiry_letter;
                                $filepath = '/myvoicev2/webroot/upload/'.$get_enquiry;
                                ?>
                                <li class="list-group-item border-none p-a-20">
                                    <div class="row">
                                        <div class="col-md-3 p-t-5"></div>
                                            <div class="col-md-6 p-t-5"></div>
                                                <div class="col-md-3" >
                                                <img src="<?php echo $filepath;?>">
                                                </div>
                                    </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>-->
                    <div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group" id="fileview">
                            </ul>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-6">
                            <label class="m-t-7">Acknowledgement</label>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" class="btn btn-dark p-a-10" onclick="$('#File_0').click()">Upload File</button>
                            <input type="file" name="acknow" onclick="return showAcknowList(0);" class="hidden" id="File_0">
                        </div>
                    </div>
<!--                    <div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group" id="">
                                <?php foreach ($complaint_file as $ack_file){
                               echo $get_acknow = $ack_file->acknowledgement;
                                $filepath = '/myvoicev2/webroot/upload/'.$get_acknow;
                                ?>
                                <li class="list-group-item border-none p-a-20">
                                    <div class="row">
                                        <div class="col-md-3 p-t-5"></div>
                                            <div class="col-md-6 p-t-5"></div>
                                                <div class="col-md-3" >
                                                <img src="<?php echo $filepath;?>">
                                                </div>
                                    </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>-->

                    <div class="row">
                        <div class="col-xs-12 text-right">
<?php  echo $this->Form->button('Submit', ['label' =>false,'type'=>'submit','class'=>'btn btn-dark']); ?>

                        </div>
                    </div>
 <?= $this->Form->end() ?>
<!--                    <hr/>-->

                </div>
            </div>

			<?php } elseif($session_user_role== '7'  || $session_user_role== '8' || $session_user_role== '9' || $session_user_role== '10') { ?>

			  
<?php foreach ($complaint_file as $cd){
	
				} 
                                        $cDate = "";
                                    if (!empty($cd['enquiry_letter'])) {
                                        $cDate = date('d F Y', strtotime($cd['superwisor_complaint_accept_date']));
                                    ?>
                                             <div class="row panel-block-row p-t-20">
                                                 <div class="col-md-2">
                                            <p class="p-t-5" style="padding-left:45px;"><?= $cDate; ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="fa-stack">
                                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                                            </span>
                                        </div>
                                       <div class="col-md-9">
                                                   <div class="col-md-3 ">
                                                    <label class="panel-block-label" >Inquiry Letter</label></div>

                                                    <div class="row supervisor-panel-block-row">
                                                      
                                                        <div class="col-md-8">
                                                            <?php
                                                            $link = "";
                                                            $root = $this->Url->build('/');
                                                            if (!empty($cd['enquiry_letter'])) {
                                                                $images = explode(',', $cd['enquiry_letter']);
                                                                foreach ($images as $k => $file) {
                                                                    $fileNameTmp = explode('.', $file);
                                                                    $ext = $fileNameTmp[count($fileNameTmp) - 1];
                                                                    $ext = strtolower($ext);
                                                                    if (in_array($ext, ['doc', 'jpg', 'mp3', 'mp4', 'pdf', 'png', 'ppt', 'rar', 'txt', 'wav', 'xls', 'xlsx', 'zip'])) {
                                                                        $icon = $this->Html->image('file-icon/' . $ext . '.png');
                                                                        //$icon = '<i class="fa fa-picture-o fa-2x" ></i>';
                                                                    } else {
                                                                        $icon = $this->Html->image('file-icon/blank.png');
                                                                        //$icon = '<i class="fa fa-file-o fa-2x" ></i>';
                                                                    }
                                                                    $link = '<a target="_blank" href="' . $root . 'upload/' . $file . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                                                    echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
												 </div>
									<?php }
									 if (!empty($cd['enquiry_letter'])) {
                                        $cDate = date('d F Y', strtotime($cd['superwisor_complaint_accept_date']));
                                    ?>
												 
											 <div class="row panel-block-row p-t-20">
                                                 <div class="col-md-2">
                                            <p class="p-t-5" style="padding-left:45px;"><?= $cDate; ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="fa-stack">
                                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                                            </span>
                                        </div>
                                       <div class="col-md-9">
                                                   <div class="col-md-3 ">
                                                    <label class="panel-block-label" style="padding-left:0px;">Acknowledgement Letter</label></div>

                                                    <div class="row supervisor-panel-block-row">
                                                      
                                                        <div class="col-md-8">
                                                            <?php
                                                            $link = "";
                                                            $root = $this->Url->build('/');
                                                            if (!empty($cd['enquiry_ack'])) {
                                                                $images = explode(',', $cd['enquiry_ack']);
                                                                foreach ($images as $k => $file) {
                                                                    $fileNameTmp = explode('.', $file);
                                                                    $ext = $fileNameTmp[count($fileNameTmp) - 1];
                                                                    $ext = strtolower($ext);
                                                                    if (in_array($ext, ['doc', 'jpg', 'mp3', 'mp4', 'pdf', 'png', 'ppt', 'rar', 'txt', 'wav', 'xls', 'xlsx', 'zip'])) {
                                                                        $icon = $this->Html->image('file-icon/' . $ext . '.png');
                                                                        //$icon = '<i class="fa fa-picture-o fa-2x" ></i>';
                                                                    } else {
                                                                        $icon = $this->Html->image('file-icon/blank.png');
                                                                        //$icon = '<i class="fa fa-file-o fa-2x" ></i>';
                                                                    }
                                                                    $link = '<a target="_blank" href="' . $root . 'upload/' . $file . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                                                    echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
												 </div>
											
									 <?php } 
											 foreach ($preciding_fetch as $individual_user_detail_image) {
                                               
                                            }  $cDate = "";
                                    if (!empty($individual_user_detail_image['image'])) {
                                        $cDate = date('d F Y', strtotime($individual_user_detail_image['created']));
                                    
?>
                             <div class="row panel-block-row p-t-20">
							

											 <div class="col-md-2">
                                            <p class="p-t-5" style="padding-left:45px;"><?= $cDate; ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="fa-stack">
                                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                                            </span>
                                        </div>
                                        <div class="col-md-9">
                                                   <div class="col-md-3 ">
                                                    <label class="panel-block-label" style="padding-left:0px;">Attachment</label></div>

                                                    <div class="row supervisor-panel-block-row">
                                                      
                                                        <div class="col-md-8">
                                                            <?php
                                                            $link = "";
                                                            $root = $this->Url->build('/');
                                                            if (!empty($individual_user_detail_image['image'])) {
                                                                $images = explode(',', $individual_user_detail_image['image']);
                                                                foreach ($images as $k => $file) {
                                                                    $fileNameTmp = explode('.', $file);
                                                                    $ext = $fileNameTmp[count($fileNameTmp) - 1];
                                                                    $ext = strtolower($ext);
                                                                    if (in_array($ext, ['doc', 'jpg', 'mp3', 'mp4', 'pdf', 'png', 'ppt', 'rar', 'txt', 'wav', 'xls', 'xlsx', 'zip'])) {
                                                                        $icon = $this->Html->image('file-icon/' . $ext . '.png');
                                                                        //$icon = '<i class="fa fa-picture-o fa-2x" ></i>';
                                                                    } else {
                                                                        $icon = $this->Html->image('file-icon/blank.png');
                                                                        //$icon = '<i class="fa fa-file-o fa-2x" ></i>';
                                                                    }
                                                                    $link = '<a target="_blank" href="' . $root . 'upload/scribe/' . $file . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                                                    echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
												 </div>  
									<?php } ?>												 

			       <div class="container-fluid">
                <div class="panel-block">
				
<h5 style="color:red;"><?php //echo $this->Flash->render(); ?>   </h5>
 <?= $this->Form->create('User', array('url' => array('controller' => 'MyVoiceControl','action' =>'ComplaintDetailsPersonalNote',$id),'enctype'=>'multipart/form-data')); ?>

			<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>@$individual_accuser_details->id]); ?>
<?php echo $this->Form->control('user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_id]); ?>
<?php echo $this->Form->control('document_upload_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$time]); ?>

					<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="personal_notes">Notes</label>
<?php  echo $this->Form->control('note', ['label' =>false,'rows'=>'10','class'=>'form-control','id'=>'personal_notes','value'=>@$individual_user_detail_image->note]); ?>


                            </div>
                        </div>
                    </div>

                             <div class="row">
                        <div class="col-xs-6">
                            <label class="m-t-7">Enquiry Letter</label>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" class="btn btn-dark p-a-10" onclick="$('#chooseFile_0').click()">Upload File</button>
                            <input type="file" name="enquiry_letter" onclick="return showEnquiryList(0);"  class="hidden" id="chooseFile_0">
                        </div>
                    </div>

<!--                    <div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group" id="">
                                <?php foreach ($complaint_file as $complaint_file){
                                $get_enquiry = $complaint_file->enquiry_letter;
                                $filepath = '/myvoicev2/webroot/upload/'.$get_enquiry;
                                ?>
                                <li class="list-group-item border-none p-a-20">
                                    <div class="row">
                                        <div class="col-md-3 p-t-5"></div>
                                            <div class="col-md-6 p-t-5"></div>
                                                <div class="col-md-3" >
                                                <img src="<?php echo $filepath;?>">
                                                </div>
                                    </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>-->
                    <div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group" id="fileview">
                            </ul>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-6">
                            <label class="m-t-7">Acknowledgement</label>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" class="btn btn-dark p-a-10" onclick="$('#File_0').click()">Upload File</button>
                            <input type="file" name="acknow" onclick="return showAcknowList(0);" class="hidden" id="File_0">
                        </div>
						<?php foreach ($complaint_file as $ack_file){
                               echo $get_acknow = $ack_file->acknowledgement;
                                $filepath = '/myvoicev2/webroot/upload/'.$get_acknow;
                                ?>
								<?php echo $filepath;?>
								 <?php } ?>
                    </div>
<div class="row m-t-20">
                        <div class="col-xs-12">
                            <ul class="list-group" id="show_acknow">
                            </ul>
                        </div>
                    </div>
                   <br>
                    <div class="row">

                        <div class="col-xs-6">
                            <label class="m-t-7">Attachments</label>
                        </div>
                        <div class="col-xs-6 text-right">
                           <label class="btn btn-dark p-a-10" id="label-click_0" onclick="$('#chooseattchFile_0').click()">+ Choose File</label>
                               <input type="file" name="image[]"  onclick="return showImageList(0);" multiple="multiple" class="hidden" id="chooseattchFile_0" >
                        </div>
                    </div>

                   <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="fileview_attch">

                                </ul>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
<?php  echo $this->Form->button('Submit', ['label' =>false,'type'=>'submit','class'=>'btn btn-dark']); ?>

                        </div>
                    </div>
 <?= $this->Form->end() ?>
<!--                    <hr/>-->

                </div>
            </div>

			<?php } elseif($session_user_role== '4' ) { ?>

			  <div class="row panel-block-row p-t-20">
							 <?php				 foreach ($preciding_fetch as $individual_user_detail_image) {
                                               
                                            }  $cDate = "";
                                    if (!empty($individual_user_detail_image['created'])) {
                                        $cDate = date('d F Y', strtotime($individual_user_detail_image['created']));
                                    }

?>

											 <div class="col-md-2">
                                            <p class="p-t-5" style="padding-left:45px;"><?= $cDate; ?></p>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="fa-stack">
                                                <i class="fa fa-circle-thin fa-stack-2x opacity-50"></i>
                                                <i class="fa fa-circle fa-stack-1x opacity-50"></i>
                                            </span>
                                        </div>
                                        <div class="col-md-9">
                                                   <div class="col-md-3 ">
                                                    <label class="panel-block-label" style="padding-left:35px;">Attachment</label></div>

                                                    <div class="row supervisor-panel-block-row">
                                                      
                                                        <div class="col-md-8">
                                                            <?php
                                                            $link = "";
                                                            $root = $this->Url->build('/');
                                                            if (!empty($individual_user_detail_image['image'])) {
                                                                $images = explode(',', $individual_user_detail_image['image']);
                                                                foreach ($images as $k => $file) {
                                                                    $fileNameTmp = explode('.', $file);
                                                                    $ext = $fileNameTmp[count($fileNameTmp) - 1];
                                                                    $ext = strtolower($ext);
                                                                    if (in_array($ext, ['doc', 'jpg', 'mp3', 'mp4', 'pdf', 'png', 'ppt', 'rar', 'txt', 'wav', 'xls', 'xlsx', 'zip'])) {
                                                                        $icon = $this->Html->image('file-icon/' . $ext . '.png');
                                                                        //$icon = '<i class="fa fa-picture-o fa-2x" ></i>';
                                                                    } else {
                                                                        $icon = $this->Html->image('file-icon/blank.png');
                                                                        //$icon = '<i class="fa fa-file-o fa-2x" ></i>';
                                                                    }
                                                                    $link = '<a target="_blank" href="' . $root . 'upload/scribe/' . $file . '" class="btn btn-default status-active">' . $icon . '</a><br />';
                                                                    echo '<div class="col-md-2"><p>' . $link . '</p></div>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
												 </div>     


			       <div class="container-fluid">
                <div class="panel-block">

<h5 style="color:red;"><?php //echo $this->Flash->render(); ?>   </h5>
 <?= $this->Form->create('User', array('url' => array('controller' => 'MyVoiceControl','action' =>'ComplaintDetailsPersonalNote',$id),'enctype'=>'multipart/form-data')); ?>

			<?php echo $this->Form->control('complaint_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$individual_accuser_details->id]); ?>
<?php echo $this->Form->control('user_id', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$session_id]); ?>
<?php echo $this->Form->control('document_upload_date', ['label' =>false,'type'=>'hidden','class'=>'form-control','value'=>$time]); ?>

					<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="personal_notes">Notes</label>
<?php  echo $this->Form->control('note', ['label' =>false,'rows'=>'10','class'=>'form-control','id'=>'personal_notes','value'=>@$individual_user_detail_image->note]); ?>

                            </div>
                        </div>
                    </div>

                   <br>
                    <div class="row">

                        <div class="col-xs-6">
                            <label class="m-t-7">Attachments</label>
                        </div>
                        <div class="col-xs-6 text-right">
                           <label class="btn btn-dark p-a-10" id="label-click_0" onclick="$('#chooseattchFile_0').click()">+ Choose File</label>
                               <input type="file" name="image[]"  onclick="return showImageList(0);" multiple="multiple" class="hidden" id="chooseattchFile_0" >
                        </div>
                    </div>

                   <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="fileview_attch">

                                </ul>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
<?php  echo $this->Form->button('Submit', ['label' =>false,'type'=>'submit','class'=>'btn btn-dark']); ?>

                        </div>
                    </div>
 <?= $this->Form->end() ?>
<!--                    <hr/>-->

                </div>
            </div>
			<?php } else { } ?>


















        </div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

 <script>
 var counter = 1;
 function showEnquiryList(stid){
     var i = $('#fileview li').size() + 1;
     $('#chooseFile_'+stid).change(function(e){
            var fileName = e.target.files[0].name;
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
               '<div class="col-md-3 p-t-5">Uploaded on '+cdate+' th '+n+'</div>'+
               '<div class="col-md-3">'+
               '<button type="button" class="btn btn-default status-retracted" id="" onclick="remove('+stid+')">Delete</button>'+
               '</div>'+
               '</div>'+
               '</li></div>';

            jQuery('ul#fileview').html(html);
//            $('#label-click_'+stid).hide();
            i++;
            counter++;
            return false;

        });
 }

 function showAcknowList(stid){
     var i = $('#show_acknow li').size() + 1;
     $('#File_'+stid).change(function(e){
            var fileName = e.target.files[0].name;
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
                var html = '<div class="remove_'+stid+'" ><li class="list-group-item border-none p-a-20" id="row_'+stid+'">'+
               '<div class="row" name="_' + i +'">'+
               '<div class="col-md-3 p-t-5">'+ fileName +'</div>'+
               '<div class="col-md-3 p-t-5">Uploaded on '+cdate+' th '+n+'</div>'+
               '<div class="col-md-3">'+
               '<button type="button" class="btn btn-default status-retracted" id="" onclick="removelist('+stid+')">Delete</button>'+
               '</div>'+
               '</div>'+
               '</li></div>';

            jQuery('ul#show_acknow').html(html);
//            $('#label-click_'+stid).hide();
            i++;
            counter++;
            return false;

        });
 }


 </script>

<script type="text/javascript">
  //query for generating listing of selceted image for uploading
  var counter = 1;
    function showImageList(stid){
        var i = $('#fileview_attch li').size() + 1;
//        console.log(stid);
        $('#chooseattchFile_'+stid).change(function(e){
            var fileName = e.target.files[0].name;
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
               '<div class="col-md-3 p-t-5">Uploaded on '+cdate+' th '+n+'</div>'+
               '<div class="col-md-3">'+
               '<button type="button" class="btn btn-default status-retracted" id="" onclick="remove('+stid+')">Delete</button>'+
               '</div>'+
               '<div class="col-md-3"><label class="btn btn-dark p-a-10" id="label-click_'+counter+'" onclick="$(chooseattchFile_'+counter+').click()">+ Choose File</label>'+
               '<input type="file"  name="image[]" onclick="return showImageList('+counter+');" multiple="multiple" class="hidden" id="chooseattchFile_'+counter+'" ></div>'+
               '</div>'+
               '</li></div>';

            jQuery('ul#fileview_attch').append(html);
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

