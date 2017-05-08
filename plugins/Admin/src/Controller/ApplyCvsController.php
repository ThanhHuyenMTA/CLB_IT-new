<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Controller;

use Admin\Controller\AdminController;
use Admin\Model\Entity\Apply;

class ApplyCvsController extends AdminController {

    public function add() {
        $cvId = isset($this->request->query['cv_id']) ? $this->request->query['cv_id'] : null;
        if(!$cvId){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        $this->loadModel('Admin.Cvs');
        $cv = $this->Cvs->get($cvId, ['contain' => ['Customers']]);
        if(!$cv){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        
        $this->loadModel('Admin.Applies');
        if ($this->request->is('post')) {
            $apply = new Apply($this->request->data['Apply']);
            if ($this->Applies->save($apply)) {
                $this->Flash->success('Thêm mới xin việc thành công');
                return $this->redirect([
                    'controller' => 'ApplyCvs',
                    'action' => 'index',
                    'cv_id' => $cvId
                ]);
            }
        }
        
        $this->loadModel('Admin.Jobs');
        $jobs = $this->Jobs->find('list', array(
            'keyField' => 'id',
            'valueField' => 'title'
        ))->toArray();
        $this->set(compact('cv', 'jobs'));
        $this->viewBuilder()->layout('admin');
    }

    public function edit() {
        $cvId = isset($this->request->query['cv_id']) ? $this->request->query['cv_id'] : null;
        if(!$cvId){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        $this->loadModel('Admin.Cvs');
        $cv = $this->Cvs->get($cvId, ['contain' => ['Customers']]);
        if(!$cv){
            $this->Flash->error('Cv không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        $id = $this->request->query['id'];
        if (!$id) {
            $this->Flash->error('Xin việc không tồn tại');
            return $this->redirect([
                        'controller' => 'ApplyCvs',
                        'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Applies');
        $apply = $this->Applies->get($id); //find()->where(array('id' => $id))->first();
        if (!$apply) {
            $this->Flash->error('Xin việc không tồn tại');
            return $this->redirect([
                'controller' => 'ApplyCvs',
                'action' => 'index',
                'cv_id' => $cvId
            ]);
        }
        if ($this->request->is('post')) {
            $data = $this->request->data['Apply'];
            $apply = $this->Applies->patchEntity($apply, $data);
            if ($this->Applies->save($apply)) {
                $this->Flash->success('Chỉnh sửa xin việc thành công');
                return $this->redirect([
                    'controller' => 'ApplyCvs',
                    'action' => 'edit',
                    'id' => $id,
                     'cv_id' => $cvId
                ]);
            }
        }
        
        $this->loadModel('Admin.Jobs');
        $jobs = $this->Jobs->find('list', array(
            'keyField' => 'id',
            'valueField' => 'title'
        ))->toArray();
        $this->set(compact('cv', 'jobs', 'apply'));
        $this->viewBuilder()->layout('admin');
    }

    public function index() {
        $cvId = isset($this->request->query['cv_id']) ? $this->request->query['cv_id'] : null;
        if(!$cvId){
            $this->Flash->error('Cv không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        $this->loadModel('Admin.Cvs');
        $cv = $this->Cvs->get($cvId, ['contain' => ['Customers']]);
        if(!$cv){
            $this->Flash->error('Cv không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        
        $this->loadModel('Admin.Applies');

        $applies = $this->Applies->find('all', array(
            'contain' => array(
                'Jobs',
                'Cvs.Customers'
            ),
            'conditions' => array(
                'Applies.deleted' => 0,
                'Applies.cv_id' => $cvId
            )
        ));
        $this->set(compact('applies', 'cv'));
        $this->viewBuilder()->layout('admin');
    }

    public function process() {
        $cvId = isset($this->request->query['cv_id']) ? $this->request->query['cv_id'] : null;
        if(!$cvId){
            $this->Flash->error('Cv không tồn tại');
            return $this->redirect(array(
                'controller' => 'Cvs',
                'action' => 'index'
            ));
        }
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Applies');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if($this->Applies->updateAll(array('status' => 1), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if($this->Applies->updateAll(array('status' => 0), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if($this->Applies->updateAll(array('deleted' => 1), $conditions)){
                                $this->Flash->success('Xóa Xin việc thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn "Xin việc" nào');
            }
        }
        return $this->redirect([
            'controller' => 'ApplyCvs',
            'action' => 'index',
            'cv_id' => $cvId
            ]);
    }

}
