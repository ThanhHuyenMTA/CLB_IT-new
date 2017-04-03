<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class FindsController extends AppController {

    public function initialize() {
        parent::initialize();
          $this->Auth->allow();
    }

    public function findarticle() {
        //tim kiem 
        $this->loadModel('Articles');
        if (isset($_POST['ok'])) {
            $search = addslashes($_POST['v_search']);
            // pr($search);die();
            $functionFind = $this->Articles->find('all')
                    ->where(['OR'=>['Articles.name LIKE' => '%' . $search . '%' , 'Articles.content LIKE' => '%' . $search . '%' ]])
                    ->contain(['Users'])
                    ->toArray();
           // pr($functionFind);die();    
            $this->set(compact('functionFind'));
        }
        //end tìm kiếm
    }

}

?>