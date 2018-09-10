<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class ScribeController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Summary');
        $this->viewBuilder()->layout('myvoice');
    }

    public function addNotes($complaint_id) {
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $complaintdetailTable = TableRegistry::getTableLocator()->get('Complaintdetails');
        $user_id = $this->Auth->user('id');

        $query1 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $complaint_id, 'Panels.user_id' => $user_id, 'is_accepted' => 1]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if (empty($tmpData)) {
            $this->Flash->set('Invalid operation !');
            return $this->redirect($this->referer());
        }
        $requestData = $this->request->data;
        if (($this->request->is('post')) && (!empty($requestData))) {
            //pr($requestData);die;
            $cdetails = $complaintdetailTable->newEntity();
            $cdetails->user_id = $user_id;
            $cdetails->complaint_id = $complaint_id;
            $cdetails->meeting_date = $requestData['meeting_date'];
            $cdetails->note = trim($requestData['note']);
            $cdetails->next_meeting = $requestData['next_meeting'];
            if (!empty($requestData['meeting_attendees'])) {
                $cdetails->attendees = implode(',', $requestData['meeting_attendees']);
            }
            if (!empty($requestData['recommendation'])) {
                $cdetails->comments_attendes = $requestData['recommendation'];
            }
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
        $query2 = $complaintdetailTable->find('all')
                ->where(['Complaintdetails.complaint_id' => $complaint_id, 'meeting_date !=' => ""])
                ->contain(['Users']);
        $meetingData = [];
        foreach ($query2 as $mdata) {
            //pr($mdata);
            if (!empty($mdata)) {
                $meetingData[] = $mdata->toArray();
            }
        }

        $meetingData = $this->prcessMeetingData($meetingData);
        //pr($meetingData);die;
        $script_for_footer = ['scribe/add_notes', 'moment.min', 'bootstrap-datetimepicker.min', 'select2.min'];
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        $role = $this->Auth->user('role');
        // Attendees
        $teamTable = TableRegistry::getTableLocator()->get('team');

        $query3 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $complaint_id, 'is_accepted' => 1])
                ->contain(['Users']);
        $panalistData = [];
        foreach ($query3 as $row3) {
            array_push($panalistData, $row3->toArray());
        }
        $categoryId = $setData['complain_info']['c_subject'];
        if ($categoryId == 1) {
            $roleAtt = 7;
        } else if ($categoryId == 4) {
            $roleAtt = 9;
        } else if ($categoryId == 7) {
            $roleAtt = 8;
        } else if ($categoryId == 20) {
            $roleAtt = 10;
        }
        $query31 = $teamTable->find('all')
                ->where(['team.category_id' => $setData['complain_info']['c_subject'], 'role_id' => $roleAtt])
                ->contain(['Users']);


        foreach ($query31 as $qr) {
            if (!empty($qr)) {
                $panalistData[] = $qr->toArray();
            }
        }
        //---------------------------

        $selected_sidebar = 7;
        $this->set(compact(['complaint_id', 'selected_sidebar', 'script_for_footer', 'meetingData', 'panalistData']));
    }

    public function check($complaint_id) {
        $this->autoRender = false;
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $query1 = $panelTable->find('all')
                ->where(['user_id ' => $this->Auth->user('id'), 'complaint_id' => $complaint_id]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if (!empty($tmpData)) {
            if ($tmpData[0]['is_accepted'] == 0) {
                return $this->redirect(['action' => 'approval', $complaint_id, 'scribe']);
            } else {
                $allowed = [1, 2, 3, 7, 10];
                $session = $this->getRequest()->getSession();
                $session->write('allowed', $allowed);
                return $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'complaintDetailsAccuser', $complaint_id]);
            }
        }
    }

    public function approval($complaint_id, $type) {
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        // $setCdata = $this->Summary->getHistory($complaint_id);
        //pr($setCdata);die;
        //  $this->set($setCdata);
        $allowed = [];
        //$selected_sidebar = 7;
        $this->set(compact(['complaint_id', 'allowed', 'type']));
    }

    public function selection($complaint_id, $flag) {
        $user_id = $this->Auth->user('id');
        $this->autoRender = false;
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $query1 = $panelTable->find('all')
                ->where(['user_id ' => $user_id, 'complaint_id' => $complaint_id]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if (!empty($tmpData)) {
            $panel = $panelTable->newEntity();
            $panel->id = $tmpData[0]->id;
            if ($flag) {
                $panel->is_accepted = 1;
            } else if (!$flag) {
                $panel->is_accepted = 2;
            }
            if ($panelTable->save($panel)) {
                $allowed = [1, 2, 3, 7, 10];
                $session = $this->getRequest()->getSession();
                $session->write('allowed', $allowed);
                $this->redirect(['controller' => 'MyVoiceControl', 'action' => 'complaintDetailsAccuser', $complaint_id]);
            }
            $this->redirect($this->referer());
        }
    }

    public function selectionPanel($complaint_id, $flag) {
        $user_id = $this->Auth->user('id');
        $this->autoRender = false;
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $query1 = $panelTable->find('all')
                ->where(['user_id ' => $user_id, 'complaint_id' => $complaint_id]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if (!empty($tmpData)) {
            $panel = $panelTable->newEntity();
            $panel->id = $tmpData[0]->id;
            if ($flag) {
                $panel->is_accepted = 1;
            } else if (!$flag) {
                $panel->is_accepted = 2;
            }
            if ($panelTable->save($panel)) {
                $allowed = [1, 2, 3, 15];
                $session = $this->getRequest()->getSession();
                $session->write('allowed', $allowed);
                $this->redirect(['action' => 'panelist', $complaint_id]);
            }
            $this->redirect($this->referer());
        }
    }

    public function panelist($complaint_id) {
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $complaintTable = TableRegistry::getTableLocator()->get('Complaints');
        $complaintdetailTable = TableRegistry::getTableLocator()->get('Complaintdetails');
        $teamTable = TableRegistry::getTableLocator()->get('team');
        $user_id = $this->Auth->user('id');

        $query1 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $complaint_id, 'Panels.user_id' => $user_id]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if (empty($tmpData)) {
            $this->Flash->set('Invalid operation !');
            return $this->redirect($this->referer());
        } else {
            // check if accepted
            if ($tmpData[0]->is_accepted != 1) {
                return $this->redirect(['action' => 'approval', $complaint_id, 'panel']);
            } else {
                $session = $this->getRequest()->getSession();
                $allowedK = $session->read('allowed');
                if (!in_array(15, $allowedK)) {
                    array_push($allowedK, 15);
                }
                $session->write('allowed', $allowedK);
            }
            $this->set('cur_panel', $tmpData[0]);
        }
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
        $query2 = $complaintdetailTable->find('all')
                ->where(['Complaintdetails.complaint_id' => $complaint_id, 'meeting_date !=' => ""])
                ->contain(['Users']);
        $meetingData = [];
        foreach ($query2 as $mdata) {
            if (!empty($mdata)) {
                $meetingData[] = $mdata->toArray();
            }
        }

        // allow status
        $query11 = $complaintTable->find('all', ['fields' => ['allow_close']])
                ->where(['complaint_id' => $complaint_id]);
        $allow_close = false;
        $tmpData2 = [];
        foreach ($query11 as $r1) {
            if (!empty($r1)) {
                $tmpData2[] = $r1;
            }
        }
        if (!empty($tmpData2)) {
            if ($tmpData2[0]->allow_close) {
                $allow_close = true;
            }
        }
        $script_for_footer = ['scribe/panelist'];
        $meetingData = $this->prcessMeetingData($meetingData);
        $setData = $this->Summary->getSummary($complaint_id, true);
        // Dual role in panel
        $query001 = $teamTable->find('all')
                ->where(['user_id' => $user_id, 'category_id' => $setData['complain_info']['c_subject']]);
        if (!empty($query001->first())) {
            $assigned_role = $query001->first()->role_id;
            if (!in_array($assigned_role, [5, 6]) && ($tmpData[0]->i_status == 1)) { // Closed panel inquary
                $session = $this->getRequest()->getSession();
                $allowedK2 = $session->read('allowed');
                //pr($allowedK2);die;
                if (in_array(15, $allowedK2)) {
                    $allowedK2 = array_diff($allowedK2, [15]);
                    if (!in_array(11, $allowedK2)) {
                        $allowedK2 = array_merge($allowedK2, [11]);
                    }
                }
                $session->write('allowed', $allowedK2);
            }
        }

        $this->set($setData);
        $this->set(compact(['complaint_id', 'meetingData', 'script_for_footer', 'allow_close']));
    }

    public function investigationSubmit($complaint_id) {
        $this->loadModel('Users');
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $complaintTable = TableRegistry::getTableLocator()->get('Complaints');
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $query1 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $complaint_id, 'is_scribe !=' => 1])
                ->contain(['Users']);
        $panelData = [];
        foreach ($query1 as $mdata) {
            if (!empty($mdata)) {
                $panelData[] = $mdata->toArray();
            }
        }
        $query11 = $complaintTable->find('all')
                ->where(['complaint_id' => $complaint_id]);
        $allow_close = false;
        $uploaded_report = false;

        $tmpData = [];
        foreach ($query11 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if (!empty($tmpData)) {
            if ($tmpData[0]->allow_close) {
                $allow_close = true;
            }
            if (($tmpData[0]->investigation_report) != "") {
                $uploaded_report = $tmpData[0];
            }
        }
        //pr($panelData);die;

        $requestData = $this->request->data;
        if ($this->request->is('post')) {
            //pr($requestData);die;
            $complaintU = $userTable->get($complaint_id);
            //pr($complaint);die;
            if (!empty($complaintU)) {
                $complaintU->status = 10;
                $k = $userTable->save($complaintU);
                $complaintsTable = TableRegistry::getTableLocator()->get('Complaints');
                $forward_user = $requestData['role_user'];
                $complaint = $complaintsTable->newEntity();
                $complaint->user_id = $complaintU->id;
                $complaint->complaint_id = $complaint_id;
                $complaint->status = 10;
                $complaint->assigned_to = $requestData['role_user'];
                $complaint->assigned_to_hr = 1;
                $complaint->notes = $requestData['notes'];
                $complaint->complaint_id = $complaint_id;
                $complaint->superwisor_complaint_accept_date = date('Y-m-d');
                //pr($complaint);die;
                $complaintsTable->save($complaint);

                $assign_role_user_details = $this->Users->find()->where(['Users.id' => $forward_user])->toArray();
                $assign_user_email = $assign_role_user_details[0]->email;
                $assign_user_name = $assign_role_user_details[0]->name;
                $individual_accuser_complaint_code = $assign_role_user_details[0]->complaint_id;


//                $newemail = new Email();
//                $newemail->viewVars(['name' => $assign_user_name, 'complaint_id' => $individual_accuser_complaint_code]);
//                $newemail->from(['learning@quatrro.com' => 'MyVoice'])
//                        ->to($assign_user_email)
////->to('abhishekkumargupta33@gmail.com')
//                        ->template('complaintScribeAssignBhrMail', 'mail')
//                        ->emailFormat('html')
//                        ->subject("Complaint $individual_accuser_complaint_code has been assigned in Myvoice ")
//                        ->send();


                $query122 = $panelTable->find('all')
                        ->where(['Panels.complaint_id' => $complaint_id, 'user_id' => $this->Auth->user('id')]);
                //var_dump($query122->first());die;
                $tmpData = [];
                foreach ($query122 as $r1) {
                    if (!empty($r1)) {
                        $tmpData[] = $r1;
                    }
                }

                if (!empty($tmpData)) {
                    $pentity = $panelTable->get($tmpData[0]->id);
                    $pentity->i_status = 1;
                    $panelTable->save($pentity);
                }


                // var_dump($k);die;
            }

            //pr($complaint);die;
        }

        $cInfo = $userTable->get($complaint_id);
        if (empty($cInfo)) {
            $this->redirect($this->referer());
        }
        $cateGory = $cInfo->c_subject;
        // IF scribe hide panel info
        $teamTable = TableRegistry::getTableLocator()->get('team');
        $query101 = $teamTable->find('all')
                ->where(['user_id' => $this->Auth->user('id'), 'category_id' => $cateGory]);
        $chkData = [];
        foreach ($query101 as $rk) {
            if (!empty($rk)) {
                $chkData[] = $rk->role_id;
            }
        }


        if ($cateGory == 1) {
            $roleAtt = 7;
        } else if ($cateGory == 4) {
            $roleAtt = 9;
        } else if ($cateGory == 7) {
            $roleAtt = 8;
        } else if ($cateGory == 20) {
            $roleAtt = 10;
        }


        $allowedRoles = [4];
//        if ($cateGory == 1) {
//            $allowedRoles = [3, 4, 5, 6, 7];
//        } else if ($cateGory == 4) {
//            $allowedRoles = [4, 5, 6, 9, 13];
//        } else if ($cateGory == 7) {
//            $allowedRoles = [4, 5, 6, 8, 12];
//        } else if ($cateGory == 10) {
//            $allowedRoles = [4, 5, 6, 10];
//        }
        $roleTable = TableRegistry::getTableLocator()->get('Roles');
        $query15 = $roleTable->find('list', ['fields' => ['id', 'name'], 'order' => ['name ASC']])
                ->where(['status' => 1, 'id IN' => $allowedRoles]);
        $rolesData = $query15->all()->toArray();
        $setData = $this->Summary->getSummary($complaint_id, false);
        $this->set($setData);
        $role = $this->Auth->user('role');
        $selected_sidebar = 10;
        $script_for_footer = ['scribe/single_file', 'panel'];
        
        $this->set(compact(['complaint_id', 'panelData', 'rolesData', 'script_for_footer', 'allow_close', 'selected_sidebar', 'uploaded_report', 'cateGory', 'hidePanelinfo']));
        if (in_array($roleAtt, $chkData)) {
            $this->render('investigation_submit_po');
        }
    }

    public function closePanel($complaint_id) {
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $query1 = $panelTable->find('all')
                ->where(['complaint_id' => $complaint_id, 'user_id' => $this->Auth->user('id')]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }

        if (!empty($tmpData)) {
            $panel = $panelTable->get($tmpData[0]->id);
            $panel->i_status = 1;
            $panelTable->save($panel);
        }
        $this->redirect($this->referer());
    }

    public function allowClose($complaint_id) {
        $this->autoRender = false;
        //$requestData = $this->request->data;
        if ($this->request->is('post')) {
            $user_id = $this->Auth->user('id');
            $panelTable = TableRegistry::getTableLocator()->get('Panels');
            $complaintsTable = TableRegistry::getTableLocator()->get('Complaints');
            $query1 = $panelTable->find('all')
                    ->where(['complaint_id' => $complaint_id, 'user_id' => $user_id, 'is_scribe' => 1]);
            $tmpData = [];
            foreach ($query1 as $r1) {
                if (!empty($r1)) {
                    $tmpData[] = $r1;
                }
            }

            if (!empty($tmpData)) {
                $complaintsTable->allowStatus($complaint_id);
            }
        }
        return $this->redirect($this->referer());
    }

    function uploadIreport($complaint_id) {
        $this->autoRender = false;
        $user_id = $this->Auth->user('id');
        $requestData = $this->request->data;
        $complaintsTable = TableRegistry::getTableLocator()->get('Complaints');
        if ($this->request->is('post')) {
            if (!empty($_FILES)) {
                $files_uploaded = $_FILES;
                $Dir = WWW_ROOT . 'upload' . DS;
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
                        $newFileAbs = $Dir . $newFile;
                        move_uploaded_file($fileU['tmp_name'], $newFileAbs);
                        $uploaded_files[] = $newFile;
                    }
                }
                if (!empty($uploaded_files)) {
                    $files = implode(',', $uploaded_files);
                    $complaintsTable->updateLike(['investigation_report' => $files], ['complaint_id' => $complaint_id]);
                }
            }
        }
        $this->redirect($this->referer());
    }

    private function prcessMeetingData($meetingData) {
        $returndata = [];
        //pr($meetingData);die;
        foreach ($meetingData as $key => $mdata) {
            //pr($mdata);
            //die;
            $returndata[$key]['meeting_date'] = $mdata['meeting_date'];
            $returndata[$key]['next_meeting'] = $mdata['next_meeting'];
            $returndata[$key]['recommendation'] = $mdata['comments_attendes'];
            $attendess = explode(',', $mdata['attendees']);
            $panelTable = TableRegistry::getTableLocator()->get('Panels');

            $query0 = $panelTable->find('all')
                    ->where(['Panels.complaint_id' => $mdata['complaint_id'], 'Panels.is_accepted' => 1])
                    ->contain('Users');
            $panelistsData = [];
            foreach ($query0 as $r0) {
                if (!empty($r0)) {
                    $tmp = $r0->toArray();
                    if (in_array($tmp['user_id'], $attendess)) {
                        $tmpPalist['attend'] = true;
                    } else {
                        $tmpPalist['attend'] = false;
                    }
                    $tmpPalist['uid'] = $tmp['user_id'];
                    $tmpPalist['empid'] = $tmp['user']['empid'];
                    $tmpPalist['name'] = $tmp['user']['name'];
                    array_push($panelistsData, $tmpPalist);
                }
            }

            $returndata[$key]['attendees'] = $panelistsData;
            $returndata[$key]['note'] = $mdata['note'];
            $attachments = explode(',', $mdata['image']);
            $returndata[$key]['attachments'] = $attachments;
        }
        return $returndata;
    }

}
