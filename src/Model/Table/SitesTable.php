<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Sites Model
*
* @property \Cake\ORM\Association\HasMany $Releves
*
* @method \App\Model\Entity\Site get($primaryKey, $options = [])
* @method \App\Model\Entity\Site newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Site[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Site|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Site patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Site[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Site findOrCreate($search, callable $callback = null, $options = [])
*/
class SitesTable extends Table
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

    $this->setTable('sites');
    $this->setDisplayField('name');
    $this->setPrimaryKey('id');

    $this->hasMany('Releves', [
      'foreignKey' => 'site_id'
    ]);

    $this->hasMany('Transports', [
      'foreignKey' => 'producer_site_id',
      'foreignKey' => 'consumer_site_id',
      'joinType' => 'INNER'
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
    ->requirePresence('name', 'create')
    ->notEmpty('name');

    $validator
    ->requirePresence('type', 'create')
    ->notEmpty('type');

    $validator
    ->numeric('latitude')
    ->notEmpty('latitude');

    $validator
    ->numeric('longitude')
    ->notEmpty('longitude');

    return $validator;
  }
}
