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
class accusedTable extends Table
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

        $this->setTable('accused');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
 $this->belongsTo('Users');
//$this->belongsTo('Complaints');

      
    }


}
