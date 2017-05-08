<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;

class TimeWorksTable extends Table{
    
    public function initialize(array $config) {
        $this->table('timeworks_tbl');
        $this->entityClass('Admin\Model\Entity\TimeWork');
    }
    
}
