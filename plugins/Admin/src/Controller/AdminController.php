<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Admin\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AdminController extends Controller
{

//    public $helpers = ['Admin.Customers'];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ],
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Admin',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Admin',              
            ]
        ]);
        $this->Auth->allow(['login']);
        $urlhome = Router::url('/', true);
        // pr($webroot);die;
        $this->set("urlhome",$urlhome);
    }
    
    public function beforeFilter(Event $event) {
        $user = $this->Auth->user();
        $this->set(['user' => $user]);
        parent::beforeFilter($event);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function index(){
        $this->loadModel('Admin.Customers');
        $totalRecruitment = $this->Customers->totalCustomer(array('role' => 3));
        $totalEmployee = $this->Customers->totalCustomer(array('role' => 4));
        $recruitments = $this->Customers->find()->where(array('deleted' => 0, 'role' => 3))->limit(5);
        $employees = $this->Customers->find()->where(array('deleted' => 0, 'role' => 4))->limit(5);
        
        $this->loadModel('Admin.Jobs');
        $totalJob = $this->Jobs->totalJob();
        $jobs = $this->Jobs->find()->where(array('deleted' => 0))->limit(5);
        $this->loadModel('Admin.Choices');
        $totalChoices = $this->Choices->totalChoices();
        
        $month = date('m');
        $numberReCurrent = $this->Customers->totalCustomer(array('role' => 3, 'month' => $month));
        $numberReBefore = $this->Customers->totalCustomer(array('role' => 3, 'month' => $month - 1));
        $numberEmpCurrent = $this->Customers->totalCustomer(array('role' => 4, 'month' => $month));
        $numberEmpBefore = $this->Customers->totalCustomer(array('role' => 4, 'month' => $month - 1));
        $numberJobCurrent = $this->Jobs->totalJob(array('month' => $month));
        $numberJobBefore = $this->Jobs->totalJob(array('month' => $month - 1));
        $numberChoicesCurrent = $this->Choices->totalChoices(array('month' => $month));
        $numberChoicesBefore = $this->Choices->totalChoices(array('month' => $month - 1));
        
        $this->viewBuilder()->layout('admin');
        $this->set(compact(
                'totalRecruitment', 
                'totalEmployee', 
                'totalJob', 
                'totalChoices',
                'numberReCurrent',
                'numberReBefore',
                'numberEmpCurrent',
                'numberEmpBefore',
                'numberJobCurrent',
                'numberJobBefore',
                'numberChoicesCurrent',
                'numberChoicesBefore',
                'jobs',
                'recruitments',
                'employees'
                ));
    }
    
    public function getOrderChartSale() {
        $month = date('m');
        $monthArr = array();
        $monthValue = array();
        $monthTotalValue = array();
        for ($i = 1; $i <= $month; $i++) {
            $monthArr[] = 'Tháng ' . $i;
            $monthValue[$i - 1] = 0;
            $monthTotalValue[$i - 1] = 0;
        }
        $this->loadModel('Admin.Customers');
        $recruitmentByMonths = $this->Customers->find();
        $recruitmentByMonths->select([
            'count' => $recruitmentByMonths->func()->count('id'),
            'month' => 'MONTH(created)'
        ])
        ->where(array('role' => 3))
        ->group('month');
        foreach ($recruitmentByMonths as $item) {
            $monthValue[$item['month'] - 1] = $item['count'];
        }
        $employeeByMonths = $this->Customers->find();
        $employeeByMonths->select([
            'count' => $employeeByMonths->func()->count('id'),
            'month' => 'MONTH(created)'
        ])
        ->where(array('role' => 4))
        ->group('month');
        foreach ($employeeByMonths as $item) {
            $monthTotalValue[$item['month'] - 1] = $item['count'];
        }
        echo json_encode(array(
                            'labels' => $monthArr,
                            'data1' => $monthTotalValue,
                            'data2' => $monthValue,
                            'price' => 1,
                            'totalPrice' => 3
        ));
        $this->autoRender = false;
    }
}
