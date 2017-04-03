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

    public function gmail() {

//compose_soan mail
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
                        return $this->redirect(['action' => '../letters/gmail']);
                    }
                }
            }
        }
//end compose


        $id_user = $this->request->session()->read('Auth.User.id');
//thư nhận 
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


//thư gửi
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
//        pr($letterSender);die();
        $this->set(compact('letterSender'));

// view letter     
    }
    public function view($id) {
        $letter = $this->Letters->get($id);
        $this->set(compact('letter'));
    }
}

?>
