<?php

/**
 * Description of Contact
 * @author Nghiep
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class AdmincontactsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('Admin.admincontacts');
        $this->entityClass('Admin\Model\Entity\Admincontact');
        $this->addBehavior("Timestamp");
        $this->hasOne('Contacts', [
            'foreignKey' => 'contact_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence("content")
            ->notEmpty('content','Chưa nhập nội dung cho liên hệ');
        return $validator;
    }
    
}
