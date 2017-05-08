<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Admin\Model\Entity\Contact;
use Admin\Model\Entity\Admincontact;
use Admin\Model\Entity\Seting;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\ORM\Query;

class ContactsController extends AdminController{
    
    public function reply()
    {
        $id = $this->request->query('id');
        $this->loadComponent('Email');
        $settingsTable = TableRegistry::get('Settings');
        $contactsTable = TableRegistry::get('Contacts');
        $AdminContactsTable = TableRegistry::get('Admincontacts');
        $mail_support = $settingsTable->find()->where(['name' => 'email_support'])->first();
        if(!$id){
            $this->Flash->error('Liên hệ không tồn tại');
            return $this->redirect([
                'controller' => 'Contacts',
                'action' => 'index'
            ]);
        }
        $contact = $this->Contacts->get($id);
        if(!$contact){
            $this->Flash->error('Liên hệ không tồn tại');
            return $this->redirect([
                'controller' => 'Contacts',
                'action' => 'index'
            ]);
        }
        if ($this->request->is(['post','put'])) {
            $data = $this->request->data;
            $email_form = $mail_support['value'];
            $email_to = $this->request->data['email_user'];
            $email_reply = $mail_support['value'];
            $email_data = array(
                "rep_content" => nl2br(htmlspecialchars($data['content']))
                );
            if (!empty($data['content'])) {
                if($this->Email->sendEmail($email_form, $email_to, $email_reply, "[Viec4u] Trả lời thư liên hệ", $email_data,"reply_mail_contact")) {
                    $date = date('Y-m-d H:i:s');
                    $saveAdminContact = $AdminContactsTable->newEntity();
                    $saveAdminContact->contact_id = $contact['id'];
                    $saveAdminContact->content = $data['content'];
                    $saveAdminContact->email_receive = $contact['email_user'];
                    $saveAdminContact->created = $date;
                    $AdminContactsTable->save($saveAdminContact);
                    $this->Flash->success(__('Gửi thư trả lời liên hệ thành công!'));
                    return $this->redirect(['controller'=>'contacts', 'action'=>'reply', 'id'=>$contact['id']]);
                }else{
                    $this->Flash->error(__('Không thể gửi mail, vui lòng liên hệ Dev!'));
                }
            }else{
                $this->Flash->error(__('Chưa nhập nội dung!'));
            }
        }
        $this->set(compact('contact'));
        $contact_cl = $contactsTable->find()->where(['email_user' => $contact['email_user'],'deleted' => 0]);
        $contact_ad = $AdminContactsTable->find()->where(['email_receive' => $contact['email_user'],'deleted' => 0]);
        $this->set(compact('contact_cl','contact_ad'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function view()
    {
        $id = $this->request->query['id'];
        if(!$id){
            $this->Flash->error('Liên hệ không tồn tại');
            return $this->redirect([
                'controller' => 'Contacts',
                'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Contacts');
        $contact = $this->Contacts->get($id);
        if(!$contact){
            $this->Flash->error('Liên hệ không tồn tại');
            return $this->redirect([
                'controller' => 'Contacts',
                'action' => 'index'
            ]);
        }else{
            $this->Contacts->updateAll(array('status' => 1), array('id' => $id));
        }
        $this->set(compact('contact'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function index() {
        $this->loadModel('Admin.Contacts');
        $contacts = $this->Contacts->find('all', array(
            'conditions' => array(
                'deleted !=' => 1
            )
        ));
        $this->set(compact('contacts'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Contacts');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if($this->Contacts->updateAll(array('status' => 1), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if($this->Contacts->updateAll(array('status' => 0), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if($this->Contacts->updateAll(array('deleted' => 1), $conditions)){
                                $this->Flash->success('Xóa liên hệ thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn liên hệ nào');
            }
        }
        return $this->redirect([
                        'controller' => 'Contacts',
                        'action' => 'index'
            ]);
    }
}
