<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class EmbarksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        
        //1-n 
        $this->belongsTo('Departments', [
            'className'=>'Departments', 
             'foreignKey' => 'id_depart'         
        ]);
        $this->belongsTo('Users', [
            'className'=>'Users',
            'foreignKey' => 'id_user'      
        ]);
    } 
}
?>