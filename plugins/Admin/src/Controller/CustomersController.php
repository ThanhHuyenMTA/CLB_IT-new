<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Controller;

use Admin\Model\Entity\Customer;
use Cake\Utility\Text;
use Cake\Filesystem\File;

class CustomersController extends AdminController {

     public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Files');       
       
    }

    public function add() {
        $this->loadModel('Admin.Customers');

        if ($this->request->is('post')) {
            if ($this->request->data['Customer']['password'] != $this->request->data['Customer']['confirm_password']) {
                $this->Flash->error('Mật khẩu không trùng khớp');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'add'
                ]);
            }
            $customer = $this->Customers->find()->where(array('username' => $this->request->data['Customer']['username']))->orWhere(array('email' => $this->request->data['Customer']['email']))->first();
            if ($customer) {
                $this->Flash->error('Username hoặc Email đã tồn tại');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'add'
                ]);
            }
            $customer = new Customer($this->request->data['Customer']);
            $customer->id = Text::uuid();
            if ($this->Customers->save($customer)) {
                $this->Flash->success('Thêm mới Customer thành công');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'index'
                ]);
            }
        }
        $this->viewBuilder()->layout('admin');
    }

    public function edit() {
        $id = $this->request->query['id'];
        if (!$id) {
            $this->Flash->error('Customer không tồn tại');
            return $this->redirect([
                        'controller' => 'Customers',
                        'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Customers');
        $customer = $this->Customers->get($id); //find()->where(array('id' => $id))->first();
        if (!$customer) {
            $this->Flash->error('Customer không tồn tại');
            return $this->redirect([
                        'controller' => 'Customers',
                        'action' => 'index'
            ]);
        }
        if ($this->request->is('post')) {

            if ($this->request->data['Customer']['password'] != $this->request->data['Customer']['confirm_password']) {
                $this->Flash->error('Mật khẩu không trùng khớp');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'edit',
                            'id' => $id
                ]);
            }
            $data = $this->request->data['Customer'];
            if (!$data['password']) {
                unset($data['password']);
            }
            $customer = $this->Customers->patchEntity($customer, $data);

            $customers = $this->Customers->get($id);


            if(!empty($data['avatart']['name'])){
                $file = $data['avatart'];
                $img = $this->Files->uploadPublicFile($file,'/upload/avatar/');
                if($img['error']==FALSE){
                    $fileOld = new File(ROOT . DS . $customers['avatart']);
                    $fileOld->delete(); 
                    $customer['avatart'] = 'webroot'.$img['path'];
                } else{
                    unset($customer['avatart']);
                } 
                $customer->avatart = 'webroot'.$img['path'];
            }

            if ($this->Customers->save($customer)) {
                $this->Flash->success('Chỉnh sửa ' . $customer['full_name'] . ' thành công');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'edit',
                            'id' => $id
                ]);
            }
        }
        $this->set(compact('customer'));
        $this->viewBuilder()->layout('admin');
    }

    public function index() {
        $this->loadModel('Admin.Customers');
        $customers = $this->Customers->find('all');
        $this->set(compact('customers'));
        $this->viewBuilder()->layout('admin');
    }

    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Customers');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('status' => 1), $conditions)) {
                                $this->Flash->success('Update trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('status' => 0), $conditions)) {
                                $this->Flash->success('Update trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('deleted' => 1), $conditions)) {
                                $this->Flash->success('Xóa khách hàng thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            } else {
                $this->Flash->success('Bạn chưa chọn khách hàng nào');
            }
        }
        return $this->redirect([
                    'controller' => 'Customers',
                    'action' => 'index'
        ]);
    }

    public function CustomerList() {
        $this->loadModel('Admin.Customers');
        $customers = $this->Customers->find('all');
        echo json_encode($customers);
        exit();
    }

    /*
     * manage recruitment
     */

    public function recruitment() {
        $this->loadModel('Admin.Customers');
        $customers = $this->Customers->find('all', array(
            'contain' => array(
                'Jobs' => function ($q) {
                    return $q
                        ->select(['recruitment_id'])
                        ->where(['Jobs.deleted' => 0]);
                },
            ),
            'conditions' => array(
                'Customers.role IN (3,5)',
                'deleted' => 0
            )
        ));
        
        $this->set(compact('customers'));
        $this->viewBuilder()->layout('admin');
    }

    public function recruitmentAdd() {
        $this->loadModel('Admin.Customers');
        $customer = $this->Customers->newEntity();
        $this->set("customer",$customer);
        $role = array(
            Customer::ROLE_RECRUITMENT_COMPANY => "Công ty",
            Customer::ROLE_RECRUITMENT_PERSON => "Cá nhân"
            );        
        $this->set("role",$role);
        $this->viewBuilder()->layout('admin');
        if ($this->request->is('post')) {
            $data = $this->request->data;
           
            if ($data['password'] != $data['confirm_password']) {
                $this->Flash->error('Mật khẩu không trùng khớp');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'recruitmentAdd'
                ]);
            }
            $customers = $this->Customers->find()
                            ->where(array('username' => $data['email']))
                            ->first();
            if ($customers) {
                $this->Flash->error('Tên đăng nhập hoặc Email đã tồn tại');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'recruitmentAdd'
                ]);
            }
            
            $customer = $this->Customers->patchEntity($customer,$data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('Thêm mới nhà tuyển dụng thành công');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'recruitment'
                ]);
            }else{
                $this->Flash->error("Bạn không thể thêm mới nhà tuyển dụng", array(
                    "element" => "error"));
            }
        }
        
    }

    public function recruitmentEdit() {
        $id = $this->request->query['id'];
        if (!$id) {
            $this->Flash->error('Nhà tuyển dụng không tồn tại');
            return $this->redirect([
                        'controller' => 'Customers',
                        'action' => 'recruitment'
            ]);
        }

       
        $customer = $this->Customers->get($id); //find()->where(array('id' => $id))->first();
        // pd($customer);
        $customers = $this->Customers->newEntity();
        if (!$customer) {
            $this->Flash->error('Nhà tuyển dụng không tồn tại');
            return $this->redirect([
                        'controller' => 'Customers',
                        'action' => 'recruitment'
            ]);
        }

        $role = array(
            Customer::ROLE_RECRUITMENT_COMPANY => "Công ty",
            Customer::ROLE_RECRUITMENT_PERSON => "Cá nhân"
            );


        if ($this->request->is(['post','put'])) {
            
            $data = $this->request->data;   
           
            if(isset($data['password']) && !empty($data['password'])){
                if ($data['password'] != $data['confirm_password']) {
                    $this->Flash->error('Mật khẩu không trùng khớp');
                    return $this->redirect([
                                'controller' => 'Customers',
                                'action' => 'recruitmentEdit',
                                'id' => $id
                    ]);
                }

              
            }else{
                unset($data['password']);
            }

         
           $customer = $this->Customers->patchEntity($customer,$data);
            if ($this->Customers->save($customer)) {
              
                $this->Flash->success('Chỉnh sửa ' . $customer['full_name'] . ' thành công');
                // return $this->redirect([
                //             'controller' => 'Customers',
                //             'action' => 'recruitmentEdit',
                //             'id' => $id
                // ]);
                
            }else{
                
                $this->Flash->error("Bạn không thể cập nhật công việc", array("element" => "error"));
                
            }

        }

        

       
        $this->set(compact('customer','role','customers'));   
        $this->viewBuilder()->layout('admin');
    }

    public function recruitmentProcess() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Customers');
            $this->loadModel('Admin.Jobs');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                $job_conditions = array('recruitment_id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('status' => 1), $conditions)) {
                                if($this->Jobs->updateAll(array('status' => 1),$job_conditions)){
                                    $this->Flash->success('Cập nhật trạng thái thành công');                                    
                                }
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('status' => 0), $conditions)) {
                                if($this->Jobs->updateAll(array('status' => 0),$job_conditions)){
                                    $this->Flash->success('Cập nhật trạng thái thành công');                                    
                                }
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('deleted' => 1), $conditions)) {
                                if($this->Jobs->updateAll(array('deleted' => 1),$job_conditions)){
                                    $this->Flash->success('Xóa nhà tuyển dụng thành công');
                                }
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            } else {
                $this->Flash->success('Bạn chưa chọn nhà tuyển dụng nào');
            }
        }
        return $this->redirect([
                    'controller' => 'Customers',
                    'action' => 'recruitment'
        ]);
    }

    /*
     * manage employee
     */

    public function employee() {

        $this->loadModel('Admin.Customers');
        $this->loadModel('Admin.Cvs');
        $customers = array();
        $customers = $this->Customers->find('all', array(
            'conditions' => array(
                'Customers.role' => 4,
                'Customers.deleted' => 0
            ),
            'contain' => array(
                'Cvs' => array(
                    'fields' => ['employee_id'],
                    'conditions' => array(
                        'deleted' => 0
                        )
                )
            )
        ));
        $this->set(compact('customers'));
        $this->viewBuilder()->layout('admin');
    }

    public function employeeAdd() {
        $this->loadModel('Admin.Customers');
        $customer = $this->Customers->newEntity();
        $this->set('customer',$customer);
        $this->viewBuilder()->layout('admin');
        if ($this->request->is('post')) {
            if ($this->request->data('password') != $this->request->data('confirm_password')) {
                $this->Flash->error('Nhập mật khẩu không giông nhau!');
                return;
            }
            $check = $this->Customers->find()->where(['email'=>$this->request->data('email')])->count();
            if ($check) {
                $this->Flash->error('Email đã tồn tại!');
                return;
            }
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            $customer->role = Customer::ROLE_EMPLOYEE;
            // pd($customer);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('Tạo ứng viên mới thành công!');
                return $this->redirect([
                    'controller' => 'Customers',
                    'action' => 'employee'
                    ]);
            }else{
                $this->Flash->error('Không thể tạo ứng viên mới!');
            }
        }
    }

    public function employeeEdit()
    {
        $id = $this->request->query['id'];
        if (!$id) {
            $this->Flash->error('Ứng viên không tồn tại');
            return $this->redirect([
                        'controller' => 'Customers',
                        'action' => 'employee'
            ]);
        }

        $customer = $this->Customers->get($id);
        if (!$customer) {
            $this->Flash->error('Ứng viên không tồn tại');
            return $this->redirect([
                        'controller' => 'Customers',
                        'action' => 'employee'
            ]);
        }
        $this->viewBuilder()->layout('admin');

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;
            if ($data['password'] != $data['confirm_password']) {
                    $this->Flash->error('Mật khẩu không trùng khớp');
            }else{

            }
            if(isset($data['password'])){
               unset($data['password']);
            }
            $customer = $this->Customers->patchEntity($customer, $data);
            $customer->role = Customer::ROLE_EMPLOYEE;
            if ($this->Customers->save($customer)) {
                $this->Flash->success('Chỉnh sửa ' . $customer['full_name'] . ' thành công');
                return $this->redirect([
                            'controller' => 'Customers',
                            'action' => 'employeeEdit',
                            'id' => $id
                ]);
            }
        }
        $this->set(compact('customer'));
    }

    public function employeeProcess() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Customers');
            $this->loadModel('Admin.Cvs');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                $cvs_condtions = array('employee_id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('status' => 1), $conditions)) {
                                if($this->Cvs->updateAll(array('status' => 1),$cvs_condtions)){
                                    $this->Flash->success('Cập nhật trạng thái thành công');
                                }
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('status' => 0), $conditions)) {
                                if($this->Cvs->updateAll(array('status' => 0),$cvs_condtions)){
                                    $this->Flash->success('Cập nhật trạng thái thành công');
                                }
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if ($this->Customers->updateAll(array('deleted' => 1), $conditions)) {
                                if($this->Cvs->updateAll(array('deleted' => 1),$cvs_condtions)){
                                    $this->Flash->success('Xóa ứng viên thành công');                                    
                                }
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            } else {
                $this->Flash->success('Bạn chưa chọn ứng viên nào');
            }
        }
        return $this->redirect([
                    'controller' => 'Customers',
                    'action' => 'employee'
        ]);
    }

}
