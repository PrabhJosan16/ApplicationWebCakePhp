<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MealDish Entity
 *
 * @property int $Meal_ID
 * @property int $Menu_item_ID
 * @property int $Quantity
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class MealDish extends Entity
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
        'Meal_ID' => true,
        'Menu_item_ID' => true,
        'Quantity' => true,
        'created' => true,
        'modified' => true,
    ];
}
