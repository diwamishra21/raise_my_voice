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


class HrController extends AppController {

	public function beforeFilter(Event $event){
		$this->loadComponent('Flash');     
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
    }

    public function dashboard(){

    	$this->viewBuilder()->layout('hr_layout');
    }

    //query goes here for controlling the statistics view and fulling its requirements
    public function statistics(){
        // $count_data = array();
        $totalCase = $this->Hr->getTotalCases();
        $totalHarassment = $this->Hr->getTotalHarassmentCase();
        $totalBusinessEthics = $this->Hr->getTotalBusinessEthics();
        $toatlDisiplinary = $this->Hr->getTotalDisiplinary();
        $city = $this->Hr->getCities();
        $this->viewBuilder()->layout('hr_layout');
        $this->set(compact('totalCase', 'totalHarassment', 'totalBusinessEthics', 'toatlDisiplinary', 'city'));
    }

    public function reports(){

        $this->viewBuilder()->layout('hr_layout');
    }

    public function employeeRecords(){

        $this->viewBuilder()->layout('hr_layout');
    }

    public function profile(){

        $this->viewBuilder()->layout('hr_layout');
    }

    public function caseDetails(){

        $this->viewBuilder()->layout('hr_layout');
    }

    public function statisticsSearch(){
        if($this->request->is('ajax')){
            $city = $this->request->data();
            var_dump($city);exit;
            $getHarssmentCase = $this->Hr->getTotalHarassmentCase($city);
            $getBusinessEthics = $this->Hr->getTotalBusinessEthics($city);
            $getDisiplinary = $this->Hr->getTotalBusinessEthics($city);
            var_dump($getHarssmentCase);
            var_dump($getBusinessEthics);
            var_dump($getDisiplinary);
        }
    }
}


?>