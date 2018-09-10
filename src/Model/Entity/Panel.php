<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Panel Entity
 *
 * @property int $id
 * @property int $complaint_user_id
 * @property string $p_empid
 * @property string $p_name
 * @property string $p_email
 * @property string $p_scribe
 * @property string $supervisor_id
 * @property string $supervisor_name
 * @property string $role
 *
 * @property \App\Model\Entity\ComplaintUser $complaint_user
 * @property \App\Model\Entity\Supervisor $supervisor
 */
class Panel extends Entity
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
        'complaint_user_id' => true,
        'p_empid' => true,
        'p_name' => true,
        'p_email' => true,
        'p_scribe' => true,
        'supervisor_id' => true,
        'supervisor_name' => true,
        'role' => true,
           'supervisor' => true
    ];
}
