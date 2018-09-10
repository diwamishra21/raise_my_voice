<?php
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

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupervisorController extends AppController
{
	  

  public function beforeFilter(Event $event)
    {
		$this->loadComponent('Flash');     
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
    }
	  public function index()
     {
		 $user = $this->Auth->user();
        //$this->set('users', $this->Users->find('all'));
    }

	
	 public function profiles()
    {
$session = $this->request->session();
$useremailid = $session->read('user_email');
                	$this->viewBuilder()->layout('backendlayout');
                  	 $user_profile_detail=$this->Users->find('all')->where(['Users.email' =>  $useremailid])->toArray();
         	  $this->set(compact('user_profile_detail'));
		}



/**     * After Supervisor  login it can search  user profile data from users table .
  */
	 public function dashboard()
    {
                 $this->loadModel('Users');
	$this->viewBuilder()->layout('backendlayout');
        $user_detail=$this->Users->find()->where(['Users.complaint_id_status' => 1]);
          //$user_report_id= $user_detail['id'];
         $search=$this->request->data('search');
  $user_detail_search=$this->Users->find('all')->where(['Users.complaint_id' => $search])->orWhere(['Users.first_access' => $search]);
$this->set('user_detail_search', $user_detail_search);
$this->set('user_detail', $this->paginate($user_detail));
		}


/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function reportsearch()
    {
                 $this->loadModel('Users');
	$this->viewBuilder()->layout('');
$search=$this->request->data('search');
               $user_detail_search=$this->Users->find('all')->where(['Users.complaint_id' => $search])
->orWhere(['Users.first_access' => $search]);
$this->set('user_detail_search', $this->paginate($user_detail_search));

 return $this->redirect(['controller'=>'Users','action'=>'reports',$search]);
		}
/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function complaintDetails($id = null)
    {
                 $this->loadModel('Users');
              $this->loadModel('Witns');
	$this->viewBuilder()->layout('supervisor_layout');
        $individual_user_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
        $individual_user_detail_email=$this->Users->find()->where(['Users.id' => $id])->toArray();
        //$individual_user_detail_emailid=$emailid;
        $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
//pr($witness_user_detail);die;
        $this->set('individual_user_detail', $individual_user_detail);
 $this->set('witness_user_detail', $witness_user_detail);
 


   if ($this->request->is('post')) {
$tablename = TableRegistry::get("Users");
$updatestatus = $tablename->get($id);
$updatestatus->status = 'Accept';

if ($tablename->save($updatestatus)) {
 $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsAccuser',$id]);

}
}


		}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsAccuser($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
             	$this->viewBuilder()->layout('supervisor_layout');
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
               $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
	
}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsAccusationNature($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
             	$this->viewBuilder()->layout('supervisor_layout');
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
               $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
	
}



}
