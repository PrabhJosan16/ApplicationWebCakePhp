<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $ID
 * @property string $Menu_name
 * @property \Cake\I18n\FrozenTime $Available_date_from
 * @property \Cake\I18n\FrozenTime $Available_date_to
 * @property string $Other_details
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Menu extends Entity
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
        'Menu_name' => true,
        'Available_date_from' => true,
        'Available_date_to' => true,
        'Other_details' => true,
        'created' => true,
        'modified' => true,
    ];
}
