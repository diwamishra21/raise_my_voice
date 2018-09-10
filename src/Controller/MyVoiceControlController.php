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
use Cake\Mailer\Email;

//require 'vendor/autoload.php';
require_once(ROOT . DS . 'vendor' . DS . 'autoload.php');

use Dompdf\Dompdf;

// Sample Mail configuration
//Email::configTransport('default', [
//    'className' => 'Mail'
//]);

/**
 * 
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MyVoiceControlController extends AppController {

    public function beforeFilter(Event $event) {
        $this->loadComponent('Flash');
        $this->loadComponent('Summary');

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
        $this->Auth->allow(['getSubcate']);
    }

    public function index() {
        $user = $this->Auth->user();
        //$this->set('users', $this->Users->find('all'));
    }

    public function profiles() {
        $active = 2;
        $this->loadModel('Users');
        $session = $this->request->session();
        $useremailid = $session->read('user_email');
        $this->viewBuilder()->layout('manager_layout');
        $user_profile_detail = $this->Users->find('all')->where(['Users.email' => $useremailid])->toArray();
        $this->set(compact('user_profile_detail', 'active'));
    }

    public function dashboard() {
        // $count_data = array();
        $this->loadModel('Hr');
        $year = '';
        if ($this->request->is('post')) {
            $year = $this->request->data['yearpicker'];
        }
        if (trim($year) === 'all') {
            $year = '';
        }
        $totalCase = $this->Hr->getTotalCases($year);
        $totalHarassment = $this->Hr->getTotalHarassmentCase($year);
        $totalBusinessEthics = $this->Hr->getTotalBusinessEthics($year);
        $toatlDisiplinary = $this->Hr->getTotalDisiplinary($year);
//        $city = $this->Hr->getCities($year);
        $highSeverity = $this->Hr->getHighSeverity($year);
        $mediumSeverity = $this->Hr->getMediumSeverity($year);
        $lowSeverity = $this->Hr->getLowSeverity($year);
        $severity = [];
        $arr = [$highSeverity, $mediumSeverity, $lowSeverity];
        rsort($arr);
        $arrlength = count($arr);
        for ($x = 0; $x < $arrlength; $x++) {
            $severity[] = $arr[$x];
        }
        if (!empty($severity)) {
            $severity = json_encode($severity);
        }
//        $cityHarassmentcase = $this->Hr->getHarassmentCityCase($year);
//        $cityEthicscase = $this->Hr->getEtcicsCityCase($year);
//        $cityDisciplinarycase = $this->Hr->getDisciplinaryCityCase($year);
//        $getHarassmentThaneCase = $this->Hr->getHarassmentThaneCase($year);
//        $getEtcicsThaneCase = $this->Hr->getEtcicsThaneCase($year);
//        $getDisciplinaryThaneCase = $this->Hr->getDisciplinaryThaneCase($year);
//        $getHarassmentChennaiCase = $this->Hr->getHarassmentChennaiCase($year);
//        $getEtcicsChennaiCase = $this->Hr->getEtcicsChennaiCase($year);
//        $getDisciplinaryChennaiCase = $this->Hr->getDisciplinaryChennaiCase($year);
        $totalAccepted = $this->Hr->geTotalAccepted($year);
        $totalRejected = $this->Hr->geTotalRejected($year);
        $totalPending = $this->Hr->geTotalPending($year);
        $totalClosed = $this->Hr->geTotalClosed($year);
        $countOthers = $this->Hr->countOthers($year);
        $getAugustHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '08', $case_type = '1');
        $getAugustEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '08', $case_type = '4');
        $getAugustDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '08', $case_type = '7');
        $getJanuaryHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '01', $case_type = '1');
        $getJanuaryEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '01', $case_type = '4');
        $getJanuaryDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '01', $case_type = '7');
        $getFebruaryHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '02', $case_type = '1');
        $getFebruaryEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '02', $case_type = '4');
        $getFebruaryDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '02', $case_type = '7');
        $getMarchHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '03', $case_type = '1');
        $getMarchEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '03', $case_type = '4');
        $getMarchDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '03', $case_type = '7');
        $getAprilHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '04', $case_type = '1');
        $getAprilEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '04', $case_type = '4');
        $getAprilDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '04', $case_type = '7');
        $getMayHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '05', $case_type = '1');
        $getMayEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '05', $case_type = '4');
        $getMayDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '05', $case_type = '7');
        $getJuneHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '06', $case_type = '1');
        $getJuneEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '06', $case_type = '4');
        $getJuneDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '06', $case_type = '7');
        $getJulyHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '07', $case_type = '1');
        $getJulyEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '07', $case_type = '4');
        $getJulyDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '07', $case_type = '7');
        $getSeptemberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '09', $case_type = '1');
        $getSeptemberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '09', $case_type = '4');
        $getSeptemberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '09', $case_type = '7');
        $getOctuberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '1');
        $getOctuberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '4');
        $getOctuberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '7');
        $getNovemberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '1');
        $getNovemberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '4');
        $getNovemberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '7');
        $getDecemberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '1');
        $getDecemberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '4');
        $getDecemberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '7');
        $getOtherJanuaryCase = $this->Hr->getTotalMonthCase($year, $month = '1', $case_type = '20');
        $getOtherFebruaryCase = $this->Hr->getTotalMonthCase($year, $month = '2', $case_type = '20');
        $getOtherMarchCase = $this->Hr->getTotalMonthCase($year, $month = '3', $case_type = '20');
        $getOtherAprilCase = $this->Hr->getTotalMonthCase($year, $month = '4', $case_type = '20');
        $getOtherMayCase = $this->Hr->getTotalMonthCase($year, $month = '5', $case_type = '20');
        $getOtherJuneCase = $this->Hr->getTotalMonthCase($year, $month = '6', $case_type = '20');
        $getOtherJulyCase = $this->Hr->getTotalMonthCase($year, $month = '7', $case_type = '20');
        $getOtherAugustCase = $this->Hr->getTotalMonthCase($year, $month = '8', $case_type = '20');
        $getOtherSeptemberCase = $this->Hr->getTotalMonthCase($year, $month = '9', $case_type = '20');
        $getOtherOctuberCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '20');
        $getOtherNovemberCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '20');
        $getOtherDecemberCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '20');
        $getHarassFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 1);
        $getEthicFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 4);
        $getDiscplinaryFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 7);
        $getOtherFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 20);
        $getHarassAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 1);
        $getEthicAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 4);
        $getDiscplinaryAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 7);
        $getOtherAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 20);
        $getHarassRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 3, $category = 1);
        $getEthicRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 3, $category = 4);
        $getDiscplinaryRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 3, $category = 7);
        $getOtherRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 3, $category = 20);
        $getHarassNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 1);
        $getEthicNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 4);
        $getDiscplinaryNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 7);
        $getOtherNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 20);
        $getHarassPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 1);
        $getEthicPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 4);
        $getDiscplinaryPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 7);
        $getOtherPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 20);
        $getHarassInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 1);
        $getEthicInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 4);
        $getDiscplinaryInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 7);
        $getOtherInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 20);
        $getHarassRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 1);
        $getEthicRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 4);
        $getDiscplinaryRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 7);
        $getOtherRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 20);
        $getHarassRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 1);
        $getEthicRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 4);
        $getDiscplinaryRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 7);
        $getOtherRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 20);
        $getHarassIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 1);
        $getEthicIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 4);
        $getDiscplinaryIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 7);
        $getOtherIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 20);
        $getHarassICloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 1);
        $getEthicICloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 4);
        $getDiscplinaryICloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 7);
        $getOtherCloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 20);
        $getHarassIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 1);
        $getEthicIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 4);
        $getDiscplinaryIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 7);
        $getOtherIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 20);
        $getHarassIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 1);
        $getEthicIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 4);
        $getDiscplinaryIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 7);
        $getOtherIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 20);
        $getHarassIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 1);
        $getEthicIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 4);
        $getDiscplinaryIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 7);
        $getOtherIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 20);
        $getHarassIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 1);
        $getEthicIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 4);
        $getDiscplinaryIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 7);
        $getOtherIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 20);
        $getHarassClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 1);
        $getEthicClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 4);
        $getDiscplinaryClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 7);
        $getOtherClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 20);
        //code to get total work location
//        $getWorkLocation = $this->Hr->getWorkLocation();
        $harassGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'Gurgaon');
        $ethicGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'Gurgaon');
        $displinaryGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'Gurgaon');
        $otherGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'Gurgaon');
        $harassThane = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'Thane');
        $ethicThane = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'Thane');
        $displinaryThane = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'Thane');
        $otherThane = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'Thane');
        $harassChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'Chennai');
        $ethicChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'Chennai');
        $displinaryChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'Chennai');
        $otherChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'Chennai');
        $harassUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'USA');
        $ethicUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'USA');
        $displinaryUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'USA');
        $otherUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'USA');


        $harss_month = ["$getJanuaryHarasmentCase", "$getFebruaryHarasmentCase", "$getMarchHarasmentCase",
            "$getAprilHarasmentCase", "$getMayHarasmentCase", "$getJuneHarasmentCase",
            "$getJulyHarasmentCase", "$getAugustHarasmentCase", "$getSeptemberHarasmentCase",
            "$getOctuberHarasmentCase", "$getNovemberHarasmentCase", "$getDecemberHarasmentCase"];
        $ethic_month = ["$getJanuaryEthicsCase", "$getFebruaryEthicsCase", "$getMarchEthicsCase",
            "$getAprilEthicsCase", "$getMayEthicsCase", "$getJuneEthicsCase",
            "$getJulyEthicsCase", "$getAugustEthicsCase", "$getSeptemberEthicsCase",
            "$getOctuberEthicsCase", "$getNovemberEthicsCase", "$getDecemberEthicsCase"];
        $displ_month = ["$getJanuaryDisciplinaryCase", "$getFebruaryDisciplinaryCase", "$getMarchDisciplinaryCase",
            "$getAprilDisciplinaryCase", "$getMayDisciplinaryCase", "$getJuneDisciplinaryCase",
            "$getJulyDisciplinaryCase", "$getAugustDisciplinaryCase", "$getSeptemberDisciplinaryCase",
            "$getOctuberDisciplinaryCase", "$getNovemberDisciplinaryCase", "$getDecemberDisciplinaryCase"];
        $other_month = ["$getOtherJanuaryCase", "$getOtherFebruaryCase", "$getOtherMarchCase",
            "$getOtherAprilCase", "$getOtherMayCase", "$getOtherJuneCase",
            "$getOtherJulyCase", "$getOtherAugustCase", "$getOtherSeptemberCase",
            "$getOtherOctuberCase", "$getOtherNovemberCase", "$getOtherDecemberCase"];


        if (!empty($harss_month)) {
            $harss_month = json_encode($harss_month);
        }
        if (!empty($ethic_month)) {
            $ethic_month = json_encode($ethic_month);
        }
        if (!empty($displ_month)) {
            $displ_month = json_encode($displ_month);
        }
        if (!empty($other_month)) {
            $other_month = json_encode($other_month);
        }

        $category_table = TableRegistry::get("category");
        $where_id = array(1, 4, 7, 20);
        $category_id = [];
        $query = $category_table->find()
                        ->where(array('id IN' => $where_id, 'status' => '1'))->toArray();
        foreach ($query as $cat) {
            if (!empty($cat)) {
                $category_id[] = $cat->name;
            }
        }
        if (!empty($category_id)) {
            $category_id = json_encode($category_id);
        }

        $cstatus_table = TableRegistry::get("cstatus");
        $cquery = $cstatus_table->find('all')->where(array('status' => '1', 'id <>' => '16'))->toArray();
        $filed = $cquery[0]['name'];
        $caseaccepted = $cquery[1]['name'];
        $caserejected = $cquery[2]['name'];
        $notApplicable = $cquery[3]['name'];
        $panelAssigned = $cquery[4]['name'];
        $inqLettIssued = $cquery[5]['name'];
        $respondentpending = $cquery[6]['name'];
        $respondentreceived = $cquery[7]['name'];
        $investigationProgress = $cquery[8]['name'];
        $investigationClosed = $cquery[9]['name'];
        $inqReportProgress = $cquery[10]['name'];
        $inqReportClosed = $cquery[11]['name'];
        $implRecomProgress = $cquery[12]['name'];
        $implRecomClosed = $cquery[13]['name'];
        $Closed = $cquery[14]['name'];
//        pr($cquery);exit;
//        $cstatus_name = [];
//        foreach($cquery as $status){
//            if(!empty($status)){
//                $cstatus_name[] = $status['name'];
//            }
//        }
//        if(!empty($cstatus_name)){
//            $cstatus_name = json_encode($cstatus_name);
//        }
//        $city = $this->Hr->getCities();
//        $city_data = [];
//        foreach($city as $sahar){
//            if(!empty($sahar)){
//                $city_data[]= $sahar->city;
//            }
//        }
//        if(!empty($city_data)){
//            $city_data = json_encode($city_data);
//        }
//        pr($city_data);exit;
//        $connection = ConnectionManager::get('default');
//        $sql = "SELECT COUNT(id) FROM users "
//        $this->viewBuilder()->layout('manager_layout');
//        $this->set(compact('cityHarassmentcase','cityEthicscase','cityDisciplinarycase','getHarassmentThaneCase','getEtcicsThaneCase','getDisciplinaryThaneCase',
//                'getHarassmentChennaiCase','getHarassmentChennaiCase','getEtcicsChennaiCase','getDisciplinaryChennaiCase','city_data'));
        $this->set(compact('totalCase', 'totalHarassment', 'totalBusinessEthics', 'toatlDisiplinary', 'severity', 'totalAccepted', 'totalRejected', 'totalPending', 'totalClosed', 'cstatus_name', 'year', 'highSeverity', 'mediumSeverity', 'lowSeverity', 'harss_month', 'ethic_month', 'displ_month', 'other_month', 'category_id', 'countOthers'));
        //the data below are used in fifth graph staus graph
        $this->set(compact('filed', 'caseaccepted', 'caserejected', 'notApplicable', 'panelAssigned', 'inqLettIssued', 'respondentpending', 'respondentreceived', 'investigationProgress', 'investigationClosed', 'inqReportProgress', 'inqReportProgress', 'inqReportClosed', 'implRecomProgress', 'implRecomClosed', 'Closed', 'getHarassFiledCase', 'getEthicFiledCase', 'getDiscplinaryFiledCase', 'getOtherFiledCase', 'getHarassAcceptedCase', 'getEthicAcceptedCase', 'getDiscplinaryAcceptedCase', 'getOtherAcceptedCase', 'getHarassRejectedCase', 'getEthicRejectedCase', 'getDiscplinaryRejectedCase', 'getOtherRejectedCase', 'getHarassNotApplicableCase', 'getEthicNotApplicableCase', 'getDiscplinaryNotApplicableCase', 'getOtherNotApplicableCase', 'getHarassPanelAssignedCase', 'getEthicPanelAssignedCase', 'getDiscplinaryPanelAssignedCase', 'getOtherPanelAssignedCase', 'getHarassInqLettIssuedCase', 'getEthicInqLettIssuedCase', 'getDiscplinaryInqLettIssuedCase', 'getOtherInqLettIssuedCase', 'getHarassRRPendingCase', 'getEthicRRPendingCase', 'getDiscplinaryRRPendingCase', 'getOtherRRPendingCase', 'getHarassRRReceivedCase', 'getEthicRRReceivedCase', 'getDiscplinaryRRReceivedCase', 'getOtherRRReceivedCase', 'getHarassIIProgressCase', 'getEthicIIProgressCase', 'getDiscplinaryIIProgressCase', 'getOtherIIProgressCase', 'getHarassICloseCase', 'getEthicICloseCase', 'getDiscplinaryICloseCase', 'getOtherCloseCase', 'getHarassIRIProgressCase', 'getEthicIRIProgressCase', 'getDiscplinaryIRIProgressCase', 'getOtherIRIProgressCase', 'getHarassIRClosedCase', 'getEthicIRClosedCase', 'getDiscplinaryIRClosedCase', 'getOtherIRClosedCase', 'getHarassIORIProgressCase', 'getEthicIORIProgressCase', 'getDiscplinaryIORIProgressCase', 'getOtherIORIProgressCase', 'getHarassIORIClosedCase', 'getEthicIORIClosedCase', 'getDiscplinaryIORIClosedCase', 'getOtherIORIClosedCase', 'getHarassClosedCase', 'getEthicClosedCase', 'getDiscplinaryClosedCase', 'getOtherClosedCase'));
        //data for sending for sixth garph
        $this->set(compact('harassGurgaon', 'ethicGurgaon', 'displinaryGurgaon', 'otherGurgaon', 'harassThane', 'ethicThane', 'displinaryThane', 'otherThane', 'harassChennai', 'ethicChennai', 'displinaryChennai', 'otherChennai', 'harassUSA', 'ethicUSA', 'displinaryUSA', 'otherUSA'));
    }

    public function statisticsSearch() {
        if ($this->request->is('ajax')) {
            $city = $this->request->data();
            // var_dump($city);exit;
            $getHarssmentCase = $this->MyVoiceControl->getTotalHarassmentCase($city);
            $getBusinessEthics = $this->MyVoiceControl->getTotalBusinessEthics($city);
            $getDisiplinary = $this->MyVoiceControl->getTotalBusinessEthics($city);
            // var_dump($getHarssmentCase);
            // var_dump($getBusinessEthics);
            // var_dump($getDisiplinary);
        }
    }

    public function sendusernotification($id = null) {
        $time = Time::now();

        $connection = ConnectionManager::get('default');


//$sql="SELECT c.assign_email,c.assigned_role,c.assign_status,c.assigned_to,c.assigned_to,c.superwisor_complaint_accept_date,c.enquiry_letter,c.complaint_id FROM  complaints as c   where    c.assign_email IS NOT NULL AND c.superwisor_complaint_accept_date BETWEEN CURDATE() - INTERVAL 8 DAY
        //AND CURDATE() - INTERVAL 7 DAY and c.assigned_role IN (3,7,8,9,10) and c.assign_status='1'  and c.enquiry_letter IS NULL OR c.enquiry_letter = ''     group by c.complaint_id order by c.id desc ";


        $sql = "SELECT c.assign_email,c.assigned_role,c.assign_status,c.assigned_to,c.assigned_to,c.superwisor_complaint_accept_date,c.enquiry_letter,c.complaint_id FROM complaints as c where c.assign_email IS NOT NULL AND c.superwisor_complaint_accept_date BETWEEN CURDATE() - INTERVAL 8 DAY AND CURDATE() - INTERVAL 7 DAY and c.assigned_role IN (3,7,8,9,10) and c.assign_status='1' and c.enquiry_letter IS NULL OR c.enquiry_letter = '' group by c.complaint_id order by c.id desc";


        $result = $connection->execute($sql)->fetchAll('assoc');
        $assigned_email = [];
        foreach ($result as $assign_email) {
            $assigned_email[] = $assign_email['assign_email'] . " ,";
            $complaint_id = $assign_email['complaint_id'];
            $sql2 = "insert into tats(inquiry_letter_issued,user_id,complaint_id,date) value('0','" . $assign_email['assigned_to'] . "','" . $assign_email['complaint_id'] . "','" . $time . "') ";
            $result2 = $connection->execute($sql2);
        }
        $mail = implode('', $assigned_email);
        $usermailid1 = rtrim($mail, ",");
        echo $usermailid = trim($usermailid1);

        $email = new Email();
        //$email->viewVars(['name' => $name,'user_email'=>$user_email,'pass'=>$pass]);
        $email->from(['learning@quatrro.com' => 'MyVoice'])
                ->to($usermailid)
                ->emailFormat('html')
                ->subject('Enquiry letter reminder notification')
                ->send('Please Upload Enquiry letter against this Complaint Id $complaint_id ');
        exit;
    }

    public function senduseracknowledgementnotification($id = null) {
        $time = Time::now();
        $connection = ConnectionManager::get('default');
        //$sql="SELECT c.assign_email,c.assign_status,c.assigned_to,c.assigned_to,c.superwisor_complaint_accept_date,c.enquiry_letter,c.complaint_id FROM  complaints as c   where c.assign_status='1' and c.enquiry_letter IS NULL OR c.enquiry_letter = ''  and DATE(c.superwisor_complaint_accept_date) < DATE_SUB(CURDATE(), INTERVAL 1 DAY) group by c.complaint_id order by c.id desc";
        //$sql="SELECT c.assign_email,c.assigned_role,c.assign_status,c.assigned_to,c.assigned_to,c.superwisor_complaint_accept_date,c.enquiry_letter,c.complaint_id FROM  complaints as c   where    c.assign_email IS NOT NULL and  DATE(c.superwisor_complaint_accept_date) < DATE_SUB(CURDATE(), INTERVAL 2 DAY) and c.assigned_role IN (7,8,9,10) and c.assign_status='1'  and c.enquiry_letter IS NULL OR c.enquiry_letter = ''     group by c.complaint_id order by c.id desc";
        $sql = "SELECT c.assign_email,c.assigned_role,c.assign_status,c.assigned_to,c.assigned_to,c.superwisor_complaint_accept_date,c.enquiry_ack,c.complaint_id FROM  complaints as c   where    c.assign_email IS NOT NULL AND c.superwisor_complaint_accept_date BETWEEN CURDATE() - INTERVAL 11 DAY
             AND CURDATE() - INTERVAL 10 DAY and c.assigned_role IN (3,7,8,9,10) and c.assign_status='1'  and c.enquiry_ack IS NULL OR c.enquiry_ack = ''     group by c.complaint_id order by c.id desc ";
        $result = $connection->execute($sql)->fetchAll('assoc');
        //pr($result);
        $assigned_email = [];
        foreach ($result as $assign_email) {
            $assigned_email[] = $assign_email['assign_email'] . " ,";
            $complaint_id = $assign_email['complaint_id'];
            $sql2 = "insert into tats(inquiry_ack_upload,user_id,complaint_id,date) value('0','" . $assign_email['assigned_to'] . "','" . $assign_email['complaint_id'] . "','" . $time . "') ";
            $result2 = $connection->execute($sql2);
        }
        $mail = implode('', $assigned_email);
        $usermailid1 = rtrim($mail, ",");
        echo $usermailid = trim($usermailid1);

        $email = new Email();
        //$email->viewVars(['name' => $name,'user_email'=>$user_email,'pass'=>$pass]);
        $email->from(['learning@quatrro.com' => 'MyVoice'])
                ->to($usermailid)
                ->emailFormat('html')
                ->subject('Acknowledge letter reminder notification')
                ->send('Please Upload Acknowledge letter against this Complaint Id $complaint_id');
        exit;
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

    public function complaintDetails($id = null) {
        $time = Time::now();
        $session = $this->request->session();
        $session_data = $session->read();
        $user_id = $session_data["Auth"]["User"]["id"];
        $user_role = $session_data["Auth"]["User"]["role"];
        $session_user_email = $session_data["Auth"]["User"]["email"];
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('Complaints');
        $this->loadModel('accused');
        $this->loadModel('images');
        $this->loadModel('Cstatus');
        $category = $this->getcategory();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $individual_accuser_name = $individual_accuser_detail[0]->name;
        $individual_accuser_email = $individual_accuser_detail[0]->email;
        $individual_accuser_complaint_code = $individual_accuser_detail[0]->complaint_id;

        foreach ($individual_accuser_detail as $status) {
            @$userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }
        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => @$userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }


        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $this->viewBuilder()->layout('backendlayout');
        $logedin_user_detail = $this->Users->find()->where(['Users.id' => $user_id])->toArray();
        $individual_user_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();


        $record_exist = $this->Complaints->find()->where(['Complaints.complaint_id' => $id]);
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_complaint_id' => $id]);
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_complaint_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
//pr($witness_accused_detail);die;
        if ($user_role == '3' || $user_role == '12' || $user_role == '13') {
            if ($this->request->is('post')) {
                $user_id = $this->request->data('user_id');
                $complaint_id = $this->request->data('complaint_id');
                $status = $this->request->data('status');
                $superwisor_complaint_accept_date = $this->request->data('superwisor_complaint_accept_date');
                $usersTable = TableRegistry::get("Complaints");
                $usersdata = $usersTable->newEntity();
                $usersdata->user_id = $user_id;

                $usersdata->complaint_id = $complaint_id;
                $usersdata->status = $status;
                $usersdata->superwisor_complaint_accept_date = $superwisor_complaint_accept_date;

                if ($usersTable->save($usersdata)) {

                    $accusation = TableRegistry::get("users");
                    $query = $accusation->query();
                    $result = $query->update()
                            ->set(['users.status' => $status])
                            ->where(['users.id' => $complaint_id])
                            ->execute();
                    $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsAccuser', $complaint_id]);


                    $newemail = new Email();
                    $newemail->viewVars(['name' => $individual_accuser_name, 'complaint_id' => $individual_accuser_complaint_code]);
                    $newemail->from(['learning@quatrro.com' => 'MyVoice'])
                            ->to($individual_accuser_email)
                            ->template('complaintMyvoicemanagerAcceptMail', 'mail')
                            ->emailFormat('html')
                            ->subject('Your complaint accepted by Myvoice Manager')
                            ->send();
                }
            }
        } elseif ($user_role == '7' || $user_role == '4' || $user_role == '8' || $user_role == '9' || $user_role == '10') {


            if ($this->request->is('post')) {

//pr($this->request->data);die;
                $assigned_to = $this->request->data('assigned_to');
                $assigned_role = $this->request->data('assigned_role');
                $complaint_id = $this->request->data('complaint_id');
                $assign_status = $this->request->data('assign_status');
                $superwisor_complaint_accept_date = $this->request->data('superwisor_complaint_accept_date');
                $tablename = TableRegistry::get("complaints");
                $query = $tablename->query();
                $result = $query->update()
                        ->set(['complaints.assign_status' => '1', 'complaints.assign_email' => $session_user_email])
                        ->where(['complaints.assigned_to' => $assigned_to, 'complaints.complaint_id' => $complaint_id])
                        ->execute();



                $this->redirect(['controller' => 'Complaint', 'action' => 'route', $complaint_id]);
            }
        } else {
            
        }
        $setData = $this->Summary->getSummary($id, false);
        $this->set($setData);
        $this->set('complaint_id', $id);

        $this->set('individual_user_detail', $individual_user_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $this->set(compact('logedin_user_detail', 'record_exist', 'time', 'accused_detail', 'individual_user_detail_images', 'users_status', 'category_type', 'subcategory'));
    }

    /**
     * After MyVoiceControl  login it can search  user profile data from users table .
     */
    public function complaintIdReject($id = null) {
        $time = Time::now();
        $session = $this->request->session();
        $user_id = $session->read('userid');
        $this->loadModel('Users');

        $this->loadModel('Complaints');
        //$this->viewBuilder()->layout('backendlayout');
        $logedin_user_detail = $this->Users->find()->where(['Users.id' => $user_id])->toArray();
        $individual_user_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $individual_accuser_name = $individual_user_detail[0]->name;
        $individual_accuser_email = $individual_user_detail[0]->email;
        $individual_accuser_complaint_code = $individual_user_detail[0]->complaint_id;

        $individual_user_detail_email = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $record_exist = $this->Complaints->find()->where(['Complaints.complaint_id' => $id]);


        if ($this->request->is('post')) {
            $user_id = $this->request->data('user_id');
            $emp_id = $this->request->data('emp_id');
            $user_type = $this->request->data('user_type');
            $complaint_id = $this->request->data('complaint_id');
            $status = $this->request->data('status');
            $notes = $this->request->data('notes');
            $superwisor_complaint_accept_date = $this->request->data('superwisor_complaint_accept_date');
            $usersTable = TableRegistry::get("Complaints");
            $usersdata = $usersTable->newEntity();
            $usersdata->user_id = $user_id;
            $usersdata->emp_id = $emp_id;
            $usersdata->user_type = $user_type;
            $usersdata->complaint_id = $complaint_id;
            $usersdata->status = $status;
            $usersdata->notes = $notes;
            $usersdata->superwisor_complaint_accept_date = $superwisor_complaint_accept_date;

            if ($usersTable->save($usersdata)) {
                $newemail = new Email();
                $newemail->viewVars(['name' => $individual_accuser_name, 'complaint_id' => $individual_accuser_complaint_code]);
                $newemail->from(['learning@quatrro.com' => 'MyVoice'])
                        ->to($individual_accuser_email)
                        ->template('complaintMyvoicemanagerRejectMail', 'mail')
                        ->emailFormat('html')
                        ->subject('Your complaint rejected by Myvoice Manager  ')
                        ->send();


                $accusation = TableRegistry::get("users");
                $query = $accusation->query();
                $result = $query->update()
                        ->set(['users.status' => $status, 'users.complaint_id_rejection' => $notes])
                        ->where(['users.id' => $complaint_id])
                        ->execute();
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report']);
            }

            return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report']);
        }
        $this->set('individual_user_detail', $individual_user_detail);

        $this->set(compact('logedin_user_detail', 'record_exist', 'time'));
        exit;
    }

    public function hrcomplaintIdReject($id = null) {
        $time = Time::now();
        $session = $this->request->session();
        $user_id = $session->read('userid');
        $this->loadModel('Users');

        if ($this->request->is('post')) {

            $assigned_to = $this->request->data('assigned_to');
            $complaint_id = $this->request->data('complaint_id');
            $assign_status = $this->request->data('assign_status');
            $superwisor_complaint_accept_date = $this->request->data('superwisor_complaint_accept_date');
            $notes = $this->request->data('notes');
            $tablename = TableRegistry::get("complaints");
            $query = $tablename->query();
            $result = $query->update()
                    ->set(['complaints.assign_status' => '2', 'complaints.notes' => $notes])
                    ->where(['complaints.assigned_to' => $assigned_to, 'complaints.complaint_id' => $complaint_id])
                    ->execute();
            return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report', $assigned_to]);
        }
        exit;
    }

    /**
     * After MyVoiceControl  Accept Complaint then it can see accuser details.
     */
    public function ComplaintDetailsAccuser($id = null) {
        $this->viewBuilder()->layout('backendlayout');
        $complaint_id = $id;
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        $this->set(compact('complaint_id'));

        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');

        $this->loadModel('images');
        $this->loadModel('Cstatus');
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $category = $this->getcategory();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $selected_sidebar = 1;
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status', 'category_type', 'subcategory', 'selected_sidebar'));
    }

    /**
     * After MyVoiceControl  Accept Complaint then it can see accuser details.
     */
    public function ComplaintDetailsAccusationNature($id = null) {
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');
        $this->loadModel('Cstatus');
        $category = $this->getcategory();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        foreach ($individual_accuser_detail as $status) {
            $users_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');
        //pr($subcategory[0]['name']);exit();
        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $users_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }

        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $selected_sidebar = 4;
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status', 'category_type', 'get_category', 'get_subcategory', 'subcategory', 'selected_sidebar'));
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $data = $this->getcategory();
        $this->set('catdata', $data);

        if ($this->request->is('post')) {
            $c_subject = $this->request->data('category_concern');
            $category_concern_sub = $this->request->data('category_concern_sub');
            $severity = $this->request->data('severity');
            $accusation = TableRegistry::get("Users");
            $updateaccusation = $accusation->get($id);
            $updateaccusation->c_subject = $c_subject;
            $updateaccusation->other_issue = $category_concern_sub;
            $updateaccusation->severity = $severity;
            $severity = 'severity="' . $severity . '"';
            if ($accusation->save($updateaccusation)) {
                $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsAccusationNature', $id]);
                $this->Flash->success(__(' Category & Serverity   has been successfully Updated.'));
            }
        }

        $setData = $this->Summary->getSummary($id, false);
        $this->set($setData);
        $this->set('complaint_id', $id);
    }

    public function ComplaintDetailsWitness($id = null) {
        $complaint_id = $id;
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        $this->set(compact('complaint_id'));

        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');
        $this->loadModel('Cstatus');
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $category = $this->getcategory();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_complaint_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $selected_sidebar = 3;
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status', 'subcategory', 'selected_sidebar'));
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $this->set('category_type', $category_type);

        if ($this->request->is('post')) {
            $complaintid = $this->request->data('user_complaint_id');
            $witname = $this->request->data('wi_name');
            $witbu = $this->request->data('wi_bu');
            $witcity = $this->request->data('wi_city');
            $witempid = $this->request->data('wi_empid');
            $witemail = $this->request->data('wi_email_id');
            $witworkloc = $this->request->data('wi_location');
            $witphone = $this->request->data('phone');
            $witrelation = $this->request->data('relationship');
            $witremark = $this->request->data('remark');
            $connection = ConnectionManager::get('default');
            $connection->insert('witns', [
                'user_complaint_id' => $complaintid, 'wi_name' => $witname, 'wi_bu' => $witbu, 'wi_city' => $witcity, 'wi_empid' => $witempid, 'wi_email_id' => $witemail, 'wi_location' => $witworkloc, 'phone' => $witphone, 'relationship' => $witrelation, 'remark' => $witremark]);
        }
        $this->set('hide_report', true);
    }

    public function ComplaintDetailsRespondent($id = null) {
        $this->viewBuilder()->layout('backendlayout');
        $complaint_id = $id;
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        $this->set(compact('complaint_id'));
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
//             	$this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');
        $this->loadModel('Cstatus');
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $category = $this->getcategory();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');

        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $selected_sidebar = 2;
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status', 'subcategory', 'selected_sidebar'));
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $this->set('category_type', $category_type);
        $this->set('hide_report', true);
    }

    public function ComplaintDetailsAssign($id = null) {

        if ($id) {
            $id = $id;
        } else {
            $id = $this->request->data('complaint_id');
        }

        $session = $this->request->session();
        $session_data = $session->read();
        $session_user_id = $session_data['Auth']['User']['id'];

        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->loadModel('Roles');
        $this->loadModel('Complaints');
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');
        $time = Time::now();
        $this->loadModel('Cstatus');
        $category = $this->getcategory();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');
        $connection = ConnectionManager::get('default');
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }

