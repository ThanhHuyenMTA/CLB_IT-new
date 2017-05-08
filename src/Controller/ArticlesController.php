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
        $this->loadModel('Comments');
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
        $id_user = $this->request->session()->read('Auth.User.id');
        $liked = $this->Like_unlikes->find('all')
                ->where(['id_user' => $id_user, 'type' => 1, 'id_article' => $id])
                ->count();
        // pr($liked);die();
        $this->set(compact('liked'));
        $disliked = $this->Like_unlikes->find('all')
                ->where(['id_user' => $id_user, 'type' => 2, 'id_article' => $id])
                ->count();
        $this->set(compact('disliked'));
        $numbercom = $this->Comments->find('all')->where(['Comments.id_article' => $id])->count();
        $this->request->data['id'] = $id;
        $article = $this->Articles->find('all')
                ->where(['Articles.id' => $id])->contain(['Users'])
                ->toArray();
        // $article = $this->Articles->get($id);
        $this->set(compact('article','numbercom'));
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
                    'conditions' => ['Articles.id_department' => $id_department, 'Articles.id <>' => $id]])->contain(['Users']);
        $this->set(compact('relatedarticle'));
    }

    public function listarticle($id) {

        $imgedepar = $this->Departments->find('all')->where(['id' => $id])->toArray();
        $this->set(compact('imgedepar'));
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
        $id_user = $this->request->session()->read('Auth.User.id');
        $liked = $this->Like_unlikes->find('all')
                ->where(['id_user' => $id_user, 'type' => 1])
                ->toArray();
        // pr($liked);die();
        $this->set(compact('liked'));
        $disliked = $this->Like_unlikes->find('all')
                ->where(['id_user' => $id_user, 'type' => 2])
                ->toArray();
        $this->set(compact('disliked'));

        // die();

        $articlenew = $this->Articles
                ->findalldl($id)
                ->order(['Articles.created' => 'desc'])
                ->limit(5)
                ->contain(['Users', 'Departments'])
                ->toArray();
        $this->set(compact('articlenew'));
        //pr($articlenew['0']['id']);
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
                ->limit('5')
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
            //TH la truong ban thi kh can phe duyet
            $userAdmin = $this->Embarks->find('all')
                    ->where(['id_user' => $id_user, 'role' => 3])
                    ->toArray();
            $userRole = $this->Embarks->find('all')
                    ->where(['id_depart' => $id, 'id_user' => $id_user, 'role' => 2])
                    ->orWhere(['id_depart' => $id, 'id_user' => $id_user, 'role' => 3])
                    ->toArray();
            if ($userRole or $userAdmin) {
                $this->request->data['censorship'] = 1;
            } else {
                $this->request->data['censorship'] = 0;
            }
            //find end
            $article = $this->Articles->newEntity($this->request->data);
            // pr($this->request->data);die();
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
        //thanh vien da duoc phe duyet
        $userEmbark = $this->Embarks->find('all')
                        ->where(['id_depart' => $id, 'id_user' => $id_user, 'approval' => '1'])->toArray();
        // pr($userEmbark);die();
        $this->set(compact('userEmbark'));
        //thanh vien chua duoc phe duyet
        $userEmbark0 = $this->Embarks->find('all')
                        ->where(['id_depart' => $id, 'id_user' => $id_user, 'approval' => '0'])->toArray();
        // pr($userEmbark);die();
        $this->set(compact('userEmbark0'));

        //Kiem tra xem thanh vien la truong ban hay pho ban khong
        $userRole = $this->Embarks->find('all')
                ->where(['id_depart' => $id, 'id_user' => $id_user, 'role' => 1])
                ->orWhere(['id_depart' => $id, 'id_user' => $id_user, 'role' => 2])
                ->toArray();
        $this->set(compact('userRole'));
    }

    public function ajaxlike() {
        //$this->request->allowMethod('ajax');
        //update table Like_unlikes
        if (empty($this->request->data['username'])) {
            $this->autoRender = false;
            $this->response->body(json_encode('fail'));
            return $this->response;
        } else {
            $this->autoRender = false;
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
                foreach ($checklike as $value) {
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
    }

    public function ajaxdislike() {
        if (empty($this->request->data['username'])) {
            $this->autoRender = false;
            $this->response->body(json_encode('fail'));
            return $this->response;
        } else {
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

    public function addAr() {
        $this->autoRender = false;
    }

}
?>

























