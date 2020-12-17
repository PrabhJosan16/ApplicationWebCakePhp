<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeMeal Model
 *
 * @property \App\Model\Table\MealNameTable&\Cake\ORM\Association\HasMany $MealName
 *
 * @method \App\Model\Entity\TypeMeal get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeMeal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeMeal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeMeal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeMeal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeMeal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeMeal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeMeal findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeMealTable extends Table
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

        $this->setTable('type_meal');
        $this->setDisplayField('name_meal');
        $this->setPrimaryKey('id');

        $this->hasMany('MealName', [
            'foreignKey' => 'type_meal_id',
        ]);
        $this->hasMany('NameType', [
            'foreignKey' => 'type_meal_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('no_type')
            ->maxLength('no_type', 7)
            ->requirePresence('no_type', 'create')
            ->notEmptyString('no_type');

        $validator
            ->scalar('name_meal')
            ->maxLength('name_meal', 80)
            ->requirePresence('name_meal', 'create')
            ->notEmptyString('name_meal');

        return $validator;
    }
}
