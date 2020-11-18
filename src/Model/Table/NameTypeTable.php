<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NameType Model
 *
 * @property \App\Model\Table\TypeMealTable&\Cake\ORM\Association\BelongsTo $TypeMeal
 * @property \App\Model\Table\MealNameTable&\Cake\ORM\Association\HasMany $MealName
 *
 * @method \App\Model\Entity\NameType get($primaryKey, $options = [])
 * @method \App\Model\Entity\NameType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NameType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NameType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NameType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NameType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NameType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NameType findOrCreate($search, callable $callback = null, $options = [])
 */
class NameTypeTable extends Table
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

        $this->setTable('name_type');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TypeMeal', [
            'foreignKey' => 'type_meal_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('MealName', [
            'foreignKey' => 'name_type_id',
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
            ->scalar('nom_meal')
            ->maxLength('nom_meal', 80)
            ->requirePresence('nom_meal', 'create')
            ->notEmptyString('nom_meal');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['type_meal_id'], 'TypeMeal'));

        return $rules;
    }
}
