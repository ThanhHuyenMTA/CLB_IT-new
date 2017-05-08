<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;

class AppliesTable extends Table{
    
    public function initialize(array $config) {
        $this->table('applies_tbl');
        $this->addBehavior("Timestamp");
        $this->entityClass('Admin\Model\Entity\Apply');
        $this->belongsTo('Cvs', array(
            'className' => 'Admin.Cvs',
            'foreignKey' => ['cv_id']
        ));
        $this->belongsTo('Jobs', array(
            'className' => 'Admin.Jobs',
            'foreignKey' => array(
                'job_id'
            )
        ));
    }
    
}
