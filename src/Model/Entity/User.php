<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; //include this line
use Cake\ORM\Entity;

class User extends Entity {

    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }

}

?>
