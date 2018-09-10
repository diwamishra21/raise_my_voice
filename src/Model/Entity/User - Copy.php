<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


/**
 * User Entity
 *
 * @property int $id
 * @property string $empid
 * @property bool $confirmed
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $bu
 * @property string $department
 * @property string $city
 * @property string $work_location
 * @property string $policy_agreed
 * @property int $first_access
 * @property int $last_access
 * @property string $lastip
 * @property bool $status
 */
class User extends Entity
{

    // Make all fields mass assignable except for primary key field "id".
 protected $_accessible = [
        'empid' => true,
        'confirmed' => true,
        'username' => true,
        'password' => true,
        'email' => true,
        'bu' => true,
        'department' => true,
        'city' => true,
        'work_location' => true,
        'policy_agreed' => true,
        'first_access' => true,
        'last_access' => true,
        'lastip' => true,
        'status' => true
    ];

    // ...

	protected function _setPassword($password){
		
		return (new DefaultPasswordHasher)->hash($password);
		
	}
}
