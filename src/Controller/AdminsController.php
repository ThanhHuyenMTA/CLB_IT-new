<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class AdminsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Departments');
        $this->loadModel('Users');
        $this->loadModel('Embarks');
        $this->loadModel('Articles');
    }

    public function index() {
        $id_admin = $this->request->session()->read('Auth.User.id');
        $checktrue = $this->Embarks->find('all')
                ->where(['Embarks.id_user' => $id_admin, 'Embarks.role' => 3])
                ->count();
        if ($checktrue == 1) {
        //1 - checkmember
        //2 - userview
            $usercheck = $this->Users->find('all');
            $this->set(compact('usercheck'));
        //3 - articleview
            $articlecheck = $this->Articles->find('all')->contain(['Users']);
            $this->set(compact('articlecheck'));
        //4- Department
        } else {
            throw new NotFoundException(__('404 not found'));
        }
    }

//Phan Kiem duyet
    public function viewcheckmember() {
//$this->autoRender = false;
        $id = $this->request->data['id'];
        $membered = $this->Embarks->find('all')
                ->where(['id_depart' => $id])
                ->contain(['Users'])
                ->toArray();
        $this->set(compact('membered'));
    }

    public function refresh() {
        $data = $this->request->data;
        $id_depart = $data['id_depart'];
        $i = 0;
        foreach ($data as $key => $value) {
            $a[$i] = $key;
            $i++;
        }
        $count = count($a);
        foreach ($a as $i => $key) {
            if (($i + 1) <= $count) {
                $embark = $this->Embarks->newEntity([
                    'id_user' => $a[$i + 1],
                    'id_depart' => $id_depart,
                    'role' => $data[$a[$i + 1]],
                    'approval' => 1
                ]);
            }
            $this->loadModel('Embarks');
            $this->Embarks->save($embark);
//$this->response->body(json_encode($embark));
//return $this->response;
        }
    }

//phan User
    public function checkall() {
        $this->autoRender = false;
    }

    public function checkid() {
        $this->autoRender = false;
    }

    public function checkdelete() {
        $this->autoRender = false;
        $usercheck = $this->request->data;
        foreach ($usercheck as $value) {
            $entity = $this->Users->get($value);
            $this->Users->delete($entity);
        }
        $this->response->body(json_encode($usercheck));
        return $this->response;
    }

//phan Article

    public function SelectAll() {
        $this->autoRender = false;
    }

    public function SelectOne() {
        $this->autoRender = false;
    }

    public function deletearticle() {
        $this->autoRender = false;
        $data = $this->request->data;
        foreach ($data as $value) {
            $dete = $this->Articles->get($value);
            $this->Articles->delete($dete);
        }
        $this->response->body(json_encode($dete));
        return $this->response;
    }

//phan add
    public function addDepart() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $newdepart = $this->Departments->newEntity($this->request->data);
            if ($newdepart['name'] != null) {
                $this->Departments->save($newdepart);
                $new = "
                    <td>" . $newdepart['id'] . "</td>
                    <td class=success >" . $newdepart['name'] . "</td>
                    <td >" . $newdepart['email'] . "</td>
                    <td class=danger >" . $newdepart['address'] . "</td>
                    <td > Edit</td>
                    ";
                $this->response->body($new);
                return $this->response;
            }
        }
    }

    public function editdepart() {
//$this->autoRender = false;
        $old = $this->Departments->get($this->request->data['id']);
        $this->set('old', $old);
    }

    public function saveedit() {
        $new = $this->Departments->newEntity($this->request->data);
        $this->Departments->save($new);
        $this->response->body(json_encode($new));
        return $this->response;
    }

    public function deletedepartment() {
        $data = $this->request->data;
        $this->response->body(json_encode($data));
        return $this->response;
    }

}
