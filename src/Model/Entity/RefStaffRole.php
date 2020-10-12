<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefStaffRole Entity
 *
 * @property int $ID
 * @property string $Staff_role_description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class RefStaffRole extends Entity
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
        'Staff_role_description' => true,
        'created' => true,
        'modified' => true,
    ];
}
