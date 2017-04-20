<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class Like_unlikesTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'id_user'
        ]);
        $this->belongsTo('Articles', [
            'className' => 'Articles',
            'foreignKey' => 'id_article'
        ]);
    }

}