// Get roles 
        $complCate = $individual_accuser_detail[0]['c_subject'];
        $teamTable = TableRegistry::getTableLocator()->get('team');
        $role_id = null;
        if ($complCate == 1) {
            $role_id = 7;
        } else if ($complCate == 4) {
            $role_id = 9;
        } else if ($complCate == 7) {
            $role_id = 8;
        } else if ($complCate == 20) {
            $role_id = 10;
        }
        $query0 = $teamTable->find('all')
                ->where(['role_id' => $role_id, 'category_id' => $individual_accuser_detail[0]['c_subject']])
                ->contain(['Roles', 'Users']);
        $user_roles = [];
        foreach ($query0 as $r) {
            if (!empty($r)) {
                $user_roles[] = $r->toArray();
            }
        }
//pr($user_roles);die;
        $maillist = $this->Users->find('all')->where(['role =' => '3'])->orwhere(['role =' => '4'])->orwhere(['role =' => '5'])->orwhere(['role =' => '6'])->orwhere(['role =' => '7'])->orwhere(['role =' => '8'])->orwhere(['role =' => '9'])->orwhere(['role =' => '10'])->orwhere(['role =' => '11'])->orwhere(['role =' => '12'])->orwhere(['role =' => '13'])->orwhere(['role =' => '14'])->toArray();

        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();

        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $sqlassigndetail = "select distinct(c.complaint_id),u.id,u.name,u.empid,u.email,u.bu,c.user_id,c.complaint_id,c.assigned_to,c.assign_status from complaints as c   
