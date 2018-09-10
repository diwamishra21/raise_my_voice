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
 * 
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
$session = $this->request->session();
$user_id=$session->read('userid');
        $user_detail=$this->Users->find()->where(['Users.complaint_id_status' => 1]);
          //$user_report_id= $user_detail['id'];
         $search=$this->request->data('search');
  $user_detail_search=$this->Users->find('all')->where(['Users.complaint_id' => $search])->orWhere(['Users.first_access' => $search]);
$this->set('user_detail_search', $user_detail_search);
$this->set('user_detail', $this->paginate($user_detail));
 $this->set(compact('user_id'));
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
$session = $this->request->session();
$user_id=$session->read('userid');
                 $this->loadModel('Users');
              $this->loadModel('Witns');
  $this->loadModel('Complaints');
	$this->viewBuilder()->layout('supervisor_layout');
   $logedin_user_detail=$this->Users->find()->where(['Users.id' => $user_id])->toArray();
        $individual_user_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
        $individual_user_detail_email=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $check_complaint_detail=$this->Complaints->find()->where(['Complaints.complaint_id' => $id]);
               $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
    if(!empty($check_complaint_detail)){
 
}
else {
 if ($this->request->is('post')) {
$user_id=$this->request->data('user_id');
$emp_id=$this->request->data('emp_id');
$user_type=$this->request->data('user_type');
$complaint_id=$this->request->data('complaint_id');
$status=$this->request->data('status');
$usersTable = TableRegistry::get("Complaints");
$usersdata = $usersTable->newEntity();
$usersdata->user_id = $user_id;
$usersdata->emp_id=$emp_id;
$usersdata->user_type=$user_type;
$usersdata->complaint_id=$complaint_id;
$usersdata->status=$status;

if ($usersTable->save($usersdata)) {

 $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsAccuser',$complaint_id]);

}
}

}

$this->set('individual_user_detail', $individual_user_detail);
 $this->set('witness_user_detail', $witness_user_detail);
$this->set(compact('logedin_user_detail','check_complaint_detail'));

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



if ($this->request->is('post')) {
$c_subject=$this->request->data('c_subject');
$severity=$this->request->data('severity');
$accusation = TableRegistry::get("Users");
$updateaccusation = $accusation->get($id);
$updateaccusation->c_subject = $c_subject;
$updateaccusation->severity = $severity;


if ($accusation->save($updateaccusation)) {
 $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsAccusationNature',$id]);
$this->Flash->success(__(' Category & Serverity   has been successfully Updated.'));

}


}


	
}


/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsWitness($id = null)
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
	 public function ComplaintDetailsPersonalNote($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
 $this->loadModel('Complaints');
             	$this->viewBuilder()->layout('supervisor_layout');
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
$update_notes=$this->Complaints->find()->where(['complaints.complaint_id' => $id])->toArray();
           
	

if ($this->request->is('post')) {
 $this->loadModel('Complaints');
$supervisor_personal_notes=$this->request->data('notes');
$complaint_id=$this->request->data('complaint_id');
$accusation = TableRegistry::get("Complaints");


$query = $accusation->query();
            $result = $query->update()
                    ->set(['Complaints.notes' => $supervisor_personal_notes])
                    ->where(['Complaints.complaint_id' => $complaint_id])
                    ->execute();
 

//pr($update_notes['notes']);die;

 $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsPersonalNote',$id]);
//$this->Flash->success(__(' Notes  has been successfully Updated.'));


}

    $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
 $this->set(compact('update_notes'));





}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsPanelFormation($id = null)
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
	 public function ComplaintDetailsSubmitForm($id = null)
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
