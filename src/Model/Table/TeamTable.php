<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

class TeamTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->setTable('team');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
        $this->belongsTo('Roles');
        $this->belongsTo('Category');
    }

    public function buildRules(RulesChecker $rules) {


        return $rules;
    }

    function removeBulk($category_id,$role_id) {
        return $this->deleteAll(['category_id' =>$category_id,'role_id'=>$role_id]);
    }

}
