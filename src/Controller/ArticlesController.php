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
    }

    public function home() {
        $article = $this->Articles->find('all');
        $this->set('article', $this->paginate($article, ['limit' => 4,
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
        $relatedarticle = $this->Articles->find('all', ['conditions' => ['Articles.id_department' => $id_department, 'Articles.id <>' => $id]]);
        $this->set(compact('relatedarticle'));
    }

    public function listarticle($id) {
        $article = $this->Articles->findalldl($id)->contain(['Users']); //function is called in model
        //pr($article);die();
        $this->set('article', $this->paginate($article, ['limit' => 3,
                    'order' => [
                        'Articles.id' => 'asc'
        ]]));
    }

    public function addarticle() {

        $Sessionname = $this->request->session()->read('Auth.User.username');
        if ($Sessionname) {
            if ($this->request->is('post')) {
                //find id_user
                $id_user = $this->request->session()->read('Auth.User.id');
                $this->request->data['id_user'] = $id_user;
                $this->request->data['id_department'] = 2;
                //find end
                $article = $this->Articles->newEntity($this->request->data);
                //pr($article);die();
                if ($article->errors()) {
                    $this->Flash->error(__('Unable to add your article.'));
                } else {
                    if ($this->Articles->save($article)) {
                        return $this->redirect(['action' => '../articles/listarticle/1']);
                    }
                }
            }
        } else {
            return $this->redirect(['action' => '../users/login']);
        }
    }

    public function elelikes() {
        //cách này dùng session
        $Sessionname = $this->request->session()->read('Auth.User.username');
        if ($Sessionname) {
            $id = $this->request->session()->read('id_article');
            //pr($id);die();
            $like = $this->request->session()->read('likes');
            $like+=1;
            //pr($like);die();
            if ($this->request->is(['post', 'put'])) {
                $this->request->data['id'] = $id;
                $this->request->data['likes'] = $like;
                $moi = $this->Articles->newEntity($this->request->data);
                if ($this->Articles->save($moi)) {
                    return $this->redirect('/articles/view/' . $id);
                }
            }
        } else {
            return $this->redirect(['action' => '../users/login']);
        }
    }

    public function eledislikes() {
        //cách này lấy giá trị từ bên template
        $Sessionname = $this->request->session()->read('Auth.User.username');
        if ($Sessionname) {
            //$id=$this->request->session()->read('id_article');
            //pr($id);die();
            //$dislike=$this->request->session()->read('dislikes');
            //pr($dislike);die();
            if ($this->request->is(['post', 'put'])) {
                $old = $this->request->data();
                $id = $old['Articles']['id'];
                $dislike = $old['Articles']['dislikes'];
                $dislike+=1;
                $moi = $this->Articles->newEntity([
                    'id' => $id,
                    'dislikes' => $dislike
                ]);
                if ($this->Articles->save($moi)) {
                    return $this->redirect('/articles/view/' . $id);
                }
            }
        } else {
            return $this->redirect(['action' => '../users/login']);
        }
    }

}

?>