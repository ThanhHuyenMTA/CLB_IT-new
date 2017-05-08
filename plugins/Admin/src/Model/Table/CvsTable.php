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

class CvsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('cvs_tbl');
        $this->entityClass('Admin\Model\Entity\Cv');
        $this->addBehavior("Timestamp");
        $this->belongsTo('Customers', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TimeWorks', array(
            'className' => 'Admin.TimeWorks',
            'conditions' => array(
                'TimeWorks.type' => 1
            ),
            'foreignKey' => array(
                'item_id'
            )
        ));
        $this->hasMany('MapJobs', array(
            'className' => 'Admin.MapJobs',
            'conditions' => array(
                'MapJobs.type' => 1
            ),
            'foreignKey' => array(
                'item_id'
            )
        ));
        $this->hasMany('Applies', array(
            'className' => 'Admin.Applies',
            'foreignKey' => ['cv_id'],
        ));
    }

    public function validationDefault(Validator $validator)
    {
        $validator->integer('id')->allowEmpty('id', 'create');

        $validator->requirePresence("name")
            ->notEmpty('name','Chưa nhập tên hồ sơ');

        $validator->requirePresence("address")
            ->notEmpty('address','Chưa nhập địa chỉ');

        $validator->requirePresence("customer_birthday")
            ->notEmpty("customer_birthday","Bạn chưa chọn ngày sinh nhật");

        $validator->requirePresence("customer_email")
            ->notEmpty('customer_email','Chưa nhập email!')
            ->add('customer_email', 'valid-email', [
                'rule' => 'email',
                'message' => ' Không đúng định dạng Email'
                ]
            );

        $validator->requirePresence("work")
            ->notEmpty("work","Chưa nhập công việc mong muốn");

        $validator->requirePresence("description")
            ->notEmpty("description","Chưa viết nhận xét bản thân!");

        $validator->requirePresence("province_id")
            ->notEmpty('province_id',"Bạn chưa chọn tỉnh/thành phố")
            ->notEmpty('district_id',"Bạn chưa chọn quận/huyện");

        $validator->requirePresence("customer_mobile")
            ->notEmpty("customer_mobile","Chưa nhập số điện thoại")
            ->add('customer_mobile', 'valid-tel', [
                'rule' => 'numeric',
                'message' => "Số điện thoại phải nhập dạng số"
                ]
            );


        return $validator;
    }
    
}
