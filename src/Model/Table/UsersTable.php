<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Users Model
 *
 * @property \App\Model\Table\ComplaintsTable|\Cake\ORM\Association\BelongsTo $Complaints
 * @property \App\Model\Table\ComplaintsTable|\Cake\ORM\Association\HasMany $Complaints
 * @property \App\Model\Table\WitnsTable|\Cake\ORM\Association\HasMany $Witns
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
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Users')
                ->setForeignKey([
                    'complaint_id',
                    'complaint_id'
        ]);

        $this->hasMany('accused', [
            'foreignKey' => 'complaint_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Witns', [
            'foreignKey' => 'user_complaint_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Category', [
            'foreignKey' => 'c_subject'
        ]);
        $this->belongsTo('Cstatus', [
            'foreignKey' => 'status'
        ]);
    }
    public function findAuth(\Cake\ORM\Query $query, array $options) {
        $query
                ->find('all')
                ->where(['Users.confirmed' => 1]);
        return $query;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->notEmpty('name', 'Please Enter name');


        $validator
                ->requirePresence('email', 'create')
                ->notEmpty('email', 'Please Enter Email')
                ->add('email', ['unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => 'Your Email id already registered']
                        ]
        );

        $validator
                ->requirePresence('city', 'create')
                ->notEmpty('city', 'Please Enter city');

        $validator
                ->requirePresence('work_location', 'create')
                ->notEmpty('work_location', 'Please Enter Work Location');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
}
