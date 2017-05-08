<?php

namespace Admin\Controller;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class BannersController extends AdminController {

    public function add() {
        if($this->request->is('post')){
            $data = $this->request->data;
            $extension = explode('/', substr($data['image'], 5, strpos($data['image'], ';')-5))[1];
            $pathFile = 'banner' . DS . 'banner_' . Text::uuid() . '.' . $extension;
            $pathFileFull = ROOT . DS . 'plugins' . DS . 'Admin' . DS . 'webroot' . DS . $pathFile;
            $imageBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['image']));
            $fileSave = file_put_contents($pathFileFull, $imageBase64);
            if($fileSave){
                $bannerTable = TableRegistry::get('Admin.Banners');
                $newBanner = $bannerTable->newEntity([
                    'name' => isset($data['name']) ? $data['name'] : null,
                    'url' => $pathFile,
                    'title1' => isset($data['title1']) ? $data['title1'] : null,
                    'title2' => isset($data['title2']) ? $data['title2'] : null,
                    'title3' => isset($data['title3']) ? $data['title3'] : null,
                    'width' => isset($data['width']) ? $data['width'] : null,
                    'height' => isset($data['height']) ? $data['height'] : null,
                    'x' => isset($data['x']) ? $data['x'] : null,
                    'y' => isset($data['y']) ? $data['y'] : null,
                    'order_sort' => isset($data['order_sort']) ? $data['order_sort'] : 50
                ]);
                if($bannerTable->save($newBanner)){
                    $this->Flash->success('Tạo banner thành công');
                    return $this->redirect(['controller' => 'banners', 'action' => 'index']);
                }else{
                    $this->Flash->error('Tạo banner thất bại2');
                    return $this->redirect(['controller' => 'banners', 'action' => 'add']);
                }
            }else{
                $this->Flash->error('Tạo banner thất bại1');
                return $this->redirect(['controller' => 'banners', 'action' => 'add']);
            }
        }
        $this->viewBuilder()->layout('admin');
    }

    public function edit() {
        $bannerTable = TableRegistry::get('Admin.Banners');
        $id = isset($this->request->query['id']) ? $this->request->query['id'] : 0;
        $bannerFind = $bannerTable->find()->where(['id' => $id, 'deleted' => 0])->first();
        if(empty($bannerFind)){
            $this->Flash->error('Banner không tồn tại');
            return $this->redirect(['controller' => 'banners', 'action' => 'index']);
        }
        if($this->request->is('post')){
            $data = $this->request->data;
            if(!empty($data['image'])){
                $extension = explode('/', substr($data['image'], 5, strpos($data['image'], ';')-5))[1];
                $pathFile = 'banner' . DS . 'banner_' . Text::uuid() . '.' . $extension;
                $pathFileFull = ROOT . DS . 'plugins' . DS . 'Admin' . DS . 'webroot' . DS . $pathFile;
                $imageBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['image']));
                $fileSave = file_put_contents($pathFileFull, $imageBase64);
                if($fileSave){
                    $url = $pathFile;
                    if(!empty($bannerFind->url) && file_exists(ROOT . DS . 'plugins' . DS . 'Admin' . DS . 'webroot' . DS . $bannerFind->url)){
                        unlink(ROOT . DS . 'plugins' . DS . 'Admin' . DS . 'webroot' . DS . $bannerFind->url);
                    }
                }else{
                    $url = $bannerFind->url;
                }
            }else{
                $url = $bannerFind->url;
            }
            $newBanner = $bannerTable->newEntity([
                'id' => $id,
                'name' => isset($data['name']) ? $data['name'] : null,
                'url' => $url,
                'title1' => isset($data['title1']) ? $data['title1'] : null,
                'title2' => isset($data['title2']) ? $data['title2'] : null,
                'title3' => isset($data['title3']) ? $data['title3'] : null,
                'width' => isset($data['width']) ? $data['width'] : null,
                'height' => isset($data['height']) ? $data['height'] : null,
                'x' => isset($data['x']) ? $data['x'] : null,
                'y' => isset($data['y']) ? $data['y'] : null,
                'order_sort' => isset($data['order_sort']) ? $data['order_sort'] : 50
            ]);
            if($bannerTable->save($newBanner)){
                $this->Flash->success('Sửa banner thành công');
                return $this->redirect(['controller' => 'banners', 'action' => 'edit', '?' => ['id' => $id]]);
            }else{
                $this->Flash->success('Sửa banner thất bại');
                return $this->redirect(['controller' => 'banners', 'action' => 'edit', '?' => ['id' => $id]]);
            }
        }
        $this->set(compact('bannerFind'));
        $this->viewBuilder()->layout('admin');
    }

    public function index() {
        $bannerTable = TableRegistry::get('Admin.Banners');
        $this->loadModel('Admin.Banners');
        if(isset($this->request->query['id']))
        {
            $id = $this->request->query['id'];
        }else{
            $id = null;
        }
        if($id != null){
            $conditions = array(
                'Banners.deleted' => 0,
                'Banners.id' => $id
            );
        }else{
            $conditions = array(
                'Banners.deleted' => 0);
        }
        $banner = $bannerTable->find('all')
            ->where($conditions)
            ->select(['id', 'name', 'url', 'title1', 'title2', 'title3', 'status', 'order_sort',  'modified','created'])
            ->order(['order_sort' => 'ASC', 'created' => 'DESC']);

        $this->set(compact('banner'));
        $this->viewBuilder()->layout('admin');
    }

    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Banners');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if ($this->Banners->updateAll(array('status' => 1), $conditions)) {
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if ($this->Banners->updateAll(array('status' => 0), $conditions)) {
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if ($this->Banners->updateAll(array('deleted' => 1), $conditions)) {
                                $this->Flash->success('Xóa Banner thành công');
                            }
                        }
                        break;
                    case 4:
                        if (count($data['ids']) > 0) {
                            $arData = array();
                            foreach($data['ids'] as $k => $v){
                                $arData[] = array(
                                    'id' => $v,
                                    'order_sort' => $data['order_sort'][$k]
                                );
                            }
                            $bannerTable = TableRegistry::get('Admin.Banners');
                            $arSave = $bannerTable->newEntities($arData);
                            if ($bannerTable->saveMany($arSave)) {
                                $this->Flash->success('Cập nhật thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn banner nào');
            }
        }
        return $this->redirect([
            'controller' => 'Banners',
            'action' => 'index'
        ]);
    }

}