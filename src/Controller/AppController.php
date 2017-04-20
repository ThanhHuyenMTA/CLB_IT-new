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

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            //khi thực hiện logout xong trang sẽ chuyển sang trang chủ 
            ],
            'storage' => 'Session'
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {

        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        //check login user 
        if ($this->request->session()->read('Auth.User')) {
            $this->set('loggedIn', true);
            $image = $this->request->session()->read('Auth.User.image');
            $this->set(compact('image'));
            // pr($image);die();
            $username = $this->request->session()->read('Auth.User.username');
            $this->set(compact('username'));
            // pr($username);die();
        } else {
            $this->set('loggedIn', false);
        }
        //load Departments
        if ($this->loadModel('Departments')) {
            $department = $this->Departments->Find('all');
            $this->set(compact('department'));
        }
        //đưa ra số thư đã nhận(chưa đọc)
        $number = 0;
        if ($this->request->session()->read('Auth.User')) {
            $this->loadModel('Transactions');
            $this->loadModel('Letters');
            $this->loadModel('Users');
            $id_user = $this->request->session()->read('Auth.User.id');
            $lette = $this->Transactions->find('all')
                    ->autofields(false)
                    ->where(['Transactions.id_receiver' => $id_user])
                    ->contain([
                        'Letters' => [
                            'Users'
                        ]
                    ])
                    ->all();

            Foreach ($lette as $value) {
                if (($value->view) == 0) {
                    $number = $number + 1;
                }
            }
            // pr($number);die();
        }
         $this->set(compact('number'));
         
         
        
    }

}
