<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class LettersTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'id_sender'
        ]);

        $this->hasMany('Transactions', [
            'className' => 'Transactions',
            'foreignKey' => 'id_letter',
        ]);
    }

}
