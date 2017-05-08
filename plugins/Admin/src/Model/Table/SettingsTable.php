<?php
/*
 *
 * Description of Setting
 * @author Nghiep
 * @date Oct 27, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SettingsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('settings');
        $this->entityClass('Admin\Model\Entity\Setting');
        $this->addBehavior("Timestamp");
    }
    
    public function validationDefault(Validator $validator)
    {
    	//$validator = new Validator();
        $validator
        	->requirePresence('name')
            ->notEmpty('name','Không được để trống trường này!');

        $validator
        	->requirePresence('value')
            ->notEmpty('value','Không được để trống trường này!');
        
        return $validator;
    }
}
