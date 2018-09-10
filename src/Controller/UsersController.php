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
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Mailer\Email;

// Sample SMTP configuration.

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        $this->loadComponent('Flash');
        $this->loadComponent('Summary');

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
    }

    public function index() {
        $user = $this->Auth->user();
        //$this->set('users', $this->Users->find('all'));
    }

    public function login() {
        $this->viewBuilder()->layout('layout');
        $this->loadModel('Users');
        if ($this->request->is('post')) {
            //$user = $this->Auth->identify();
            $user = $this->Auth->identify($this->request->data);
            if ($user) {
                $this->Auth->setUser($user);

                $session = $this->request->session();
                $session->write('curUser', $this->Auth->user());
                $user_fetchrecord = $this->Users->find('all')->where(array('id' => $user['id']))->toArray();
                $this->redirecturlafterlogin();
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set('Invalid Email Id or Password, try again.', [
                'element' => 'error'
            ]);
            //$login_error=$this->Flash->error(__('Invalid Email Id or Password, try again'));
        }
        $this->set(compact('user', 'user_fetchrecord'));
    }

    public function redirecturlafterlogin() {

        //$this->viewBuilder()->layout('');
        $user = $this->Auth->user();
        $session = $this->request->session();
        $user_fetchrecord = $this->Users->find('all')->where(array('id' => $user['id']))->toArray();
        $id = $user['id'];
        $user_email = $user['email'];
        $useremail = $session->write('user_email', $user_email);
        $user_role = $user['role'];
        if ($user_role != '1' || $user_role != '2' || $user_role != '3' || $user_role != '4' || $user_role != '5' || $user_role != '6' || $user_role != '7' || $user_role != '8' || $user_role != '9' || $user_role != '10') {
            if (preg_split("/[\s,]+/", $user['role'])) {
                $match_role = $user_role;
            }
        }

        switch ($user_role) {
            case 'Accuser':
                $this->viewBuilder()->layout('userlayout');
                $user_fetchrecord = $this->Users->find('all')->where(array('id' => $user['id']))->toArray();
                return $this->redirect(['controller' => 'Users', 'action' => 'userprofile', $id]);
                break;


            case '1':
                $session = $this->request->session();
                $userid = $session->write('userid', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'Users', 'action' => 'viewClient']);
                break;

            case '2':
                $session = $this->request->session();
                $userid = $session->write('userid', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'Users', 'action' => 'viewClient']);
                break;
            case '3':
                $session = $this->request->session();
                $userid = $session->write('userid', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'dashboard', $userid]);
                break;
            case '4':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '4');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;
            case '5':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '5');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;
            case '6':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '6');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case '7':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '7');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case '8':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '8');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case '9':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '9');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case '10':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '10');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case '11':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '11');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'dashboard', $id]);
                break;

            case '12':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '12');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case '13':
                $session = $this->request->session();
                $userrole = $session->write('user_role', '13');
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;

            case "$match_role":
                $explode_role = explode(",", $match_role);
