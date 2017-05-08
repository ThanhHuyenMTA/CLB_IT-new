<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity{
    const ACTIVE = 1;
    const NON_ACTIVE = 0;
    const DELETED = 1;
    const NON_DELETED = 0;
    protected function _setPassword($value){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
    
}
