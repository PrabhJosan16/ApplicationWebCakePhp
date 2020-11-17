<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TypeMeal Entity
 *
 * @property int $id
 * @property string $no_type
 * @property string $name_dish
 *
 * @property \App\Model\Entity\MealName[] $meal_name
 */
class TypeMeal extends Entity
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
        'no_type' => true,
        'name_dish' => true,
        'meal_name' => true,
    ];
}
