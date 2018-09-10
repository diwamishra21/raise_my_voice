<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cstatus Model
 *
 * @property \App\Model\Table\CustsTable|\Cake\ORM\Association\BelongsTo $Custs
 *
 * @method \App\Model\Entity\Cstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cstatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cstatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cstatus|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cstatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cstatus findOrCreate($search, callable $callback = null, $options = [])
 */
class CstatusTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cstatus');
        $this->setDisplayField('name');

        $this->hasMany('Users');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cust_id'], 'Custs'));

        return $rules;
    }
}
