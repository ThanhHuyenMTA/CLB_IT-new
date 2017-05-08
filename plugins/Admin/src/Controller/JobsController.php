<?php

/**
 * Description of UsersController
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Controller;

use Admin\Controller\AdminController;
use Admin\Model\Entity\Job;
use Admin\Model\Entity\TimeWork;
use Admin\Model\Entity\Setting;
use Admin\Model\Entity\MapJob;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use App\Controller\Component\FilesComponent;
use Cake\Filesystem\File;
use Cake\I18n\Time;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Utility\Text;
use DateTime;


class JobsController extends AdminController{
    
    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates'],
    ];
    var $paginate = array();

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Files');
        $this->loadComponent('Paginator');
        $this->loadComponent('Social');
    }

    public function add()
    {
        $this->loadModel('Admin.Jobs');
        $this->loadModel('Admin.TimeWorks');
        $this->loadModel('Admin.MapJobs');

        $citiesTable = TableRegistry::get('Cities');
        $districtsTable = TableRegistry::get('districts');

        $this->set("cities",$citiesTable->find("list")->order(array("name"=>"ASC")));
        $this->set("districts",$districtsTable->find("list"));

        $this->set("categories",Configure::read("Categories"));
        $job = $this->Jobs->newEntity();
        $this->set("job",$job);

        $this->set("listUnit",Job::getUnit());

 

        $this->loadModel('Admin.Customers');
        $recruitments = $this->Customers->find('list', array(
            'keyField' => 'id',
            'valueField' => 'full_name',
            'conditions' => array(
                'deleted' => 0,
                'status' => 1,
                'role IN (3, 5)'
            )
        ))->toArray();
        
        $this->loadModel('Admin.Areas');
        $provinces = $this->Areas->find('list', array(
            'keyField' => 'id',
            'valueField' => 'name',
            'conditions' => array(
                'parent_id = 0 OR parent_id IS NULL'
            )
        ))->order(array("name"=>"ASC"))->toArray();
        
        $this->loadModel('Admin.TypeJobs');
        $listJobs = $this->TypeJobs->find('list', array(
            'keyField' => 'id',
            'valueField' => 'name',
            'conditions' => array(
                'status != ' => 0
            )
        ))->toArray();
        $this->set(compact('recruitments', 'provinces', 'listJobs'));
        $this->viewBuilder()->layout('admin');
        
        
        if($this->request->is('post')){
            $data = $this->request->data;
            // pr($data);die;
            if($data['time_start_apply']){
                $split_time_start = explode("/", $data['time_start_apply']);
                $data['time_start_apply'] = $split_time_start[2]."-".$split_time_start[1]."-".$split_time_start[0];
                $data['time_start_apply'] = date('Y-m-d H:i:s', strtotime($data['time_start_apply']));

            }
             if($data['time_expire_apply']){
                $split_time_expire = explode("/", $data['time_expire_apply']);
                $data['time_expire_apply'] = $split_time_expire[2]."-".$split_time_expire[1]."-".$split_time_expire[0];
                $data['time_expire_apply'] = date('Y-m-d H:i:s', strtotime($data['time_expire_apply']));

            }         
     
            $job = $this->Jobs->patchEntity($job, $data);

            $time_start = $job->time_start_apply;
            $time_end = $job->time_expire_apply;

            if($time_start > $time_end){
                $this->Flash->error("Bạn cần chọn thời gian kết thúc sau ngày bắt đầu");
                return;
            }
           
            if(!empty($data['avatar']['name'])) {
                $file = $data['avatar'];
                $img = $this->Files->uploadPublicFile($file,'upload/avatar_companies/');
                if($img['error']){
                    $this->Flash->set($img['errorMessage'],array('element'=>'error'));
                    return;
                }
                $job->avatar = $img['path'];
            }else{
                $job->avatar = null;
            }

            
            if ($this->Jobs->save($job)) {

                $this->Flash->success('Thêm mới Job thành công');
                return $this->redirect([
                    'controller' => 'Jobs',
                    'action' => 'index'
                ]);
            }

            $this->Flash->error('Bạn không thể thêm công việc.', ['element' => 'error']);
        }
    }
    
    public function edit()
    {
        $id = $this->request->query['id'];
        if(!$id){
            $this->Flash->error('Job không tồn tại');
            return $this->redirect([
                'controller' => 'Jobs',
                'action' => 'index'
            ]);
        }
        $this->loadModel('Admin.Jobs');
        $this->loadModel('Admin.TimeWorks');
        $this->loadModel('Admin.MapJobs');

        $citiesTable = TableRegistry::get('Cities');
        $districtsTable = TableRegistry::get('districts');

        $this->set("cities",$citiesTable->find("list"));
        $this->set("districts",$districtsTable->find("list"));

        $this->set("categories",Configure::read("Categories"));

        $job = $this->Jobs->get($id, ['contain' => ['TimeWorks', 'MapJobs']]);

        if(!$job){
            $this->Flash->error('Job không tồn tại');
            return $this->redirect([
                'controller' => 'Jobs',
                'action' => 'index'
            ]);
        }

        $job->time_start_apply = date("d/m/Y",strtotime($job->time_start_apply));
        $job->time_expire_apply = date("d/m/Y",strtotime($job->time_expire_apply));


        $valueTypeJobs = array();
        foreach ($job['map_jobs'] as $map_job){
            $valueTypeJobs[] = $map_job['type_job_id'];
        }

        $this->loadModel('Admin.Customers');
        $recruitments = $this->Customers->find('list', array(
            'keyField' => 'id',
            'valueField' => 'full_name',
            'conditions' => array(
                'deleted' => 0,
                'status' => 1,
                'role IN (3, 5)'
            )
        ))->toArray();
        
        $this->loadModel('Admin.Areas');
        $provinces = $this->Areas->find('list', array(
            'keyField' => 'id',
            'valueField' => 'name',
            'conditions' => array(
                'parent_id = 0 OR parent_id IS NULL'
            )
        ))->order(array("name" => "ASC"))->toArray();
        
        $this->loadModel('Admin.TypeJobs');
        $listJobs = $this->TypeJobs->find('list', array(
            'keyField' => 'id',
            'valueField' => 'name',
            'conditions' => array(
                'status != ' => 0
            )
        ))->toArray();
        $valueTypeJobs = array();
        foreach ($job['map_jobs'] as $map_job){
            $valueTypeJobs[] = $map_job['type_job_id'];
        }

        $this->set("listUnit",Job::getUnit());
        $this->set(compact('recruitments', 'provinces', 'job', 'listJobs', 'valueTypeJobs'));
        $this->viewBuilder()->layout('admin');

        if($this->request->is('put')){
            $data = $this->request->data;

            if($data['time_start_apply']){
                $split_time_start = explode("/", $data['time_start_apply']);
                $data['time_start_apply'] = $split_time_start[2]."-".$split_time_start[1]."-".$split_time_start[0];
                $data['time_start_apply'] = date('Y-m-d H:i:s', strtotime($data['time_start_apply']));

            }
             if($data['time_expire_apply']){
                $split_time_expire = explode("/", $data['time_expire_apply']);
                $data['time_expire_apply'] = $split_time_expire[2]."-".$split_time_expire[1]."-".$split_time_expire[0];
                $data['time_expire_apply'] = date('Y-m-d H:i:s', strtotime($data['time_expire_apply']));

            }

            if (!empty($data['avatar']['name'])) {
                    
                $file = $data['avatar'];
                $img = $this->Files->uploadPublicFile($file, 'upload/avatar_companies/');
                if ($img['error'] == FALSE) {
                    $fileOld = new File(ROOT . DS . $job['avatar']);
                    $fileOld->delete();
                    $data['avatar'] = $img['path'];
                } 
            }else{
                unset($data['avatar'] );
            }

            $job = $this->Jobs->patchEntity($job, $data);

            $time_start = $job->time_start_apply;
            $time_end = $job->time_expire_apply;

            if($time_start > $time_end){
                $this->Flash->error("Bạn cần chọn thời gian kết thúc sau ngày bắt đầu");
                return;
            }

            if ($this->Jobs->save($job)) {
                
                $this->Flash->success('Chỉnh sửa công việc của ' . $job['recruitment']['full_name'] . ' thành công');
                return $this->redirect([
                    'controller' => 'Jobs',
                    'action' => 'edit',
                    'id' => $id
                ]);
            }else{
                $this->Flash->error('Không thể cập nhật công việc!');
            }
        }
    }
    
    public function index() {
        $recruitment_id = isset($this->request->query['recruitment_id']) ? $this->request->query['recruitment_id'] : null;
        $this->loadModel('Admin.Jobs');
        $conditions = array(
            'Jobs.deleted' => 0,
            'Jobs.status !=' => 2

        );
        if($recruitment_id){
            $conditions['Jobs.recruitment_id'] = $recruitment_id;
        }
        $jobs = $this->Jobs->getJobListForAdmin($conditions);
        
        $this->set(compact('jobs'));
        $this->viewBuilder()->layout('admin');
    }

    public function stopedRecruit() {
        $conditions = array(
            'Jobs.status' => 2,
            'Jobs.deleted' => 0
        );
        $jobs = $this->Jobs->find('all')->where($conditions)->contain(['Recruitment' => ['fields' => ['full_name','id']]]);

        $this->set(compact('jobs'));
        $this->viewBuilder()->layout('admin');
    }

    public function deletedRecruit() {
        $conditions = array(
            'Jobs.deleted' => 1
        );
        $jobs = $this->Jobs->find('all')->where($conditions)->contain(['Recruitment' => ['fields' => ['full_name','id']]]);
        
        $this->set(compact('jobs'));
        $this->viewBuilder()->layout('admin');
    }
    
    public function listApply() {
        $job_id = $this->request->query('job_id');
        $appliesTable = TableRegistry::get('Applies');
        $cvsTable = TableRegistry::get('Cvs');
        $jobsTable = TableRegistry::get('Jobs');
        $jobs = $jobsTable->get($job_id);
        if($job_id) {
            $listcvs = $appliesTable->find()->where([
                'job_id' => $job_id,
                'status'=> Job::ACTIVE,
                'deleted'=> Job::NON_DELETED])
            ->select('Cv_id');
            $cvs = array();
            if($listcvs) {

                foreach ($listcvs as $listcv) {
                    $cvs[] = $cvsTable->find('all')->where([
                        'id' => $listcv['Cv_id']
                        ])->first();
                }
            }
        }
        $this->set(compact('cvs','jobs'));
        $this->viewBuilder()->layout('admin');
    }

    public function showSalary($salary){
            $salary = strval($salary);
            $salary = str_split($salary,1);
            $salary = array_reverse($salary);
            // pr($salary);die;
            $show_salary = null;
            for ($i=0; $i < sizeof($salary) ; $i++) { 
                if($show_salary != null){
                    if($i%3 == 2){
                        if($i == sizeof($salary)-1){
                            $show_salary = $salary[$i].$show_salary;
                        }else{
                            $show_salary = ".".$salary[$i].$show_salary;
                        }
                    }else{
                        $show_salary = $salary[$i].$show_salary;
                    }
                }else{
                    $show_salary = $salary[$i];
                }
            }

            return $show_salary;
        }

    public function process() {
/**
*Get data in table Settings
*/
        $settingsTable = TableRegistry::get('Settings');
        $settings = $settingsTable->find('list',[
            'keyField' => 'name',
            'valueField' => 'value'
            ])->toArray();
        $this->set(compact('settings'));
