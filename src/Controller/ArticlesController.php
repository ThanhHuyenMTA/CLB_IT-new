<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class ArticlesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Departments');
        $this->loadModel('Users');
        $this->loadModel('Like_unlikes');
    }

    public function home() {
        $article = $this->Articles->find('all')->where(['Articles.censorship' => 1]);
        $this->set('article', $this->paginate($article, [
                    'limit' => 4,
                    'order' => [
                        'Articles.id' => 'asc'
        ]]));
    }

    public function view($id) {
        $this->request->data['id'] = $id;
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
        $this->request->session()->write('id_article', $id);

        //propose comment
        if ($this->loadModel('Comments')) {
            $id = $this->request->data['id'];
            $comment = $this->Comments->find('all', ['conditions' => ['Comments.id_article' => $id]])->contain(['Users']);
            $this->set('comment', $this->paginate($comment, ['limit' => 4,
                        'order' => [
                            'Comments.id' => 'asc'
            ]]));
        }

        //related articles
        $id_department = $this->request->session()->read('id_department');
        $relatedarticle = $this->Articles->find('all', [
                    'conditions' => ['Articles.id_department' => $id_department, 'Articles.id <>' => $id]])->toArray();
        $this->set(compact('relatedarticle'));
    }

    public function listarticle($id) {

        //number articles and member not approvals
        $numberarticle = $this->Articles->find('all')
                        ->where(['Articles.censorship' => 0, 'Articles.id_department' => $id])
                        ->contain(['Users'])->count();
        $this->set(compact('numberarticle'));
        $this->loadModel('Embarks');
        $numberuser = $this->Embarks->find('all')
                        ->where(['Embarks.approval' => 0, 'Embarks.id_depart' => $id])
                        ->contain(['Users'])->count();
        $this->set(compact('numberuser'));


        //listarticles
        $article = $this->Articles
                ->findalldl($id)
                ->contain(['Users', 'Departments']);
        //function is called in model
        $this->request->session()->write('id_department', $id);
        $this->set('article', $this->paginate($article, ['limit' => 3,
                    'order' => [
                        'Articles.id' => 'asc'
        ]]));


        //load member embark department
        $this->loadModel('Embarks');
        $user = $this->Embarks->find('all')
                ->autofields(false)
                ->where(['Embarks.id_depart' => $id])
                ->limit('3')
                ->contain(['Users'])
                ->toArray();
        //pr($user);die();
        $this->set(compact('user'));

        $userdepart = $this->Embarks->find('all')
                ->autofields(false)
                ->where(['Embarks.id_depart' => $id])
                ->limit('20')
                ->contain(['Users'])
                ->toArray();
        $this->set(compact('userdepart'));


        //add articles  
        // if ($this->request->is('post')) {
        if (isset($_POST['AddA'])) {
            //find id_user
            $id_user = $this->request->session()->read('Auth.User.id');
            $this->request->data['id_user'] = $id_user;
            $this->request->data['id_department'] = $id;
            //TH la truong ban  thi kh can phe duyet
            $userRole = $this->Embarks->find('all')
                    ->where(['id_depart' => $id, 'id_user' => $id_user, 'role' => 1])
                    ->orWhere(['id_depart' => $id, 'id_user' => $id_user, 'role' => 2])
                    ->toArray();
            if ($userRole) {
                $this->request->data['censorship'] = 1;
            }
            //find end
            $article = $this->Articles->newEntity($this->request->data);
            //pr($article);die();
            if ($article->errors()) {
                $this->Flash->error(__('Unable to add your article.'));
            } else {
                if ($this->Articles->save($article)) {
                    return $this->redirect('/articles/listarticle/' . $id);
                }
            }
        }

        //Kiem tra xem thanh vien da tham gia ban hay chua
        $id_user = $this->request->session()->read('Auth.User.id');
        $userEmbark = $this->Embarks->find('all')
                        ->where(['id_depart' => $id, 'id_user' => $id_user])->toArray();
        // pr($userEmbark);die();
        $this->set(compact('userEmbark'));

        //Kiem tra xem thanh vien la truong ban hay pho ban khong
        $userRole = $this->Embarks->find('all')
                ->where(['id_depart' => $id, 'id_user' => $id_user, 'role' => 1])
                ->orWhere(['id_depart' => $id, 'id_user' => $id_user, 'role' => 2])
                ->toArray();
        $this->set(compact('userRole'));
    }

    public function ajaxlike() {
        // $this->request->allowMethod('ajax');
        $this->autoRender = false;

        //update table Like_unlikes
        $this->loadModel('Like_unlikes');
        $id_user = $this->request->session()->read('Auth.User.id');
        $this->request->data['id_user'] = $id_user;
        $this->request->data['id_article'] = $this->request->data['id'];

        //check liked or disliked
        $checklike = $this->Like_unlikes
                ->find('all')
                ->select(['Like_unlikes.type', 'Like_unlikes.idl'])
                ->where(['Like_unlikes.id_user' => $id_user])
                ->andWhere(['Like_unlikes.id_article' => $this->request->data['id']]);
        $count1 = $checklike->count();
        if ($count1 == 1) {
            Foreach ($checklike as $value) {
                $type = $value->type;
                $idl = $value->idl;
            }
            if ($type == 0 OR $type == 2) {
                $this->request->data['type'] = 1;
                $this->request->data['likes'] = $this->request->data['likes'] + 1;
                if ($type == 2) {
                    $this->request->data['dislikes'] = $this->request->data['dislikes'] - 1;
                }
            } else {
                $this->request->data['type'] = 0;
                $this->request->data['likes'] = $this->request->data['likes'] - 1 + 1;
            }
            $this->request->data['idl'] = $idl;
        } else {
            $this->request->data['type'] = 1;
            $this->request->data['likes'] = $this->request->data['likes'] + 1;
        }

        $addlike = $this->Like_unlikes->newEntity($this->request->data);
        $this->Like_unlikes->save($addlike);
        //update table Articles
        $countlike = $this->Like_unlikes->find('all')
                ->where(['Like_unlikes.type' => 1])
                ->andWhere(['Like_unlikes.id_article' => $this->request->data['id']])
                ->count();
        $countdislike = $this->Like_unlikes->find('all')
                ->where(['Like_unlikes.type' => 2])
                ->andWhere(['Like_unlikes.id_article' => $this->request->data['id']])
                ->count();
        $this->request->data['likes'] = $countlike;
        $this->request->data['dislikes'] = $countdislike;
        $article = $this->Articles->newEntity($this->request->data);
        $this->Articles->save($article);
        //ham tra ve ben ajax
        $this->response->body(json_encode($this->request->data));
        return $this->response;
    }

    public function addAr() {
         $this->autoRender = false;
    }

    public function ajaxdislike() {
        $this->autoRender = false;

        //update table Like_unlikes
        $this->loadModel('Like_unlikes');
        $id_user = $this->request->session()->read('Auth.User.id');
        $this->request->data['id_user'] = $id_user;
        $this->request->data['id_article'] = $this->request->data['id'];

        //check liked or disliked
        $checklike = $this->Like_unlikes
                ->find('all')
                ->select(['Like_unlikes.type', 'Like_unlikes.idl'])
                ->where(['Like_unlikes.id_user' => $id_user])
                ->andWhere(['Like_unlikes.id_article' => $this->request->data['id']]);

        $count1 = $checklike->count();
        if ($count1 == 1) {
            Foreach ($checklike as $value) {
                $type = $value->type;
                $idl = $value->idl;
            }
            if ($type == 0 OR $type == 1) {
                $this->request->data['type'] = 2;
                $this->request->data['dislikes'] = $this->request->data['dislikes'] + 1;
                if ($type == 1) {
                    $this->request->data['likes'] = $this->request->data['likes'] - 1;
                }
            } else {
                $this->request->data['type'] = 0;
                $this->request->data['dislikes'] = $this->request->data['dislikes'] - 1 + 1;
            }
            $this->request->data['idl'] = $idl;
        } else {
            $this->request->data['type'] = 2;
            $this->request->data['dislikes'] = $this->request->data['dislikes'] + 1;
        }
        $addlike = $this->Like_unlikes->newEntity($this->request->data);
        $this->Like_unlikes->save($addlike);

        //update table Articles
        $countlike = $this->Like_unlikes->find('all')
                ->where(['Like_unlikes.type' => 1])
                ->andWhere(['Like_unlikes.id_article' => $this->request->data['id']])
                ->count();
        $countdislike = $this->Like_unlikes->find('all')
                ->where(['Like_unlikes.type' => 2])
                ->andWhere(['Like_unlikes.id_article' => $this->request->data['id']])
                ->count();
        $this->request->data['likes'] = $countlike;
        $this->request->data['dislikes'] = $countdislike;
        $article = $this->Articles->newEntity($this->request->data);
        $this->Articles->save($article);

        //ham tra ve ben ajax
        $this->response->body(json_encode($this->request->data));
        return $this->response;
    }

}
?>

























