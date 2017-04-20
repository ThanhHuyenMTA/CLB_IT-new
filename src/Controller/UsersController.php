<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;

class UsersController extends AppController {

//vào trang bắt đăng nhập
    public function initialize() {
        parent::initialize();
//bỏ qua action initialize. cho phép truy nhập vào trang registration luôn
        $this->Auth->allow(['registration']);
        $this->loadComponent('Upload');
    }

    public function login() {
//$this->viewBuilder()->layout(false);
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
//pr($user); die();
            if ($user) {
                $email = new Email('gmail');
                $email
                        ->to('huyen010695mta@gmail.com')
                        ->subject('Hello welcome to IT CLUB NEW From THANH HUYỀN @@@@@')
                        ->send('My message test');
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid email or password, try again'));
        }
    }

    public function logout() {

        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        //open layout
        //$this->viewBuilder()->layout('Lay_Out');
        //close layout
        //$this->viewBuilder()->layout(false);
        $users = $this->Users->find('all');
        //phân trang
        $this->set('users', $this->paginate($users, ['limit' => 5,
                    'order' => [
                        'Users.id' => 'asc'
        ]]));
    }

    public function registration() {
        //$this->viewBuilder()->layout(false);
        $user = $this->Users->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($user->errors()) {
                //$this->Flash->error(__('Unable to add your user.'));
            } else {
                if ($this->Users->save($user)) {
                    // $this->Flash->success(__('Your user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
        }
        $this->set('user', $user);
    }

    public function profile() {
        $id = $this->request->session()->read("Auth.User.id");
        $this->request->data['id'] = $id;
        $user = $this->Users->get($id);
        $this->set(compact('user'));

        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->get($id);
            $image = $this->request->data['image'];
            //pr($image); die();
            $name_image = $image['name'];
            $tmp_name = $image['tmp_name'];
            $size_image = $image['size'];
            $file_type = $image['type'];
            $this->request->data = $user;
            $this->request->data['id'] = $id;
            $this->request->data['image'] = $name_image;
            if ($this->Users->save($this->request->data)) {
                //phan luu vao file 
                //Tạo tệp tải lên Tập lệnh PHP
                $target_dir = "../webroot/img/new/";
                $target_file = $target_dir . basename($name_image);
                //pr($target_file);die();
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    //  pr($image);die();
                    if (!$tmp_name) {
                        echo "File is not an image.";
                        die();
                    }
                    $check = getimagesize($tmp_name);
                    // pr($check);die();
                    if ($check == false || !$check) {
                        echo "File is not an image.";
                        $uploadOk = 0;
                        die();
                    } else {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($size_image > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats(Gioi han loai tep)
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (\move_uploaded_file($tmp_name, $target_file)) {
                        echo "The file " . basename($name_image) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                return $this->redirect(['action' => '../users/profile']);
            } else {
                $this->Flash->error(__('Unable to update your user.'));
            }
        }
    }

    //chu y
    public function view($id) {
        $this->request->data['id'] = $id;
        //  pr($id);die();
        $user = $this->Users->get($id);
        //pr($user);die();
        $this->set(compact('user'));
    }

    public function editprofile() {
        $id = $this->request->session()->read('Auth.User.id');
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->request->data['id'] = $id; //lấy id
           // pr($this->request->data);die();
            $moi = $this->Users->newEntity($this->request->data);
            if ($this->Users->save($moi)) {
                $this->Flash->success(__('Your user has been updated.'));
                return $this->redirect(['action' => '../users/profile']);
            } else {
                echo "Sai gì ???";
                die();
                $this->Flash->error(__('Unable to update your user.'));
            }
        }
        $this->set('user', $user);
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Users->get($id);
        if ($this->Users->delete($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>
