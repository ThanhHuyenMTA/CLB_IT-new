<?php
	namespace App\Controller;

	use Cake\Core\Configure;
	use Cake\Network\Exception\ForbiddenException;
	use Cake\Network\Exception\NotFoundException;
	use Cake\View\Exception\MissingTemplateException;

	class ArticlesController extends AppController
	{
		public function initialize()
	    {
	        parent::initialize();
	        $this->Auth->allow();
	        $this->loadModel('Departments');      
	    }

		public function home()
		{ 
			$article = $this->Articles->find('all');	
			$this->set('article', $this->paginate($article,['limit' => 4,
	        'order' => [
	            'Articles.id' => 'asc'
	        ]]));
		}

		public function view($id)
		{
			
			$this->request->data['id'] = $id; 
			$article= $this->Articles->get($id);
			$this->set(compact('article'));
			$this->request->session()->write('id_article',$id);
			//propose comment
			if($this->loadModel('Comments')) {
	            $id=$this->request->data['id']; 
	            $comments = $this->Comments->find('all',['conditions' => ['Comments.id_article' =>$id]])->contain(['Users']);
	            $this->set(compact('comments')); 
            }
        }
 //chú ý
		public function listarticles($id)
	    { 	
	    	 $this->loadModel('Users');
	    	 $this->loadModel('Embarks');
	    	 $id_user=$this->request->session()->read('Auth.User.id');
	    	 //pr($id_user);die();
	    	 $numberembark = $this->Embarks->find('all',['conditions'=> ['Embarks.id_user'=>$id_user ,'Embarks.id_depart'=>$id]])->count();
	    	 //pr($numberembark);die();


	    	 $article = $this->Articles->findalldl($id)->contain(['Users']); //function is called in model
	    	 //pr($article);die();
	    	 $this->set('article', $this->paginate($article,['limit' => 4,
            'order' => [
                'Articles.id' => 'asc'
            ]]));	    	
	    }

	    public function addarticle()
	    {
            $this->loadModel('Embarks');
            $id_user= $this->request->session()->read('Auth.User.id');
            $embark= $this->Embarks->find('all',['conditions' => ['Embarks.id_user' =>$id_user],'valueField' => 'name'])->contain(['Departments'])->toArray();
            //pr($embark);die();
            
             $this->set(compact('embark->department->name','embark')); 


            // $department = $this->Departments->find('all')
	        	// ->innerJoin(['Embarks' =>$embark],['Embarks.id_depart = Departments.id'])
	           // ->order(['Departments.name' => 'DESC']);
	     



	    	$Sessionname= $this->request->session()->read('Auth.User.username');
	    	if($Sessionname) {
	    		if ($this->request->is('post')) {
	    			//find id_user
	    				$id_user=$this->request->session()->read('Auth.User.id'); 
	    				$this->request->data['id_user']=$id_user;
	    				$this->request->data['id_department']=2;
	    			//find end
	    			$article  = $this->Articles->newEntity($this->request->data);
	    			//pr($article);die();
		            if($article->errors()){
		            	$this->Flash->error(__('Unable to add your article.'));
		        }else{
		            	if ($this->Articles->save($article)) {
			                return $this->redirect(['action' => '../articles/articlesinmenu/1']);
		                }      
		            }
	    		}
	    	}else{
	    		return $this->redirect(['action' => '../users/login']);
	    	}
	    }

	    public function elelikes()
	    {
	    	//cách này dùng session
	    	$Sessionname= $this->request->session()->read('Auth.User.username');
	    	if($Sessionname) {
	    		$id=$this->request->session()->read('id_article');
	    		//pr($id);die();
	    		 $like=$this->request->session()->read('likes');
	    		 $like+=1;
	    		 //pr($like);die();
	    		if ($this->request->is(['post', 'put'])){
	    		  	  $this->request->data['id']=$id;
	    		  	  $this->request->data['likes']=$like;
	    		  	  $moi=$this->Articles->newEntity($this->request->data);
	                  if ($this->Articles->save($moi)) {
	                  	 return $this->redirect('/articles/view/'.$id);
	                  }
	    		}
		    }else{
	    		return $this->redirect(['action' => '../users/login']);
	        }
	    }

	    public function eledislikes()
	    {	    	
	    	//cách này lấy giá trị từ bên template
	    	$Sessionname= $this->request->session()->read('Auth.User.username');
	    	if($Sessionname) {
	    		//$id=$this->request->session()->read('id_article');
	    		//pr($id);die();
	    		 //$dislike=$this->request->session()->read('dislikes');
	    		 //pr($dislike);die();
	    		if ($this->request->is(['post', 'put'])){
	    			$old = $this->request->data();
	    			$id = $old['Articles']['id'];
	    			$dislike = $old['Articles']['dislikes'];
	    		 	$dislike+=1;
    		  	  	$moi=$this->Articles->newEntity([
    		  	  		'id' => $id,
    		  	  		'dislikes' => $dislike
    		  	  		]);
                  	if ($this->Articles->save($moi)) {
                  	 	return $this->redirect('/articles/view/'.$id);
                 	}
	    		}
		    }else{
	    		return $this->redirect(['action' => '../users/login']);
	        }
	    }

    }
?>