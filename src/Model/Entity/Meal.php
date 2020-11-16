<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meal Entity
 *
 * @property int $ID
 * @property int $Customer_ID
 * @property int $Staff_ID
 * @property \Cake\I18n\FrozenTime $Date_of_meal
 * @property int $Cost_of_meal
 * @property string $Other_details
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Meal extends Entity
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
        '*' => true,
        'id' => true,
        'slug' => true,
        'meal_name_id' => true,
    ];
}
