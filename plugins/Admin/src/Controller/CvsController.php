<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Controller;

use Admin\Controller\AdminController;
use Cake\ORM\Table;
use Admin\Model\Entity\Cv;
//use Admin\Model\Entity\Citie;
//use Admin\Model\Entity\District;
use Cake\ORM\TableRegistry;
use Admin\Model\Entity\TimeWork;
use Admin\Model\Entity\MapJob;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use App\Controller\Component\FilesComponent;
use Cake\Controller\Component\CookieComponent;
use Cake\Filesystem\File;

class CvsController extends AdminController {

     public function initialize() {
        parent::initialize();
        $this->loadComponent('Files');
        $this->loadComponent('Cookie');
    }

    public function add() {
      $cvsTable = TableRegistry::get('Cvs');
        $title = "Tạo hồ sơ";
      
        $citiesTable = TableRegistry::get('Cities');
        $districtTable = TableRegistry::get('Districts');
        $cvsTable = TableRegistry::get('Cvs');
        $timeWorksTable = TableRegistry::get('TimeWorks');
        $customersTable = TableRegistry::get('Customers');

        $listProvince = $citiesTable->find('list')->order(array("name" => "ASC"));

        $experiencesTable = TableRegistry::get('Experiences');

        $listDistrict = null;

        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pr($data);die;

            $cv = $cvsTable->newEntity();
            $user = $customersTable->newEntity();

            $dataCv = $data['Cv'];
            $dataTimeWork = $data['TimeWork'];
            $conn = ConnectionManager::get('default');
            $conn->begin();
            $flag = true;
            if ($dataCv['customer_birthday']) {
                $dataCv['customer_birthday'] = convertBackDate($dataCv['customer_birthday']);
            }
            if (!empty($dataCv['avatar'])) {
                $file = $dataCv['avatar'];
                $img = $this->Files->uploadPublicFile($file, 'upload/avatar/');
                if ($img['error'] == FALSE) {
                    $dataCv['avatar'] = $img['path'];
                }
            }
            
            $customer_name = $customersTable->find()->where(array("id" => $data['employee_id']))->first()->full_name;
            if($dataCv['work']){
                $dataCv['work'] = implode(",",$dataCv['work']);
            }
            $cvSave = $cvsTable->newEntity([
                'employee_id' => $data['employee_id'],
                'name' => $dataCv['name'],
                'avatar' => $dataCv['avatar'],
                'customer_full_name' => $customer_name,
                'customer_gender' => $dataCv['customer_gender'],
                'customer_birday' => $dataCv['customer_birthday'],
                'customer_email' => $dataCv['customer_email'],
                'customer_mobile' => $dataCv['customer_mobile'],
                'customer_is_married' => $dataCv['customer_is_married'],
                'address' => $dataCv['address'],
                'province_id' => $dataCv['province_id'],
                'district_id' => $dataCv['district_id'],
                'salary' => $dataCv['salary'],
                'unit' => $dataCv['unit'],
                'is_student' => $dataCv['is_student'],
                'school' => ($dataCv['is_student'] == 1) ? $dataCv['school'] : null,
                'school_course' => ($dataCv['is_student'] == 1) ? $dataCv['school_course'] : null,
                'school_year' => ($dataCv['is_student'] == 1) ? $dataCv['school_year'] : null,
                'work' => $dataCv['work'],
                'description' => $dataCv['description'],
                'height' => $dataCv['height'],
                'weight' => $dataCv['weight'],
                'deleted' => 0
            ]);
            $flag = $flag && $cvsTable->save($cvSave);
            $cvId = $cvSave->id;

            if ($dataTimeWork['is_all_week'] == 1) {
                $timeWorkSave = $timeWorksTable->newEntity([
                    'item_id' => $cvId,
                    'type' => 1,
                    'day' => 0,
                    'timeserving_from' => $dataTimeWork[0]['start'],
                    'timeserving_to' => $dataTimeWork[0]['end']
                ]);
                $flag = $flag && $timeWorksTable->save($timeWorkSave);
            } else {
                $dataTimeWorks = [];
                $timeWorkAr = array();
                $i = 0;
                foreach ($data['TimeWork'] as $data['TimeWork']) {
                    $i++;
                    if ($i <= 2) {
                        continue;
                    }
                    $dataTimeWorks[] = $data['TimeWork'];
                }
                foreach ($dataTimeWorks as $k => $v) {
                    $timeWorkAr[] = array(
                        'item_id' => $cvId,
                        'type' => 1,
                        'day' => $dataTimeWorks[$k]['time_work'],
                        'timeserving_from' => $dataTimeWorks[$k]['start'],
                        'timeserving_to' => $dataTimeWorks[$k]['end']
                    );
                }
                $timeWorkSave = $timeWorksTable->newEntities($timeWorkAr);
                $flag = $flag && $timeWorksTable->saveMany($timeWorkSave);
            }
            if (isset($data['Experience'])) {
                $dataExperiences = array();
                foreach ($data['Experience'] as $data['Experience']) {
                    $dataExperiences[] = $data['Experience'];
                }
                $experienceAr = array();
                foreach ($dataExperiences as $k => $v) {
                    if ($dataExperiences[$k]['date_start']) {
                        $dataExperiences[$k]['date_start'] = convertBackDate($dataExperiences[$k]['date_start']);
                    }
                    if ($dataExperiences[$k]['date_end']) {
                        $dataExperiences[$k]['date_end'] = convertBackDate($dataExperiences[$k]['date_end']);
                    }

                    $experienceAr[] = array(
                        'cv_id' => $cvId,
                        'company_name' => $dataExperiences[$k]['company_name'],
                        'level' => $dataExperiences[$k]['level'],
                        'description' => $dataExperiences[$k]['description'],
                        'date_start' => $dataExperiences[$k]['date_start'],
                        'date_end' => $dataExperiences[$k]['date_end'],
                    );
                }
                $experienceSave = $experiencesTable->newEntities($experienceAr);
                $flag = $flag && $experiencesTable->saveMany($experienceSave);
            }
            if ($flag) {
                $conn->commit();
                $this->Flash->success(__('Tạo hồ sơ thành công'));
                $this->redirect(["plugin" => "admin", "controller" => "Cvs", "action" => "index"]);
            } else {
                $conn->rollback();
                $this->Flash->error(__('Tạo hồ sơ thất bại'));
                 $this->redirect(["plugin" => "admin", "controller" => "Cvs", "action" => "index"]);
            }
        }

