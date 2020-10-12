<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staff Entity
 *
 * @property int $ID
 * @property int $Staff_role_code
 * @property string $First_name
 * @property string $Last_name
 * @property string $Other_details
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Staff extends Entity
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
        'Staff_role_code' => true,
        'First_name' => true,
        'Last_name' => true,
        'Other_details' => true,
        'created' => true,
        'modified' => true,
    ];
}
