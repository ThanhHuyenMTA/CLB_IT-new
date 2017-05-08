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

class Customer extends Entity{

    const ACTIVE = 1;
    const NON_ACTIVE = 0;
    const DELETED = 1;
    const NON_DELETED = 0;
    const ROLE_RECRUITMENT_COMPANY  = 3;
    const ROLE_EMPLOYEE             = 4;
    const ROLE_RECRUITMENT_PERSON   = 5;

    protected function _setPassword($value){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
    
    protected function _setNumberView($value){
        return $value;
    }

}
