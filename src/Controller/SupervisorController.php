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
        $this->Auth->allow(['getSubcate']);
    }
	  public function index()
     {
		 $user = $this->Auth->user();
        //$this->set('users', $this->Users->find('all'));
    }

	
	 public function profiles()
    {
$this->loadModel('Users');
$session = $this->request->session();
$useremailid = $session->read('user_email');
                	$this->viewBuilder()->layout('backendlayout');
                  	 $user_profile_detail=$this->Users->find('all')->where(['Users.email' =>  $useremailid])->toArray();
         	  $this->set(compact('user_profile_detail'));
		}



/**     * After Supervisor  login it can search  user profile data from users table .
  */
	 public function dashboard(){
                $this->loadModel('Users');
                $this->loadModel('Complaints');
  $this->loadModel('accused');
                $this->viewBuilder()->layout('backendlayout');
                $session = $this->request->session();
                $user_id=$session->read('userid');
                $user_detail=$this->Users->find('all')
        ->order(['Users.id' => 'DESC'])
        ->contain([
            'accused'
        ])->toArray();
//pr($user_detail);die;
        
                

               
                $this->set(compact('user_id','compalit_accept_id','user_detail'));

             
                $data = $this->getcategory();
                $this->loadModel('Hr');
                $city = $this->Hr->getCities();
//                var_dump($data);exit;
//                $this->set('catdata',$data);

        }


/**
         * After Supervisor  login it can search  user profile data from users table .
  */
        //query for multiple search
	 public function report(){
            $complaintId  = isset($_POST['complaint_id']) ? $this->request->data('complaint_id') : '';
            $category     = isset($_POST['category']) ? $this->request->data('category') : '';
            $subcategory  = isset($_POST['subCategory']) ? $this->request->data('subCategory') : '';
            $severity     = isset($_POST['severity']) ? $this->request->data('severity') : '';
            $sahar        = isset($_POST['city']) ? $this->request->data('city') : '';
            $from    = isset($_POST['from']) ? $this->request->data('from') : '';
            $to     = isset($_POST['to_date']) ? $this->request->data('to_date') : '';
            
            if($to){
              $to = date("d/m/Y", strtotime($to));
            }
            if($from){
               $from = date("d/m/Y", strtotime($from));
            }
            
            
            $data = $this->getcategory();
                    $this->loadModel('Hr');
            $city = $this->Hr->getCities();
            
            $connection = ConnectionManager::get('default');
            
            $sql ="SELECT users.*,accused_name FROM users LEFT JOIN accused ON users.id=accused.complaint_id";
            
            $where = " WHERE";
            
            $condition = "";
            
            if($complaintId){
                $condition .=" users.complaint_id LIKE '%".$complaintId."%' AND";
            }
            
            if($category){
                $condition .=" users.c_subject='".$category."' AND";
            }
            
            if($subcategory){
                $condition .=" users.other_issue='".$subcategory."' AND";
            }
            
            if($severity){
                $condition .=" users.severity='".$severity."' AND";
            }
            
            if($sahar){
                $condition .=" users.city='".$sahar."' AND";
            }
            
            if($from && $to){
                $condition .=" users.complaint_id_genrate_date BETWEEN '".$from."' AND '".$to."' AND";
            }
            
            if($condition){
                $whereCondition = "";
                $whereCondition = rtrim($where.$condition, "AND");
                $sql .= $whereCondition;
            }
            
           $sql.=" order by users.id desc";
            
            $result =  $connection->execute($sql)->fetchAll('assoc');
            $this->viewBuilder()->layout('backendlayout');
            $this->set(compact('data','city','result','complaintId','category','subcategory','severity','sahar','from','to'));
 
	}