INNER JOIN users as u  on u.id=c.assigned_to where c.assigned_to!= '' AND c.complaint_id=$id ";
        $fetchassigned_detail = $connection->execute($sqlassigndetail)->fetchAll('assoc');
        $this->set('fetchassigned_details', $fetchassigned_detail);
        $assign_userexist = [];
        foreach ($fetchassigned_detail as $fetchassigned_detailss) {
            $assign_userexist[] = $fetchassigned_detailss['assigned_to'];
        }

        $this->loadModel('Cstatus');
        $Cstatus = $this->Cstatus->find('all')->toArray();
        $assigned_details = '';



        $arr = [];
        if ($this->request->is('post')) {
            $complaint_id = $this->request->data('complaint_id');
            $user_id = $this->request->data('user_id');
            $superwisor_complaint_accept_date = $this->request->data('superwisor_complaint_accept_date');
            $assigned_role = $this->request->data('assigned_role');
            $assign_to = $this->request->data('assigned_to');
            $status = $this->request->data('status');
            $role_insert = TableRegistry::get('complaints');
            $role_data = $role_insert->newEntity();
            $role_data->complaint_id = $complaint_id;
            $role_data->user_id = $user_id;
            $role_data->superwisor_complaint_accept_date = $superwisor_complaint_accept_date;
            $role_data->assigned_role = $assigned_role;
            $role_data->assigned_to = $assign_to;
            $role_data->status = $status;

            if ($role_insert->save($role_data)) {

                $assign_role_user_details = $this->Users->find()->where(['Users.id' => $assign_to])->toArray();
                $assign_user_email = $assign_role_user_details[0]->email;
                $assign_user_name = $assign_role_user_details[0]->name;
                $individual_accuser_complaint_code = $assign_role_user_details[0]->complaint_id;


                $newemail = new Email();
                $newemail->viewVars(['name' => $assign_user_name, 'complaint_id' => $individual_accuser_complaint_code]);
                $newemail->from(['learning@quatrro.com' => 'MyVoice'])
                        ->to($assign_user_email)
                        ->to('abhishekkumargupta33@gmail.com')
                        ->template('complaintMyvoicemanagerAssignSpocMail', 'mail')
                        ->emailFormat('html')
                        ->subject(" Complaint $individual_accuser_complaint_code has been assigned in Myvoice  ")
                        ->send();

                // $sql = "select distinct u.id,u.complaint_id,u.Name,u.empid,u.email,u.bu,c.assign_status,c.assigned_to from users as u INNER JOIN complaints as c on u.id=c.complaint_id where assigned_to='".$assign_to."' AND u.id=$complaint_id AND c.assigned_to <> '' AND c.assigned_to <> '0' group by c.assigned_to";
                $sql = "select distinct u.id,u.Name,u.empid,u.email,u.bu,c.assign_status,c.assigned_to from users as u INNER JOIN complaints as c on u.id=c.assigned_to where u.id='" . $assign_to . "' AND c.assigned_to <> '' AND c.assigned_to <> '0' group by c.assigned_to";
                $assigned_details = $connection->execute($sql)->fetchAll('assoc');
                $this->set('assigned_details', $assigned_details);
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsAssign', $complaint_id]);
//    pr($assigned_details);exit;
            }
        } else {
            $sql = "select distinct u.id,u.Name,u.empid,u.email,u.bu,c.assign_status,c.assigned_to from users as u INNER JOIN complaints as c on u.id=c.assigned_to where u.id='" . $id . "' AND c.assigned_to <> '' AND c.assigned_to <> '0' group by c.assigned_to";
            $assigned_details = $connection->execute($sql)->fetchAll('assoc');
//    pr($assigned_details);
//    foreach($assigned_details as $value){
//        array_push($arr, $value['assigned_to']);
////        @$arr[$value['id']] = $value['assigned_to'];
//    }
//    $convert_arr = implode(",", $arr);
//   $sql_role_name = "SELECT name FROM users WHERE id IN($convert_arr)";
            $this->set('assigned_details', $assigned_details);


            $setData = $this->Summary->getSummary($id, false);
            $this->set($setData);
            $this->set('complaint_id', $id);
            $selected_sidebar = 5;
            $this->set('selected_sidebar', $selected_sidebar);
        }




