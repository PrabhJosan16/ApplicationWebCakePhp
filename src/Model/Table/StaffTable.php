<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staff Model
 *
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StaffTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('staff');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->addBehavior('Timestamp');

        $this->hasMany('Meals', [
            'foreignKey' => 'Staff_ID'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('ID')
                ->allowEmptyString('ID', null, 'create');

        $validator
                ->integer('Staff_role_code')
                ->requirePresence('Staff_role_code', 'create')
                ->notEmptyString('Staff_role_code');

        $validator
                ->scalar('First_name')
                ->maxLength('First_name', 255)
                ->requirePresence('First_name', 'create')
                ->notEmptyString('First_name');

        $validator
                ->scalar('Last_name')
                ->maxLength('Last_name', 255)
                ->requirePresence('Last_name', 'create')
                ->notEmptyString('Last_name');

        $validator
                ->scalar('Other_details')
                ->maxLength('Other_details', 255)
                ->requirePresence('Other_details', 'create')
                ->notEmptyString('Other_details');

        return $validator;
    }

}
