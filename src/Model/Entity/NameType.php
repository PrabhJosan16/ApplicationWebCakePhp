<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NameType Entity
 *
 * @property int $id
 * @property int $type_dish_id
 * @property string $no_type
 * @property string $nom_dish
 *
 * @property \App\Model\Entity\TypeMeal $type_meal
 * @property \App\Model\Entity\MealName[] $meal_name
 */
class NameType extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type_dish_id' => true,
        'no_type' => true,
        'nom_dish' => true,
        'type_meal' => true,
        'meal_name' => true,
    ];
}
