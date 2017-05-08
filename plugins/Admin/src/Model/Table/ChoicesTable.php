<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ChoicesTable extends Table{
    
    public function initialize(array $config) {
        $this->addBehavior("Timestamp");
        $this->table('choices_tbl');
        $this->entityClass('Admin\Model\Entity\Choice');
        $this->belongsTo('Customers', array(
            'className' => 'Admin.Customers',
            'foreignKey' => array(
                'recruitment_id'
            )
        ));
        $this->belongsTo('Cvs', array(
            'className' => 'Admin.Cvs',
            'foreignKey' => array(
                'cv_id'
            )
        ));
    }
    
    public function validationDefault(Validator $validator){
        $validator->integer('id')->allowEmpty('id', 'create');

        $validator->requirePresence('cv_id')
                ->notEmpty("cv_id","Chưa chọn hồ sơ");

        $validator->requirePresence('recruitment_id')
                ->notEmpty("recruitment_id","Chưa chọn nhà tuyển dụng");

        return $validator;
    }

    public function totalChoices($filter = null){
        $condition = array();
        if(isset($filter['month'])){
            $condition['MONTH(created)'] = $filter['month'];
        }
        $count = $this->find('all', array(
            'conditions' => $condition
        ))->count();
        return $count;
    }
    
}
