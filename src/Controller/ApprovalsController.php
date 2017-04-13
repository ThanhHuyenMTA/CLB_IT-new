<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class ApprovalsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Users');
        $this->loadModel('Articles');
        $this->loadModel('Embarks');
    }

    public function approval() {
        $id_depart = $this->request->session()->read('id_department');
        //Some members need approval
        $member = $this->Embarks->find('all')
                ->where(['Embarks.approval' => 0, 'Embarks.id_depart' => $id_depart])
                ->contain(['Users']);
        // pr($member);die();
        $this->set(compact('member'));
        //Some article need approval

        $article = $this->Articles->find('all')
                ->where(['Articles.censorship' => 0, 'Articles.id_department' => $id_depart])
                ->contain(['Users'])
                ;
        //pr($article);die();
        $this->set(compact('article'));
         
        
        if (isset($_POST['YesM'])) {
            $id_user = $this->request->data['id_user'];
            // pr($id_user);die();
            $this->request->data['id_depart'] = $id_depart;
            $this->request->data['id_user'] = $id_user;
            $this->request->data['approval'] = 1;
            $embarks = $this->Embarks->newEntity($this->request->data);
            if ($this->Embarks->save($embarks)) {
                $this->redirect('/Approvals/approval');
            }
        }
        if (isset($_POST['YesA'])) {
            $id_article = $this->request->data['id_article'];
            $this->request->data['id'] = $id_article;
            $this->request->data['censorship'] = 1;
            $article = $this->Articles->newEntity($this->request->data);
            if ($this->Articles->save($article)) {
                $this->redirect('/Approvals/approval');
            }
        }
    }

}

?>