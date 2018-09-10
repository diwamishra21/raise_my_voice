<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Witness Model
 *
 * @property \App\Model\Table\EmailsTable|\Cake\ORM\Association\BelongsTo $Emails
 *
 * @method \App\Model\Entity\Witnes get($primaryKey, $options = [])
 * @method \App\Model\Entity\Witnes newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Witnes[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Witnes|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Witnes|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Witnes patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Witnes[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Witnes findOrCreate($search, callable $callback = null, $options = [])
 */
class WitnessTable extends Table
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

        $this->setTable('witness');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Emails', [
            'foreignKey' => 'email_id'
        ]);
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('wi_name')
            ->maxLength('wi_name', 255)
            ->allowEmpty('wi_name');

        $validator
            ->scalar('wi_bu')
            ->maxLength('wi_bu', 255)
            ->allowEmpty('wi_bu');

        $validator
            ->scalar('wi_city')
            ->maxLength('wi_city', 255)
            ->allowEmpty('wi_city');

        $validator
            ->scalar('wi_location')
            ->maxLength('wi_location', 255)
            ->allowEmpty('wi_location');

        $validator
            ->scalar('wi_empid')
            ->maxLength('wi_empid', 255)
            ->allowEmpty('wi_empid');

        $validator
            ->scalar('relationship')
            ->maxLength('relationship', 255)
            ->allowEmpty('relationship');

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
        $rules->add($rules->existsIn(['email_id'], 'Emails'));

        return $rules;
    }
}
