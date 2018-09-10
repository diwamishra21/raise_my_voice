<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ComplaintController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Summary');
        $this->viewBuilder()->layout('myvoice');
    }

    public function notes($complaint_id) {
        $complaintdetailTable = TableRegistry::getTableLocator()->get('Complaintdetails');
        $user_id = $this->Auth->user('id');
        $requestData = $this->request->data;
        if (($this->request->is('post')) && (!empty($requestData))) {
            //pr($requestData);die;
            $cdetails = $complaintdetailTable->newEntity();
            $cdetails->user_id = $user_id;
            $cdetails->complaint_id = $complaint_id;
            $cdetails->note = trim($requestData['note']);
            $uploaded_files = [];
            if (!empty($_FILES)) {
                $files_uploaded = $_FILES;
                $scribeDir = WWW_ROOT . 'upload' . DS . 'scribe' . DS;
                $i = 1;
                foreach ($files_uploaded as $key => $fileU) {
                    if ($fileU['error'] == 0) {
                        $fileNameTmp = $fileU['name'];
                        $fileNameTmp = explode('.', $fileNameTmp);
                        $ext = $fileNameTmp[count($fileNameTmp) - 1];
                        $fileName = array_diff($fileNameTmp, [$ext]);
                        $fileName = implode('.', $fileName);

                        $newFile = time() . '_' . $user_id . '_' . $i . '.' . $ext;
                        $i++;
                        $newFileAbs = $scribeDir . $newFile;
                        move_uploaded_file($fileU['tmp_name'], $newFileAbs);
                        $uploaded_files[] = $newFile;
                    }
                }
                if (!empty($uploaded_files)) {
                    $cdetails->image = implode(',', $uploaded_files);
                }
            }

            $complaintdetailTable->save($cdetails);
        }
        $script_for_footer = ['scribe/add_notes'];
        $setData = $this->Summary->getSummary($complaint_id, true);
        $this->set($setData);
        $role = $this->Auth->user('role');
        $selected_sidebar = 11;
        $this->set(compact(['complaint_id', 'selected_sidebar', 'script_for_footer']));
    }

    public function route($complaint_id) {
        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $teamTable = TableRegistry::getTableLocator()->get('team');
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $complaintTable = TableRegistry::getTableLocator()->get('Complaints');
        // Get category
        $query0 = $userTable->find('all')
                ->where(['id' => $complaint_id]);
        if (!empty($query0->first())) {
            $tData = $query0->first();
            $category_id = $tData->c_subject;
        } else {
            return $this->redirect($this->referer());
        }

        // Get complainInfo from complaint table, For PO purpose
        $accept_by_po = false;
        $accepted_by_hr = false;
        $query01 = $complaintTable->find('all')
                ->where(['complaint_id' => $complaint_id]);
        foreach ($query01 as $cmp) {
            if (!empty($cmp)) {
                // pr($cmp);
                if ($cmp->assign_status == '1') {
                    $accept_by_po = true;
                }
                if (($cmp->assigned_to_hr) && ($cmp->assign_status == '1')) {
                    $accepted_by_hr = true;
                }
            }
        }
        //var_dump($accept_by_po);
        //die;
        //-----------------------
        //pr($cmplntInfo);die;

        if (!empty($query0->first())) {
            $tData = $query0->first();
            $category_id = $tData->c_subject;
        }
        $cmpStatus = $tData->status;
        // Get access
        $query1 = $teamTable->find('all')
                ->where(['user_id' => $user_id, 'category_id' => $category_id]);
        if (!empty($query1->first())) {
            $tData2 = $query1->first();
            //echo $user_id;
            //pr($tData2);die;
            $role_id = $tData2->role_id;
            //echo $role_id;die;
            $auth_old = $loggedUser;
            $auth_old['role'] = (string) $role_id;
            $this->Auth->setUser($auth_old);
            $allowed = [1, 2, 3];
            $redirectCtrl = 'MyVoiceControl';
            $redirectAction = 'complaintDetailsAccuser';

            if ($role_id == '3') {
                $allowed = array_merge($allowed, [4, 5, 11]);
                if ($cmpStatus == 1) {
                    $redirectAction = 'complaintDetails';
                }
            } else if ($role_id == '4') {
                if ($accepted_by_hr) {
                    $allowed = array_merge($allowed, [11, 16]);
                } else {
                    if (in_array($cmpStatus, [10, 17, 15])) {
                        $redirectAction = 'complaintDetails';
                    } else {
                        $redirectCtrl = 'scribe';
                        $redirectAction = 'panelist';
                    }
                }
            } else if ($role_id == '5') {
                $redirectCtrl = 'scribe';
                $redirectAction = 'panelist';
                //$allowed = array_merge($allowed, [11]);
            } else if ($role_id == '6') {
                $redirectCtrl = 'scribe';
                $redirectAction = 'check';
            } else if (($role_id == '7') || ($role_id == '8') || ($role_id == '9') || ($role_id == '10')) {
                if ($accept_by_po) {
                    $redirectAction = 'complaintDetailsAccuser';
                    $allowed = array_merge($allowed, [6, 11]);
                } else {
                    $redirectAction = 'complaintDetails';
                }
            } else if ($role_id == '11') {
                
            } else if ($role_id == '12') {
                $allowed = array_merge($allowed, [4, 5, 11]);
                if ($cmpStatus == 1) {
                    $redirectAction = 'complaintDetails';
                }
            } else if ($role_id == '13') {
                $allowed = array_merge($allowed, [4, 5, 11]);
                if ($cmpStatus == 1) {
                    $redirectAction = 'complaintDetails';
                }
            } else if ($role_id == '14') {
                
            }
            //Check if added in panel
            $added_in_panel = false;
            //pr($allowed);//die;
            if (!in_array($role_id, [5, 6])) {
                $panelTable = TableRegistry::getTableLocator()->get('Panels');
                $query02 = $panelTable->find('all')
                        ->where(['Panels.complaint_id' => $complaint_id, 'Panels.user_id' => $this->Auth->user('id')]);
                if (!empty($query02->first())) {
                    $added_in_panel = true;
                    //var_dump($query02->first()->i_status);die;
                    if (in_array(11, $allowed)) {
                        if ($query02->first()->i_status == 0) { // Open
                            $allowed = array_diff($allowed, [11]);
                            if (!in_array(15, $allowed)) {
                                $allowed = array_merge($allowed, [15]);
                            }
                        } else if (in_array(15, $allowed)) {
                            $allowed = array_diff($allowed, [15]);
                            if (!in_array(11, $allowed)) {
                                $allowed = array_merge($allowed, [11]);
                            }
                        }
                    }
                    if ($query02->first()->i_status != 1) {
                        $redirectCtrl = 'scribe';
                        $redirectAction = 'panelist';
                    }
                }
            }

            // PO AFTER CLOSE
            $categoryId = $setData['complain_info']['c_subject'];
            if ($category_id == 1) {
                $roleAtt = 7;
            } else if ($category_id == 4) {
                $roleAtt = 9;
            } else if ($category_id == 7) {
                $roleAtt = 8;
            } else if ($category_id == 20) {
                $roleAtt = 10;
            }
            if (($roleAtt == $role_id) && ($cmpStatus == 17)) {
                if (!in_array(8, $allowed)) {
                    $allowed = array_merge($allowed, [8]);
                }
            }
            if (($roleAtt == $role_id) && (in_array($cmpStatus, [10, 17, 15]))) {
                if (!in_array(10, $allowed)) {
                    $allowed = array_merge($allowed, [10]);
                }
            }
            // pr($allowed);die;
            //sort($allowed);
            $session = $this->getRequest()->getSession();
            $session->write('allowed', $allowed);
            return $this->redirect(['controller' => $redirectCtrl, 'action' => $redirectAction, $complaint_id]);
        } else {
            return $this->redirect($this->referer());
        }
    }

}
