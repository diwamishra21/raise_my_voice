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

use Cake\I18n\Time;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public function initialize() {
        Time::$defaultLocale = 'es-ES';
        Time::setToStringFormat('YYYY-MM-dd');
        $this->loadComponent('Paginator', [
            'limit' => 2
        ]);
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ],
            'authenticate' => [
            'Form' => [
                'finder' => 'auth'
            ]
        ]
        ]);
        $this->setsidebar();
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['index','sendusernotification','senduseracknowledgementnotification', 'login', 'signup','signupSuccess','add','anonymousConfirmation','ComplaintDetailsAssignUser','ComplaintDetailsAssign','anonymousConcern','witns','concern','ComplaintDetailsAccusationNature','addUser','profiles','dashboard','reportsearch','complaintDetails','wints','ComplaintDetailsAccuser','registerConcern','sineupSuccess','userComplaintDetails','viewuser','updateuserdetails','forgotpassword','witnsFetch','witnsdelete','addAccused','getcategory','getSubcate','getFilterDashboard','addcategory','addsubcategory','clientName','viewcategory','updatecategory','updateclientdetails','getroles','generateMail','generatePdf','genrateHtml','viewuser1','team','enableuser','disableuser','deleteuser']);
        
    }

    //function for generating emails
    public function sendUserEmail($to, $subject, $msg) {
        $email = new Email('default');
        $email
                ->transport('gmail')
                ->from(['abcx.com' => 'abcx.com'])
                ->to($to)
                ->subject($subject)
                ->emailFormat('html')
                ->viewVars(array('msg' => $msg))
                ->send($msg);


        $this->Auth->allow(['index','sendusernotification','senduseracknowledgementnotification', 'login', 'signup', 'signupSuccess', 'add', 'anonymousConfirmation', 'ComplaintDetailsAssignUser', 'ComplaintDetailsAssign', 'anonymousConcern', 'witns', 'concern', 'ComplaintDetailsAccusationNature', 'addUser', 'profiles', 'dashboard', 'reportsearch', 'complaintDetails', 'wints', 'ComplaintDetailsAccuser', 'registerConcern', 'userComplaintDetails', 'viewuser', 'updateuserdetails', 'forgotpassword', 'witnsFetch', 'witnsdelete', 'addAccused', 'getcategory', 'getSubcate', 'getFilterDashboard', 'addcategory', 'addsubcategory', 'clientName', 'viewcategory', 'updatecategory', 'updateclientdetails', 'getroles']);
    }

    private function setsidebar() {
        $sidebar = Configure::read('sidebar');
        $allowed = [1,2,3,4,5,6,7,8];
        $this->set(compact('sidebar','allowed'));
    }

}
