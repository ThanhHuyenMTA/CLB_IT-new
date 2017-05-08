<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;

class MapJobsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('map_jobs_tbl');
        $this->entityClass('Admin\Model\Entity\MapJob');
    }
    
}
