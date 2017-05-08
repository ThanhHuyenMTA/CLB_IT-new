<?php

namespace Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BannersTable extends Table{

    public function initialize(array $config) {
        $this->table('banners_tbl');
        $this->entityClass('Admin\Model\Entity\Banner');
        $this->addBehavior("Timestamp");
    }

    public function validationDefault(Validator $validator)
    {
        $validator->integer('id')->allowEmpty('id', 'create');
        return $validator;
    }

}
