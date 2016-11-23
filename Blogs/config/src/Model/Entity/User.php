<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity{
    protected $_accessible = [
        'username' => true,
        'password' => true,
       // 'first_name' => true,
       // 'last_name' => true,
    ];

    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}
?>
