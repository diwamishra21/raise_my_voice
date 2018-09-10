<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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

	public function login()
    {
		$this->viewBuilder()->layout('layout');
		$this->loadModel('Users');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
				
				 $session = $this->request->session();
                $session->write('curUser', $this->Auth->user());
				$user_fetchrecord=$this->Users->find('all')->where(array('id' => $user['id']))->toArray();
				//pr($user_fetchrecord);
				//die;
				$this->redirecturlafterlogin();
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
	 $this->set(compact('user','user_fetchrecord'));
    }
	
	public function redirecturlafterlogin()
    {
		
		//$this->viewBuilder()->layout('');
		 $user = $this->Auth->user();
		 	$this->viewBuilder()->layout('layout');
			  $session = $this->request->session();
			  $sessionexpertprofile = $session->read('curUser');
			  $user_fetchrecord=$this->Users->find('all')->where(array('id' => $user['id']))->toArray();
			  $id=$user['id'];
		 return $this->redirect(['controller'=>'Users','action'=>'userprofile',$id]);
        
    }
	
	  public function logout()
    {
		 $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }
	
	 public function userprofile($id = null)
    {
	$this->viewBuilder()->layout('userlayout');
	 $user_deatil=$this->Users->find('all')->where(array('id' => $id))->toArray();
         
	  $this->set(compact('id','user_deatil'));
		}
	
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
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
    public function signup()
    {
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

	 public function add()
    {
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
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	
	

   
	
	
	
	
}
