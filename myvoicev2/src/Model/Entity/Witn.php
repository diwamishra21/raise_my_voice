<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Witn Entity
 *
 * @property int $id
 * @property string $wi_name
 * @property string $wi_bu
 * @property string $wi_city
 * @property string $wi_location
 * @property string $wi_empid
 * @property string $wi_email_id
 * @property string $a_useremail
 * @property string $relationship
 *
 * @property \App\Model\Entity\WiEmail $wi_email
 */
class Witn extends Entity
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
        'wi_name' => true,
        'wi_bu' => true,
        'wi_city' => true,
        'wi_location' => true,
        'wi_empid' => true,
        'wi_email_id' => true,
        'a_useremail' => true,
        'relationship' => true,
        'wi_email' => true
    ];
}
