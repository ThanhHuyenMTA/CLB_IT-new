<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Controller;

use Admin\Controller\AdminController;
use Admin\Model\Entity\Choice;

class ChoicesController extends AdminController {

    public function add() {
        $this->loadModel('Admin.Choices');
        $choice = $this->Choices->newEntity();

        if ($this->request->is('post')) {
            $choice = $this->Choices->patchEntity($choice,$this->request->data);
            if ($this->Choices->save($choice)) {
                $this->Flash->success('Thêm mới Choice thành công');
                return $this->redirect([
                            'controller' => 'Choices',
                            'action' => 'index'
                ]);
            }
        }
        
        $this->loadModel('Admin.Customers');
        $recruitments = $this->Customers->find('list', array(
            'keyField' => 'id',
            'valueField' => 'full_name',
            'conditions' => array(
                'deleted' => 0,
                'status' => 1,
                'role' => 3
            )
        ))->toArray();
        
        $this->loadModel('Admin.Cvs');
        $listCvs = array(
            '' => '--Chọn sinh viên--'
        );
        $cvs = $this->Cvs->find('all', array(
            'contain' => array(
                'Customers' => array(
                    'fields' => array(
                        'Customers.full_name'
                    )
                )
            ),
            'conditions' => array(
                'Cvs.deleted' => 0
            ),
            'fields' => array(
                'id'
            )
        ));
        foreach ($cvs as $cv){
            $listCvs[$cv['id']] = $cv['customer']['full_name'];
        }

        $this->set(compact('recruitments', 'listCvs','choice'));
        $this->viewBuilder()->layout('admin');
    }

    public function edit() {
        $id = $this->request->query['id'];
        if (!$id) {
            $this->Flash->error('Choice không tồn tại');
            return $this->redirect([
                        'controller' => 'Choices',
                        'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Choices');

        $choice = $this->Choices->get($id); //find()->where(array('id' => $id))->first();
        if (!$choice) {
            $this->Flash->error('Choice không tồn tại');
            return $this->redirect([
                        'controller' => 'Choices',
                        'action' => 'index'
            ]);
        }

        if ($this->request->is('put')) {
            $data = $this->request->data;

            $choice = $this->Choices->patchEntity($choice, $data);
            if ($this->Choices->save($choice)) {
                $this->Flash->success('Chỉnh sửa Choice thành công');
                return $this->redirect([
                            'controller' => 'Choices',
                            'action' => 'edit',
                            'id' => $id
                ]);
            }else{
                 
                $this->Flash->error('Chỉnh sửa Choice không thành công');
            }
        }
        $this->loadModel('Admin.Customers');
            $recruitments = $this->Customers->find('list', array(
                'keyField' => 'id',
                'valueField' => 'full_name',
                'conditions' => array(
                    'deleted' => 0,
                    'status' => 1,
                    'role' => 3
                )
        ))->toArray();
        
        $this->loadModel('Admin.Cvs');
        $listCvs = array(
            '' => '--Chọn--'
        );
        $cvs = $this->Cvs->find('all', array(
            'contain' => array(
                'Customers' => array(
                    'fields' => array(
                        'Customers.full_name'
                    )
                )
            ),
            'conditions' => array(
                'Cvs.deleted' => 0
            ),
            'fields' => array(
                'id'
            )
        ));
        foreach ($cvs as $cv){
            $listCvs[$cv['id']] = $cv['customer']['full_name'];
        }
        $this->set(compact('recruitments', 'listCvs', 'choice'));
        $this->viewBuilder()->layout('admin');
      
    }

    public function index() {
        $this->loadModel('Admin.Choices');
        $this->loadModel('Admin.Customers');
        $choices = $this->Choices->find('all', array(
            'contain' => array(
                'Customers',
                'Cvs.Customers'
            ),
            'conditions' => array(
                'Choices.deleted' => 0
            )
        ));

        foreach ($choices as $key => $value) {
            $employee_id = $value['cv']['employee_id'];
            $employee = $this->Customers->find('all')
                                ->where(
                                    array('id' => $employee_id)
                                    )
                                ->first();
            
            
        }

        $this->set(compact('choices'));
        $this->viewBuilder()->layout('admin');
    }

    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Choices');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if($this->Choices->updateAll(array('status' => 1), $conditions)){
                                $this->Flash->success('Update trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if($this->Choices->updateAll(array('status' => 0), $conditions)){
                                $this->Flash->success('Update trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if($this->Choices->updateAll(array('deleted' => 1), $conditions)){
                                $this->Flash->success('Xóa khách hàng thành công');
                            }
                        }
                        break;
                    case 4:
                        if (count($data['ids']) > 0) {
                            if($this->Choices->updateAll(array('is_view' => 1), $conditions)){
                                $this->Flash->success('Enabled view thành công');
                            }
                        }
                        break;
                    case 5:
                        if (count($data['ids']) > 0) {
                            if($this->Choices->updateAll(array('is_view' => 0), $conditions)){
                                $this->Flash->success('Disabled view thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn dòng nào');
            }
        }
        return $this->redirect([
                        'controller' => 'Choices',
                        'action' => 'index'
            ]);
    }

}
