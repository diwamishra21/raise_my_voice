<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */

class HrTable extends Table {

	/**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */

   	public function initialize(array $config){
        parent::initialize($config);
        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
	 	$this->hasOne('Witns');
	}

	//query goes here for counting total number of cases
	public function getTotalCases($year=''){
//            echo $year;exit;
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['c_subject <>' => '']);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$total = $query->toarray();
		$total_case = $total[0]->count;
		return $total_case;
	}

	//query goes here for counting total number of harshment cases
	public function getTotalHarassmentCase($year=''){
		$case_type = '1';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['c_subject' => $case_type, ]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$harassment = $query->toArray();
		$total_harassment = $harassment[0]->count;
		return $total_harassment;
	}

	//query goes here for counting total number of business ethics
	public function getTotalBusinessEthics($year=''){
		$case_type = '4';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['c_subject' => $case_type]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$business_ethics = $query->toArray();
		$totalBusinessEthics = $business_ethics[0]->count;
		return $totalBusinessEthics;
	}
        
        //query goes here for counting total number of business ethics
	public function countOthers($year=''){
		$case_type = '20';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['c_subject' => $case_type]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$others = $query->toArray();
		$countOthers = $others[0]->count;
		return $countOthers;
	}

	//query goes here for conting total number of Disiplinary
	public function getTotalDisiplinary($year=''){
		$case_type = '7';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['Hr.c_subject' => $case_type]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$disiplinary = $query->toArray();
		$toatl_disiplinary = $disiplinary[0]->count;
		return $toatl_disiplinary;
	}

	//query goes here for getting total cities
	public function getCities($year=''){
		$query = $this->find();
		$query->select(['city']);
		$query->distinct(['city']);
		$query->where(['city <>' => '']);
//                if(!empty($year)){
//                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
//                }
		$query->order(['city']);
		$city = $query->toArray();
		return $city;
	}
        
        //query goes here for getting according to filter city and datewise
//        public function getFilterharassment($city='', $startdate='', $enddate=''){
//        }
        //query for counting high severity
        public function getHighSeverity($year=''){
                $severity = 'High';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['severity' => $severity]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$high_severity = $query->toArray();
		$totalHighSeverity = $high_severity[0]->count;
		return $totalHighSeverity;
        }
        
        //query for counting medium severity
        public function getMediumSeverity($year=''){
                $severity = 'Medium';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['severity' => $severity]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$medium_severity = $query->toArray();
		$totalMediumSeverity = $medium_severity[0]->count;
		return $totalMediumSeverity;
        }
        
        //query for counting low severity
        public function getLowSeverity($year=''){
                $severity = 'Low';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['severity' => $severity]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$low_severity = $query->toArray();
		$totalLowSeverity = $low_severity[0]->count;
		return $totalLowSeverity;
        }
        
        //query for counting harrassment based on city
        public function getHarassmentCityCase($year=''){
                $city = 'Gurgaon';
                $case = '1';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting ethics based on city
        public function getEtcicsCityCase($year=''){
                $city = 'Gurgaon';
                $case = '4';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting disciplinary based on city
        public function getDisciplinaryCityCase($year=''){
                $city = 'Gurgaon';
                $case = '7';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
         //query for counting harrassment based on city
        public function getHarassmentThaneCase($year=''){
                $city = 'Thane';
                $case = '1';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting ethics based on city
        public function getEtcicsThaneCase($year=''){
                $city = 'Thane';
                $case = '4';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting disciplinary based on city
        public function getDisciplinaryThaneCase($year=''){
                $city = 'Thane';
                $case = '7';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
         //query for counting harrassment based on city
        public function getHarassmentChennaiCase($year=''){
                $city = 'Chennai';
                $case = '1';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting ethics based on city
        public function getEtcicsChennaiCase($year=''){
                $city = 'Chennai';
                $case = '4';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting disciplinary based on city
        public function getDisciplinaryChennaiCase($year=''){
                $city = 'Chennai';
                $case = '7';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['city' => $city, 'c_subject' => $case]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$cityCase = $query->toArray();
                $totalCityCase = $cityCase[0]->count;
		return $totalCityCase;
        }
        
        //query for counting total accepted case
        public function geTotalAccepted($year = ''){
                $status = '2';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['status' => $status]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$accepted = $query->toArray();
		$toatl_accepted = $accepted[0]->count;
		return $toatl_accepted;
        }
        
        //query for counting total closed case
        public function geTotalRejected($year = ''){
                $status = array(3,16);
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['status IN' => $status]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$rejected = $query->toArray();
		$toatl_rejected = $rejected[0]->count;
		return $toatl_rejected;
        }
        
        //query for counting total pending case
        public function geTotalPending($year = ''){
                $status = '1';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['status' => $status]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$pending = $query->toArray();
		$toatl_pending = $pending[0]->count;
		return $toatl_pending;
        }
        
        //query for counting total closed case
        public function geTotalClosed($year = ''){
                $status = '15';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
		$query->where(['status' => $status]);
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$closed = $query->toArray();
		$toatl_closed = $closed[0]->count;
		return $toatl_closed;
        }
        
        //query for counting total each case in each month  case
        public function getTotalMonthCase($year = '',$month='',$case_type=''){
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
                $query->where(['c_subject' => $case_type]);
                if(!empty($month)){
		$query->where(['MONTH(complaint_id_genrate_date)' => $month]);
                }
                if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$augustEthics = $query->toArray();
		$totalaugustEthics = $augustEthics[0]->count;
		return $totalaugustEthics;
        }
        
        
        //query for counting total case based on status and category
        public function geTotalStatusCategory($year = '',$status = '',$category = ''){
//                $status = '1';
//                $c_subject = '1';
		$query = $this->find();
		$query->select(['count' => $query->func()->count('id')]);
                if(!empty($status)){
                   $query->where(['status' => $status]); 
                }
		if(!empty($category)){
                   $query->where(['c_subject' => $category]); 
                }
                if(!empty($year)){
                    $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
                }
		$pending = $query->toArray();
		$toatl_pending = $pending[0]->count;
		return $toatl_pending;
        }
        
        //query for getting all unique work location
        public function getWorkLocation(){
            $query = $this->find();
            $query->select(['work_location']);
            $query->distinct(['work_location']);
            $query->where(['work_location <>' => '']);
            $query->order(['work_location']);
            return $query->toArray();
        }
        
        //query to count each category case work location wise 
        public function countCaseBasedOnLocation($year='',$category='',$workLocation=''){
            $query = $this->find();
            $query->select(['count' => $query->func()->count('id')]);
            if(!empty($category)){
                $query->where(['c_subject' => $category]);
            }
            if(!empty($workLocation)){
                $query->where(['work_location' => $workLocation]);
            }
            if(!empty($year)){
                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
            }
            $result = $query->toArray();
            return $totalCount = $result[0]->count;
            
        }
}

