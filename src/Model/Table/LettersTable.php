<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class LettersTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');  
        //lien ket
        $this->hasMany('Letters', [
        	'className'=> 'Letters'
        ]); 
         $this->belongsTo('Users', [
        	'className'=> 'Users',
            'foreignKey' => 'id_sender'
        ]); 
    }

}