// pr($assigned_details);
        $this->set(compact('aid', 'assign_userexist', 'accused_detail', 'individual_user_detail_images', 'user_roles', 'query', 'Cstatus', 'time', 'users_status', 'category_type', 'subcategory', 'maillist'));
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
    }

    public function ComplaintDetailsAssignUser() {
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->loadModel('Roles');
        $role_id = $this->request->data('role');

        //$this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');
        $this->loadModel('Cstatus');

        $user_roles_name = $this->Users->find('all')->where(['Users.role' => $role_id])->toArray();
        $html = '<option value="0" >Choose an option</option>';
        foreach ($user_roles_name as $key => $value) {
            // pr($value);die;
            $html = $html . '<option value="' . $value->id . '" >' . $value->name . '</option>';
        }
        echo json_encode(array('html' => $html));
        die;
//pr($user_roles_name);die;

        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $role_id])->toArray();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
        }
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }

        exit;
    }

    /**
     * After MyVoiceControl  Accept Complaint then it can see accuser details.
     */
    public function ComplaintDetailsPersonalNote($id = null) {

        $time = Time::now();


        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->loadModel('Complaints');
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');
        $this->loadModel('Complaintdetails');
        $category = $this->getcategory();
        $this->loadModel('Cstatus');
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();

        $category = $this->getcategory();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');

        $session = $this->request->session();
        $session_data = $session->read();
        $session_roleid = $session_data['Auth']['User']['role'];
        $session_userid = $session_data['Auth']['User']['id'];
        if ($session_roleid == '7' || $session_roleid == '8' || $session_roleid == '9' || $session_roleid == '10') {
            //query for counting total no of files
            $complaint_details = $this->Complaintdetails->newEntity();

            if ($this->request->is('post')) {
                $complaint_id = $this->request->data('complaint_id');
                $user_id = $this->request->data('user_id');
                $document_upload_date = $this->request->data('document_upload_date');
//$user_id=$this->request->data('user_id');
                $note = $this->request->data('note');
                $files_uploaded = $_FILES;
                //pr($files_uploaded);die;
                $scribeDir = WWW_ROOT . 'upload' . DS . 'scribe' . DS;
                $panelDocFileEntities = [];
                $i = 1;
                $uploaded_files = '';
                //pr($_FILES);die;	
                if (!empty($_FILES['image'])) {
                    $total = count($_FILES['image']['name']);
                    for ($j = 0; $j < $total; $j++) {
                        if ($_FILES['image']['error'][$j] == 0) {
                            $fileNameTmp = $_FILES['image']['name'][$j];
                            $fileNameTmp = explode('.', $fileNameTmp);
                            $ext = $fileNameTmp[count($fileNameTmp) - 1];
                            $fileName = array_diff($fileNameTmp, [$ext]);
                            $fileName = implode('.', $fileName);

                            $newFile = time() . '_' . $user_id . '_' . $i . '.' . $ext;
                            $i++;
                            $newFileAbs = $scribeDir . $newFile;
                            move_uploaded_file($_FILES['image']['tmp_name'][$j], $newFileAbs);
                            if ($uploaded_files == '') {
                                $uploaded_files = $newFile;
                            } else {
                                $uploaded_files = $uploaded_files . ',' . $newFile;
                            }
                            // $panelDocFile = $panelDocTable->PanelDocFiles->newEntity();
                            // $panelDocFile->file = $newFile;
                            // $panelDocFile->name = $fileName;
                            //$panelDocFileEntities[] = $panelDocFile;
                        }
                    }
                    //echo $uploaded_files;die;	
                }
                //$complaint_details= $this->Complaintdetails->patchEntity($complaint_details, $this->request->getData());
                //pr($this->request->getData());die;
                $complaint_details->complaint_id = $complaint_id;
                $complaint_details->user_id = $user_id;
                $complaint_details->document_upload_date = $document_upload_date;
                $complaint_details->note = $note;
                $complaint_details->image = $uploaded_files;
                if ($this->Complaintdetails->save($complaint_details)) {

                    $accusations = TableRegistry::get("complaints");

                    $querys = $accusations->query();

                    $temFilepathEnquiry = $_FILES['enquiry_letter']['tmp_name'];
                    if ($temFilepathEnquiry != '') {
                        $filename_enquiry = $_FILES['enquiry_letter']['name'];
                        $files_enquiry = time() . "_" . str_replace("", "_", $_FILES['enquiry_letter']['name']);
                        $newFilePath = WWW_ROOT . DS . 'upload' . DS . $files_enquiry;
                        if (move_uploaded_file($temFilepathEnquiry, $newFilePath)) {

                            $enquiry = $querys->update()
                                    ->set(['complaints.enquiry_letter' => $files_enquiry, 'complaints.superwisor_complaint_accept_date' => $time])
                                    ->where(['complaints.complaint_id' => $id, 'complaints.assigned_to' => $user_id])
                                    ->execute();
                        }
                    }
                    $temFilepathAcknow = $_FILES['acknow']['tmp_name'];
                    if ($temFilepathAcknow != '') {
                        $filename_acknow = $_FILES['acknow']['name'];
                        $files_acknow = time() . "_" . str_replace("", "_", $_FILES['acknow']['name']);
                        $newFilePathACK = WWW_ROOT . DS . 'upload' . DS . $files_acknow;
                        if (move_uploaded_file($temFilepathAcknow, $newFilePathACK)) {
                            $acknow = $querys->update()
                                    ->set(['complaints.enquiry_ack' => $files_acknow])
                                    ->where(['complaints.complaint_id' => $id])
                                    ->execute();
                        }
                    }

                    return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'complaintDetailsPersonalNote', $complaint_id]);
                }
            }
            $preciding_fetch = $this->Complaintdetails->find()->where(['Complaintdetails.complaint_id' => $id, 'Complaintdetails.user_id' => $session_userid])->toArray();
