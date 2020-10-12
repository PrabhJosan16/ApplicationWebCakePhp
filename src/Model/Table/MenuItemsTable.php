<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenuItems Model
 *
 * @method \App\Model\Entity\MenuItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\MenuItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MenuItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenuItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MenuItemsTable extends Table
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

        $this->setTable('menu_items');
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
            ->integer('Menu_ID')
            ->requirePresence('Menu_ID', 'create')
            ->notEmptyString('Menu_ID');

        $validator
            ->scalar('Menu_item_name')
            ->maxLength('Menu_item_name', 255)
            ->requirePresence('Menu_item_name', 'create')
            ->notEmptyString('Menu_item_name');

        $validator
            ->scalar('Other_details')
            ->maxLength('Other_details', 255)
            ->requirePresence('Other_details', 'create')
            ->notEmptyString('Other_details');

        return $validator;
    }
}
