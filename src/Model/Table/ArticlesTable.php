<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class ArticlesTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');   
        //lien ket
        $this->belongsTo('Departments', [
        	'className'=> 'Departments',
            'foreignKey' => 'id_department'
        ]); 

        $this->hasMany('Comments', [
            'className'=> 'Comments'
        ]);  

        $this->belongsTo('Users', [
            'className'=> 'Users',
            'foreignKey' => 'id_user'
        ]); 

       
        
    }

    public function findalldl($id)
    {
        $query = $this->find('all',['conditions' => ['Articles.id_department' =>$id]]);
        return $query;
    }
}