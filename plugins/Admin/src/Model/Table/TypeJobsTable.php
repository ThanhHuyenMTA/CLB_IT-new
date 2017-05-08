<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;

class TypeJobsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('type_jobs_mst');
        $this->entityClass('Admin\Model\Entity\TypeJob');
    }
    
}
