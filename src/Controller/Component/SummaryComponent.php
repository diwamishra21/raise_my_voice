<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class SummaryComponent extends Component {

    public function getSummary($id, $showHistory = true) {
        $returnArray = [];
        $users = TableRegistry::getTableLocator()->get('Users');
        $cstatus = TableRegistry::getTableLocator()->get('Cstatus');
        $images = TableRegistry::getTableLocator()->get('Images');
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $witnessTable = TableRegistry::getTableLocator()->get('Witns');
        $accusedTable = TableRegistry::getTableLocator()->get('accused');
        $cdetailsTable = TableRegistry::getTableLocator()->get('Complaintdetails');
        $cateTable = TableRegistry::getTableLocator()->get('Category');
        $complaintsTable = TableRegistry::getTableLocator()->get('Complaints');
        // Info
        $query0 = $users->find('all')
                ->where(['Users.id' => $id]);
        $udTmp = [];
        foreach ($query0 as $row0) {
            if (!empty($row0)) {
                $udTmp = $row0->toArray();
                $query01 = $cateTable->find('all')
                        ->where(['id IN' => [$udTmp['c_subject'], $udTmp['other_issue']]]);
                if (!empty($query01)) {
                    foreach ($query01 as $q) {
                        if ($q->id == intval($udTmp['c_subject'])) {
                            $udTmp['c_subject_name'] = $q->name;
                        } else if ($q->id == intval($udTmp['other_issue'])) {
                            $udTmp['other_issue_name'] = $q->name;
                        }
                    }
                }
            }
        }
        $returnArray['complain_info'] = $udTmp;
        // Status
        $complain_statusKey = intval($udTmp['status']);
        $query1 = $cstatus->find('all', ['fields' => 'name'])
                ->where(['id' => $complain_statusKey]);
        $tmpData = [];
        foreach ($query1 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        if(!empty($tmpData)){
            $returnArray['case_status'] = $tmpData[0]->name;
        }
        
        
        //Images
        $query2 = $images->find('all')
                ->where(['user_id' => $id]);
        $imagesData = [];
        foreach ($query2 as $row2) {
            array_push($imagesData, $row2->toArray());
        }
        $returnArray['added_files'] = $imagesData;
        //
        $query3 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $id, 'is_accepted' => 1])
                ->contain(['Users']);
        $panalistData = [];
        foreach ($query3 as $row3) {
            array_push($panalistData, $row3->toArray());
        }

        $returnArray['panel_users'] = $panalistData;
        // Witness
        $query4 = $witnessTable->find('all')
                ->where(['user_complaint_id' => $id]);
        $witnessData = [];
        foreach ($query4 as $row4) {
            array_push($witnessData, $row4->toArray());
        }
        $returnArray['witness'] = $witnessData;
        // Accused
        // Witness
        $query5 = $accusedTable->find('all')
                ->where(['complaint_id' => $id]);
        $accusedData = [];
        foreach ($query5 as $row5) {
            array_push($accusedData, $row5->toArray());
        }
        $returnArray['accuseds'] = $accusedData;
        if ($showHistory) {
            // Cdetails images
            $query6 = $cdetailsTable->find('all')
                    ->where(['Complaintdetails.complaint_id' => $id])
                    ->contain('Users');
            $cdData = [];
            foreach ($query6 as $row6) {
                if (empty($row6->meeting_date)) {
                    array_push($cdData, $row6->toArray());
                }
            }
            $returnArray['cdData'] = $cdData;
        }
        $query7 = $complaintsTable->find('all')
                ->where(['complaint_id' => $id]);
        $tmpData = [];
        foreach ($query7 as $r1) {
            if (!empty($r1)) {
                $tmpData[] = $r1;
            }
        }
        
        if (!empty($tmpData)) {
            $returnArray['complainData'] = $tmpData[0]->toArray();
        }
        $accusedData = [];
        foreach ($query5 as $row5) {
            array_push($accusedData, $row5->toArray());
        }

        //pr($returnArray);die;
        return $returnArray;
    }

    public function getHistory($complain_id) {
        $retrunData = [];
        $complaintTable = TableRegistry::getTableLocator()->get('Complaints');
        $panelTable = TableRegistry::getTableLocator()->get('Panels');
        $users = TableRegistry::getTableLocator()->get('Users');

        $query1 = $complaintTable->find('all')
                ->where(['complaint_id' => $complain_id]);
        $complaintData = [];
        $assignedTo = "";
        foreach ($query1 as $row1) {
            if (!empty($row1)) {
                $tmpEn = $row1->toArray();
                if (!empty($tmpEn['assigned_to'])) {
                    $uid = $tmpEn['assigned_to'];
                    $query12 = $users->find('all')
                            ->where(['id' => $uid]);
                    $tmpData = [];
                    foreach ($query12 as $r1) {
                        if (!empty($r1)) {
                            $tmpData[] = $r1;
                        }
                    }
                    
                    if (!empty($tmpData)) {
                        $assignedTo = $tmpData[0]->name . " (" . $tmpData[0]->empid . ")";
                    }
                }
                $tmpEn['assigned_data'] = $assignedTo;
            }
            array_push($complaintData, $tmpEn);
        }
        $retrunData['complaint'] = $complaintData;

        // Panel
        $query2 = $panelTable->find('all')
                ->where(['Panels.complaint_id' => $complain_id])
                ->contain(['Users' => ['fields' => ['name', 'empid']]]);
        $panelData = [];
        foreach ($query2 as $row2) {
            array_push($panelData, $row2->toArray());
        }
        $retrunData['panel_his'] = $panelData;

        //pr($retrunData);die;
        return $retrunData;
    }

}

?>