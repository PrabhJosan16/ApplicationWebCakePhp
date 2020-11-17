<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefStaffRole Model
 *
 * @method \App\Model\Entity\RefStaffRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefStaffRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefStaffRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefStaffRole|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefStaffRole saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefStaffRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefStaffRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefStaffRole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RefStaffRoleTable extends Table
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

        $this->setTable('ref_staff_role');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('Staff_role_description')
            ->maxLength('Staff_role_description', 255)
            ->requirePresence('Staff_role_description', 'create')
            ->notEmptyString('Staff_role_description');

        return $validator;
    }
}
