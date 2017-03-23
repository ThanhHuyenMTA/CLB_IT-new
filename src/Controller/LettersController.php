<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class LettersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Transactions');
    }

    public function compose() {
        $this->loadModel('Transactions');
        if ($this->request->is(['post','put'])) {
            //find id_user
            $id_sender = $this->request->session()->read('Auth.User.id');
            $this->request->data['$id_sender'] = $id_sender;
            //profile sender (sent)
            $lettersender = $this->Letters->newEntity($this->request->data);
            //profile receiver (nhan)
          
            if ($lettersender->errors()) {
                $this->Flash->error(__('Unable to add your article.'));
            } else {
                if ($this->Letters->save($lettersender)) {
                    return $this->redirect(['action' => '../letters/gmail']);
                }
            }
            
        }
    }
    public function gmail() {
        $id_user = $this->request->session()->read('Auth.User.id');
        $lettersender= $this->Transactions->find('all',['conditions'=>['Transactions.id_receiver'=>$id_user]]);
       // pr($lettersender);die();
        $this->set(compact('lettersender'));
    }

    public function inbox() {
      
    }

    public function sentmail() {
        
    }

}

?>
