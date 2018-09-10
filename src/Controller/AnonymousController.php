<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
 
namespace App\Controller;
ob_start();
use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Request;
use Cake\View\Form\EntityContext;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\NotFoundException;
use Cake\Mailer\Email;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AnonymousController extends AppController
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['getSubcate']);
		//$this->viewBuilder()->layout('layout');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }
    
    
	
	 public function anonymousConfirmation()
    {
		$this->loadModel('Users');
	$this->viewBuilder()->layout('');
		$ip =  $this->request->clientIp();
		$time = Time::now();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
				$authuser=
                $this->Flash->success(__('The user has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user','ip','time'));
		}
	
	 public function witns()
    {
			//$this->loadModel('Witns');
 if ($this->request->is('post')) {
$wi_name=$this->request->data['witness_name'];
$wi_bu=$this->request->data('witness_bu');
$wi_city=$this->request->data['witness_city'];
$wi_location=$this->request->data('witness_work');
$wi_empid=$this->request->data('witness_emp_id');
$wi_email_id=$this->request->data('witness_email');
$a_useremail=$this->request->data('a_useremail');
$relationship=$this->request->data('witness_relation');
$witnsTable = TableRegistry::get('witns');
$witns = $witnsTable->newEntity();

$witns->wi_name  =$wi_name ;
$witns->wi_bu = $wi_bu;
$witns->wi_city = $wi_city;
$witns->wi_location =$wi_location; 
$witns->wi_empid =$wi_empid; 
$witns->wi_email_id =$wi_email_id; 
$witns->a_useremail =$a_useremail; 
$witns->relationship =$relationship; 

//pr($this->request->getData());
if ($witnsTable->save($witns)) {

return $this->redirect([ 'controller'=>'Anonymous','action' => 'anonymousConcern']);
   }
 	}
exit;
	}
	 



    public function anonymousConcern(){
           $date = date('Y-m-d');
           $data = $this->getcategory();
           $this->set('catdata',$data);
//           $_POST['g-recaptcha-response'];
//            var_dump($_FILES);exit;
           //query for counting total no of witness 
            $user_id = '';
            $count_witness_name = '';
            if(!empty($_POST['wi_name'])){
            $count_witness_name = count($this->request->data['wi_name']);
            }
            
            //query for counting total number of accused
            $count_accused_name = '';
            if(!empty($_POST['accused_name'])){
            $count_accused_name = count($this->request->data['accused_name']);
            }
            //query for counting total no of files
            $count = '';
            if(!empty($_FILES)){
            $count = count($_FILES['image']['name']);
            }
            $this->loadModel('Witns');
            $this->loadModel('accused');
                            //$this->viewBuilder()->layout('anonymouslayout');
            $time1 = Time::now();
            $time = Time::now();
            $a = (string) microtime();
             if ($this->request->is('post')) {
            //pr($this->request->data);die;
            $c_title=$this->request->data['c_title'];
            $concern_regarding=$this->request->data['category_concern'];
            $other_issue=$this->request->data['category_concern_sub'];
            $colleague_complaint=$this->request->data['c_option'];
            $resolve_complaint=$this->request->data['c_tried_r_own'];
            $bu=$this->request->data('bu');
            $city=$this->request->data('city');
            $work_location=$this->request->data['work_location'];
            $name=$this->request->data('name');
            $username=$this->request->data('name');
            $user_type=$this->request->data('user_type');
            //$password=$this->request->data['password'];
            //$pass=$this->request->data['pass'];
            $empid=$this->request->data['empid'];
			   $emailid=$this->request->data('email');
            $email=$this->request->data('email');
            $mobile=$this->request->data('mobile');
            $notes=$this->request->data('notes');
            $concern_details=$this->request->data('concern_details');
//            $attach_data =$this->request->data('attach_data');
//            $attach_data_imploed=implode(",",$attach_data);

            $first_access=$time;
            $confirmed=$this->request->data('confirmed');
            $complaint_id_status=$this->request->data('complaint_id_status');
//            $complaint_id_genrate_date=$this->request->data('complaint_id_genrate_date');
            $complaint_id_genrate_date = $date;
            
            $role=$this->request->data('role');
            $status=$this->request->data('status');
            $usersTable = TableRegistry::get('users');
            $usersdata = $usersTable->newEntity();
            $usersdata->c_title  =$c_title ;
            $usersdata->c_subject = $concern_regarding;
            $usersdata->other_issue = $other_issue;
            $usersdata->c_option =$colleague_complaint; 
            $usersdata->c_tried_r_own =$resolve_complaint; 
            $usersdata->bu =$bu; 
            $usersdata->city =$city; 
            $usersdata->work_location  =$work_location ;
            $usersdata->name = $name;
            $usersdata->username = $username;
            $usersdata->user_type = $user_type;
            //$usersdata->password = $password;
            //$usersdata->pass = $pass;
            $usersdata->empid = $empid;
            $usersdata->email =$email; 
            $usersdata->mobile =$mobile; 
            $usersdata->notes =$notes; 
            $usersdata->concern_details =$concern_details; 
//            $usersdata->attach_data =$attach_data_imploed; 

            $complaint_id = "MV" . substr($a, 2, 4);
            $usersdata->complaint_id =$complaint_id; 
            $usersdata->first_access =$first_access; 
            $usersdata->confirmed =$confirmed; 
            $usersdata->status =$status; 
            $usersdata->complaint_id_status =$complaint_id_status;

            $usersdata->complaint_id_genrate_date =$complaint_id_genrate_date;
            $usersdata->role =$role;

if ($usersTable->save($usersdata)) {

                  //$email = new Email();
                       //$email->viewVars(['name' => $name,'complaint_id'=>$complaint_id]);
                    //$email->from(['learning@quatrro.com' => 'MyVoice'])
                  //->to($emailid)
				  //->template('complaint', 'mail')
				  //->emailFormat('html')
                  //->subject('Your complaint has been registered successfully')
				  //->send();

             $id = $usersdata->id;
//             var_dump($id);exit;
             //query for inserting images
                if($count > 0){
                    for($i=0; $i<$count; $i++){
                        //get the temp file path
                        $temFilePath = $_FILES['image']['tmp_name'][$i];
        //                echo $temFilePath;
                        //make sure you have file
                        if($temFilePath != ''){
                            //set our new file path
                            $fileName[] = $_FILES['image']['name'][$i];
                            $files = time()."_".str_replace("", "_", $_FILES['image']['name'][$i]);
                            $newFilePath = WWW_ROOT.DS.'upload'.DS.$files;
                            $imageTable = TableRegistry::get('images');
                            $imageData = $imageTable->newEntity();
                            if(move_uploaded_file($temFilePath, $newFilePath)){
                               $imageData->user_id  = $id ;
                               $imageData->image    = $files ;
                               $imageTable->save($imageData);
                            }
                        }
                    }
               }
               
               
                //query for inserting witness data
                if($count_witness_name > 0){
                for($i=0; $i<$count_witness_name; $i++){
                    $witnessName = $this->request->data['wi_name'][$i];
                    $witnessBusiness = $this->request->data['wi_bu'][$i];
                    $witnessEmpid = $this->request->data['wi_empid'][$i];
                    $witnessLocation = $this->request->data['wi_location'][$i];
                    $witnessEmailid = $this->request->data['wi_email_id'][$i];
                    $witnessRelationship = $this->request->data['relationship'][$i];
                    $witnessCity = $this->request->data['wi_city'][$i];
                    $witnessPhone = $this->request->data['phone'][$i];
                    $witnessRemark = $this->request->data['remark'][$i];
                    $witnsTable = TableRegistry::get('witns');
                    $witns = $witnsTable->newEntity();
                    
                    $witns->wi_name  = (string)$witnessName ;
                    $witns->wi_bu = (string)$witnessBusiness;
                    $witns->wi_city = (string)$witnessCity;
                    $witns->wi_location = (string)$witnessLocation; 
                    $witns->wi_empid = (string)$witnessEmpid; 
                    $witns->wi_email_id = (string)$witnessEmailid; 
                    $witns->relationship = (string)$witnessRelationship;
                    $witns->user_id = $user_id;
                    $witns->user_complaint_id = $id;
                    $witns->phone = $witnessPhone;
                    $witns->remark = (string)$witnessRemark;
//                    
                    $witnsTable->save($witns);
                }
            }
            
            //query for inserting accused data
                if($count_accused_name > 0){
                for($i=0; $i<$count_accused_name; $i++){
                    $accusedName = $this->request->data['accused_name'][$i];
                    $accusedBusiness = $this->request->data['accused_bu'][$i];
                    $accusedEmpid = $this->request->data['accused_empid'][$i];
                    $accusedLocation = $this->request->data['accused_location'][$i];
                    $accusedEmailid = $this->request->data['accused_email_id'][$i];
                    $accusedCity = $this->request->data['accused_city'][$i];
                    $accusedDept = $this->request->data['accused_dept'][$i];
                    $accusedTable = TableRegistry::get('accused');
                    $accused = $accusedTable->newEntity();
                    
                    $accused->accused_name  = (string)$accusedName ;
                    $accused->accused_bu = (string)$accusedBusiness;
                    $accused->accused_city = (string)$accusedCity;
                    $accused->accused_location = (string)$accusedLocation; 
                    $accused->accused_empid = (string)$accusedEmpid; 
                    $accused->accused_email = (string)$accusedEmailid; 
                    $accused->accused_dept = (string)$accusedDept;
                    $accused->user_id = $user_id;
                    $accused->complaint_id = $id;
//                    
                    $accusedTable->save($accused);
                }
            }

            $tablename = TableRegistry::get("Witns");
            $query = $tablename->query();
                        $result = $query->update()
                                ->set(['user_id' => $id])
                                ->where(['Witns.a_useremail' => $email])
                                ->execute();
                 
     // $category_table = TableRegistry::get("categories");
     // $query = $category_table->find('all');
     // $category = $query->toArray();
     // $this->set('category',$category);



            //pr( $result);die;
            $accused_table = TableRegistry::get("accused");
            $accused_query = $accused_table->query();
                             $update_accused = $accused_query->update()
                             ->set(['accused.user_id' => $id])
                             ->where(['accused.user_email' => $email])
                             ->execute();
	 	 
	   }
           

    //query to get data from category table   
       return $this->redirect([ 'controller'=>'Anonymous','action' => 'concern','complaint_id'=>$complaint_id,'id'=>$id]);

        $this->set(compact('time1','complaint_id','complaint_id_data','id'));
            //pr($this->request->getData());
             }
}        
		 public function concern()
    {
		$this->loadModel('Users');
		 //$complaint_id= $this->Users->get($id, [
            //'contain' => []
        //]);
		//$complaint_id1 = $this->Users->find('all', array('order'=> 'Users.id DESC' ));

       
	}
		
   private function getcategory()
   {
     $sub_id=0;
     $category_table = TableRegistry::get("category");
     // $query = $category_table->find('all');
     $query = $category_table
    ->find()
    ->where(array('sub_cat_id =' => '0','status =' =>'1'));

     
     //$data = $query->toArray();
     // $rtn=array();

     foreach ($query as $key => $value) {
        $rtn[$value['id']]=$value->toArray();
        }
     return $rtn;
     //$this/*->Anonymous*/->set('data',$data);
     //$this -> render('/Anonymous/anonymousconcern');
     //pr($rtn);
    
   }

   public function getSubcate(){
    if($this->request->is('post')){
        $data=$this->request->data;
        $selected=$data['sel'];
        $sub_table = TableRegistry::get("category");
        $query = $sub_table->find('all')
                // ->where(['category_id'=>$selected]);
                -> where(array('sub_cat_id' => $selected,'status =' => '1'));

        $html='<option value="0" >Choose an option</option>';
        foreach ($query as $key => $value) {
           // pr($value);die;
            $html=$html.'<option value="'.$value->id.'" >'.$value->name.'</option>';
        }
        echo json_encode(array('html'=>$html));die; 
    } else{
        echo 'Invalid request';die;
    }
    //echo 'in';die;
   }




}
