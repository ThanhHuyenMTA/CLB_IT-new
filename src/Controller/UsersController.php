<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;
class UsersController extends AppController
{
	//vào trang bắt đăng nhập
	public function initialize()
	{
		 parent::initialize();
         //bỏ qua action initialize. cho phép truy nhập vào trang registration luôn
		 $this->Auth->allow(['registration']);

	}

    public function login()
    {	
    	$this->viewBuilder()->layout(false);
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //pr($user); die();
            if ($user) {
            	$email = new Email('gmail');
                $email
		             ->to('thanhhuyen010695@gmail.com')
		             ->subject('Hello welcome to CLB IT From THANH HUYỀN @@@@@')
		             ->send('My message test');
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid email or password, try again'));
        } 
    }

    public function logout()
    { 	
      
       return $this->redirect($this->Auth->logout());
    }

	public function index() 
	{
		//open layout
		//$this->viewBuilder()->layout('Lay_Out');
		//close layout
		//$this->viewBuilder()->layout(false);
        $users = $this->Users->find('all');
         //phân trang
	    $this->set('users', $this->paginate($users,['limit' => 5,
	        'order' => [
	            'Users.id' => 'asc'
	        ]]));
    }

	public function registration() 
	{
		$this->viewBuilder()->layout(false);
		$user  = $this->Users->newEntity($this->request->data);
		if ($this->request->is('post')) {
            if($user->errors()){
            	//$this->Flash->error(__('Unable to add your user.'));
            }else{
	            	if ($this->Users->save($user)) {
		               // $this->Flash->success(__('Your user has been saved.'));
		                return $this->redirect(['action' => 'index']);
	                }      
                }
        }
        $this->set('user', $user);  
        
	}

	public function view()
	{		
	    $id= $this->request->session()->read("Auth.User.id");
	    //pr($id);die();
		$this->request->data['id'] = $id; 
		$user= $this->Users->get($id);
		//pr($user);die();
		$this->set(compact('user'));		
    }

	public function edit($id)
	{
		$this->viewBuilder()->layout(false);	
	    $article = $this->Users->get($id);
	    if ($this->request->is(['post', 'put'])) {
	    	$this->request->data['id'] = $id; //lấy id
	        $moi=$this->Users->newEntity($this->request->data);
	        if ($this->Users->save($moi)) {
	            $this->Flash->success(__('Your article has been updated.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Unable to update your article.'));
	    }
	    $this->set('article', $article);

	}
	public function delete($id)
	{
	    $this->request->allowMethod(['post', 'delete']);
	    $article = $this->Users->get($id);
	    if ($this->Users->delete($article)) {
	        $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
	        return $this->redirect(['action' => 'index']);
	    }
	}
	 // Upload an image
    public function upload($productId = null) 
    {
        if (!$this->request->is('get')) {
            if ($this->Products->Images->upload($productId, $this->request->data)) {
                $this->Session->set(__('Upload successful!'));
            }
        }
    }
}
?>
