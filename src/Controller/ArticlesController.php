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
    }

    public function home() {
        $article = $this->Articles->find('all')->where(['Articles.censorship' => 1]);
        $this->set('article', $this->paginate($article, [
                    'limit' => 4,
                    'order' => [
                        'Articles.id' => 'asc'
        ]]));
    }

//can xem lai
    public function view($id) {
        $this->request->data['id'] = $id;
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
        $this->request->session()->write('id_article', $id);

//        //pr($this->request->data);die();
//        $views+=1;
//        $this->request->data['views']=$views;
        //pr($this->request->data);die();
        // $articlenew = $this->Articles->newEntity($this->request->data);
        // $this->Articles->save($articlenew);
        // 
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
//        pr($relatedarticle);die();
        $this->set(compact('relatedarticle'));
    }

    public function listarticle($id) {
        //number articles and member not approvals
        $numberarticle = $this->Articles->find('all')
                        ->where(['Articles.censorship' => 0, 'Articles.id_department' => $id])
                        ->contain(['Users'])->count();
        // pr($numberarticle);die();
        $this->set(compact('numberarticle'));
        $this->loadModel('Embarks');
        $numberuser = $this->Embarks->find('all')
                        ->where(['Embarks.approval' => 0, 'Embarks.id_depart' => $id])
                        ->contain(['Users'])->count();
        $this->set(compact('numberuser'));


//        listarticles
        $article = $this->Articles->findalldl($id)->contain(['Users', 'Departments']); //function is called in model
        $this->request->session()->write('id_department', $id);
        //  pr($article);die();
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
        //pr($user);die();
        $this->set(compact('userdepart'));


//add articles  
        if ($this->request->is('post')) {
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
//end add articles
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
        // pr($userRole);die();
        $this->set(compact('userRole'));
    }

    //like or dislike articles 
    public function likeArticle($id) {
        //$id is id_articles
        if (isset($_POST['likeA'])) {
            $Sessionname = $this->request->session()->read('Auth.User.username');
            if ($Sessionname) {
                //pr($id);die();
                $like = $this->request->data['likes'];
                $like+=1;
                $this->request->data['id'] = $id;
                $this->request->data['likes'] = $like;
                $article = $this->Articles->newEntity($this->request->data);
                if ($this->Articles->save($article)) {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                return $this->redirect(['action' => '../users/login']);
            }
        }
        if (isset($_POST['dislikeA'])) {
            $Sessionname = $this->request->session()->read('Auth.User.username');
            if ($Sessionname) {
                //pr($id);die();
                $dislike = $this->request->data['dislikes'];
                $dislike+=1;
                $this->request->data['id'] = $id;
                $this->request->data['dislikes'] = $dislike;
                $article = $this->Articles->newEntity($this->request->data);
                if ($this->Articles->save($article)) {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                return $this->redirect(['action' => '../users/login']);
            }
        }
        //
    }

}

?>