//pr($preciding_fetch);die;
        } elseif ($session_roleid == '3') {

            if ($this->request->is('post')) {
                $this->loadModel('Users');
                $MyVoiceControl_personal_notes = $this->request->data('complaint_id_rejection');
                $id = $this->request->data('id');

                $accusation = TableRegistry::get("users");

                $query = $accusation->query();
                $result = $query->update()
                        ->set(['complaint_id_rejection' => $MyVoiceControl_personal_notes])
                        ->where(['Users.id' => $id])
                        ->execute();


                $accusations = TableRegistry::get("complaints");

                $querys = $accusations->query();
                $results = $querys->update()
                        ->set(['complaints.notes' => $MyVoiceControl_personal_notes])
                        ->where(['complaints.complaint_id' => $id])
                        ->execute();


                $temFilepathEnquiry = $_FILES['enquiry_letter']['tmp_name'];
                if ($temFilepathEnquiry != '') {
                    $filename_enquiry = $_FILES['enquiry_letter']['name'];
                    $files_enquiry = time() . "_" . str_replace("", "_", $_FILES['enquiry_letter']['name']);
                    $newFilePath = WWW_ROOT . DS . 'upload' . DS . $files_enquiry;
                    if (move_uploaded_file($temFilepathEnquiry, $newFilePath)) {
                        $enquiry = $querys->update()
                                ->set(['complaints.enquiry_letter' => $files_enquiry])
                                ->where(['complaints.complaint_id' => $id])
                                ->execute();
                    }
                }
                $temFilepathAcknow = $_FILES['acknow']['tmp_name'];
                if ($temFilepathAcknow != '') {
                    $filename_acknow = $_FILES['acknow']['name'];
                    $files_acknow = time() . "_" . str_replace("", "_", $_FILES['acknow']['name']);
                    $newFilePathACK = WWW_ROOT . DS . 'upload' . DS . $files_acknow;
                    if (move_uploaded_file($temFilepathAcknow, $newFilePathACK)) {
                        $acknow = $querys->update()
                                ->set(['complaints.acknowledgement' => $files_acknow])
                                ->where(['complaints.complaint_id' => $id])
                                ->execute();
                    }
                }

                //$this->redirect(['controller'=>'MyVoiceControl','action'=>'ComplaintDetailsPersonalNote',$id]);
            }
        } elseif ($session_roleid == '4') {

            $complaint_details = $this->Complaintdetails->newEntity();

            if ($this->request->is('post')) {
                $complaint_id = $this->request->data('complaint_id');
                $user_id = $this->request->data('user_id');
                $document_upload_date = $this->request->data('document_upload_date');
//$user_id=$this->request->data('user_id');
                $note = $this->request->data('note');
                $files_uploaded = $_FILES;
                //pr($files_uploaded);die;
                $scribeDir = WWW_ROOT . 'upload' . DS . 'scribe' . DS;
                $panelDocFileEntities = [];
                $i = 1;
                $uploaded_files = '';
                //pr($_FILES);die;	
                if (!empty($_FILES['image'])) {
                    $total = count($_FILES['image']['name']);
                    for ($j = 0; $j < $total; $j++) {
                        if ($_FILES['image']['error'][$j] == 0) {
                            $fileNameTmp = $_FILES['image']['name'][$j];
                            $fileNameTmp = explode('.', $fileNameTmp);
                            $ext = $fileNameTmp[count($fileNameTmp) - 1];
                            $fileName = array_diff($fileNameTmp, [$ext]);
                            $fileName = implode('.', $fileName);

                            $newFile = time() . '_' . $user_id . '_' . $i . '.' . $ext;
                            $i++;
                            $newFileAbs = $scribeDir . $newFile;
                            move_uploaded_file($_FILES['image']['tmp_name'][$j], $newFileAbs);
                            if ($uploaded_files == '') {
                                $uploaded_files = $newFile;
                            } else {
                                $uploaded_files = $uploaded_files . ',' . $newFile;
                            }
                            // $panelDocFile = $panelDocTable->PanelDocFiles->newEntity();
                            // $panelDocFile->file = $newFile;
                            // $panelDocFile->name = $fileName;
                            //$panelDocFileEntities[] = $panelDocFile;
                        }
                    }
                    //echo $uploaded_files;die;	
                }
                //$complaint_details= $this->Complaintdetails->patchEntity($complaint_details, $this->request->getData());
                //pr($this->request->getData());die;
                $complaint_details->complaint_id = $complaint_id;
                $complaint_details->user_id = $user_id;
                $complaint_details->document_upload_date = $document_upload_date;
                $complaint_details->note = $note;
                $complaint_details->image = $uploaded_files;
                if ($this->Complaintdetails->save($complaint_details)) {




                    return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'complaintDetailsPersonalNote', $complaint_id]);
                }
            }
            $preciding_fetch = $this->Complaintdetails->find()->where(['Complaintdetails.complaint_id' => $id, 'Complaintdetails.user_id' => $session_userid])->toArray();
//pr($preciding_fetch);die;
        } else {
            
        }

        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
        }
        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }

        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }

        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $complaint_file = $this->Complaints->find()->where(['complaint_id' => $id, 'assigned_to' => $session_userid])->toArray();

//$cid=$individual_accuser_detail['id'];
//pr( $complaint_file);die;
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
//$update_notes=$this->Complaints->find()->where(['complaints.complaint_id' => $id])->toArray();

        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status', 'complaint_file', 'time', 'preciding_fetch', 'category_type', 'subcategory'));
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $this->set('category_type', $category_type);
        //$this->set(compact());

        $setData = $this->Summary->getSummary($id, true);
        $this->set($setData);
        $this->set('complaint_id', $id);
    }

    public function ComplaintDetailsPanelFormation($id = null) {
        $session = $this->request->session();
        $user_id = $session->read('userid');
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->loadModel('Panels');
        $data = $this->getpanelmember();
        $this->set('paneldata', $data);
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');

        $this->loadModel('Cstatus');
        $category = $this->getcategory();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');

        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $logedin_user_detail = $this->Users->find()->where(['Users.id' => $user_id])->toArray();
//$complaint_panel_user_detail=$this->Panels->find()->where(['Panels.complaint_user_id' => $id,'Panels.supervisor_id'=>$user_id])->toArray();
        $complaint_panel_user_detail = []; //Tmp code
        //pr($logedin_user_detail);die;
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $this->loadModel('Cstatus');
        $Cstatus = $this->Cstatus->find('all')->toArray();
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $this->set(compact('logedin_user_detail', 'complaint_panel_user_detail', 'accused_detail', 'individual_user_detail_images', 'Cstatus', 'users_status'));
        $this->set('category_type', $category_type);

        if ($this->request->is('post')) {
            // pr($this->request->data);die;
            $supervisor_id = $this->request->data('supervisor_id');
            $role = $this->request->data('role');
            $supervisor_name = $this->request->data('supervisor_name');
            $complaint_user_id = $this->request->data('complaint_user_id');
            $status = $this->request->data('status');

            $p_name = $this->request->data('p_name');
            $p_email = $this->request->data('p_email');
            $p_empid = $this->request->data('p_empid');
            $p_scribe = $this->request->data('p_scribe');

            $name = TableRegistry::get("users");
            $uname = "";
            $query = $name
                    ->find('all', [
                        'fields' => ['name']
                    ])
                    ->where(['id =' => $p_name]);
            foreach ($query as $key => $value) {

                $uname = $value->name;
            }
            $p_name = $uname;



            $panelTable = TableRegistry::get("Panels");

            $panel = $panelTable->newEntity();
            $panel_user = $panelTable->PanelUsers->newEntity();
            $panel->complaint_id = $complaint_user_id;
            $panel_user->user_id = $p_name;
            if ($p_scribe == 'Yes') {
                $panel_user->role = 1;
            } else {
                $panel_user->role = 2;
            }
            $panel_user->is_accepted = 0;



//$updateaccusation->supervisor_id= $supervisor_id;
//$updateaccusation->role=$role;
//$updateaccusation->supervisor_name=$supervisor_name;
//$updateaccusation->complaint_user_id=$complaint_user_id;
//$updateaccusation->status=$status;
//$updateaccusation->p_name=$p_name;
//$updateaccusation->p_email=$p_email;
//$updateaccusation->p_empid=$p_empid;
//$updateaccusation->p_scribe=$p_scribe;


            if ($panelTable->save($panel)) {
                $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsPanelFormation', $complaint_user_id]);
//$this->Flash->success(__(' Category & Serverity   has been successfully Updated.'));
            }
        }
    }

    public function panel($complaint_id) {

        $this->viewBuilder()->layout('myvoice');
        $this->loadModel('Users');
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $cstatusTable = TableRegistry::getTableLocator()->get('Cstatus');
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $query0 = $userTable->find('all')
                ->where(['id' => $complaint_id]);
        if (empty($query0->first())) {
            return $this->redirect($this->referer());
        }
        $cateGory = $query0->first()->c_subject;

        if ($this->request->is('post')) {
            $requestData = $this->request->data;
//            pr($requestData);
//            die;
            $query2 = $panelTable->find('all', ['fields' => ['id']])
                    ->where(['complaint_id' => $complaint_id, 'user_id' => $requestData['role_user']]);
            $tmpData = [];
            foreach ($query2 as $r2) {
                if (!empty($r2)) {
                    $tmpData[] = $r2;
                }
            }
            if (empty($tmpData)) {
                $panel = $panelTable->newEntity();
                $panel_assign_detail = $requestData['role_user'];
                $panel->user_id = $requestData['role_user'];
                $panel->complaint_id = $complaint_id;
                $panel->is_scribe = intval($requestData['is_scribe']);

                if ($panelTable->save($panel)) {

                    $assign_role_user_details = $this->Users->find()->where(['Users.id' => $panel_assign_detail])->toArray();
                    $assign_user_email = $assign_role_user_details[0]->email;
                    $assign_user_name = $assign_role_user_details[0]->name;
                    $individual_accuser_complaint_code = $assign_role_user_details[0]->complaint_id;
                    //echo  $assign_user_email;die;

                    $newemail = new Email();
                    $newemail->viewVars(['name' => $assign_user_name, 'complaint_id' => $individual_accuser_complaint_code]);
                    $newemail->from(['learning@quatrro.com' => 'MyVoice'])
                            ->to($assign_user_email)
//->to('abhishekkumargupta33@gmail.com')
                            ->template('complaintSpocAssignPanelMail', 'mail')
                            ->emailFormat('html')
                            ->subject("Complaint $individual_accuser_complaint_code has been assigned in Myvoice")
                            ->send();

                    $complaint = $userTable->get($complaint_id);
                    $complaint->status = 9;
                    $userTable->save($complaint);
                }
            }
            if (!empty($requestData['status'])) {
                $userTable = TableRegistry::getTableLocator()->get('Users');
                $complaint = $userTable->get($complaint_id);
                $complaint->status = $requestData['status'];
                $userTable->save($complaint);
            }
        }
        $query3 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $complaint_id])
                ->contain(['Users']);
        $panelData = [];
        foreach ($query3 as $panel) {
            if (!empty($panel)) {
                $panelData[] = $panel->toArray();
            }
        }
        $allowedRoles = [];
        if ($cateGory == 1) {
            $allowedRoles = [3, 4, 5, 6, 7];
        } else if ($cateGory == 4) {
            $allowedRoles = [4, 5, 6, 9, 13];
        } else if ($cateGory == 7) {
            $allowedRoles = [4, 5, 6, 8, 12];
        } else if ($cateGory == 10) {
            $allowedRoles = [4, 5, 6, 10];
        }
        $roleTable = TableRegistry::getTableLocator()->get('Roles');
        $query1 = $roleTable->find('list', ['fields' => ['id', 'name'], 'order' => ['name ASC']])
                ->where(['status' => 1, 'id IN' => $allowedRoles]);
        $rolesData = $query1->all()->toArray();
        $query4 = $cstatusTable->find('all')
                ->where(['status' => 1]);
        $cstatusData = [];
        foreach ($query4 as $stts) {
            if (!empty($stts)) {
                $cstatusData[] = $stts->toArray();
            }
        }
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);

        $selected_sidebar = 6;
        $script_for_footer = ['panel'];
        $this->set(compact('complaint_id', 'selected_sidebar', 'rolesData', 'script_for_footer', 'panelData', 'cstatusData', 'cateGory'));
    }

    /**
     * After MyVoiceControl  Accept Complaint then it can see accuser details.
     */
    public function ComplaintDetailsSubmitForm($id = null) {
        $complaint_id = $id;
        $setData = $this->Summary->getSummary($complaint_id, true);
        $this->set($setData);
        $this->set(compact('complaint_id'));
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');

        $this->loadModel('Cstatus');
        $category = $this->getcategory();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
            $get_subcategory = $status->other_issue;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $connection = ConnectionManager::get('default');
        $sql = "select name from category where id = '" . $get_subcategory . "'";
        $subcategory = $connection->execute($sql)->fetchAll('assoc');

        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }
        $category = $this->getcategory();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
        }


        $this->loadModel('Cstatus');
        $Cstatus = $this->Cstatus->find('all')->toArray();
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status', 'subcategory'));

        if ($this->request->is('post')) {
            $userTable = TableRegistry::getTableLocator()->get('Users');
            $teamTable = TableRegistry::getTableLocator()->get('team');
            $user_id = $this->Auth->user('id');
            $query1 = $userTable->find('all')
                    ->where(['id' => $id]);
            if (empty($query1->first())) {
                return $this->redirect($this->referer());
            }
            $catstatus = $query1->first()->status;
            if ($catstatus != 17) {
                return $this->redirect($this->referer());
            }
            $category = $query1->first()->c_subject;
            if ($category == 1) {
                $roleAtt = 7;
            } else if ($category == 4) {
                $roleAtt = 9;
            } else if ($category == 7) {
                $roleAtt = 8;
            } else if ($category == 20) {
                $roleAtt = 10;
            }
            $query2 = $teamTable->find('all')
                    ->where(['category_id' => $category, 'role_id' => $roleAtt]);
            $tmpData = [];
            foreach ($query2 as $r1) {
                if (!empty($r1)) {
                    $tmpData[] = $r1->user_id;
                }
            }
            if (!in_array($user_id, $tmpData)) {
                return $this->redirect($this->referer());
            }

            $ent = $userTable->get($id);
            $ent->status = 15; //$this->request->data('status');
            $userTable->save($ent);
            
//            $newemail = new Email();
//            $newemail->viewVars(['name' => $complaint_id_user_name, 'complaint_id' => $individual_accuser_complaint_code]);
//            $newemail->from(['learning@quatrro.com' => 'MyVoice'])
//                    ->to($complaint_id_email)
////->to('abhishekkumargupta33@gmail.com')
//                    ->template('complaintCloseMail', 'mail')
//                    ->emailFormat('html')
//                    ->subject("Complaint $individual_accuser_complaint_code has been Closed in Myvoice")
//                    ->send();

            $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'report']);
        }
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $this->set('category_type', $category_type);
        $this->set('Cstatus', $Cstatus);
        $selected_sidebar = 8;
        $this->set('selected_sidebar', $selected_sidebar);
    }

    /**
     * After MyVoiceControl  Accept Complaint then it can see accuser details.
     */
    public function ComplaintDetailsCloseCase($id = null) {
        $this->loadModel('Users');
        $this->loadModel('Witns');
        $this->loadModel('accused');
        $this->viewBuilder()->layout('backendlayout');
        $this->loadModel('images');

        $this->loadModel('Cstatus');
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
        }
        $individual_accuser_status = $this->Cstatus->find()->where(['Cstatus.id' => $userstable_status])->toArray();
        foreach ($individual_accuser_status as $status_master) {
            $users_status = $status_master->name;
        }


        $category = $this->getcategory();
        foreach ($individual_accuser_detail as $status) {
            $userstable_status = $status->status;
            $get_category = $status->c_subject;
        }

        $cat_type = [];
        if (array_key_exists($get_category, $category)) {
            foreach ($category as $category) {
                $cat_type[$category['id']] = $category['name'];
            }
            $category_type = $cat_type[$get_category];
        }
        $individual_user_detail_images = $this->images->find()->where(['images.user_id' => $id])->toArray();
        $individual_accuser_detail = $this->Users->find()->where(['Users.id' => $id])->toArray();
        $witness_user_detail = $this->Witns->find()->where(['Witns.user_id' => $id]);
        $accused_detail = $this->accused->find()->where(['accused.complaint_id' => $id])->toArray();
        $this->set(compact('accused_detail', 'individual_user_detail_images', 'users_status'));

        if ($this->request->is('post')) {
            $this->loadModel('Complaints');
            $MyVoiceControl_personal_notes = $this->request->data('notes');
            $complaint_id = $this->request->data('complaint_id');
            $accusation = TableRegistry::get("Complaints");
            $query = $accusation->query();
            $result = $query->update()
                    ->set(['Complaints.notes' => $MyVoiceControl_personal_notes])
                    ->where(['Complaints.complaint_id' => $complaint_id])
                    ->execute();
            $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsPersonalNote', $id]);
        }
        $this->set('individual_accuser_detail', $individual_accuser_detail);
        $this->set('witness_user_detail', $witness_user_detail);
        $this->set('category_type', $category_type);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($panel_id = null, $id = null) {
        $this->loadModel('Panels');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Panels->get($panel_id);
        if ($this->Panels->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'ComplaintDetailsPanelFormation', $id]);
    }

    public function getcategory() {
        $category_table = TableRegistry::get("category");
        $query = $category_table->find()
                ->where(array('sub_cat_id =' => '0', 'status =' => '1'));

        $rtn = array();
        foreach ($query as $key => $value) {
            $rtn[$value['id']] = $value->toArray();
        }
        return $rtn;
    }

    public function getSubcate() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $selected = $data['sel'];
            $sub_table = TableRegistry::get("category");
            $query = $sub_table->find('all')
                    ->where(['sub_cat_id' => $selected, 'status =' => '1']);
            $html = '<option value="0" > Select </option>';
