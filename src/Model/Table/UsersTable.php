<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        //lien ket
        $this->hasMany('Comments', [
            'className' => 'Comments'
        ]);

        $this->hasMany('Articles', [
            'className' => 'Articles'
        ]);

        $this->hasMany('Embarks', [
            'className' => 'Embarks'
        ]);

        $this->hasMany('Letters', [
            'className' => 'Letters',
            'foreignKey' => 'id_sender'
        ]);

        $this->hasMany('Transactions', [
            'className' => 'Transactions',
            'foreignKey' => 'id_receiver'
        ]);
    }

    // phần check lỗi đăng ký
    public function validationDefault(Validator $validator) {
        $validator = new Validator();
        $validator
                ->requirePresence('name')
                ->notEmpty('name', 'Please Enter your name')
                ->add('name', [
                    'length' => [
                        'rule' => ['minLength', 5],
                        'allowEmpty' => false,
                        'required' => true,
                        'message' => 'Titles need to be at least 5 characters long',
                    ]
                ])
                ->requirePresence('sex')
                ->notEmpty('sex', 'Please check your sex')
                ->requirePresence('password')
                ->notEmpty('password', 'Please Enter your Password')
                ->add('password', [
                    'length' => [
                        'rule' => ['minLength', 8],
                        'message' => 'Password need to be at least 8 characters long',
                    ]
                ])
                ->requirePresence('email')
                ->notEmpty('email', 'Please Enter your Email.')
                ->add('email', 'validFormat', [
                    'rule' => 'email',
                    'message' => 'E-mail must be valid'
                ])
                ->requirePresence('image_path', 'create')
                ->notEmpty('image_path')
                ->add('processImageUpload', 'custom', [
                    'rule' => 'processImageUpload'
                ])





        ;
        return $validator;
    }

    //end

    public function findAuth(\Cake\ORM\Query $query, array $options) {
        $query
                ->select(['id', 'email', 'password'])
                ->where(['Users.active' => 1]);
        return $query;
    }

    public function getUser(Request $request) {
        $username = env('PHP_AUTH_USER');
        $pass = env('PHP_AUTH_PW');

        if (empty($username) || empty($pass)) {
            return false;
        }
        return $this->_findUser($username, $pass);
    }

    public function processImageUpload($check = array()) {
        if (!is_uploaded_file($check['image_path']['tmp_name'])) {
            return FALSE;
        }
        if (!move_uploaded_file($check['image_path']['tmp_name'], WWW_ROOT . 'img' . DS . 'images' . DS . $check['image_path']['name'])) {
            return FALSE;
        }
        $this->data[$this->alias]['image_path'] = 'images' . DS . $check['image_path']['name'];
        return TRUE;
    }

}
?>