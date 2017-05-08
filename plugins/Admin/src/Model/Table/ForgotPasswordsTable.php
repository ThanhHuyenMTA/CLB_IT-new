<?php

/**
 * Description of Apply
 * @author Nghiep
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;

class ForgotPasswordsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('forgot_passwords');
        $this->entityClass('Admin\Model\Entity\ForgotPassword');
        $this->addBehavior("Timestamp");
    }
    
}
