<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransactionsTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        //lien ket
        $this->belongsTo('Letters', [
            'className' => 'Letters',
            'foreignKey' => 'id_letter'
        ]);
        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'id_receiver'
        ]);
    }

}

?>