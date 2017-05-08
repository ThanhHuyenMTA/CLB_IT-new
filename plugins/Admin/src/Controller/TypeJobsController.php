<?php

/**
 * Description of TypeJobsController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Admin\Model\Entity\TypeJob;

class TypeJobsController extends AdminController{
    
    public function add()
    {
        $this->loadModel('Admin.TypeJobs');
        if($this->request->is('post')){
            $typeJob = $this->TypeJobs->find()
                    ->where(array('name' => $this->request->data['TypeJob']['name']))->first();
            if($typeJob){
                $this->Flash->error('Loại công việc này đã tồn tại');
                return $this->redirect([
                    'controller' => 'TypeJobs',
                    'action' => 'add'
                ]);
            }
            $typeJob = new TypeJob($this->request->data['TypeJob']);
            if ($this->TypeJobs->save($typeJob)) {
                $this->Flash->success('Thêm mới loại công việc thành công');
                return $this->redirect([
                    'controller' => 'TypeJobs',
                    'action' => 'index'
                ]);
            }
        }
        $this->viewBuilder()->layout('admin');
    }
    
    public function edit()
    {
        $id = $this->request->query['id'];
        if(!$id){
            $this->Flash->error('Loại công việc không tồn tại');
            return $this->redirect([
                'controller' => 'TypeJobs',
                'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.TypeJobs');
        $typeJob = $this->TypeJobs->get($id);//find()->where(array('id' => $id))->first();
        if(!$typeJob){
            $this->Flash->error('Loại công việc không tồn tại');
            return $this->redirect([
                'controller' => 'TypeJobs',
                'action' => 'index'
            ]);
        }
        if($this->request->is('post')){
            $data = $this->request->data['TypeJob'];
            $typeJob = $this->TypeJobs->patchEntity($typeJob, $data);
            if ($this->TypeJobs->save($typeJob)) {
                $this->Flash->success('Chỉnh sửa ' . $typeJob['name'] . ' thành công');
                return $this->redirect([
                    'controller' => 'TypeJobs',
                    'action' => 'edit',
                    'id' => $id
                ]);
            }
        }
        $this->set(compact('typeJob'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function index() {
        $this->loadModel('Admin.TypeJobs');
        $typeJobs = $this->TypeJobs->find('all');
        $this->set(compact('typeJobs'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.TypeJobs');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if($this->TypeJobs->updateAll(array('status' => 1), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if($this->TypeJobs->updateAll(array('status' => 0), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn liên hệ nào');
            }
        }
        return $this->redirect([
                        'controller' => 'TypeJobs',
                        'action' => 'index'
            ]);
    }
}