/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function complaintDetails($id = null)
    {
$time = Time::now();
$session = $this->request->session();
$user_id=$session->read('userid');
                 $this->loadModel('Users');
              $this->loadModel('Witns');
  $this->loadModel('Complaints');
$this->loadModel('accused');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
	$this->viewBuilder()->layout('supervisor_layout');
   $logedin_user_detail=$this->Users->find()->where(['Users.id' => $user_id])->toArray();
        $individual_user_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
       

 $record_exist=$this->Complaints->find()->where(['Complaints.complaint_id' => $id]);
               $witness_user_detail=$this->Witns->find()->where(['Witns.user_complaint_id' => $id]);
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_complaint_id' => $id]);
 $accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
//pr($witness_accused_detail);die;
    
 if ($this->request->is('post')) {
$user_id=$this->request->data('user_id');
$emp_id=$this->request->data('emp_id');
$user_type=$this->request->data('user_type');
$complaint_id=$this->request->data('complaint_id');
$status=$this->request->data('status');
$superwisor_complaint_accept_date=$this->request->data('superwisor_complaint_accept_date');
$usersTable = TableRegistry::get("Complaints");
$usersdata = $usersTable->newEntity();
$usersdata->user_id = $user_id;
$usersdata->emp_id=$emp_id;
$usersdata->user_type=$user_type;
$usersdata->complaint_id=$complaint_id;
$usersdata->status=$status;
$usersdata->superwisor_complaint_accept_date=$superwisor_complaint_accept_date;

if ($usersTable->save($usersdata)) {

$accusation = TableRegistry::get("users");
$query = $accusation->query();
            $result = $query->update()
                    ->set(['users.status' => $status])
                    ->where(['users.id' => $complaint_id])
                    ->execute();
 $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsAccuser',$complaint_id]);
}
}
$this->set('individual_user_detail', $individual_user_detail);
 $this->set('witness_user_detail', $witness_user_detail);
$this->set(compact('logedin_user_detail','record_exist','time','accused_detail','individual_user_detail_images'));

		}

/**
         * After Supervisor  login it can search  user profile data from users table .
  */
	 public function complaintIdReject($id = null)
    {
$time = Time::now();
$session = $this->request->session();
$user_id=$session->read('userid');
                 $this->loadModel('Users');
             
  $this->loadModel('Complaints');
	//$this->viewBuilder()->layout('supervisor_layout');
   $logedin_user_detail=$this->Users->find()->where(['Users.id' => $user_id])->toArray();
        $individual_user_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
        $individual_user_detail_email=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $record_exist=$this->Complaints->find()->where(['Complaints.complaint_id' => $id]);
             
    
 if ($this->request->is('post')) {
$user_id=$this->request->data('user_id');
$emp_id=$this->request->data('emp_id');
$user_type=$this->request->data('user_type');
$complaint_id=$this->request->data('complaint_id');
$status=$this->request->data('status');
$notes=$this->request->data('notes');
$superwisor_complaint_accept_date=$this->request->data('superwisor_complaint_accept_date');
$usersTable = TableRegistry::get("Complaints");
$usersdata = $usersTable->newEntity();
$usersdata->user_id = $user_id;
$usersdata->emp_id=$emp_id;
$usersdata->user_type=$user_type;
$usersdata->complaint_id=$complaint_id;
$usersdata->status=$status;
$usersdata->notes=$notes;
$usersdata->superwisor_complaint_accept_date=$superwisor_complaint_accept_date;

if ($usersTable->save($usersdata)) {

$accusation = TableRegistry::get("users");
$query = $accusation->query();
            $result = $query->update()
                    ->set(['users.status' => $status,'users.complaint_id_rejection' =>$notes])
                    ->where(['users.id' => $complaint_id])
                    ->execute();
 return $this->redirect(['controller'=>'Supervisor','action'=>'dashboard']);
}

return $this->redirect(['controller'=>'Supervisor','action'=>'dashboard']);
}
$this->set('individual_user_detail', $individual_user_detail);
 
$this->set(compact('logedin_user_detail','record_exist','time'));
exit;
		}




