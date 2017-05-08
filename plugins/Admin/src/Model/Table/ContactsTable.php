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

class ContactsTable extends Table{
    
    public function initialize(array $config) {
        $this->table('contacts_tbl');
        $this->entityClass('Admin\Model\Entity\Contact');
        $this->addBehavior("Timestamp");
        $this->belongsTo('Admincontacts', array(
            'foreignKey' => 'contact_id',
            'joinType' => 'INNER'
        ));
    }

    public function validationDefault(Validator $validator) {
        $validator->requirePresence("content")
            ->notEmpty('content','Chưa nhập nội dung cho liên hệ');
        return $validator;
    }
    
    
}
