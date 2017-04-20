<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        //lien ket
        $this->belongsTo('Departments', [
            'className' => 'Departments',
            'foreignKey' => 'id_department'
        ]);

        $this->hasMany('Comments', [
            'className' => 'Comments'
        ]);

        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'id_user'
        ]);

        $this->hasMany('Like_unlikes', [
            'className' => 'Like_unlikes'
        ]);
    }

    public function findalldl($id) {
        $query = $this->find('all', ['conditions' => ['Articles.id_department' => $id, 'Articles.censorship' => 1]]);
        return $query;
    }

    public function checklike($id_user, $id_article) {
        
        $type = $this->find('all')->select(['Like_unlikes.type'])
                ->where(['Like_unlikes.type' => 1])
                ->andWhere(['Like_unlikes.id_user' => $id_user])
                ->andWhere(['Like_unlikes.id_article' => id_article]);
        switch ($type) {
            case 1:
                return 1;
                break;
            case 2:
                return 2;
                break;
            case 0:
                return 0;
                break;
        }
    }

}
