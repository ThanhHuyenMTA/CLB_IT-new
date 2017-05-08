<?php

/**
 * Description of UsersController
 * @author Nghiep
 * @date Jul 12, 2016
 * 
 */
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\Utility\Text;
use Cake\Routing\Router;
class ForgotPasswordsController extends AdminController{

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');      
       
    }
    
    public function index() {
        $forgotPassTable = TableRegistry::get('ForgotPasswords');
        $forgot = $forgotPassTable->find('all')->order(["created DESC"]);
        $this->set(compact('forgot'));
        $this->viewBuilder()->layout('admin');
    }

    public function edit() {
        $id = $this->request->query['id'];
        $forgotPassTable = TableRegistry::get('ForgotPasswords');
        $forgot = $forgotPassTable->get($id);
        if ($this->request->is(['post','put'])) {
            $data = $this->request->data;
            $data['code'] = $this->request->data('code');
            $data['status'] = $this->request->data('status');
            $forgot = $forgotPassTable->patchEntity($forgot, $data);
            if ($forgotPassTable->save($forgot)) {
                $this->Flash->success(__('Lưu bản cập nhật thành công'));
            }else{
                $this->Flash->error(__('Không thể lưu, vui lòng liên hệ Dev'));
            }
        }
        $this->set(compact('forgot'));
        $this->viewBuilder()->layout('admin');
    }

    public function reSent() {
        $this->autoRender = false;
        $id = $this->request->query('id');
        $forgotPasswordsTable = TableRegistry::get('ForgotPasswords');
        $forgot = $forgotPasswordsTable->get($id);
        if ($forgot['status'] == 1){
            $email_send = new Email(Configure::read("gmail"));
            $email_send->transport(Configure::read("gmail"));
            $webroot = Router::url('/', true);
            $email_send->from('support@viec4u.vn', 'Support Viec4u')
                ->to($forgot['email']) 
                ->replyTo('support@viec4u.vn')
                ->subject('Quên mật khẩu tài khoản Viec4u')
                ->emailFormat('html')
                ->template('forget_password')
                ->viewVars(array(
                    'name' => $forgot['email'],
                    'url' => $webroot."public/resetPassword?email=".$forgot['email']."&code=".$forgot['code']
                    )
                );
            if($email_send->send()){
                $this->Flash->success(__('Gửi lại mail reset mật khẩu thành công!'));
                return $this->redirect([
                    'controller' => 'ForgotPasswords',
                    'action' => 'index'
                ]);
                
            }else{
                $this->Flash->set('Lỗi không gửi được email, Vui lòng liên hệ Dev!');                
            }
        }else{
            $this->Flash->error(__('Có thể khách hàng đã reset mật khẩu rồi, hãy kiểm tra status và ngày cập nhật!'));
        }
    }

    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.ForgotPasswords');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if($this->ForgotPasswords->updateAll(array('status' => 1), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if($this->ForgotPasswords->updateAll(array('status' => 0), $conditions)){
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            $arData = array();
                            foreach($data['ids'] as $id) {
                                $entity = $this->ForgotPasswords->get($id);
                                if ($this->ForgotPasswords->delete($entity)) {
                                }    
                            }
                            $this->Flash->success('Xóa thành công '.count($data['ids']).' yêu cầu reset mật khẩu');
                        }
                        break;
                    default :
                }
            }else{
                $this->Flash->success('Bạn chưa chọn banner nào');
            }
        }
        return $this->redirect([
            'controller' => 'ForgotPasswords',
            'action' => 'index'
        ]);
    }
}