        $this->set(compact('cv', 'user', 'customerInfo', 'listProvince', 'title'));
        $this->set('listDistrict', $listDistrict);
        $this->set('categories', Configure::read('Categories'));
        $this->set("listCustomer",$customersTable->find('list', ['keyField' => 'id','valueField' => 'email','conditions'=>['role'=>4]]));

        $this->viewBuilder()->layout('admin');
    }

    public function edit($id = null) {
        $this->set('title', 'Cập nhật hồ sơ');
        $citiesTable = TableRegistry::get('Cities');
        $districtsTable = TableRegistry::get('Districts');
        $userTable = TableRegistry::get('Customers');
        $cvTable = TableRegistry::get('Cvs');
        $timeWorkTable = TableRegistry::get('TimeWorks');
        $experienceTable = TableRegistry::get('Experiences');
        $customersTable = TableRegistry::get('Customers');
        
        $listProvince = $citiesTable->find('list')->order(array("name" => "ASC"));
        $cvID = $this->request->query("id");
        $cv = $cvTable->find()->where(['id' => $cvID, 'deleted' => 0, 'status' => 1])->first();

        $cv->customer_birthday = convertDate($cv['customer_birthday']);
        $listDistrict = $districtsTable->find('list')->where(array("city_id" => $cv['province_id']))->order(array("name" => "ASC"));

        $experiences = $experienceTable->find()->where(['cv_id' => $cvID,]);
        $timeWorks = $timeWorkTable->find()->where(['item_id' => $cvID,])->all();
        $countEx = $experiences->count();
        $countTime = $timeWorks->count();
        //$timeWorks->toArray();
        // pd($timeWorks);
        if ($countTime == 1) {
            foreach ($timeWorks as $timeWork) {
                if ($timeWork->day == 0) {
                    $allDay = $timeWork;
                } else {
                    $allDay = NULL;
                }
            }
        } else {
            $allDay = NULL;
        }
        $this->set(compact('listProvince', 'cv', 'times', 'experiences', 'countEx', 'countTime', 'timeWorks', 'allDay'));
        $this->set(compact('listDistrict'));
        
        $this->set("categories", Configure::read("Categories"));
        
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $customer_name = $customersTable->find()->where(array("id" => $data['employee_id']))->first()->full_name;
            $data['customer_full_name'] = $customer_name;
            $dataCv = $data['Cv'];
            $dataTimeWork = $data['TimeWork'];
            $conn = ConnectionManager::get('default');
            $conn->begin();
            $flag = true;
            $file = $dataCv['avatar'];
            $img = $this->Files->uploadPublicFile($file, 'upload/avatar/');
            $cvSave = $cvTable->find()->where(['id' => $cvID])->first();
            $cvTable->patchEntity($cvSave,$data);
            $cvTable->patchEntity($cvSave, $dataCv);
            if ($img['error'] == FALSE) {
                $fileOld = new File(WWW_ROOT . $cvSave['avatar']);
                $fileOld->delete();
                $cvSave['avatar'] = $img['path'];
            } else {
                unset($cvSave['avatar']);
            }
            if($dataCv['work']){
                    $cvSave['work'] = implode(",",$dataCv['work']);
                }
            if ($dataCv['is_student'] != 1) {
                $cvSave['school'] = null;
                $cvSave['school_course'] = null;
                $cvSave['school_year'] = null;
            }
            if ($dataCv['customer_birthday']) {
                $cvSave['customer_birthday'] = convertBackDate($dataCv['customer_birthday']);
            }
            // pr($cvSave);die;
            $flag = $flag && $cvTable->save($cvSave);

            $timeWorkSave = $timeWorkTable->find()->where(['item_id' => $cvID,])->all();
            if ($dataTimeWork['is_all_week'] == 1) {
                if ($dataTimeWork[0]['id'] != null) {
                    $timeAllWeek = $timeWorkTable->find()->where(['id' => $dataTimeWork[0]['id']])->first();
                    $timeWorkTable->patchEntity($timeAllWeek, $dataTimeWork[0]);
                    $flag = $flag && $timeWorkTable->save($timeAllWeek);
                } else {
                    $this->loadModel('TimeWorks');
                    $this->TimeWorks->deleteAll(['item_id' => $cvID]);
                    $timeWork = $this->TimeWorks->newEntity([
                        'item_id' => $cvID,
                        'type' => 1,
                        'day' => 0,
                        'timeserving_from' => $dataTimeWork[0]['timeserving_from'],
                        'timeserving_to' => $dataTimeWork[0]['timeserving_to']
                    ]);
                    $flag = $flag && $timeWorkTable->save($timeWork);
                }
            } else {
                $dataTime = [];
                $timeWorkAr = array();
                $i = 0;
                foreach ($data['TimeWork'] as $data['TimeWork']) {
                    $i++;
                    if ($i <= 2) {
                        continue;
                    }
                    $dataTime[] = $data['TimeWork'];
                }
                foreach ($dataTime as $k => $v) {
                    if (isset($dataTime[$k]['id'])) {
                        $timeAllWeek = $timeWorkTable->find()->where(['id' => $dataTime[$k]['id']])->first();
                        $timeWorkTable->patchEntity($timeAllWeek, $dataTime[$k]);
                        $flag = $flag && $timeWorkTable->save($timeAllWeek);
                    }  else {
                        $timeWorkAr = array(
                            'item_id' => $cvID,
                            'type' => 1,
                            'day' => $dataTime[$k]['time_work'],
                            'timeserving_from' => $dataTime[$k]['start'],
                            'timeserving_to' => $dataTime[$k]['end']
                        );
                    $timeWorkSave = $timeWorkTable->newEntity($timeWorkAr);
                    $flag = $flag && $timeWorkTable->save($timeWorkSave);
                    }
                    
                }
                
            }
            if (isset($data['Experience'])) {
                $dataExperiences = array();
                foreach ($data['Experience'] as $data['Experience']) {
                    $dataExperiences[] = $data['Experience'];
                }
                $experienceAr = array();
                $experiencesSave = $experienceTable->find()->where(['cv_id' => $cvID])->all()->toArray();
                foreach ($dataExperiences as $k => $v) {
                    if ($dataExperiences[$k]['date_start']) {
                        $dataExperiences[$k]['date_start'] = convertBackDate($dataExperiences[$k]['date_start']);
                    }
                    if ($dataExperiences[$k]['date_end']) {
                        $dataExperiences[$k]['date_end'] = convertBackDate($dataExperiences[$k]['date_end']);
                    }
                    if (isset($dataExperiences[$k]['id'])) {
                        $experienceAr[$k] = $dataExperiences[$k];
                        $experienceTable->patchEntity($experiencesSave[$k], $experienceAr[$k]);
                        $flag = $flag && $experienceTable->save($experiencesSave[$k]);
                    } else {
                        $experienceAr[$k] = array(
                            'cv_id' => $cvID,
                            'company_name' => $dataExperiences[$k]['company_name'],
                            'level' => $dataExperiences[$k]['level'],
                            'description' => $dataExperiences[$k]['description'],
                            'date_start' => $dataExperiences[$k]['date_start'],
                            'date_end' => $dataExperiences[$k]['date_end'],
                        );
                        $experience = $experienceTable->newEntity($experienceAr[$k]);
                        $flag = $flag && $experienceTable->save($experience);
                    }
                }
            }

            if ($flag) {
                $conn->commit();
                $this->Flash->success(__('Thông tin của bạn được thay đổi thành công'));
               $this->redirect(["plugin" => "admin", "controller" => "Cvs", "action" => "index"]);
            } else {
                $conn->rollback();
                $this->Flash->error(__('Không thể thay đổi thông tin của bạn'));
                 $this->redirect(["plugin" => "admin", "controller" => "Cvs", "action" => "index"]);
            }
        }

        $this->set("listCustomer",$customersTable->find('list', ['keyField' => 'id','valueField' => 'email','conditions'=>['role'=>4]]));

        $this->viewBuilder()->layout('admin');
       
        
    }

    public function index() {
        $cvsTable = TableRegistry::get('Admin.Cvs');
        $customersTable = TableRegistry::get('Admin.Customers');
        if(isset($this->request->query['id']))
        {
            $id = $this->request->query['id'];
        }else{
            $id = null;
        }
        if($id != null){            
            $conditions = array(
                'Cvs.deleted' => 0,
                'Cvs.employee_id' => $id
                );
        }else{
             $conditions = array(
                'Cvs.deleted' => 0);
        }
        $cvs = $cvsTable->find('all')
            ->where($conditions)
            ->select(['id','name','employee_id','address','salary','unit','description','status','created'])
            ->contain(['Customers'=>['fields'=>['id','full_name']]]);
        
        $this->set(compact('cvs'));
        $this->viewBuilder()->layout('admin');
    }

    public function process() {
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Cvs');
            $data = $this->request->data;
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');
                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if ($this->Cvs->updateAll(array('status' => 1), $conditions)) {
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if ($this->Cvs->updateAll(array('status' => 0), $conditions)) {
                                $this->Flash->success('Cập nhật trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if ($this->Cvs->updateAll(array('deleted' => 1), $conditions)) {
                                $this->Flash->success('Xóa Cv thành công');
                            }
                        }
                        break;
                    default :
                        $this->Flash->success('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn cv nào');
            }
        }
        return $this->redirect([
                    'controller' => 'Cvs',
                    'action' => 'index'
        ]);
    }

}
