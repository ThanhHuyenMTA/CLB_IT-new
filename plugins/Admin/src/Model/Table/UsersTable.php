<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Table;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\User;
use Cake\ORM\TableRegistry;

class UsersTable extends Table {

  public function initialize(array $config) {
    $this->addBehavior("Timestamp");
    $this->table('users_tbl');
    $this->entityClass('Admin\Model\Entity\User');
  }

  public function findAuth(\Cake\ORM\Query $query, array $options) {
    $query->select(['id', 'username', 'password'])
          ->where(['Users.deleted' => 0]);
    return $query;
  }

  public function validationCreateUser(Validator $validator) {

    $validator
      ->notEmpty('full_name','Chưa nhập tên');

  	$validator
      ->notEmpty('email','Chưa nhập mail');

    $validator
      ->notEmpty('password', 'Chưa nhập mật khẩu')
      ->add('password', 'length', [
          'rule' => ['minLength', 8],
          'message' => 'Mật khẩu phải chứa ít nhất 8 ki tự'
      ]);

    $validator
      ->notEmpty('confirm_password', 'Bạn chưa nhập lại mật khẩu')
      ->add('confirm_password', 'length', [
          'rule' => ['minLength', 8],
          'message' => 'Mật khẩu phải chứa ít nhất 8 kí tự'
      ]);

    $validator
      ->add('confirm_password',[
        'match'=>[
            'rule'=> ['compareWith','password'],
            'message'=>'Hai lần nhập mật khẩu không giống nhau!',
        ]
      ]);

    return $validator;
  }

}
