<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Panels Model
 *
 * @property \App\Model\Table\ComplaintUsersTable|\Cake\ORM\Association\BelongsTo $ComplaintUsers
 * @property \App\Model\Table\SupervisorsTable|\Cake\ORM\Association\BelongsTo $Supervisors
 *
 * @method \App\Model\Entity\Panel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Panel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Panel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Panel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Panel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Panel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Panel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Panel findOrCreate($search, callable $callback = null, $options = [])
 */
class PanelsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->setTable('panels');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
    }

    public function buildRules(RulesChecker $rules) {


        return $rules;
    }

}