//            $html = '<option selected="" value="all" > All </option>';
            foreach ($query as $key => $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->name . '</option>';
            }
            echo json_encode(array('html' => $html));
            die;
        } else {
            echo 'Invalid request';
            die;
        }
        //echo 'in';die;
    }

    public function getReportSubcate() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $selected = $data['sel'];
            $sub_table = TableRegistry::get("category");
            $query = $sub_table->find('all')
                    ->where(['sub_cat_id' => $selected, 'status =' => '1']);
//            $html='<option value="0" > Select </option>';
            $html = '<option selected="" value="all" > All </option>';
            foreach ($query as $key => $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->name . '</option>';
            }
            echo json_encode(array('html' => $html));
            die;
        } else {
            echo 'Invalid request';
            die;
        }
        //echo 'in';die;
    }

    //query for multiple search
    public function report_old($category = null) {

        $this->loadModel('Users');
        $this->loadModel('Complaints');
        $this->loadModel('accused');
        $category = '';
        $complaintId = '';
        $subcategory = '';
        $severity = '';
        $case_status = '';
        $sahar = '';
        $from = '';
        $to = '';
        $work_location = '';
        if ($this->request->is('get')) {
            $category = $this->request->query('category');
            $severity = $this->request->query('severity');
            $sahar = $this->request->query('city');
            $case_status = $this->request->query('case_status');
            $work_location = $this->request->query('location');
        }
        if ($this->request->is('post')) {
            $complaintId = $this->request->data('complaint_id');
            $category = $this->request->data('category');
            $subcategory = $this->request->data('subCategory');
            $severity = $this->request->data('severity');
            $case_status = $this->request->data('case_status');
            $sahar = $this->request->data('city');
            $from = $this->request->data('from');
            $to = $this->request->data('to_date');
        }
        if (trim($category) === 'all') {
            $category = '';
        }
        if (trim($subcategory) === 'all') {
            $subcategory = '';
        }
        if (trim($severity) === 'all') {
            $severity = '';
        }
        if (trim($case_status) === 'all') {
            $case_status = '';
        }
        if (trim($sahar) === 'all') {
            $sahar = '';
        }

        if ($to) {
            $to_date = date("Y-m-d", strtotime($to));
        }
        if ($from) {
            $from_date = date("Y-m-d", strtotime($from));
        }

        $data = $this->getcategory();
        $this->loadModel('Hr');
        $city = $this->Hr->getCities();
        $role = $this->getRole();
        $user = $this->Auth->user();
        $session = $this->request->session();
        $session_data = $session->read();
        $user_role = $session_data["Auth"]["User"]["role"];
        $user_id = $session_data["Auth"]["User"]["id"];
        $complaints_where = '';
        //code to assign category to view role wise
        if ($user_role === '7' || $user_role === '3') {
            $category = 1;
        }
        if ($user_role === '8' || $user_role === '12') {
            $category = 7;
        }
        if ($user_role === '9' || $user_role === '13') {
            $category = 4;
        }
        if ($user_role === '10') {
            $category = 20;
        }

        $sql = '';
        $connection = ConnectionManager::get('default');

        if ($user_role == '4') {
            $sql = "SELECT 
                                        users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,a.accused_name,a.accused_name,c.assign_status,c.assigned_to,c.assign_status
                                        FROM users 
                                        LEFT JOIN accused AS a ON users.id=a.complaint_id 
                                        LEFT JOIN complaints AS c ON c.complaint_id=users.id";
            $complaints_where = $user_role;
            $assigned_to_hr = '1';
            $session_userid = $user_id;
        } elseif ($user_role == '5' || $user_role == '6') {
            $sql = "SELECT
                                   users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,a.accused_name
                                   FROM users 
                                   LEFT JOIN accused AS a ON users.id=a.complaint_id 
                                   WHERE users.id IN(SELECT complaint_id FROM panels WHERE user_id ='" . $user_id . "' AND is_accepted <> '2') AND users.complaint_id <> ''";
        } elseif ($user_role == '7' || $user_role == '3') {
            $sql = "SELECT
                                   users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,a.accused_name,a.accused_name,c.assign_status,c.assigned_role,c.assigned_to,c.assign_status 
                                   FROM users 
                                   LEFT JOIN accused AS a ON users.id=a.complaint_id
                                   LEFT JOIN complaints AS c ON c.complaint_id=users.id";
            $complaints_where = $user_role;
            $session_userid = $user_id;
        } elseif ($user_role == '8' || $user_role == '12') {
            $sql = "SELECT users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,a.accused_name,a.accused_name,c.assign_status,c.assigned_role,c.assigned_to,c.assign_status
                                   FROM users 
                                   LEFT JOIN accused AS a ON users.id=a.complaint_id 
                                   LEFT JOIN complaints AS c ON c.complaint_id=users.id";
            $complaints_where = $user_role;
            $session_userid = $user_id;
        } elseif ($user_role == '9' || $user_role == '13') {
            $sql = "SELECT
                                   users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,a.accused_name,a.accused_name,c.assign_status,c.assigned_role,c.assigned_to,c.assign_status
                                   FROM users 
                                   LEFT JOIN accused AS a ON users.id=a.complaint_id 
                                   LEFT JOIN complaints AS c ON c.complaint_id=users.id";
            $complaints_where = $user_role;
            $session_userid = $user_id;
        } elseif ($user_role == '10') {
            $sql = "SELECT
                                   users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,a.accused_name,a.accused_name,c.assign_status,c.assigned_role,c.assigned_to,c.assign_status 
                                   FROM users 
                                   LEFT JOIN accused AS a ON users.id=a.complaint_id
                                   LEFT JOIN complaints AS c ON c.complaint_id=users.id";
            $complaints_where = $user_role;
            $session_userid = $user_id;
        } else {
            $sql = "SELECT
                                   users.id,users.complaint_id,users.name,users.severity,users.status,users.c_title,users.c_subject,users.complaint_id_genrate_date,accused_name 
                                   FROM users 
                                   LEFT JOIN accused ON users.id=accused.complaint_id   ";
        }
        $where = '';
        if (($user_role == '5') || ($user_role == '6')) {
            $where = " AND";
        } else {
            $where = " WHERE users.complaint_id <> '' AND";
        }

        $condition = "";

        if ($complaintId) {
            $condition .= " users.complaint_id LIKE '%" . $complaintId . "%' AND";
        }

        if ($category) {
            $condition .= " users.c_subject='" . $category . "' AND";
        }

        if ($subcategory) {
            $condition .= " users.other_issue='" . $subcategory . "' AND";
        }

        if ($severity) {
            $condition .= " users.severity='" . $severity . "' AND";
        }

        if ($case_status) {
            $condition .= " users.status='" . $case_status . "' AND";
        }

        if ($work_location) {
            $condition .= " users.work_location='" . $work_location . "' AND";
        }

        if ($sahar) {
            $condition .= " users.city='" . $sahar . "' AND";
        }

        if (@$from_date && $to_date) {
            $condition .= " users.complaint_id_genrate_date BETWEEN '" . @$from_date . "' AND '" . $to_date . "' AND";
        }

        if ($complaints_where && $session_userid) {
            if ($user_role == '4') {
                $condition .= " c.assigned_to_hr='" . $assigned_to_hr . "' AND c.assigned_to='" . $session_userid . "' AND";
            } elseif ($user_role == '12' || $user_role == '13' || $user_role == '3') {
//                    $condition .=" c.assigned_role='".$user_role."' AND c.assigned_to='".$session_userid."' AND";
            } else {
                $condition .= " c.assigned_role='" . $user_role . "' AND c.assigned_to='" . $session_userid . "' AND";
            }
        }

        if ($condition) {
            $whereCondition = "";
            $whereCondition = rtrim($where . $condition, "AND");
            $sql .= $whereCondition;
        }

        if ($condition == '') {
            $whereCondition = "";
            $whereCondition = rtrim($where . $condition, "AND");
            $sql .= $whereCondition;
        }


        $sql .= " group by users.complaint_id order by users.id desc";
        $result = $connection->execute($sql)->fetchAll('assoc');

        //pr($result);exit;
//            if (($user_role === '6')||($user_role=== '5')) {
//                $result = $this->getForScribe();
//            }
        $this->viewBuilder()->layout('manager_layout');
        $cat = $this->getcategory();
        $query = $this->getStatus();

        $cstatusTable = TableRegistry::getTableLocator()->get('Cstatus');
        $query4 = $cstatusTable->find('all')
                ->where(['status' => 1]);

        $cstatusData = [];
        foreach ($query4 as $stts) {
            if (!empty($stts)) {
                $cstatusData[$stts->id] = $stts->name;
            }
        }
        //pr($cstatusData);die;
        $this->set(compact('data', 'city', 'result', 'complaintId', 'category', 'subcategory', 'severity', 'sahar', 'from', 'to', 'case_status', 'cat', 'query', 'assign_role', 'hr_userdetail', 'hr_user_complaintdetail', 'assign_status', 'cstatusData'));
    }

    public function generatePdf($id = '') {
        // instantiate and use the dompdf class
        if ($id != '') {
            $html = $this->genrateHtml($id);
            $user = TableRegistry::get("users");
            $complain = $user->find()->select('complaint_id')->where(['id' => $id])->toArray();
            $extract_complaintid = $complain[0]['complaint_id'];
            $document_name = $extract_complaintid;
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream($document_name);
        }
    }

    public function genrateHtml($id = '') {
        if ($id != '') {
            $connection = ConnectionManager::get('default');
            $sql = "SELECT users.* FROM users WHERE users.id = '" . $id . "'";
            $result = $connection->execute($sql)->fetchAll('assoc');
            $sqlAccused = "SELECT accused.* FROM accused WHERE accused.complaint_id = '" . $id . "'";
            $Accusedresult = $connection->execute($sqlAccused)->fetchAll('assoc');
            $sqlWitns = "SELECT witns.* FROM witns WHERE witns.user_complaint_id = '" . $id . "'";
            $Witnsresult = $connection->execute($sqlWitns)->fetchAll('assoc');
            foreach ($result as $result) {
                $title = ucwords($result['c_title']);
                $complaint_id = $result['complaint_id'];
                $category_type = $result['c_subject'];
                $date = date('d-m-Y', strtotime($result['complaint_id_genrate_date']));
                $case_status = $result['status'];
                $name = ucfirst($result['name']);
                $email = $result['email'];
                $mobile = $result['mobile'];
                $business_unit = ucwords($result['bu']);
                $department = ucfirst($result['department']);
                $work_location = ucfirst($result['work_location']);
                $concern_details = ucfirst($result['concern_details']);
                $city = ucfirst($result['city']);
                $employee = $result['empid'];
            }
            if ($case_status === '1') {
                $case_status = 'Case Filed';
            }

            if ($category_type === '1') {
                $category_type = 'Harassment';
            }
            if ($category_type === '4') {
                $category_type = 'Ethics';
            }
            if ($category_type === '7') {
                $category_type = 'Disciplinary';
            }

            $file = 'logo.png';
            $newFilePath = WWW_ROOT . 'images' . DS . $file;

            $html = '';
            $html .= '<html>';
            $html .= '<head>';
            $html .= '<style>
                            @page {
                                margin: 100px 25px;
                            }
                            
                            header {
                                position: fixed;
                                top: -60px;
                                left: 0px;
                                right: 0px;
                                height: 50px;
                                color: black;
                                line-height: 50px;
                            }
                            
                            footer {
                                position: fixed; 
                                bottom: -60px; 
                                left: 0px; 
                                right: 0px;
                                height: 50px; 
                                color: white;
                                text-align: center;
                                line-height: 35px;
                            }
                            .example td {
                                padding: 8px;
                            }
                            .settable th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                            }
                            .settable td,th {
                                 padding: 10px;
                            }
                            .styletd {
                                font-size: 17px;
                                font-weight: bold;
                            }
                            #title {
                                text-align: center;
                                font-size: 30px;
                                font-wight: bold;
                                background-color: #17bb94;
                            }
                            h3 {
                                text-align: center;
                                margin-top: -10px;
                                fontweight: bold;
                                
                            }
                            img {
                                height: 50px;
                                width: 100px;
                                float: left;
                                margin-left: 15px;
                            }
                            
                       </style>';
            $html .= '</head>';
            $html .= '<body>';
            $html .= '<header>';
            $html .= '<div><img src="' . $newFilePath . '"></div>';
            $html .= '</header>';
            $html .= '<div><h3>Complaints Summary<h3></div>';
            $html .= '<table class="example">
                            <thead>
                                <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="styletd">Compalint Id :</td>
                                    <td class="tdspace">' . $complaint_id . '</td>
                                    <td class="styletd">Name :</td>
                                    <td class="tdspace">' . $name . '</td>
                                    <td class="styletd">Business Unit :</td>
                                    <td class="tdspace">' . $business_unit . '</td>
                                </tr>
                                <tr>
                                    <td class="styletd">Employee Id :</td>
                                    <td class="tdspace">' . $employee . '</td>
                                    <td class="styletd">Status :</td>
                                    <td class="tdspace">' . $case_status . '</td>
                                    <td class="styletd">Email Id :</td>
                                    <td class="tdspace">' . $email . '</td>
                                </tr>
                                <tr>
                                    <td class="styletd">Category Type :</td>
                                    <td class="tdspace">' . $category_type . '</td>
                                    <td class="styletd">City :</td>
                                    <td class="tdspace">' . $city . '</td>
                                    <td class="styletd">Work Location :</td>
                                    <td class="tdspace">' . $work_location . '</td>
                                </tr>
                                <tr>
                                    <td class="styletd">Mobile :</td>
                                    <td class="tdspace">' . $mobile . '</td>
                                    <td class="styletd">Filed On :</td>
                                    <td class="tdspace" style="width:120px;">' . $date . '</td>    
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>';
            $html .= '<div>
                            <h4>Complaint Details :</h4>
                                <div class="p-t-20">
                                    <p>' . $concern_details . '</p>
                                </div>
                            </div>
                        </div>';
            $html .= '<div>
                            <h4>Offender Details :</h4>
                                <div>
                                    <p></p>
                                </div>
                            </div>
                        </div>';
            $html .= '<table class="settable" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Emp Id</th>
                                    <th>Email</th>
                                    <th>Business Unit</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>';
            foreach ($Accusedresult as $Accusedresult) {
                $html .= '<tr>
                                    <td>' . $Accusedresult['accused_name'] . '</td>
                                    <td>' . $Accusedresult['accused_empid'] . '</td>
                                    <td>' . $Accusedresult['accused_email'] . '</td>
                                    <td>' . $Accusedresult['accused_bu'] . '</td>
                                    <td>' . $Accusedresult['accused_dept'] . '</td>    
                                    <td>' . $Accusedresult['accused_location'] . '</td>
                                    <td>' . $Accusedresult['accused_city'] . '</td>
                                </tr>';
            }
            $html .= '</tbody>
                         </table>';
            $html .= '<div>
                            <h4>Witness Details :</h4>
                                <div>
                                    <p></p>
                                </div>
                            </div>
                        </div>';
            $html .= '<table class="settable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Emp Id</th>
                                    <th>Email</th>
                                    <th>Relationship</th>
                                    <th>Mobile</th>
                                    <th>Business Unit</th>
                                    <th>Location</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>';
            foreach ($Witnsresult as $Witnsresult) {
                $html .= '<tr>
                                    <td>' . $Witnsresult['wi_name'] . '</td>
                                    <td>' . $Witnsresult['wi_empid'] . '</td>
                                    <td>' . $Witnsresult['wi_email_id'] . '</td>
                                    <td>' . $Witnsresult['relationship'] . '</td>
                                    <td>' . $Witnsresult['phone'] . '</td>
                                    <td>' . $Witnsresult['wi_bu'] . '</td>
                                    <td>' . $Witnsresult['wi_location'] . '</td>
                                    <td>' . $Witnsresult['wi_city'] . '</td>
                                </tr>';
            }
            $html .= '</tbody>
                         </table>';
            $html .= '<footer>';
            $html .= '</footer>';
            $html .= '</body>';
            $html .= '</html>';