//    $count = count($explode_role);
                // MultiLogin  feature 
                if (in_array(3, $explode_role) && in_array(7, $explode_role)) {
                    //var_dump($this->Auth->user('role'));
                    $auth_old = $this->Auth->identify();
                    $auth_old['multi_role'] = $auth_old['role'];
                    $auth_old['role'] = "3";
                    $this->Auth->setUser($auth_old);
                    //var_dump($this->Auth->user('role'));die;
                }

                $session = $this->request->session();
                $userrole = $session->write('user_role', $match_role);
                $userid = $session->write('user_id', $id);
                $this->viewBuilder()->layout('');
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $id]);
                break;
        }
    }

    public function logout() {
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    /**
     * After login user will show his profile data.
     */
    public function userprofile($id = null) {
        $this->viewBuilder()->layout('userlayout');
        $this->loadModel('Complaints');
        $this->loadModel('Users');
        $this->loadModel('images');
        $this->loadModel('Cstatus');
        $this->loadModel('accused');
        $session = $this->request->session();
        $useremailid = $session->read('user_email');

        $user_deatil = $this->Users->find('all')->where(array('id' => $id))->toArray();

//$user_complaint_deatil=$this->Users->find('all')->where(['Users.user_id' => $id,'Users.complaint_id_status' => '1'])->order(['id' => 'DESC'])->toArray();
        $connection = ConnectionManager::get('default');
        $sql = "select u.id,u.complaint_id,u.status,u.complaint_id_genrate_date,a.accused_name 
        from users u 
        left join accused a on u.id=a.complaint_id 
        where u.complaint_id <> '' and u.user_id='" . $id . "' order by u.id desc";
        $user_complaint_deatil = $connection->execute($sql)->fetchAll('assoc');
        $com_status_name = [];
        foreach ($user_complaint_deatil as $user_complaint_status) {
            $com_status = $user_complaint_status['status'];
            $user_complaint_deatil_sta = $this->Cstatus->find('all')->where(array('Cstatus.id' => $com_status))->toArray();

            foreach ($user_complaint_deatil_sta as $user_complaint_deatil_stas) {
                $com_status_name[] = $user_complaint_deatil_stas->name;
            }
        }

        $cstatusTable = TableRegistry::getTableLocator()->get('Cstatus');
        $query4 = $cstatusTable->find('all')
                ->where(['status' => 1]);

        $cstatusData = [];
        foreach ($query4 as $stts) {
            if (!empty($stts)) {
                $cstatusData[$stts->id] = $stts->name;
            }
        }












        //pr($com_status_name);die;
        $uid = $this->request->data('uid');
        $user_deatilid = $this->Users->find('all')->where(array('id' => $uid))->toArray();

        $user_complaint_superwisor_deatil = $this->Complaints->find('all')->where(array('Complaints.complaint_id' => $id))->toArray();

        $this->set(compact('id', 'cstatusData', 'com_status_name', 'users_status', 'user_deatil', 'user_deatil', 'user_deatilid', 'useremailid', 'user_complaint_deatil', 'user_complaint_superwisor_deatil', 'user_complaint_partculer_deatils'));
    }

    public function userComplaintDetails($userid = null) {

        $complaint_id = $userid;
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        $this->set(compact('complaint_id'));
        $this->loadModel('Witns');
        $this->viewBuilder()->layout('userlayout');
        $this->loadModel('images');
        $this->loadModel('accused');

//pr($user_complaint_partculer_deatil);die;
        $user_deatil = $this->Users->find('all')->where(array('id' => $userid))->toArray();
        $user_complaint_deatil = $this->Users->find('all')->where(array('Users.id' => $userid))->toArray();
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $userid])->toArray();

        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $userid]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $userid])->toArray();
        $this->set(compact('user_complaint_deatil', 'user_deatil', 'witness_user_detail', 'accused_detail', 'individual_user_detail_images'));
    }

    /**
     * After MyVoiceControl  login it can see  user profile data .
     */
    public function messages() {
        $this->viewBuilder()->layout('backendlayout');
        $user_detail = $this->Users->find('all')->toArray();

        $this->set(compact('id', 'user_detail'));
    }

    /**
     * After MyVoiceControl  login it can search  user profile data from users table .
     */
    public function profiles() {
        $session = $this->request->session();
        $useremailid = $session->read('user_email');
        $this->viewBuilder()->layout('backendlayout');
        $user_profile_detail = $this->Users->find('all')->where(['Users.email' => $useremailid])->toArray();
        $this->set(compact('user_profile_detail'));
    }

    /**
     * After MyVoiceControl  login it can search  user profile data from users table .
     */
    public function reportsearch() {
        $this->loadModel('Users');
        $this->viewBuilder()->layout('');
        $search = $this->request->data('search');
        $user_detail_search = $this->Users->find('all')->where(['Users.complaint_id' => $search])
                ->orWhere(['Users.first_access' => $search]);
        $this->set('user_detail_search', $this->paginate($user_detail_search));

        return $this->redirect(['controller' => 'Users', 'action' => 'reports', $search]);
    }

    /**
     * After MyVoiceControl  login it can search  user profile data from users table .
     */
    public function addUser() {
        $admin_bar = 3;
        $data = $this->getroles();
        $this->set('catdata', $data);
        $this->set(compact('admin_bar'));
        $this->loadModel('Users');
        $this->viewBuilder()->layout('admin_backend_layout');
        $a = (string) microtime();
        if ($this->request->is('post')) {
            $name = $this->request->data('name');
            $username = $this->request->data('email');
            $bu = $this->request->data('bu');
            $city = $this->request->data('city');
            $work_location = $this->request->data('work_location');
            $empid = $this->request->data('empid');
            $email = $this->request->data('email');
            $mobile = $this->request->data('mobile');
            $confirmed='1';
            $user_type='5';
            $password = $this->request->data('password');
            $pass = $this->request->data('password');
            $position = $this->request->data('position');
            $usersTable = TableRegistry::get('users');
            $usersdata = $usersTable->newEntity();

            $usersdata->work_location = $work_location;
            $usersdata->name = $name;
            $usersdata->username = $username;
            $usersdata->user_type = $user_type;
            $usersdata->role = $user_type;
            $usersdata->password = $password;
            $usersdata->pass = $pass;
            $usersdata->empid = $empid;
            $usersdata->email = $email;
            $usersdata->mobile = $mobile;
            $usersdata->bu = $bu;
            $usersdata->city = $city;
            $usersdata->position = $position;
            $usersdata->confirmed = $confirmed;

            if ($usersTable->save($usersdata)) {
                $id = $usersdata->id;
                $this->Flash->success(__('User  has been successfully saved.'));
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function signup() {
        $this->viewBuilder()->layout('');
        $this->loadModel('Users');
        $ip = $this->request->clientIp();
        $time = Time::now();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $name = $this->request->data('name');
            $user_email = $this->request->data('email');
            $pass = $this->request->data('pass');
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (!empty($user_email)) {
                if ($user->errors()) {
                    $email_error = "The email address you have entered is already registered";
                }
                //echo $email_error=$user['Users']['errors']; 
            }

            //$email_erro_message=$user []'email' "Your Email id already registered";
            if ($this->Users->save($user)) {

                $email = new Email();
                $email->viewVars(['name' => $name, 'user_email' => $user_email, 'pass' => $pass]);
                $email->from(['learning@quatrro.com' => 'MyVoice'])
                        ->to($user_email)
                        ->template('signupmail', 'mail')
                        ->emailFormat('html')
                        ->subject('Myvoice Registration')
                        ->send();


                //$email = new Email('default');
                //$email->from(['learning@quatrro.com' => 'MyVoice'])
                //->to($user_email)
                //->subject('Myvoice Registration')
                //->send("Hi $name, Thank You for Registration on MyVoice Please signin with below credential \n
                // Email Id - $user_email				  ");

                return $this->redirect(['action' => 'signupSuccess']);
            }
            $this->Flash->error(__('The user could not be registered Some thing error.'));
        }
        $this->set(compact('user', 'ip', 'time', 'email_error'));
    }

    public function signupSuccess() {
        $this->viewBuilder()->layout('');
    }

    public function add() {
        $this->viewBuilder()->layout('');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'userprofile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function registerConcern($id = null) {
        $date = date('Y-m-d');
        //query for counting total no of witness
        $count_witness_name = '';
        if (!empty($_POST['wi_name'])) {
            $count_witness_name = count($_POST['wi_name']);
        }
        //var_dump($_POST);
        //query for counting total no of accused
        $count_accused_name = '';
        if (!empty($_POST['accused_name'])) {
            $count_accused_name = count($this->request->data['accused_name']);
        }

        $data = $this->getcategory();
        $this->set('catdata', $data);

        //query for counting total no of files
        $count = '';
        if (!empty($_FILES)) {
            $count = count($_FILES['image']['name']);
        }

        $this->loadModel('Witns');
        $time1 = Time::now();
        $time = Time::now();
        $a = (string) microtime();
        //$this->viewBuilder()->layout('');
        $this->loadModel('Users');

        $individual_registered_user_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();

        if ($this->request->is('post')) {
            // pr($this->request->data);die;
            $c_title = $this->request->data['c_title'];
            $concern_regarding = $this->request->data['category_concern'];
            $other_issue = $this->request->data['category_concern_sub'];
            $colleague_complaint = $this->request->data['c_option'];
            $resolve_complaint = $this->request->data['c_tried_r_own'];
            $bu = $this->request->data('bu');
            $city = $this->request->data('city');
            $work_location = $this->request->data['work_location'];
            $name = $this->request->data('name');

            $user_type = $this->request->data('user_type');


            $empid = $this->request->data['empid'];
            $mail = $this->request->data('email');
            $emailid = $this->request->data('email');
            $mobile = $this->request->data('mobile');
            $notes = $this->request->data('notes');
            $concern_details = $this->request->data('concern_details');
            //$attach_data =$this->request->data('attach_data');
            //$attach_data_imploed=implode(",",$attach_data);


            $confirmed = $this->request->data('confirmed');
            $complaint_id_status = $this->request->data('complaint_id_status');
//            $complaint_id_genrate_date=$this->request->data('complaint_id_genrate_date');
            $complaint_id_genrate_date = $date;
            $status = $this->request->data('status');
            $usersTable = TableRegistry::get('users');
            $user_id = $this->request->data('user_id');
            $usersdata = $usersTable->newEntity();
            $usersdata->c_title = $c_title;
            $usersdata->c_subject = $concern_regarding;
            $usersdata->other_issue = $other_issue;
            $usersdata->c_option = $colleague_complaint;
            $usersdata->c_tried_r_own = $resolve_complaint;
            $usersdata->bu = $bu;
            $usersdata->city = $city;
            $usersdata->work_location = $work_location;
            $usersdata->name = $name;

            $usersdata->user_type = $user_type;

            $usersdata->empid = $empid;
            $usersdata->email = $mail;
            $usersdata->mobile = $mobile;
            $usersdata->notes = $notes;
            $usersdata->concern_details = $concern_details;
            //$usersdata->attach_data =$attach_data_imploed; 

            $complaint_id = "MV" . substr($a, 2, 4);
            $usersdata->complaint_id = $complaint_id;

            $usersdata->confirmed = $confirmed;
            $usersdata->status = $status;
            $usersdata->complaint_id_status = $complaint_id_status;

            $usersdata->complaint_id_genrate_date = $complaint_id_genrate_date;
            $usersdata->user_id = $user_id;
            if ($usersTable->save($usersdata)) {




                $id = $usersdata->id;
                //query for inserting images
                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        //get the temp file path
                        $temFilePath = $_FILES['image']['tmp_name'][$i];
                        //make sure you have file
                        if ($temFilePath != '') {
                            //set our new file path
                            $fileName[] = $_FILES['image']['name'][$i];
                            $files = time() . "_" . str_replace("", "_", $_FILES['image']['name'][$i]);
                            $newFilePath = WWW_ROOT . DS . 'upload' . DS . $files;
                            $imageTable = TableRegistry::get('images');
                            $imageData = $imageTable->newEntity();
                            if (move_uploaded_file($temFilePath, $newFilePath)) {
                                $imageData->user_id = $id;
                                $imageData->image = $files;
                                $imageTable->save($imageData);
                            }
                        }
                    }
                }

                //query for inserting witness data
                if ($count_witness_name > 0) {
                    for ($i = 0; $i < $count_witness_name; $i++) {
                        $witnessName = $_POST['wi_name'][$i];
                        $witnessBusiness = $_POST['wi_bu'][$i];
                        $witnessEmpid = $_POST['wi_empid'][$i];
                        $witnessLocation = $_POST['wi_location'][$i];
                        $witnessEmailid = $_POST['wi_email_id'][$i];
                        $witnessRelationship = $_POST['relationship'][$i];
                        $witnessCity = $_POST['wi_city'][$i];
                        $witnessPhone = $this->request->data['phone'][$i];
                        $witnessRemark = $this->request->data['remark'][$i];
                        $witnsTable = TableRegistry::get('witns');
                        $witns = $witnsTable->newEntity();

                        $witns->wi_name = (string) $witnessName;
                        $witns->wi_bu = (string) $witnessBusiness;
                        $witns->wi_city = (string) $witnessCity;
                        $witns->wi_location = (string) $witnessLocation;
                        $witns->wi_empid = (string) $witnessEmpid;
                        $witns->wi_email_id = (string) $witnessEmailid;
                        $witns->relationship = (string) $witnessRelationship;
                        $witns->user_id = $user_id;
                        $witns->user_complaint_id = $id;
                        $witns->phone = $witnessPhone;
                        $witns->remark = (string) $witnessRemark;
//                    
                        $witnsTable->save($witns);
                    }
                }


                //query for inserting accused data
                if ($count_accused_name > 0) {
                    for ($i = 0; $i < $count_accused_name; $i++) {
                        $accusedName = $this->request->data['accused_name'][$i];
                        $accusedBusiness = $this->request->data['accused_bu'][$i];
                        $accusedEmpid = $this->request->data['accused_empid'][$i];
                        $accusedLocation = $this->request->data['accused_location'][$i];
                        $accusedEmailid = $this->request->data['accused_email_id'][$i];
                        $accusedCity = $this->request->data['accused_city'][$i];
                        $accusedDept = $this->request->data['accused_dept'][$i];
                        $accusedTable = TableRegistry::get('accused');
                        $accused = $accusedTable->newEntity();

                        $accused->accused_name = (string) $accusedName;
                        $accused->accused_bu = (string) $accusedBusiness;
                        $accused->accused_city = (string) $accusedCity;
                        $accused->accused_location = (string) $accusedLocation;
                        $accused->accused_empid = (string) $accusedEmpid;
                        $accused->accused_email = (string) $accusedEmailid;
                        $accused->accused_dept = (string) $accusedDept;
                        $accused->user_id = $user_id;
                        $accused->complaint_id = $id;
                        $accusedTable->save($accused);
                    }
                }


                $tablename = TableRegistry::get("witns");
                $query = $tablename->query();
                $result = $query->update()
                        ->set(['witns.user_complaint_id' => $id, 'witns.user_id' => $user_id])
                        ->where(['witns.a_useremail' => $mail, 'witns.user_concern_details' => $concern_details])
                        ->execute();

                $newemail = new Email();
                $newemail->viewVars(['name' => $name, 'complaint_id' => $complaint_id]);
                $newemail->from(['learning@quatrro.com' => 'MyVoice'])
                        ->to($emailid)
                        ->template('complaint', 'mail')
                        ->emailFormat('html')
                        ->subject('Your complaint has been registered successfully')
                        ->send();





                return $this->redirect(['controller' => 'Users', 'action' => 'concern', 'complaint_id' => $complaint_id, 'id' => $id]);
            }
        }
        $this->set(compact('time1', 'complaint_id', 'complaint_id_data', 'individual_registered_user_detail', 'time', 'id'));
    }

    public function concern($id = null) {
        $this->loadModel('Users');
        //$complaint_id= $this->Users->get($id, [
        //'contain' => []
        //]);
        //$complaint_id1 = $this->Users->find('all', array('order'=> 'Users.id DESC' ));
    }

    public function changepassword($id = null) {
        $this->loadModel('Users');
        $this->viewBuilder()->layout('changepasswordlayout');

        if ($this->request->is('post')) {
            $this->loadModel('Users');
            $session = $this->request->session();
            $session_data = $session->read();
            $user_id = $session_data["Auth"]["User"]["id"];
            $this->viewBuilder()->layout('changepasswordlayout');
            if ($this->request->is('post')) {

                $password = $this->request->data['new_password'];
                $password1 = $this->request->data['new_password'];
                $hasher = new DefaultPasswordHasher();
                $password = $hasher->hash($password);
                $connection = ConnectionManager::get('default');
                $connection->update('users', ['password' => $password], ['id' => $user_id]);
                $connection->update('users', ['pass' => $password1], ['id' => $user_id]);
            }
        }
    }

    public function viewuser() {
        $admin_bar = 3;
        $this->viewBuilder()->layout('');
        $session = $this->request->session();
        $data = $this->getroles();
        $this->set('catdata', $data);
        $this->set(compact('admin_bar'));
        $conn = ConnectionManager::get('default');
        $sql = "select u.*, r.name as role from users as u left join roles as r on u.role = r.id where u.complaint_id is null and (u.confirmed = '1' or u.confirmed = '0') order by u.id desc";
        $user_detail = $conn->execute($sql)->fetchAll('assoc');
        $this->set(compact('user_detail'));

        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $user_details2 = $this->Users->find()->where(['Users.id' => $id]);
            echo(json_encode($user_details2));
            exit;
        }
    }

    public function viewuser1() {
        $this->viewBuilder()->layout('');
        $conn = ConnectionManager::get('default');
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $sql = "select u.*, r.name as role from users as u left join roles as r on u.role = r.id where u.id = '" . $id . "'";
            $user_details2 = $conn->execute($sql)->fetchAll('assoc');
            echo(json_encode($user_details2));
            exit;
        }
    }

    public function viewcategory() {
        $admin_bar = 2;
        $this->viewBuilder()->layout('');
        $category = ConnectionManager::get('default');
        $sql = "select c.*, cm.client_name as client_name, cm.client_type as type from category as c left join client_master as cm on c.client_id=cm.client_id";
        $query = $category->execute($sql)->fetchAll('assoc');
        $this->set('data', $query);
        $this->set(compact('admin_bar'));
    }

    public function updatecategory() {
        $this->autoRender = false;
        $id = $this->request->data('id');
        $status = $this->request->data('status');

        $connection = ConnectionManager::get('default');
        $sql = "UPDATE category SET status = '" . $status . "' WHERE id = '" . $id . "' ";
        $query = $connection->execute($sql);
//            $query = $connection->find('all')->where(['id' => $id]);
//            foreach($query as $query){
//                echo $query['name'];
//            }
//            exit;
//            $this->$query->save(['status'=>$status]);
//            exit;
//            $connection->update('category', ['status' => $status], ['id' => $id]);
    }

    public function addcategory() {
        // $data = $this->clientName();
        // $this->set('catdata',$data);
        $admin_bar = 2;
        $this->viewBuilder()->layout('');
        $this->set(compact('admin_bar'));
        if ($this->request->is('post')) {
            $sub_cat_id = '0';
            $name = $this->request->data('cat_name');
            $status = $this->request->data('cat_status');
            $client_id = $this->request->data('client_name');
            // pr($sub_cat_id);pr($name);pr($status);exit();
            $connection = ConnectionManager::get('default');
            $connection->insert('category', [
                'sub_cat_id' => $sub_cat_id, 'name' => $name, 'status' => $status, 'client_id' => $client_id]);
        }
    }

    public function addsubcategory() {
        $admin_bar = 2;
        $this->viewBuilder()->layout('');
        $data = $this->getcategory();
        $this->set('catdata', $data);
        $this->set(compact('admin_bar'));
        if ($this->request->is('post')) {
            $sub_cat_id = $this->request->data('cat_name');
            $client_id = $this->request->data('client_name');
            $name = $this->request->data('subcat_name');
            $status = $this->request->data('cat_status');
            // pr($sub_cat_id);pr($name);pr($status);exit();
            $connection = ConnectionManager::get('default');
            $connection->insert('category', [
                'sub_cat_id' => $sub_cat_id, 'client_id' => $client_id, 'name' => $name, 'status' => $status]);
        }
    }

    // public function updatestatus()
    // {
    //    if($this->request->is('ajax')){
    //        // $empid = $this->request->data('empid');
    //        // $user_details2=$this->Users->find()->where(['Users.empid' => $empid]);
    //        // echo(json_encode($user_details2));
    //        //  exit;
    //   }



    public function forgotpassword() {
        $this->viewBuilder()->layout('');
        $this->loadmodel('Users');
        if ($this->request->is('post')) {

            $user_email = $this->request->data('email');
            $connection = ConnectionManager::get('default');
            $sql = "select pass from users where   email = '" . $user_email . "' and complaint_id_status='0'  ";
            $pass1 = $connection->execute($sql)->fetchAll('assoc');
            $pass = $pass1[0]['pass'];

            if (empty($pass)) {

                $email_error = "Sorry, we don't have an account with that email  address. Try again? ";
                $this->set(compact('email_error'));
            }
            //echo $email_error=$user['Users']['errors']; 
            else {
                $email_success = "Please check your registerd email address for password Details";
                $this->set(compact('email_success'));
                $email = new Email();
                $email->viewVars(['user_email' => $user_email, 'pass' => $pass]);
                $email->from(['learning@quatrro.com' => 'MyVoice'])
                        ->to($user_email)
                        ->template('forgotpasswordmail', 'mail')
                        ->emailFormat('html')
                        ->subject('Forgot Password Details')
                        ->send();
            }
        }
    }

    public function updateuserdetails() {
        //if($this->request->is('ajax')){

        if ($this->request->is('post')) {
            $this->autoRender = false;
            $name = $this->request->data('report_up_name');
            $city = $this->request->data('report_up_city');
            $work_location = $this->request->data('report_up_loc');
            $empid = $this->request->data('report_up_empID');
            $email = $this->request->data('report_up_email');
            $bu = $this->request->data('report_up_bu');
            $username = $email;
            $mobile = $this->request->data('report_up_mobile');
            $position = $this->request->data('report_up_position');
            $id = $this->request->data('report_up_id');
            $tablename = TableRegistry::get("Users");

            //echo  $name;
            //die;

            $conditions = array('id' => $id);
            $fields = array('name' => $name, 'city' => $city, 'work_location' => $work_location, 'empid' => $empid, 'bu' => $bu, 'username' => $username, 'mobile' => $mobile, 'position' => $position, 'email' => $email);
            $tablename->updateAll($fields, $conditions);
            // $query = $tablename->query();
            //     $result = $query->update()
            //             ->set(['name' => $name])
            //             ->where(['empid' => $empid])
            //             ->execute();
        }
//}
    }

    private function getcategory() {
        $sub_id = 0;
        $category_table = TableRegistry::get("category");
        // $query = $category_table->find('all');
        $query = $category_table
                ->find()
                ->where(array('sub_cat_id =' => '0', 'status =' => '1'));

        //$data = $query->toArray();
        // $rtn=array();

        foreach ($query as $key => $value) {
            $rtn[$value['id']] = $value->toArray();
        }
        return $rtn;
        //$this/*->Anonymous*/->set('data',$data);
        //$this -> render('/Anonymous/anonymousconcern');
        // pr($data);
    }

    public function getSubcate() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $selected = $data['sel'];
            $sub_table = TableRegistry::get("category");
            $query = $sub_table->find('all')
                    // ->where(['category_id'=>$selected]);
                    ->where(array('sub_cat_id' => $selected, 'status =' => '1'));

            $html = '<option value="0" >Choose an option</option>';
            foreach ($query as $key => $value) {
                // pr($value);die;
                $html = $html . '<option value="' . $value->id . '" >' . $value->name . '</option>';
            }
            echo json_encode(array('html' => $html));
            die;
        } else {
            echo 'Invalid request';
            die;
        }
        //echo 'in';die;
    }

    public function clientName() {
        // $this->autoRender = false;
        $selected = $this->request->data('sel');
        $client_name = TableRegistry::get("client_master");
        // $query = $category_table->find('all');
        $query = $client_name->find()
                        ->where(array('client_type' => $selected, 'status =' => '1'))->toArray();

        $html = '<option value="0" > Select </option>';
        foreach ($query as $key => $value) {
            $html .= '<option value="' . $value->client_id . '" >' . $value->client_name . '</option>';
        }
        echo json_encode(array('html' => $html));
        die;
    }

    public function addClient() {
        $admin_bar = 1;
        $this->set(compact('admin_bar'));
        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $bu_id = $this->request->data('bu');
            $industry_id = $this->request->data('industry_id');
            $client_type = $this->request->data('client_type');
            $client_code = $this->request->data('client_code');
            $client_name = $this->request->data('client_name');
            $address1 = $this->request->data('address1');
            $address2 = $this->request->data('address2');
            $city = $this->request->data('city');
            $state = $this->request->data('state');
            $country = $this->request->data('country');
            $zip = $this->request->data('zip');
            $email = $this->request->data('email');
            $phone_no = $this->request->data('phone_no');
            $mobile_no = $this->request->data('mobile_no');
            $fax = $this->request->data('fax');
            $website = $this->request->data('website');
            $description = $this->request->data('description');
//           $logo = $this->request->data('logo');
            // $post_image = $_FILES['image']['logo'];
            // $post_image_temp =  $_FILES['image']['tmp_name'];
            $cp_name = $this->request->data('cp_name');
            $cp_email_id = $this->request->data('cp_email');
            $cp_mobile = $this->request->data('cp_mobile');
            $created_by = $this->request->data('created_by');
            $created_on = $this->request->data('created_on');
            $modified_by = $this->request->data('modify_by');
            $modified_on = $this->request->data('modify_on');
            $activation_date = $this->request->data('activation');
            $deactivation_date = $this->request->data('deactivation');
            $status = $this->request->data('status');
            $temFilePath = $_FILES['logo']['tmp_name'];
//           var_dump($_POST);
            if ($temFilePath != '') {
                $fileName = $_FILES['logo']['name'];
                $files = time() . "_" . str_replace("", "_", $_FILES['logo']['name']);
                $newFilePath = WWW_ROOT . DS . 'upload' . DS . $files;
                $imageTable = TableRegistry::get('client_master');
                $imageData = $imageTable->newEntity();
                if (move_uploaded_file($temFilePath, $newFilePath)) {

                    $imageData->bu_id = $bu_id;
                    $imageData->industry_id = $industry_id;
                    $imageData->client_type = $client_type;
                    $imageData->client_code = $client_code;
                    $imageData->client_name = $client_name;
                    $imageData->address1 = $address1;
                    $imageData->address2 = $address2;
                    $imageData->email_id = $email;
                    $imageData->city = $city;
                    $imageData->state = $state;
                    $imageData->country = $country;
                    $imageData->website = $website;
                    $imageData->fax = $fax;
                    $imageData->zip = $zip;
                    $imageData->phone = $phone_no;
                    $imageData->mobile = $mobile_no;
                    $imageData->created_by = $created_by;
                    $imageData->activation_date = $activation_date;
                    $imageData->deactivation_date = $deactivation_date;
                    $imageData->status = $status;
                    $imageData->cp_name = $cp_name;
                    $imageData->cp_email_id = $cp_email_id;
                    $imageData->cp_mobile = $cp_mobile;
                    $imageData->description = $description;
                    $imageData->logo = $files;
                    $imageTable->save($imageData);
                }
            }
        }
    }

    public function viewClient() {
        $admin_bar = 1;
        $this->viewBuilder()->layout('');
        $client_name = TableRegistry::get("client_master");
        $query = $client_name
                        ->find()->toArray();
        $this->set(compact('query', 'admin_bar'));


        if ($this->request->is('ajax')) {
            $clientid = $this->request->data('client_id');
            $client_details = TableRegistry::get("client_master");
            // $query = $category_table->find('all');
            $query = $client_details
                            ->find()
                            ->where(array('client_id =' => $clientid))->toArray();

            echo(json_encode($query));
            exit;
        }
    }

    public function updateclientdetails() {


        $type = $this->request->data('clienttype');
        $name = $this->request->data('clientname');
        $email = $this->request->data('clientemail');
        $address = $this->request->data('clientaddress');
        $state = $this->request->data('clientstate');
        $city = $this->request->data('clientcity');
        $clientid = $this->request->data('clientid');
        $tablename = TableRegistry::get("client_master");

        $conditions = array('client_id' => $clientid);
        $fields = array('client_type' => $type, 'client_name' => $name, 'city' => $city, 'address1' => $address, 'state' => $state, 'email_id' => $email);
        $tablename->updateAll($fields, $conditions);
    }

    public function getroles() {

        $this->viewbuilder()->layout('');

        $roles = TableRegistry::get("roles");
        // $query = $category_table->find('all');
        $query = $roles->find();
        foreach ($query as $key => $value) {
            $rtn[$value['id']] = $value->toArray();
        }
        return $rtn;
    }

    function team() {
        $role = $this->Auth->user('role');
        $admin_bar = 4;
        if (!in_array($role, [1, 2])) {
            return $this->redirect('/');
        }

        $teamTable = TableRegistry::get("team");
        if ($this->request->is('post')) {
            $requestData = $this->request->data;

            $users = $requestData['user_id'];
            if (!empty($users) && (!empty($requestData['category_id'])) && (!empty($requestData['role_id']))) {
                foreach ($users as $user) {
                    //Check first
                    $query0 = $teamTable->find('all')
                            ->where(['category_id' => $requestData['category_id'], 'user_id' => $user]);
                    if (!empty($query0->first())) {
                        // Show alert here
                        return $this->redirect($this->referer());
                    }
                    $teamEntity = $teamTable->newEntity();
                    $teamEntity->category_id = $requestData['category_id'];
                    $teamEntity->role_id = $requestData['role_id'];
                    $teamEntity->user_id = $user;
                    $teamTable->save($teamEntity);
                }
            }
        }

        $roles = TableRegistry::get("roles");
        $category_table = TableRegistry::get("category");
        $userTable = TableRegistry::get("users");
        $roleData = [];
        $categoryData = [];
        $userData = [];
        $teamData = [];

        $allowed_category = [1, 4, 7];
        $notallowed_role = [1, 2, 14];




        $query = $roles->find('all')
                ->where(['status' => 1]);
        foreach ($query as $key => $value) {
            if (!empty($value)) {
                if (!in_array($value->id, $notallowed_role)) {
                    $roleData[] = $value->toArray();
                }
            }
        }

        $query2 = $category_table->find('all')
                ->where(['id IN' => $allowed_category, 'status' => 1]);
        foreach ($query2 as $key => $value) {
            if (!empty($value)) {

                $categoryData[] = $value->toArray();
            }
        }
        $query3 = $userTable->find('all', ['fields' => ['id', 'name']])
                ->where(['role IN' => range(3, 20)]);
        foreach ($query3 as $key => $value) {
            if (!empty($value)) {
                $userData[] = $value->toArray();
            }
        }
        $this->set(compact('roleData', 'categoryData', 'userData'));

        $query4 = $teamTable->find('all')
                ->contain(['Users', 'Roles', 'Category']);
        foreach ($query4 as $key => $value) {
            if (!empty($value)) {
                $category = $value['category']['name'];
                $role = $value['role']['name'];
                if (empty($teamData[$category][$role])) {
                    $teamData[$category][$role]['id'] = $value['id'];
                    $teamData[$category][$role]['text'] = $value['user']['name'] . " <b>(" . $value['user']['empid'] . ")</b>";
                } else {
                    //$teamData[$category][$role]['id']=$value['id'];
                    $teamData[$category][$role]['text'] = $teamData[$category][$role]['text'] . ', ' . $value['user']['name'] . " <b>(" . $value['user']['empid'] . ")</b>";
                }
            }
        }
        //pr($teamData);die;
        $this->set(compact('roleData', 'categoryData', 'userData', 'teamData', 'admin_bar'));
    }

    function teamEdit($team_id) {
        $role = $this->Auth->user('role');
        $admin_bar = 4;
        if (!in_array($role, [1, 2])) {
            return $this->redirect('/');
        }

        $teamTable = TableRegistry::get("team");
        if ($this->request->is('post')) {
            $requestData = $this->request->data;
            if (!empty($requestData['category_id']) && !empty($requestData['role_id'])) {
                $teamTable->removeBulk($requestData['category_id'], $requestData['role_id']);
            }
            if (!empty($requestData['user_id'])) {
                foreach ($requestData['user_id'] as $user) {
                    $team = $teamTable->newEntity();
                    $team->category_id = $requestData['category_id'];
                    $team->role_id = $requestData['role_id'];
                    $team->user_id = $user;
                    $teamTable->save($team);
                }
            }
            $this->redirect(['action' => 'team']);
        }

        $roles = TableRegistry::get("roles");
        $category_table = TableRegistry::get("category");
        $userTable = TableRegistry::get("users");
        $roleData = [];
        $categoryData = [];
        $userData = [];
//        $teamData = [];
//
        $allowed_category = [1, 4, 7];
        $notallowed_role = [1, 2, 14];
//
//

        $selCategory = null;
        $selRole = null;
        $selUsers = [];
        $query = $teamTable->find('all')
                ->where(['id' => $team_id]);
        foreach ($query as $key => $value) {
            if (!empty($value)) {
                $selCategory = $value->category_id;
                $selRole = $value->role_id;
            }
        }

        $query0 = $teamTable->find('all')
                ->where(['category_id' => $selCategory, 'role_id' => $selRole]);
        foreach ($query0 as $key => $value) {
            if (!empty($value)) {
                $teamData[] = $value->toArray();
                $selUsers[] = $value->user_id;
            }
        }

        $query2 = $category_table->find('all')
                ->where(['id IN' => $allowed_category, 'status' => 1]);
        foreach ($query2 as $key => $value) {
            if (!empty($value)) {

                $categoryData[] = $value->toArray();
            }
        }

        $query11 = $roles->find('all')
                ->where(['status' => 1]);
        foreach ($query11 as $key => $value) {
            if (!empty($value)) {
                if (!in_array($value->id, $notallowed_role)) {
                    $roleData[] = $value->toArray();
                }
            }
        }
        $query3 = $userTable->find('all', ['fields' => ['id', 'name']])
                ->where(['role IN' => range(3, 20)]);
        foreach ($query3 as $key => $value) {
            if (!empty($value)) {
                $userData[] = $value->toArray();
            }
        }
//        pr($selUsers);
//        pr($userData);die;

        $this->set(compact('categoryData', 'selCategory', 'selRole', 'roleData', 'selUsers', 'userData'));
    }

    function teamDelete($team_id) {
        $role = $this->Auth->user('role');
        $admin_bar = 4;
        if (!in_array($role, [1, 2])) {
            return $this->redirect('/');
        }
        $selCategory = null;
        $selRole = null;
        $teamTable = TableRegistry::get("team");
        $query = $teamTable->find('all')
                ->where(['id' => $team_id]);
        foreach ($query as $key => $value) {
            if (!empty($value)) {
                $selCategory = $value->category_id;
                $selRole = $value->role_id;
            }
        }
        if (!empty($selRole) && ($selCategory)) {
            $teamTable->removeBulk($selCategory, $selRole);
        }
        $this->redirect(['action' => 'team']);
    }

    public function deleteuser()
 {

  if($this->request->is('ajax'))
  {
    $this->autoRender = false;
    $id = $this->request->data('id');
    $connection = ConnectionManager::get('default');
    $connection->delete('users', ['id' => $id]);

  }

 }

 public function enableuser()
 {
  $this->autoRender = false;
   $id = $this->request->data('id');
   $confirmed = $this->request->data('confirmed');
    $connection = ConnectionManager::get('default');
    $connection->update('users',['confirmed' => $confirmed], ['id' => $id]);

 }
 public function disableuser()
 {
  $this->autoRender = false;
   $id = $this->request->data('id');
   $confirmed = $this->request->data('confirmed');
    $connection = ConnectionManager::get('default');
    $connection->update('users',['confirmed' => $confirmed], ['id' => $id]);

 }

}
