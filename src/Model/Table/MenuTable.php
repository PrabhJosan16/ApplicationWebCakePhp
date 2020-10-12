<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menu Model
 *
 * @method \App\Model\Entity\Menu get($primaryKey, $options = [])
 * @method \App\Model\Entity\Menu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Menu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Menu|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Menu saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Menu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Menu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Menu findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MenuTable extends Table
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

        $this->setTable('menu');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->addBehavior('Timestamp');
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
            ->integer('ID')
            ->allowEmptyString('ID', null, 'create');

        $validator
            ->scalar('Menu_name')
            ->maxLength('Menu_name', 255)
            ->requirePresence('Menu_name', 'create')
            ->notEmptyString('Menu_name');

        $validator
            ->dateTime('Available_date_from')
            ->requirePresence('Available_date_from', 'create')
            ->notEmptyDateTime('Available_date_from');

        $validator
            ->dateTime('Available_date_to')
            ->requirePresence('Available_date_to', 'create')
            ->notEmptyDateTime('Available_date_to');

        $validator
            ->scalar('Other_details')
            ->maxLength('Other_details', 255)
            ->requirePresence('Other_details', 'create')
            ->notEmptyString('Other_details');

        return $validator;
    }
}
