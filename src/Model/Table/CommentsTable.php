<?php
   	namespace App\Model\Table;

   	use Cake\ORM\Table;
	use Cake\Validation\Validator;

	class CommentsTable extends Table
	{
		public function initialize(array $config)
	    {
	        $this->addBehavior('Timestamp');  
	        $this->belongsTo('Articles', [
	        	'className'=> 'Articles',
	            'foreignKey' => 'id_article'
           ]); 
	        $this->belongsTo('Users', [
	        	'className'=> 'Users',
	            'foreignKey' => 'id_user'
	        ]); 
		}
		
		public function findmember($id_user)
		{
			$mb=$this->find('all',['conditions' => ['Comments.id_article' =>$id_user]]); 
			$this->set(compact('mb'));

		}

		public function validationDefault(Validator $validator)
	    {
	        $validator = new Validator();
	        $validator
	            ->requirePresence('content')
	            ->notEmpty('content', 'Please Enter your content') 
	            ->add('content', [
	                'length' => [
	                    'rule' => ['minLength',1],
	                    'message' => 'Titles need to be at least 5 characters long',
	                ]
	            ]);    
	        return $validator; 
	    }
	}
?>