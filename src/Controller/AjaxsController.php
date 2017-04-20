<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class AjaxsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Departments');
        $this->loadModel('Users');
    }

    public function index() {
        
    }

    public function demo1() {
        
    }

   

}

?>