<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MealName Entity
 *
 * @property int $ID
 * @property string $meal_name
 *
 * @property \App\Model\Entity\Meal[] $meals
 */
class MealName extends Entity
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
        'meal_name' => true,
        'meals' => true,
    ];
}
