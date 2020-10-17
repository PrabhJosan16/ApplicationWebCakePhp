<?php

// src/Model/Table/MealsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
// add this use statement right below the namespace declaration to import
// the Validator class
use Cake\Validation\Validator;

class MealsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->addBehavior('Translate', ['fields' => ['Other_details']]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Staff', [
            'foreignKey' => 'meals_id'
        ]);
         $this->belongsToMany('Tags', [
            'foreignKey' => 'meal_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'meals_tags',
        ]);
    }

    public function beforeSave($event, $entity, $options) {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->Other_details);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->allowEmptyString('Other_details', false)
                ->minLength('Other_details', 1)
                ->maxLength('Other_details', 255)
                ->allowEmptyString('Cost_of_meal', false)
                ->minLength('Cost_of_meal', 1);

        /*   ->allowEmptyString('Date_of_meal', false)
          ->minLength('Date_of_meal', 1)
          ->maxLength('Date_of_meal', 255);
         */
        return $validator;
    }

}
