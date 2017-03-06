<?php
	namespace App\Controller;
	use Cake\Core\Configure;
	use Cake\Network\Exception\ForbiddenException;
	use Cake\Network\Exception\NotFoundException;
	use Cake\View\Exception\MissingTemplateException;

	class CommentsController extends AppController
	{
		public function initialize()
	    {
	         parent::initialize();
	         $this->Auth->allow();
	    }
       // didn't use 
	    public function loadcomment($id)
	    {
	    	$cm = $this->Comments->find('all',['conditions' => ['Comments.id_article' =>$id]]);   
	    	$this->set(compact('cm'));
	    } 
        //end

        public function  addcomment()
	    {
	    	//call session
	    	$Sessionname= $this->request->session()->read('Auth.User.username');
	    	if($Sessionname){
				if ($this->request->is('post')) {
					$id_user=$this->request->session()->read('Auth.User.id'); 
					$id_article=$this->request->session()->read('id_article'); 
	    			$this->request->data['id_user']=$id_user;
	    			$this->request->data['id_article']=$id_article; 
	    			//pr($id_article);die();
					$comment  = $this->Comments->newEntity($this->request->data);
		            if($comment->errors()){
		            	$this->Flash->error(__('Unable to add your comment.'));
		        }else{
		            	if ($this->Comments->save($comment)) {
			                 return $this->redirect('/articles/view/'.$id_article);
		                }      
		            }
		        }
		        $this->set('comment', $comment);  
	    	}else{
	    		return $this->redirect(['action' => '../users/login']);
	    	}
     	}	
	}
?>


