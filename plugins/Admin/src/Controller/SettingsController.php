<?php

/**
 * Description of UsersController
 * @author Nghiep
 * @date Jul 12, 2016
 * 
 */
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Admin\Model\Entity\Seting;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\ORM\Entity;
use Cake\ORM\Table;

class SettingsController extends AdminController{

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
       
    }
    
    public function index() {
        $SettingsTable = TableRegistry::get('Settings');
        $settings = $SettingsTable->find()->where(['deleted' => 0]);
        // pd($settings->toArray());
        $this->set(compact('settings'));
        $this->viewBuilder()->layout('admin');
    
    }

    public function add() {
        $SettingsTable = TableRegistry::get('Settings');
        $setting = $SettingsTable->newEntity();
        if ($this->request->is(['post','put'])) {
            $data = $this->request->data;
            $setting = $this->Settings->newEntity($data);
            if (empty($setting->errors())) {
                if ($this->Settings->save($setting)) {
                    $this->Flash->success(__('Lưu cài đặt thành công!'));
                    $this->redirect('/admin/settings');
                }
            }
        }
        $this->set(compact('setting'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function edit() {
        $id = $this->request->query['id'];
        $settingsTable = TableRegistry::get('Settings');
        $setting = $settingsTable->get($id);
        if ($this->request->is(['post','put'])) {
            $data = $this->request->data;
            $setting = $this->Settings->patchEntity($setting, $data);
            if ($settingsTable->save($setting)) {
                $this->Flash->success(__('Lưu bản cập nhật thành công'));
            }else{
                $this->Flash->error(__('Không thể lưu, vui lòng liên hệ Dev'));
            }
        }
        $this->set(compact('setting'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Settings');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if ($this->Settings->updateAll(array('status' => 1), $conditions)) {
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if ($this->Settings->updateAll(array('status' => 0), $conditions)) {
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if ($this->Settings->updateAll(array('deleted' => 1), $conditions)) {
                                $this->Flash->success('Xóa thành công');
                            }
                        }
                        break;
                    default :
                }
            }else{
                $this->Flash->success('Bạn chưa chọn cài đặt nào');
            }
        }
        return $this->redirect([
                        'controller' => 'Settings',
                        'action' => 'index'
            ]);
    }
}
