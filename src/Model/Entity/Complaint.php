<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Complaint Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $complaint_id
 * @property string $emp_id
 * @property string $user_type
 * @property string $status
 * @property string $assigned_to
 * @property string $assigned_role
 * @property string $notes
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Complaint[] $complaints
 * @property \App\Model\Entity\Emp $emp
 * @property \App\Model\Entity\Complaint[] $complaint
 */
class Complaint extends Entity
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
        'user_id' => true,
        'complaint_id' => true,
        'emp_id' => true,
        'user_type' => true,
        'status' => true,
        'assigned_to' => true,
        'assigned_role' => true,
        'notes' => true,
        'users' => true,
        'complaints' => true,
        'emp' => true,
 'assign_status' => true,
        'complaint' => true
    ];
}
