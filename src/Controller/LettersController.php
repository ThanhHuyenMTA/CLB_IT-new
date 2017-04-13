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

    //compose mail
    public function composemail() {
        if ($this->request->is('post')) {
            $id_sender = $this->request->session()->read('Auth.User.id');
            //find id_user
            $this->request->data['id_sender'] = $id_sender;
            //profile sender (sent)
            $lettersender = $this->Letters->newEntity($this->request->data);
            //pr($lettersender);die();
            //profile receiver (nhan)
            if ($lettersender->errors()) {
                $this->Flash->error(__('Unable to add your article.'));
            } else {
                if ($this->Letters->save($lettersender)) {
                    $old = $this->request->data();
                    $email = $old['email'];
                    $user_reciever = $this->Users->find('all')
                                    ->where(['Users.email' => $email])->toArray();
                    $datesender = $old['created'];
                    $id_receiver = $user_reciever['0']['id'];
                    $this->request->data['id_receiver'] = $id_receiver;
                    $this->request->data['id_letter'] = $lettersender->id;
                    $this->request->data['datesender'] = $datesender;
                    $this->request->data['datereciever'] = $datesender;
                    $lettersreceiver = $this->Transactions->newEntity($this->request->data);
                    if ($this->Transactions->save($lettersreceiver)) {
                        return $this->redirect(['action' => '../letters/inbox']);
                    }
                }
            }
        }
    }

    //end compose
    //thư nhận 
    public function inbox() {
        $id_user = $this->request->session()->read('Auth.User.id');
        // đưa ra những thư mà Auth.User.id đã nhận  (đưa ra gmail người gửi đến, và thư)
        $letterReceiver = $this->Transactions->find('all')
                ->autofields(false)
                ->where(['Transactions.id_receiver' => $id_user])
                ->contain([
                    'Letters' => [
                        'Users'
                    ]
                ])
                ->all();
        // pr($letterReceiver);
        $this->set(compact('letterReceiver'));
    }

    public function sentmail() {
        $id_user = $this->request->session()->read('Auth.User.id');
        //thư đã gửi
        // đưa ra những thư mà Auth.User.id gửi đi  (đưa ra gmail người nhận, và thư)
        $letterSender = $this->Letters->find('all')
                ->autofields(false)
                ->where(['Letters.id_sender' => $id_user])
                ->contain([
                    'Transactions' => [
                        'Users'
                    ]
                ])
                ->all();
        //pr($letterSender);die();
        $this->set(compact('letterSender'));
    }

    // view letter receiver   
    public function view($id) {
        $id_user = $this->request->session()->read('Auth.User.id');

        $letter = $this->Transactions->find('all')
                ->autofields(false)
                ->where(['Transactions.id_receiver' => $id_user, 'Letters.id' => $id])
                ->contain([
                    'Letters' => [
                        'Users'
                    ]
                ])
                ->all();
        // pr($letter); die();
        //check nhan thu_read thu
        $view = 1;
        $this->loadModel('Transactions');
        $this->request->data['id'] = $letter->first()['id'];
        $this->request->data['view'] = $view;
        //pr($this->request->data);die();
        $edit_transacsion = $this->Transactions->newEntity($this->request->data);
        $this->Transactions->save($edit_transacsion);
        $this->set(compact('letter'));
    }

    // view letter sender 
    public function viewsender($id, $id_receiver) {
        // pr($id);//thu gui
        //pr($id_receiver);die();//nguoi nhan
        //$id _ id in transaction 
        $id_user = $this->request->session()->read('Auth.User.id');
        $letter = $this->Letters->get($id, [
            'contain' => ['Users']]);
        // pr($letter);die();
        $this->set(compact('letter'));
        $leteruser = $this->Users->get($id_receiver);
        $this->set(compact('leteruser'));
        // pr($leteruser);die();
    }

}

?>
