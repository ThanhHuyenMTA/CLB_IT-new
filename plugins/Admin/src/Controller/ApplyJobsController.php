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

class ApplyJobsController extends AdminController {

    public function add() {
        $jobId = $this->request->query['job_id'];
        if(!$jobId){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
                'action' => 'index'
            ));
        }
        $this->loadModel('Admin.Jobs');
        $job = $this->Jobs->get($jobId);
        if(!$job){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
                'action' => 'index'
            ));
        }
        
        $this->loadModel('Admin.Applies');
        if ($this->request->is('post')) {
            $apply = new Apply($this->request->data['Apply']);
            if ($this->Applies->save($apply)) {
                $this->Flash->success('Thêm mới Apply thành công');
                return $this->redirect([
                    'controller' => 'ApplyJobs',
                    'action' => 'index',
                    'job_id' => $jobId
                ]);
            }
        }
        
        $this->loadModel('Admin.Cvs');
        $listCvs = array(
            '' => '--Chọn--'
        );
        $cvs = $this->Cvs->find('all', array(
            'contain' => array(
                'Employee' => array(
                    'fields' => array(
                        'Employee.full_name'
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
            $listCvs[$cv['id']] = $cv['employee']['full_name'];
        }
        $this->set(compact('job', 'listCvs'));
        $this->viewBuilder()->layout('admin');
    }

    public function edit() {
        $jobId = $this->request->query['job_id'];
        if(!$jobId){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
                'action' => 'index'
            ));
        }
        $this->loadModel('Admin.Jobs');
        $job = $this->Jobs->get($jobId);
        if(!$job){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
                'action' => 'index'
            ));
        }
        $id = $this->request->query['id'];
        if (!$id) {
            $this->Flash->error('Apply không tồn tại');
            return $this->redirect([
                        'controller' => 'ApplyJobs',
                        'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Applies');
        $apply = $this->Applies->get($id); //find()->where(array('id' => $id))->first();
        if (!$apply) {
            $this->Flash->error('Apply không tồn tại');
            return $this->redirect([
                'controller' => 'ApplyJobs',
                'action' => 'index',
                'job_id' => $jobId
            ]);
        }
        if ($this->request->is('post')) {
            $data = $this->request->data['Apply'];
            $apply = $this->Applies->patchEntity($apply, $data);
            if ($this->Applies->save($apply)) {
                $this->Flash->success('Chỉnh sửa Apply thành công');
                return $this->redirect([
                    'controller' => 'ApplyJobs',
                    'action' => 'edit',
                    'id' => $id,
                     'job_id' => $jobId
                ]);
            }
        }
        
        $this->loadModel('Admin.Cvs');
        $listCvs = array(
            '' => '--Chọn--'
        );
        $cvs = $this->Cvs->find('all', array(
            'contain' => array(
                'Employee' => array(
                    'fields' => array(
                        'Employee.full_name'
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
            $listCvs[$cv['id']] = $cv['employee']['full_name'];
        }
        $this->set(compact('job', 'listCvs', 'apply'));
        $this->viewBuilder()->layout('admin');
    }

    public function index() {
        $jobId = $this->request->query['job_id'];
        if(!$jobId){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
                'action' => 'index'
            ));
        }
        $this->loadModel('Admin.Jobs');
        $job = $this->Jobs->get($jobId);
        if(!$job){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
                'action' => 'index'
            ));
        }
        
        $this->loadModel('Admin.Applies');
        $applies = $this->Applies->find('all', array(
            'contain' => array(
                'Jobs',
                'Cvs.Employee'
            ),
            'conditions' => array(
                'Applies.deleted' => 0,
                'Applies.job_id' => $jobId
            )
        ));
        $this->set(compact('applies', 'job'));
        $this->viewBuilder()->layout('admin');
    }

    public function process() {
        $jobId = $this->request->query['job_id'];
        if(!$jobId){
            $this->Flash->error('Công việc không tồn tại');
            return $this->redirect(array(
                'controller' => 'Jobs',
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
                                $this->Flash->success('Xóa xin việc thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn xin việc nào');
            }
        }
        return $this->redirect([
            'controller' => 'ApplyJobs',
            'action' => 'index',
            'job_id' => $jobId
            ]);
    }

}