//               echo $html;exit;
            return $html;
        }
    }

    public function generateMail() {
//            $this->autoRender = false;
        $email = new Email('default');
        $email->from(['arbindkumar42@gmail.com' => 'My Site'])
                ->to('arbind212306@gmail.com')
                ->subject('About')
                ->send('My message');
//            $to = 'arbind212306@gmail.com';
//            $subject = 'Your Complaint has been generated';
//            $msg = 'Your Complaint has generated';
//            $email = new Email('default');
//       $email
//            ->transport('gmail')
//            ->from(['arbindkumar42@gmail.com' => 'abcx.com'])
//            ->to($to)
//            ->subject($subject)
//            ->emailFormat('html')
//////            ->viewVars(array('msg' => $msg))
//            ->send($msg); 
    }

    //query for getting status
    public function getStatus() {
        $category_table = TableRegistry::get("cstatus");
        return $query = $category_table->find('all')->toArray();
//           var_dump($query);exit;
    }

    //query for getting role
    public function getRole() {
        $category_table = TableRegistry::get("roles");
        return $query = $category_table->find('all')->toArray();
//           var_dump($query);exit;
    }

    public function getpanelmember() {

        $panel = TableRegistry::get("users");
        $query = $panel
                ->find()
                ->where(['role =' => '1'])
                ->orWhere(['role =' => '2'])
                ->orWhere(['role =' => '3'])
                ->orWhere(['role =' => '4'])
                ->orWhere(['role =' => '5'])
                ->orWhere(['role =' => '2']);
        foreach ($query as $key => $value) {
            $rtn[$value['id']] = $value->toArray();
        }
        return $rtn;
    }

    public function getpanelinfo() {
        if ($this->request->is('post')) {

            $selected = $this->request->data('sel');
            $category = $this->request->data('cid');
            $teamTable = TableRegistry::getTableLocator()->get('team');
            $html = '<option value="0">Please select</option>';
            $query1 = $teamTable->find('all')
                    ->where(['role_id' => $selected, 'category_id' => $category])
                    ->contain('Users');
            foreach ($query1 as $rw) {
                if (!empty($rw)) {
                    $html = $html . '<option data-email="' . $rw['user']['email'] . '" data-eid="' . $rw['user']['empid'] . '" value="' . $rw['user']['id'] . '">' . ucfirst($rw['user']['name']) . '</option>';
                }
            }
            echo(json_encode(['html' => $html]));
            exit;
        }
    }

    function removeRequest($panel_id) {
        $this->autoRender = false;
        $panelTable = TableRegistry::getTableLocator()->get("Panels");
        $panel = $panelTable->get($panel_id);
        if (!empty($panel)) {
            $panelTable->delete($panel);
        }
        return $this->redirect($this->referer());
    }

    function getForScribe() {
        $u_data = [];
        $user_id = $this->Auth->user('id');
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $query1 = $panelTable->find('all')
                ->where(['Panels.user_id' => $user_id, 'is_accepted !=' => 2]);
        $complain_data = [];
        foreach ($query1 as $row) {
            if (!empty($row)) {
                $complain_data[] = $row->complaint_id;
            }
        }
        //pr($complain_data);die;
        if (!empty($complain_data)) {

            $assusedTable = TableRegistry::getTableLocator()->get('Accused');
            $query31 = $assusedTable->find('all')
                    ->where(['complaint_id IN' => $complain_data]);
            $assudedData = [];
            foreach ($query31 as $row) {
                if (!empty($row)) {
                    if (empty($assudedData[$row->complaint_id])) {
                        $assudedData[$row->complaint_id] = ucfirst($row->accused_name);
                    } else {
                        $assudedData[$row->complaint_id] = $assudedData[$row->complaint_id] . ", " . ucfirst($row->accused_name);
                    }
                }
            }
            // pr($assudedData);die;
//            $complainTable = TableRegistry::getTableLocator()->get('Complaints');
//            $query2 = $complainTable->find('all')
//                    ->where(['complaint_id IN' => $complain_data]);
//            $complainU_data = [];
//            $assudedData2 = [];
//            foreach ($query2 as $row) {
//                if (!empty($row)) {
//                    if (!empty($assudedData[$row->complaint_id])) {
//                        if(empty($assudedData2[$row->user_id])){
//                            $assudedData2[$row->user_id][] = $assudedData[$row->complaint_id];
//                            $assudedData2[$row->user_id][] = $row->complaint_id;
//                        }
//                    }
//                    $complainU_data[] = $row->user_id;
//                }
//            }
            // pr($assudedData2);die;
            // pr($complain_data);die;

            if (!empty($complain_data)) {
                //array_unique($complainU_data);
                //echo 'as';pr($complainU_data);die;
                $userTable = TableRegistry::getTableLocator()->get('Users');
                foreach ($complain_data as $cdata) {
                    //echo $cdata;
                    $query3 = $userTable->find('all')
                            ->where(['id' => $cdata]);
                    foreach ($query3 as $row) {
                        //var_dump($row->toArray());
                        if (!empty($row)) {
                            // echo $row->user_id;die;
                            if (!empty($assudedData[$row->id])) {
                                $tmpAry = $row->toArray();
                                $tmpAry['accused_name'] = $assudedData[$row->id];
                                //$tmpAry['complaint_link'] = $assudedData2[$row->user_id][1];
                                $u_data[] = $tmpAry;
                            } else {
                                $u_data[] = $tmpAry;
                            }
                        }
                    }
                }
            }
        }
        //pr($u_data);die;
        //die; 
        return $u_data;
    }

    function changeDispostion() {
        $this->autoRender = false;
        $requestData = $this->request->data;
        $complain_id = $requestData['cid'];
        $status = $requestData['sel'];
        if (in_array($status, [15])) {
            echo 'Invalid operation !';
            die;
        }
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $complain = $userTable->get($complain_id);
        if (!empty($complain)) {
            $complain->status = $status;
            if ($userTable->save($complain)) {
                echo 'Complaint disposition changed successfully !';
            } else {
                echo 'Error occurred !';
            }
            die;
        }
    }

    function actionClose($complaint_id) {
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $teamTable = TableRegistry::getTableLocator()->get('team');
        $user_id = $this->Auth->user('id');
        $query1 = $userTable->find('all')
                ->where(['id' => $complaint_id]);
        if (empty($query1->first())) {
            return $this->redirect($this->referer());
        }
        $category = $query1->first()->c_subject;
        $query2 = $teamTable->find('all')
                ->where(['category_id' => $category, 'role_id' => 4]);
        $tmpData = [];
        foreach ($query2 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1->user_id;
            }
        }
        if (!in_array($user_id, $tmpData)) {
            return $this->redirect($this->referer());
        }

        if ($this->request->is('post')) {
            $enty = $userTable->get($complaint_id);
            $enty->status = 17;
            $userTable->save($enty);
        }

        $this->viewBuilder()->layout('myvoice');
        $setData = $this->Summary->getSummary($complaint_id, true);
        $this->set($setData);
        $selected_sidebar = 16;
        $this->set(compact(['complaint_id', 'selected_sidebar']));
    }

    //query for report and search for multiple role
    public function report() {
        // For layout
        $where = [];
        $complaintData = [];
        //code for assigning variable to null that are used for specific purpose
        $category = '';
        $subcategory = '';
        $complaintId = '';
        $severity = '';
        $case_status = '';
        $city = '';
        $from = '';
        $to = '';
        if ($this->request->is('post')) {
            $requestData = $this->request->data;
            //pr($requestData);die;
            if (!empty($requestData['complaint_id'])) {
                $tmp_con1 = ['complaint_id LIKE' => "%" . $requestData['complaint_id'] . "%"];
                $where[] = $tmp_con1;
            }
            if (!empty($requestData['category'])) {
                $tmp_con1 = ['Category.id' => $requestData['category']];
                $where[] = $tmp_con1;
                $category = $requestData['category'];
            }
            if (!empty($requestData['subCategory']) && ($requestData['subCategory'] != "all")) {
                $tmp_con1 = ['other_issue' => $requestData['subCategory']];
                $where[] = $tmp_con1;
                $subcategory = $requestData['subCategory'];
            }
            if (!empty($requestData['severity'])) {
                $tmp_con1 = ['severity LIKE ' => "%" . $requestData['severity'] . "%"];
                $where[] = $tmp_con1;
                $severity = $requestData['severity'];
            }
            if (!empty($requestData['city'])) {
                $tmp_con1 = ['city LIKE ' => "%" . $requestData['city'] . "%"];
                $where[] = $tmp_con1;
                $city = $requestData['city'];
            }
            if (!empty($requestData['from'])) {
                $tmp_con1 = ['complaint_id_genrate_date >' => $requestData['from']];
                $where[] = $tmp_con1;
                $from = $requestData['from'];
            }
            if (!empty($requestData['to'])) {
                $tmp_con1 = ['complaint_id_genrate_date <' => $requestData['to']];
                $where[] = $tmp_con1;
                $to = $requestData['to'];
            }
            if (!empty($requestData['to']) && (!empty($requestData['from']))) {
                $tmp_con1 = ['complaint_id_genrate_date BETWEEN' => $requestData['to'] . " AND " . $requestData['from']];
                $where[] = $tmp_con1;
            }
            if (!empty($requestData['case_status'])) {
                $tmp_con1 = ['Users.status' => $requestData['case_status']];
                $where[] = $tmp_con1;
                $case_status = $requestData['case_status'];
            }

            //pr($requestData);die;
            $this->set($this->request->data);
        }

        $this->loadModel('Hr');
        $this->viewBuilder()->layout('myvoice');
        $this->set('is_report', true);
        $this->set('remove_jquery', true);
        // Get cases for logged user
        $role = $this->Auth->user('role');


        // Get data
        $complaintTable = TableRegistry::getTableLocator()->get('Users');
        $complaintRoleCate = $this->getComplaintsCategory();
        // pr($complaintRoleCate);die;
        $complaint_type = [];
        if (!empty($complaintRoleCate)) {
            foreach ($complaintRoleCate as $cate => $role) {
                $complaint_type[] = $cate;
            }
        }
        if (!empty($complaint_type)) {
            $where[] = ['Users.c_subject IN' => $complaint_type];
        }

        // pr($where);die;
        $query1 = $complaintTable->find('all')
                ->where($where)
                ->contain(['Category', 'accused', 'Cstatus'])
                ->order(['Users.id' => 'DESC']);
        // ->group('Complaints.complaint_id');
        foreach ($query1 as $r1) {
            if (!empty($r1) && (!empty($r1->complaint_id))) {
                // Don't show for pnale member etc if complaint is not accepted yet.
                if ($this->showInReport($r1, $complaintRoleCate)) {
                    $complaintData[] = $r1->toArray();
                }
            }
        }
        // die;
        // Set sidebar
        if (in_array($role, [3, 11])) {
            $allowed = [12, 13, 14];
        } else {
            $allowed = [12, 13];
        }
        $session = $this->getRequest()->getSession();
        $session->write('allowed', $allowed);
        $selected_sidebar = 12;
        // Set other data
        $status = $this->getStatus();
        $getGategory = $this->getcategory();
        $getcity = $this->Hr->getCities();
        // pr($getGategory);die;
        // pr($complaintData);die;
        $this->set(compact('complaintData', 'allowed', 'status', 'getGategory', 'category', 'subcategory', 'complaintId', 'severity', 'case_status', 'city', 'from', 'to', 'getcity', 'selected_sidebar'));
    }

    private function getComplaintsCategory() {
        $user = $this->Auth->user();
        $teamTable = TableRegistry::getTableLocator()->get('team');
        $query1 = $teamTable->find('all')
                ->where(['user_id' => $user['id']]);
        $teamCatData = [];

        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $teamCatData[$r1->category_id] = $r1->role_id;
            }
        }
        //pr($teamCatData);die;
        return $teamCatData;
    }

    private function showInReport($uData, $complaintRoleCate) {
        //$complaintRoleCate  format is [ category=>role];
        // pr($uData);
//            pr($complaintRoleCate);
//            die;
        $complaintTable = TableRegistry::getTableLocator()->get('Complaints');
        $user_id = $this->Auth->user('id');
        $return = false;
        if (!empty($uData) && (!empty($complaintRoleCate))) {
            $assignedToMe = false;
            $query0 = $complaintTable->find('all')
                    ->where(['complaint_id' => $uData->id]);
            //echo $uData->id;die;
            foreach ($query0 as $qr) {
                if (!empty($qr)) {
                    if ($qr->assigned_to == $user_id) {
                        $assignedToMe = true;
                    }
                }
            }

            $categoryComplnt = $uData->c_subject;
            $statusComplnt = $uData->status;
            if (!empty($complaintRoleCate[$categoryComplnt])) {
                $role_for_case = $complaintRoleCate[$categoryComplnt];
                // echo $role_for_case;die;
                if (($role_for_case == 4)) {
                    if (in_array($statusComplnt,[10,17,15])) {
                        $return = true;
                    }
                } else if (($role_for_case == 7) || ($role_for_case == 8) || ($role_for_case == 9) || ($role_for_case == 10)) {
                    if ($assignedToMe) {
                        $return = true;
                    }
                } else if (($role_for_case == 3) || ($role_for_case == 12) || ($role_for_case == 13)) {
                    $return = true;
                }
                if (($role_for_case != 5) || ($role_for_case != 6)) {
                    //if (!in_array($statusComplnt, [1, 2, 3, 4, 16, 17])) {
                        // Check if assigned
                        $panelTable = TableRegistry::getTableLocator()->get('Panels');
                        $query19 = $panelTable->find('all')
                                ->where(['Panels.complaint_id' => $uData->id, 'Panels.user_id' => $this->Auth->user('id')]);
                        if (!empty($query19->first())) {
                            $return = true;
                        }
                  //  }
                }
            }
        }
//        var_dump($return);
//        pr($uData);
//        pr($complaintRoleCate);
//           // die;
        return $return;
    }

}
