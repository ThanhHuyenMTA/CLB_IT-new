<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class RolesTable extends Table{
    
    public function initialize(array $config) {
        $this->table('role_mst');
        $this->entityClass('Admin\Model\Entity\Role');
    }
    
}
