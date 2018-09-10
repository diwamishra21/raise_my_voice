<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Witns Model
 *
 * @property \App\Model\Table\WiEmailsTable|\Cake\ORM\Association\BelongsTo $WiEmails
 *
 * @method \App\Model\Entity\Witn get($primaryKey, $options = [])
 * @method \App\Model\Entity\Witn newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Witn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Witn|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Witn|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Witn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Witn[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Witn findOrCreate($search, callable $callback = null, $options = [])
 */
class WitnsTable extends Table
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

        $this->setTable('witns');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

      $this->hasOne('Users');
       $this->belongsTo('Users');
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
            ->scalar('a_useremail')
            ->maxLength('a_useremail', 100)
            ->allowEmpty('a_useremail');

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
    
}
