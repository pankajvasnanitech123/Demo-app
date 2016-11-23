<?php // src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{
	
public $useTable = 'users';

    public function validationDefault(Validator $validator){
        return $validator
            ->notEmpty('name', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', [2,3]],
                'message' => 'Please enter a valid role'
            ]);
    }
}

?>
