<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MealName Model
 *
 * @property \App\Model\Table\MealsTable&\Cake\ORM\Association\HasMany $Meals
 *
 * @method \App\Model\Entity\MealName get($primaryKey, $options = [])
 * @method \App\Model\Entity\MealName newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MealName[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MealName|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MealName saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MealName patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MealName[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MealName findOrCreate($search, callable $callback = null, $options = [])
 */
class MealNameTable extends Table
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

        $this->setTable('meal_name');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Meals', [
            'foreignKey' => 'meal_name_id',
        ]);
        
          $this->belongsTo('typeMeal', [
            'foreignKey' => 'type_meal_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('nameType', [
            'foreignKey' => 'name_type_id',
            'joinType' => 'INNER',
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
            ->integer('ID')
            ->allowEmptyString('ID', null, 'create');

        $validator
            ->scalar('meal_name')
            ->maxLength('meal_name', 255)
            ->requirePresence('meal_name', 'create')
            ->notEmptyString('meal_name');

        return $validator;
    }
}
