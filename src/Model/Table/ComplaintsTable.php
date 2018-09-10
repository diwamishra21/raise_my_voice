<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Complaints Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ComplaintsTable|\Cake\ORM\Association\BelongsTo $Complaints
 * @property \App\Model\Table\EmpsTable|\Cake\ORM\Association\BelongsTo $Emps
 * @property \App\Model\Table\ComplaintTable|\Cake\ORM\Association\HasMany $Complaint
 * @property \App\Model\Table\ComplaintsTable|\Cake\ORM\Association\HasMany $Complaints
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Complaint get($primaryKey, $options = [])
 * @method \App\Model\Entity\Complaint newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Complaint[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Complaint|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Complaint|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Complaint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Complaint[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Complaint findOrCreate($search, callable $callback = null, $options = [])
 */
class ComplaintsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('complaints');
        $this->setDisplayField('id');
        $this->addBehavior('Timestamp');
        $this->setPrimaryKey('id');
        $this->belongsTo('Users')
                ->setJoinType('INNER');
        $this->belongsTo('ComplaintInfo', [
                    'className' => 'Users'
                ])
                ->setForeignKey('complaint_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('user_type')
                ->maxLength('user_type', 60)
                ->allowEmpty('user_type');

        $validator
                ->scalar('status')
                ->maxLength('status', 50)
                ->allowEmpty('status');

        $validator
                ->scalar('assigned_to')
                ->maxLength('assigned_to', 60)
                ->allowEmpty('assigned_to');

        $validator
                ->scalar('assigned_role')
                ->maxLength('assigned_role', 60)
                ->allowEmpty('assigned_role');

        $validator
                ->scalar('notes')
                ->allowEmpty('notes');
        $validator
                ->scalar('assign_status')
                ->allowEmpty('assign_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {




        return $rules;
    }

    function allowStatus($complaint_id) {
        $this->updateAll(
                ['allow_close' => 1], ['complaint_id' => $complaint_id]
        );
    }

    function updateLike($fields, $conditions) {
        $this->updateAll(
                $fields, $conditions
        );
    }

}
