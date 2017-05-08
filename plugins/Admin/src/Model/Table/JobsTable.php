<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;

use App\Model\Entity\Follow;
use App\Model\Entity\UserNotify;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
class JobsTable extends Table{

    public function initialize(array $config) {
        $this->addBehavior("Timestamp");
        $this->table('jobs_tbl');
        $this->entityClass('Admin\Model\Entity\Job');
        $this->belongsTo('Recruitment', array(
            'className' => 'Admin.Customers',
            'foreignKey' => 'recruitment_id'
        ));
        $this->hasMany('TimeWorks', array(
            'className' => 'Admin.TimeWorks',
            'conditions' => array(
                'TimeWorks.type' => 2
            ),
            'foreignKey' => array(
                'item_id'
            )
        ));
        $this->hasMany('MapJobs', array(
            'className' => 'Admin.MapJobs',
            'conditions' => array(
                'MapJobs.type' => 2
            ),
            'foreignKey' => array(
                'item_id'
            )
        ));
        $this->hasMany('Applies', array(
            'className' => 'Admin.Applies',
            'foreignKey' => array(
                'job_id'
            )
        ));
    }


    /**
     * @param Event $event
    */
    public function beforeSave(Event $event) {
        $entity = $event->data['entity'];
        /* @var Job $entity*/
        $entity->slug = genSlug($entity->title);
        $this->patchEntity($entity,$entity->toArray());
    }

     /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->requirePresence('title')
            ->notEmpty('title','Bạn cần nhập tiêu đề công việc')
            ->maxLength('title',255,'Tiêu đề quá dài');

        $validator->requirePresence('description')
            ->notEmpty('description','Bạn cần nhập tai nội dung công việc');

        $validator->requirePresence('category_id')
            ->notEmpty('category_id','Bạn cần nhập loại công việc');

        $validator->requirePresence('place_work')
            ->notEmpty('place_work','Bạn cần nhập địa chỉ công việc');

        $validator->requirePresence('province_id')
            ->notEmpty('province_id','Bạn cần nhập tỉnh/thành phố')
            ->notEmpty('district_id','Bạn cần nhập quận/huyện');

        $validator->requirePresence('recruitment_id')
            ->notEmpty('recruitment_id', "Bạn cần chọn nhà tuyển dụng");

        $validator->requirePresence('unit')
            ->notEmpty('unit',"Bạn cần chọn thời gian");

        $validator->requirePresence('salary')
            ->notEmpty('salary','Bạn cần nhập số tiền')
            ->numeric('salary','Số tiền không hợp lệ');


        //$validator->integer('type')->requirePresence('type', 'create')->notEmpty('type');
        //$validator->boolean('status')->requirePresence('status', 'create')->notEmpty('status');
        return $validator;
    }
    
    public function getJobListForAdmin($conditions = null){

        return $this->find("all",
            array(
                'contain' => array(
                    'Recruitment' => array(
                        'fields' => array(
                            'full_name',
                            'id'
                        )
                    ),
                    'Applies' => function ($q) {
                        return $q
                            ->select(['job_id'])
                            ->where(['Applies.deleted' => 0, "Applies.status" => 1]);
                    },
                ),
                'fields' => array(
                    'id',
                    'recruitment_id',
                    'title',
                    'place_work',
                    'salary',
                    'unit',
                    'description',
                    'status',
                    'created',

                ),
                'conditions' => $conditions
                )
            );

    }
   

    public function totalJob($filter = null){
        $condition = array();
        if(isset($filter['month'])){
            $condition['MONTH(created)'] = $filter['month'];
        }
        $count = $this->find('all', array(
            'conditions' => $condition
        ))->count();
        return $count;
    }

    /**
     * @action afterSave for job
     * @param $created
     * @param $options
     */
    // public function afterSave($created, $options) {
    //     if($created){
    //         $followsTable = TableRegistry::get('Follows');
    //         $follows = $followsTable->find('all',array(
    //             'conditions' => array(
    //                 'item_id'   => $options['id'],
    //                 'type'      => Follow::TYPE_FOR_JOB,
    //                 'status'    => Follow::STATUS_ACTIVE
    //             )
    //         ));
    //         $userNotifyTable = TableRegistry::get('UserNotifies');
    //         if($follows->count()){
    //             foreach($follows as $follow){
    //                 /* @var Follow $follow*/
    //                 $userNotify = new UserNotify();
    //                 $userNotify->notify_id     = 1;
    //                 $userNotify->customer_id   = $follow->customer_id;
    //                 $userNotifyTable->save($userNotify);
    //             }
    //         }
    //     }
    // }



    
}