//End get table Setting
        if ($this->request->is('post')) {
            $this->loadModel('Admin.Jobs');
            $jobsTable = TableRegistry::get('Jobs');
            $data = $this->request->data;
            $webroot = Router::url('/', true);
            if (isset($data['name_action']) && isset($data['ids']) && !empty($data['ids'])) {
                $conditions = array('id IN (' . implode(',', $data['ids']) . ')');

                switch ($data['name_action']) {
                    case 1:
                        if (count($data['ids']) > 0) {
                            if($this->Jobs->updateAll(array('status' => 1), $conditions)){
                                $this->Flash->success('Update trạng thái thành công');
                            }
                        }
                        break;
                    case 2:
                        if (count($data['ids']) > 0) {
                            if($this->Jobs->updateAll(array('status' => 0), $conditions)){
                                $this->Flash->success('Update trạng thái thành công');
                            }
                        }
                        break;
                    case 3:
                        if (count($data['ids']) > 0) {
                            if($this->Jobs->updateAll(array('deleted' => 1), $conditions)){
                                $this->Flash->success('Xóa công việc thành công');
                            }
                        }
                        break;
                    case 4: // Share Jobs on Fanpage Viec4u
                        if (count($data['ids']) > 0) {
                            foreach ($data['ids'] as $key => $id) {
                                $row = $jobsTable->get($id);
                                $postFbs[$key] = [];
                                $postFbs[$key]['linkPage'] = $webroot."viec-lam/".$row['slug'].".html";
                                //get citynam
                                $cityTable = TableRegistry::get('Cities');
                                $city_db = $cityTable->find("all")->where(array("id"=>$row->province_id));
                                if($city_db->count() != 0){
                                    $city_name = $city_db->first()->name;
                                }else{
                                    $city_name = null;
                                }
                                if(!empty($row['salary'])){
                                    switch ($row['unit']) {
                                        case '1':
                                            $unit = "Giờ";
                                            break;
                                        case '2':
                                            $unit = "Ngày";
                                            break;
                                        case '3':
                                            $unit = "Tháng";
                                            break;
                                        default:
                                            $unit = "Chưa cập nhật";
                                            break;
                                    }
                                }
                                //end get cityname
                                $og_description = mb_strtoupper($row['title'],'UTF-8')." (Viec4u.vn)\n Làm tại: ".$row['place_work']." - ".$city_name.". \n Mức lương: ". h(!empty($row['salary']) ? $this->showSalary($row['salary'])." VNĐ /".$unit : "Cập nhật sau").". \n".mb_strtoupper('Mô tả công việc:','UTF-8')."\n". h(!empty($row['description']) ? Text::truncate(($row['description']),200) : "Thông tin chưa cập nhật");
                                $postFbs[$key]['content'] = $og_description ;
                            }
                            if (!empty($postFbs)) {
                                if (isset($settings["fb_app_id"]) && isset($settings["fb_app_secret"]) && isset($settings["fanpage_id"]) && isset($settings["fb_access_token"])) {
                                    $this->Social->shareFacebookFanpageInBackground($postFbs, $settings);
                                    $this->Flash->success('Chia sẻ công việc thành công');
                                }else{
                                    $this->Flash->error('Lỗi database, liên hệ developer');
                                }
                            }
                        }
                        break;
                    case 5:
                        if (count($data['ids']) > 0) {
                            if($this->Jobs->updateAll(array('status' => 2), $conditions)){
                                $this->Flash->success('Đã ngừng tuyển dụng '.count($data['ids']).' công việc.');
                            }
                        }
                        break;
                    case 6:
                        if (count($data['ids']) > 0) {
                            $jobsTable = TableRegistry::get('Jobs');
                            foreach ($data['ids'] as $key => $id) {
                                $job = $jobsTable->get($id);
                                $newdata = [];
                                $newdata["recruitment_id"] = $job["recruitment_id"];
                                $newdata["title"] = $job["title"];
                                $newdata["category_id"] = $job["category_id"];
                                $newdata["province_id"] = $job["province_id"];
                                $newdata["district_id"] = $job["district_id"];
                                $newdata["avatar"] = $job["avatar"];
                                $newdata["place_work"] = $job["place_work"];
                                $newdata["description"] = $job["description"];
                                $newdata["experience"] = $job["experience"];
                                $newdata["require_work"] = $job["require_work"];
                                $newdata["salary"] = $job["salary"];
                                $newdata["unit"] = $job["unit"];
                                $newdata["timework"] = $job["timework"];
                                $newdata["time_start_apply"] = $job["time_start_apply"];
                                $newdata["time_expire_apply"] = $job["time_expire_apply"];
                                $newdata["contact_person"] = $job["contact_person"];
                                $newdata["contact_mobile"] = $job["contact_mobile"];
                                $newdata["status"] = 0;
                                $newjob = $jobsTable->newEntity();
                                $newjob = $jobsTable->patchEntity($newjob, $newdata);
                                $jobupdate = $jobsTable->save($newjob);
                            }
                            if ($jobupdate) {
                                if ($this->Jobs->updateAll(['deleted' => 1], $conditions)){
                                    $this->Flash->success('Đăng lại thành công '.count($data['ids']).' công việc');
                                    return $this->redirect(['controller' => 'Jobs','action' => 'stoped_recruit']);
                                }
                            }
                        }
                        break;
                    case 7:
                        if (count($data['ids']) > 0) {
                            if($this->Jobs->updateAll(array('deleted' => 0), $conditions)){
                                $this->Flash->success('Khôi phục thành công '.count($data['ids']).' công việc.');
                                return $this->redirect(['controller' => 'Jobs','action' => 'deleted_recruit']);
                            }
                        }
                        break;
                    case 8:
                        if (count($data['ids']) > 0) {
                            if($this->Jobs->deleteAll($conditions)){
                                $this->Flash->success('Đã xóa vĩnh viễn '.count($data['ids']).' công việc.');
                                return $this->redirect(['controller' => 'Jobs','action' => 'deleted_recruit']);
                            }
                        }
                        break;
                    case 9:
                        if (count($data['ids']) > 0) {
                            $date = date("Y-m-d h:i:s");
                            if($this->Jobs->updateAll(["modified" => $date], $conditions)){
                                $this->Flash->success('Làm mới thành công '.count($data['ids']).' tin.');
                            }
                        }
                        break;
                    default :
                        $this->Flash->error('Cập nhật không thành công');
                        break;
                }
            }else{
                $this->Flash->success('Bạn chưa chọn công việc nào');
            }
        }
        return $this->redirect([
            'controller' => 'Jobs',
            'action' => 'index'
            ]);
    }
}