/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsAccuser($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
             	$this->viewBuilder()->layout('backendlayout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
 $accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
               $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
$this->set(compact('accused_detail','individual_user_detail_images'));
	
}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsAccusationNature($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
$this->set(compact('accused_detail','individual_user_detail_images'));
               $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
$data=$this->getcategory();
$this->set('catdata',$data); 

if ($this->request->is('post')) {
$c_subject=$this->request->data('category_concern');
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


	 public function ComplaintDetailsWitness($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
$this->set(compact('accused_detail','individual_user_detail_images'));
               $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
}
public function ComplaintDetailsRespondent($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
$this->set(compact('accused_detail','individual_user_detail_images'));
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
$this->loadModel('accused');
 $this->loadModel('Complaints');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
//$cid=$individual_accuser_detail['id'];
//pr($id);die;
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
//$update_notes=$this->Complaints->find()->where(['complaints.complaint_id' => $id])->toArray();
           
	$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
$this->set(compact('accused_detail','individual_user_detail_images'));

if ($this->request->is('post')) {
  $this->loadModel('Users');
$supervisor_personal_notes=$this->request->data('complaint_id_rejection');
$id=$this->request->data('id');
$accusation = TableRegistry::get("users");

$query = $accusation->query();
            $result = $query->update()
                    ->set(['complaint_id_rejection' => $supervisor_personal_notes])
                    ->where(['Users.id' => $id])
                    ->execute();


$accusations = TableRegistry::get("complaints");

$querys = $accusations->query();
            $results = $querys->update()
                    ->set(['complaints.notes' => $supervisor_personal_notes])
                    ->where(['complaints.complaint_id' => $id])
                    ->execute();

  $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsPersonalNote',$id]);


}
    $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
 //$this->set(compact());





}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsPanelFormation($id = null)
    {
$session = $this->request->session();
$user_id=$session->read('userid');
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
 $this->loadModel('Panels');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
 $logedin_user_detail=$this->Users->find()->where(['Users.id' => $user_id])->toArray();
$complaint_panel_user_detail=$this->Panels->find()->where(['Panels.complaint_user_id' => $id,'Panels.supervisor_id'=>$user_id])->toArray();
//pr($logedin_user_detail);die;
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
               $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
 $this->set(compact('logedin_user_detail','complaint_panel_user_detail','accused_detail','individual_user_detail_images'));

	
if ($this->request->is('post')) {
$supervisor_id=$this->request->data('supervisor_id');
$role=$this->request->data('role');
$supervisor_name=$this->request->data('supervisor_name');
$complaint_user_id=$this->request->data('complaint_user_id');


$p_name=$this->request->data('p_name');
$p_email=$this->request->data('p_email');
$p_empid=$this->request->data('p_empid');
$p_scribe=$this->request->data('p_scribe');



$accusation = TableRegistry::get("Panels");

$updateaccusation = $accusation->newEntity();
$updateaccusation->supervisor_id= $supervisor_id;
$updateaccusation->role=$role;
$updateaccusation->supervisor_name=$supervisor_name;
$updateaccusation->complaint_user_id=$complaint_user_id;
$updateaccusation->p_name=$p_name;
$updateaccusation->p_email=$p_email;
$updateaccusation->p_empid=$p_empid;
$updateaccusation->p_scribe=$p_scribe;


if ($accusation->save($updateaccusation)) {
 $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsPanelFormation',$complaint_user_id]);
//$this->Flash->success(__(' Category & Serverity   has been successfully Updated.'));
 }}


}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsSubmitForm($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
 $this->set(compact('accused_detail','individual_user_detail_images'));

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
  $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsPersonalNote',$id]);
}
        $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
	
}

/**
         * After Supervisor  Accept Complaint then it can see accuser details.
  */
	 public function ComplaintDetailsCloseCase($id = null)
    {
                 $this->loadModel('Users');
                 $this->loadModel('Witns');
$this->loadModel('accused');
             	$this->viewBuilder()->layout('supervisor_layout');
$this->loadModel('images');
 $individual_user_detail_images=$this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail=$this->Users->find()->where(['Users.id' => $id])->toArray();
 $witness_user_detail=$this->Witns->find()->where(['Witns.user_id' => $id]);
$accused_detail=$this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
 $this->set(compact('accused_detail','individual_user_detail_images'));

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
  $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsPersonalNote',$id]);
}
        $this->set('individual_accuser_detail', $individual_accuser_detail);
$this->set('witness_user_detail', $witness_user_detail);
	
}






/**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($panel_id = null , $id = null )
    {
 $this->loadModel('Panels');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Panels->get($panel_id);
        if ($this->Panels->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Supervisor','action'=>'ComplaintDetailsPanelFormation',$id]);
    }


        public function getcategory(){
            $category_table = TableRegistry::get("categories");
            $query = $category_table->find('all');
     
            //$data = $query->toArray();
            $rtn=array();
            foreach ($query as $key => $value) {
               $rtn[$value['category_id']]=$value->toArray();
               }
            return $rtn;
        }

   public function getSubcate(){
    if($this->request->is('post')){
        $data=$this->request->data;
        $selected=$data['sel'];
        $sub_table = TableRegistry::get("sub_category_concern");
        $query = $sub_table->find('all')
                ->where(['category_id'=>$selected]);
        $html='<option value="0" >Select</option>';
        foreach ($query as $key => $value) {
            $html.='<option value="'.$value->id.'" >'.$value->name.'</option>';
        }
        echo json_encode(array('html'=>$html));die; 
    }else{
        echo 'Invalid request';die;
    }
    //echo 'in';die;
   }
 
}
