<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class DepartmentsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
    }

    public function listdepartment() {
        $menus = $this->Departments->Find('all');
        $this->set(compact('menus'));
    }

    public function embarkdepart() {
        $this->loadModel('Embarks');
        if ($this->request->is('post')) {
            $id_user = $this->request->session()->read('Auth.User.id');
            $id_department = $this->request->session()->read('id_department'); //call in departments/listdepartment
            //pr($id_department);die();
            $this->request->data['id_user'] = $id_user;
            $this->request->data['id_depart'] = $id_department;
            // pr($this->request->data);die();
            $embark = $this->Embarks->newEntity($this->request->data);
            if ($embark->errors()) {
                $this->Flash->error(__('Unable to add your embarkEmbart.'));
            } else {
                if ($this->Embarks->save($embark)) {
                    return $this->redirect('/articles/listarticle/' . $id_department);
                }
            }
        }
    }

    public function delete() {
        $this->loadModel('Embarks');
        $this->request->allowMethod(['post', 'delete']);
        $id_user = $this->request->session()->read('Auth.User.id');
          //pr($id_user);die();
        $id_department = $this->request->session()->read('id_department');
     // pr($id_department);die();
        $deleteembarks = $this->Embarks->get([$id_department,$id_user]);  
        if ($this->Embarks->delete($deleteembarks))
            return $this->redirect('/articles/listarticle/' . $id_department);
    }
}

?>