<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MealDishes Model
 *
 * @method \App\Model\Entity\MealDish get($primaryKey, $options = [])
 * @method \App\Model\Entity\MealDish newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MealDish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MealDish|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MealDish saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MealDish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MealDish[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MealDish findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MealDishesTable extends Table
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

        $this->setTable('meal_dishes');

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
            ->integer('Meal_ID')
            ->requirePresence('Meal_ID', 'create')
            ->notEmptyString('Meal_ID');

        $validator
            ->integer('Menu_item_ID')
            ->requirePresence('Menu_item_ID', 'create')
            ->notEmptyString('Menu_item_ID');

        $validator
            ->integer('Quantity')
            ->requirePresence('Quantity', 'create')
            ->notEmptyString('Quantity');

        return $validator;
    }
}
