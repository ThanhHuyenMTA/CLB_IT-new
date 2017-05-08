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


class CustomersTable extends Table{
    
    public function initialize(array $config) {
        $this->table('customers_tbl');
        $this->addBehavior("Timestamp");
        $this->entityClass('Admin\Model\Entity\Customer');
        $this->hasMany('Cvs', array(
            'className' => 'Admin.Cvs',
            'foreignKey' => array(
                'employee_id'
            )
        ));
        $this->hasMany('Jobs', array(
            'className' => 'Admin.Jobs',
            'foreignKey' => array(
                'recruitment_id'
            )
        ));
    }
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence("full_name")
            ->notEmpty('full_name','Chưa nhập tên!');

        $validator->requirePresence("email")
            ->notEmpty('email','Chưa nhập email!')
            ->add('email', 'valid-email', [
                'rule' => 'email',
                'message' => ' Không đúng định dạng Email'
                ]
            );

        $validator->requirePresence("password","create")
            ->notEmpty('password','Chưa nhập mật khẩu','create')
            ->allowEmpty('password','update');

        $validator->requirePresence('role')
            ->notEmpty('role', 'Bạn cần chọn công ty/cá nhân');


        $validator->requirePresence("confirm_password","create")
            ->notEmpty('confirm_password','Chưa nhập mật khẩu','create')
            ->allowEmpty('confirm_password','update');
            
        $validator->requirePresence("mobile","create")
            ->notEmpty('mobile','Chưa nhập số điện thoại!');
            
        
        return $validator;
    }


    public function totalCustomer($filter = null){
        $condition = array();
        if(isset($filter['role'])){
            $condition['role'] = $filter['role'];
        }
        if(isset($filter['month'])){
            $condition['MONTH(created)'] = $filter['month'];
        }
        $count = $this->find('all', array(
            'conditions' => $condition
        ))->count();
        return $count;
    }
    
}
