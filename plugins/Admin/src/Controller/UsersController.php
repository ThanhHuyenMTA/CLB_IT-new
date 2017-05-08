<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */
namespace Admin\Controller;
use Cake\Validation\Validator;
use Admin\Controller\AdminController;
use Admin\Model\Entity\User;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class UsersController extends AdminController{
    
    public function login(){
        if($this->request->is('post')){
            $data = $this->request->data();
            $user = $this->Auth->identify();
            if(($user['deleted'] == 0) && ($user['status'] == 1)) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Tài khoản hoặc mật khẩu không chính xác');
            }
        }
        
        $this->viewBuilder()->layout('login');
    }
    
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    public function add($newUser = null)
    {
        $usersTable = TableRegistry::get('Admin.Users');
        if($this->request->is('post')){
            $data = $this->request->data();
            $userCheck = $usersTable
                    ->find()
                    ->where(['email' => $data['email']])
                    ->first();
            $newUser = $usersTable->newEntity([
                'id' => Text::uuid(),
                'full_name' => $data['full_name'],
                'username' => $data['email'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => $data['password'],
                'confirm_password' => $data['confirm_password'],
                'status' => $data['status']
                ],
                ['validate' => 'createUser']
                );
            if (empty($userCheck) && !empty($data['email'])) {
                if ($usersTable->save($newUser)) {
                    $this->Flash->success(__('Thêm tài khoản mới thành công'));
                    return $this->redirect(['controller' => 'users', 'action' => 'index']);
                }else{
                    $this->Flash->error(__('Lỗi'));    
                }
            }else{
                $this->Flash->error(__('Email đã tồn tại'));
            }
        }
        $this->set(compact("newUser"));
        $this->viewBuilder()->layout('admin');
    }
    
    public function edit()
    {
        $id = $this->request->query['id'];
        if(!$id){
            $this->Flash->error('User không tồn tại');
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Users');
        $user = $this->Users->get($id);//find()->where(array('id' => $id))->first();
        if(!$user){
            $this->Flash->error('User không tồn tại');
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'index'
            ]);
        }
        if($this->request->is('post')){
            if($this->request->data['User']['password'] != $this->request->data['User']['confirm_password']){
                $this->Flash->error('Mật khẩu không trùng khớp');
                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'edit',
                    'id' => $id
                ]);
            }
            $data = $this->request->data['User'];
            if(!$data['password']){
                unset($data['password']);
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Chỉnh sửa ' . $user['full_name'] . ' thành công');
                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'edit',
                    'id' => $id
                ]);
            }
        }
        $this->set(compact('user'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function index() {
        $this->loadModel('Admin.Users');
        $users = $this->Users->find('all');
        $this->set(compact('users'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Users');
            $data = $this->request->data;
            // pd(implode(',', $data["ids"]));
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            foreach($data['ids'] as $id) {
                                $entity = $this->Users->get($id);
                                $entity->status = User::ACTIVE;
                                if ($this->Users->save($entity)) {
                                }    
                            }
                            $this->Flash->success('Cập nhật thành công '.count($data['ids']).' tài khoản');
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            foreach($data['ids'] as $id) {
                                $entity = $this->Users->get($id);
                                $entity->status = User::NON_ACTIVE;
                                if ($this->Users->save($entity)) {
                                }    
                            }
                            $this->Flash->success('Cập nhật thành công '.count($data['ids']).' tài khoản');
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            foreach($data['ids'] as $id) {
                                $entity = $this->Users->get($id);
                                $entity->deleted = User::DELETED;
                                $entity->status = User::NON_ACTIVE;
                                if ($this->Users->save($entity)) {
                                }    
                            }
                            $this->Flash->success('Xóa thành công '.count($data['ids']).' tài khoản');
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn quản trị viên nào');
            }
        }
        return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'index'
            ]);
    }
}
